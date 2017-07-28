<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Index extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_m', 'im');
		$this->load->model('Products', 'pm');
	}
	function index()
	{		
		$data['category']=$this->im->get_category();
		$data['sub_category']=$this->im->get_sub_category();
		$data['sub_cat1']=$this->im->lavel_category1();
		$data['product']=$this->im->get_product();
		$data['slide_active']=$this->im->get_slide_active();
		$data['slide_no_active']=$this->im->get_slide();
		//$data['lavel_cat']=$this->im->lavel_category($id);
		$this->load->view('template_frontend/header');
		$this->load->view('template_frontend/nav', $data);
		$this->load->view('template_frontend/slide', $data);
		$this->load->view('index');
		$this->load->view('template_frontend/footer');
	}

	function detail($id)
	{
		$data['category']=$this->im->get_category();
		$data['sub_category']=$this->im->get_sub_category();
		$data['sub_cat1']=$this->im->lavel_category1();
		$data['detail']=$this->im->product_detail($id);
		$data['sub_cat']=$this->im->sub_category($id);
		$data['sub_image']=$this->im->sub_image($id);
		$data['lavel_cat']=$this->im->lavel_category($id);
		$data['select_comment']=$this->im->select_comment($id);
		$this->pm->comment();
		$this->load->view('template_frontend/header');
		$this->load->view('template_frontend/nav',$data);
		//$this->load->view('template_frontend/slide');
		$this->load->view('page_detail',$data);
		$this->load->view('template_frontend/footer');
	}

	function products($id="")
	{
		$data['main_category']=$this->im->get_main_category($id);
		$data['category']=$this->im->get_category();
		$data['sub_category']=$this->im->get_sub_category();
		$data['sub_cat1']=$this->im->lavel_category1();
		$data['detail']=$this->im->product_detail($id);
		$data['sub_image']=$this->im->sub_image($id);
		$data['sub_cat']=$this->im->sub_category($id);
		$data['lavel_cat']=$this->im->lavel_category($id);
		$data['select_product']=$this->im->select_product($id);
		
		$this->load->view('template_frontend/header');
		$this->load->view('template_frontend/nav',$data);
		$this->load->view('products', $data);
		$this->load->view('template_frontend/footer');

	}// for more products

	function product($id)
	{

		//$data['main_category']=$this->im->get_main_category($id);
		$data['category']=$this->im->get_category(); // for nav
		$data['sub_category']=$this->im->get_sub_category(); // for nav
		$data['sub_cat1']=$this->im->lavel_category1(); // for nav

		//$data['detail']=$this->im->product_detail($id);
		// $data['sub_image']=$this->im->sub_image($id);
		$data['category1']=$this->pm->category();
		$data['lavel_cat']=$this->pm->lavel_category1();
		$data['get_product1']=$this->im->get_product1($id);
		$data['product']=$this->pm->product($id);
		//$data['select_product_limit']=$this->im->select_product_limit($id);
		$this->load->view('template_frontend/header');
		$this->load->view('template_frontend/nav',$data);
		//$this->load->view('template_frontend/slide');
		$this->load->view('product', $data);
		$this->load->view('template_frontend/footer');
	}

	function test()
	{
		$this->pm->comment();
		$this->load->view('test');	
		//echo "Hello";	
	}
	function comment()
	{

		$this->pm->comment();
		$this->load->view('test');	
		echo "Hello";	
	}

}
?>
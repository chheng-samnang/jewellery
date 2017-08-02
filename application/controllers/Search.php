<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Search extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_m', 'im');
		$this->load->model('Products', 'pm');
	}
	function index()
	{		$data['get_all_cat']= $this->im->get_all_category();
			$search = $this->input->post('searchs');
			
			$data['category']=$this->im->get_category();
			$data['sub_category']=$this->im->get_sub_category();
			$data['sub_cat1']=$this->im->lavel_category1();
			$data['product']=$this->im->get_product();

			$data['search_product']=$this->pm->index($search);

			$this->load->view('template_frontend/header');
			$this->load->view('template_frontend/nav', $data);
			
			$this->load->view('search_product', $data);
			$this->load->view('template_frontend/footer');
		
	}
}
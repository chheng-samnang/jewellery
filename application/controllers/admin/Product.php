<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller
{
	
    function  __construct() {
        parent::__construct();
        $this->load->model('product_m', 'pm');
    }
    
    function index(){
        
        
        $data['product'] = $this->pm->index();

        $this->load->view('template/header');
		$this->load->view('template/left');	
        $this->load->view('admin/product/product', $data);

        $this->load->view('template/footer');
    }
    public function validation()
    {
    	$this->form_validation->set_rules('txt_product_name','Product Name','trim|required');
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
    }

    function add($uploadData="")
    {
        // $data = array();
       
        if(isset($_POST['fileSubmit'])) 
        {
        	if($this->validation()==TRUE)
        	{
            
        		 $this->pm->insert_product();
		           
		            $insert = $this->pm->add($uploadData);
		           
		            $this->session->set_flashdata('statusMsg','Save successfully');
		            redirect("admin/Product");
		            exit;
       			

            }else{ redirect("admin/Product/add");}
           
          }

          else
                $data["cat"]=$this->pm->get_category();
                $this->load->view('template/header');
        		$this->load->view('template/left');	
                $this->load->view('admin/product/product_add', $data);
                $this->load->view('template/footer'); 
       
    }

    public function detial($id)
    {
        $data['product']=$this->pm->get_product($id);
        $data['detail_p']=$this->pm->detail($id);
        $this->load->view('template/header');
        $this->load->view('template/left'); 
        $this->load->view('admin/product/product_detail', $data);
        $this->load->view('template/footer'); 
    }
    function edit($id=""){
        if($id!=""){
            $data["cat"]=$this->pm->get_category();
            $data["edit_product"]=$this->pm->index($id);
            $data["get_media"]=$this->pm->detail($id);
            $this->load->view('template/header');
            $this->load->view('template/left'); 
            $this->load->view('admin/product/product_edit', $data);
            $this->load->view('template/footer'); 
        }
    }

    public function edit_value($id, $uploadData="")
    {
        

        $this->form_validation->set_rules('txt_product_name','Product Name','trim|required');
        if($this->form_validation->run()==TRUE)
        {
            if(isset($_POST['fileSubmit'])){
                $this->pm->update_product($id);
                $insert=$this->pm->edit($uploadData);
                
                $this->session->set_flashdata('statusMsg','Update successfully');
                redirect("admin/Product");
                }
                else $this->edit($id);

         
           

           //echo "Hello".$id;
        }else $this->edit($id);
    
    

    }
    function delete($id)
    {
        $this->pm->delete($id);
       redirect('admin/Product');
    }
    function delete_media($id)
    {
        $this->pm->delete_media($id);
        //redirect('admin/Product/edit/'.$id);
    }

}
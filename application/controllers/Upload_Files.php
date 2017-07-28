<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Upload_Files extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('file');
    }
    
    function index(){
        $statusMsg = 'Files uploaded successfully.';
        $this->session->set_flashdata('statusMsg',$statusMsg);
        $data['files'] = $this->file->getRows();
         $this->load->view('upload_select', $data);
    }

    function add($uploadData="")
    {
        // $data = array();
       
        if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
            //$this->load->view('upload');
            $this->file->insert_product();
            $insert = $this->file->insert($uploadData);
            redirect("Upload_Files");
            // $filesCount = count($_FILES['userFiles']['name']);
            // for($i = 0; $i < $filesCount; $i++){
            //     $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
            //     $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
            //     $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
            //     $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
            //     $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

            //     $uploadPath = 'assets/uploads/';
            //     $config['upload_path'] = $uploadPath;
            //     $config['allowed_types'] = 'gif|jpg|png';
                
            //     $this->load->library('upload', $config);
            //     $this->upload->initialize($config);
               
            //     if($this->upload->do_upload('userFile')){
            //          $row = $this->file->get_product();
            //     foreach ($row as  $value) {
            //        // echo'<script> alart("fdsfsf") </script>';
            //        $id = $value->p_id;
            //     }
            //         $fileData = $this->upload->data();
            //         $uploadData[$i]['file_name'] = $fileData['file_name'];
            //         $uploadData[$i]['created'] = date("Y-m-d H:i:s");
            //         $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
            //         $uploadData[$i]['title'] = $this->input->post('txt_titile');
            //         $uploadData[$i]['p_id']=$this->input->post('p_id');
            //     }
            }else
        $data["pro"] = $this->file->get_product();
         $this->load->view('upload', $data);
            
            // if(!empty($uploadData)){
            //     //Insert file information into the database
            //     // $this->file->insert_product();
            //     // $insert = $this->file->insert($uploadData);
               
            // }
        //}
        //Get files data from database
        //$data["pro"] = $this->file->get_product();
        
        //Pass the files data to view   
    }
    function edit($id){
        $data["pro"]=$this->file->get_pro($id);
        $this->load->view('upload', $data);
    }
    function delete($id)
    {
        $this->file->delete($id);
        redirect('Upload_Files');
    }

}
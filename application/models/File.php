<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class File extends CI_Model{

    public function getRows($id = ''){
          // $result = $this->db->query("SELECT * FROM tbl_product AS p INNER JOIN files AS f ON p.p_id");
          //  return $result->row_array();
        $this->db->select('id,p_id, file_name, created, file_type');
        $this->db->from('files');
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('created','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    
    public function insert($uploadData){
        $row = $this->db->query("SELECT p_id FROM tbl_product ORDER BY p_id DESC");
        $id = $row->row()->p_id;
            
             if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
             $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $config['upload_path']='assets/uploads/';
                $config['allowed_types'] = 'gif|jpg|png|mp4';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
               
                if($this->upload->do_upload('userFile')){
                     $fileData = $this->upload->data();
                 }
                //      $row = $this->file->get_product();
                // foreach ($row as  $value) {
                //    // echo'<script> alart("fdsfsf") </script>';
                //    $id = $value->p_id;
                // }
               
                
                    
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['title'] = $this->input->post('txt_titile');
                    $uploadData[$i]['p_id']=$id;                  

                }
            }
      
        $insert = $this->db->insert_batch('files',$uploadData);

        return $insert?true:false;
    }
    public function get_pro($id){
        $query = $this->db->query("SELECT * FROM tbl_product AS p INNER JOIN files AS f ON p.p_id=f.p_id WHERE f.p_id='$id'");
        return $query->result();
    }
    public function get_product()
    {
        $query = $this->db->query("SELECT p_id FROM tbl_product ORDER BY p_id DESC");
        return $query->row();
    }
    public function insert_product()
    {
        $data = array(

                'p_name'=>$this->input->post('txt_product'),
                'date_crea'=> date('Y-m-d')
            );
        $this->db->insert("tbl_product", $data);
    }

    public function delete($id)
    {
        $this->db->WHERE("id", $id);
        $this->db->DELETE("files");

    }
    
}
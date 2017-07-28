<?php
class Product_m extends CI_Model
{			
	var $userCrea;	
	private $fileData="";	
	public function __construct()
	{
		parent::__construct();
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";				
	}
	public function index($id="")
	{
		if($id=="")
		{
			$query = $this->db->query("SELECT * FROM `tbl_product` AS p INNER JOIN `tbl_category` AS c ON p.`cat_id`=c.`cat_id` INNER JOIN `tbl_media` AS m ON p.`p_id`=m.`p_id` GROUP BY m.`p_id`");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$query = $this->db->query("SELECT * FROM `tbl_product` AS p INNER JOIN `tbl_category` AS c ON p.`cat_id`=c.`cat_id` INNER JOIN `tbl_media` AS m ON p.`p_id`=m.`p_id` WHERE p.p_id='$id' AND m.p_id='$id'");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function add($uploadData){
		$row = $this->db->query("SELECT p_id FROM tbl_product ORDER BY p_id DESC");
		$id = $row->row()->p_id;

		if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name']) && !empty($_FILES['userFiles1']['name'])){
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
						$uploadData[$i]['file_name'] = $fileData['file_name'];
						$uploadData[$i]['date_crea'] = date("Y-m-d H:i:s");
						$uploadData[$i]['media_type'] = "image";
						
						$uploadData[$i]['user_crea'] = $this->userCrea;
						$uploadData[$i]['p_id']=$id; 

					//}            

			}
				$config['upload_path']='assets/uploads/';
		        $config['allowed_types']='mp4';
		        $this->load->library('upload',$config);
		         if($this->upload->do_upload('userFiles1'))
		             {
		                $file_name=$this->upload->data();
		             }
			$data = array(
				'file_name'=> $file_name['file_name'],
				'p_id'=> $id,
				'media_type'=> "video",
				'user_crea'=> $this->userCrea,
				'date_crea'=>date("Y-m-d H:i:s")
				);
		           // $data['file_name']=$file_name['file_name'];
		           // $data['p_id']=$id;
			// var_dump($data)."<br />";
		}
		$this->db->insert('tbl_media',$data);
		$insert = $this->db->insert_batch('tbl_media',$uploadData);

		return $insert?true:false;
	}

	public function edit($uploadData)
	{
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
				
                //      $row = $this->file->get_product();
                // foreach ($row as  $value) {
                //    // echo'<script> alart("fdsfsf") </script>';
                //    $id = $value->p_id;
                // }



				$uploadData[$i]['file_name'] = $fileData['file_name'];
				$uploadData[$i]['date_crea'] = date("Y-m-d H:i:s");
				$uploadData[$i]['media_type'] = "image";
				$uploadData[$i]['user_crea'] = "Sophea"; //$this->userCrea;
				$uploadData[$i]['p_id']=$this->input->post('p_id');
				}                  

			}
			//var_dump($fileData);
			//$this->db->where('p_id', $id);
			$insert = $this->db->insert_batch('tbl_media', $uploadData);
			return $insert?true:false;

			
		}

		
	}

	public function update_product($id)
	{
		if($id==TRUE)
		{
			$data =  array(
							'cat_id'=>$this->input->post('category'),
							'p_code'=>$this->input->post('txt_product_code'),
							'p_name'=>$this->input->post('txt_product_name'),
							'p_status'=>$this->input->post('status'),
							'price'=>$this->input->post('txt_price'),
							'p_desc'=>$this->input->post('desc')
						);
			$this->db->where('p_id', $id);
			$this->db->update("tbl_product", $data);
		}
			
		
	}

	public function delete_media($id)
	{
		// if($id==TRUE)
		// {						
			
			$this->db->where("media_id",$id);
			$this->db->delete('tbl_media');
			
		// }
	}

	public function insert_product()
	{
		$data = array(
			'cat_id'=>$this->input->post('category'),
			'p_code'=>$this->input->post('txt_product_code'),
			'p_name'=>$this->input->post('txt_product_name'),
			'p_status'=>$this->input->post('status'),
			'price'=>$this->input->post('txt_price'),
			'p_desc'=>$this->input->post('desc'),
			'user_crea'=>$this->userCrea,
			'date_crea'=> date('Y-m-d')
			);
		$this->db->insert("tbl_product", $data);
	}

	public function detail($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_media  WHERE p_id=$id");
		return $query->result();
	}


	public function get_product($id)
	{
		$query = $this->db->query("SELECT * FROM `tbl_product` AS p INNER JOIN `tbl_category` AS c ON p.`cat_id`=c.`cat_id` WHERE p.`p_id`=$id");
		return $query->row();
	}

	public function delete($id)
	{
		if($id==TRUE)
		{						
			$this->db->where("p_id",$id);
			$this->db->delete('tbl_product');
			$this->db->where("p_id",$id);
			$this->db->delete('tbl_media');
			
		}
	}

	public function get_category()
	{
		$query = $this->db->query("SELECT cat_id, cat_name, parent_id FROM tbl_category WHERE parent_id!=0");
		if($query->num_rows()>0){ return $query->result();}
	}
	
}
?>
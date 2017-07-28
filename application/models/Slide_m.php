<?php
class Slide_m extends CI_Model
{			
	var $userCrea;		
	public function __construct()
	{
		parent::__construct();
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";				
	}
	public function index($id="")
	{
		if($id=="")
		{
			$query=$this->db->query("SELECT * FROM tbl_slide");						
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$query=$this->db->query("SELECT * FROM tbl_slide  WHERE slide_id='{$id}'");						
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function category()
	{
		$this->db->where('cat_type','ph');
		$query=$this->db->get('tbl_category');
		if($query->num_rows()>0){return $query->result();}
	}
	public function add()
	{
		$data= array(						
						
						"slide_name" => $this->input->post("txtSlidename"),		
						"slide_url" => $this->input->post("txtUrl"),
						"slide_status" => $this->input->post("ddlStatus"),
						"slide_parth" =>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",											
						"slide_desc" => $this->input->post("txtDesc"),						
						"user_crea" => $this->userCrea,
						"date_crea" => date('Y-m-d')
						 );
		$query=$this->db->insert("tbl_slide",$data);		
		if($query==TURE){return TRUE;}
	}
	public function edit($id)
	{
		if($id==TRUE)
		{	
		if(!empty($this->input->post('txtImgName')))
			{
				$row=$this->index($id);						
				unlink("assets/uploads/".$row->ph_img);				
				$data= array(	

					"slide_name" => $this->input->post("txtSlidename"),		
					"slide_url" => $this->input->post("txtUrl"),
					"slide_status" => $this->input->post("ddlStatus"),
					"slide_parth" =>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",											
					"slide_desc" => $this->input->post("txtDesc"),								
					"user_updt" => $this->userCrea,
					"date_updt" => date('Y-m-d')

					);
			}
			else
			{
				$data= array(					
					"slide_name" => $this->input->post("txtSlidename"),		
					"slide_url" => $this->input->post("txtUrl"),
					"slide_status" => $this->input->post("ddlStatus"),	
					"slide_desc" => $this->input->post("txtDesc"),								
					"user_updt" => $this->userCrea,
					"date_updt" => date('Y-m-d')
					 );
			}  											
			$this->db->where("slide_id",$id);
			$query=$this->db->update("tbl_slide",$data);
			if($query==TRUE){return TURE;}
		}				
	}
	public function delete($id)
	{
		if($id==TRUE)
		{	
			$row=$this->index($id);			
			unlink("assets/uploads/".$row->ph_img);					
			$this->db->where("slide_id",$id);
			$query=$this->db->delete("tbl_slide");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>
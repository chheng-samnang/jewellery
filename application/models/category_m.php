<?php
class Category_m extends CI_Model
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
			// $this->db->order_by('cat_id', 'DESC');
			// $query=$this->db->get("tbl_category");
			$query=$this->db->query("SELECT *  FROM tbl_category WHERE parent_id!=0 ORDER BY cat_id DESC");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$this->db->where("cat_id",$id);
			$query=$this->db->get("tbl_category");
			if($query->num_rows()>0){return $query->row();}
		}
	}

	public function get_category()
	{
		$query = $this->db->query("SELECT * FROM tbl_category WHERE parent_id='0'");
		return $query->result();	
	}

	public function add()
	{
		$data= array(						
						"cat_name" => $this->input->post("txtCategoryName"),
						"cat_status" => $this->input->post("ddlStatus"),
						"cat_icon" =>!empty($this->input->post('txtUpload'))?$this->input->post('txtUpload'):"",
						"parent_id" => $this->input->post("ddlCatType"),
						"cat_desc" => $this->input->post("txtDesc"),						
						"user_crea" => $this->userCrea,
						"date_crea" => date('Y-m-d')
						 );
		$query=$this->db->insert("tbl_category",$data);		
		if($query==TURE){return TRUE;}
	}
	public function edit($id)
	{
		if($id==TRUE)
		{			
			if(!empty($this->input->post('txtUpload')))
			{
			$data= array(	

						"cat_name" => $this->input->post("txtCategoryName"),
						"cat_status" => $this->input->post("ddlStatus"),
						"cat_icon" =>!empty($this->input->post('txtUpload'))?$this->input->post('txtUpload'):"",
						"parent_id" => $this->input->post("ddlCatType"),
						"cat_desc" => $this->input->post("txtDesc"),						
						"user_updt" => $this->userCrea,
						"date_updt" => date('Y-m-d')
					 );	
			}else
			{
				$data= array(	
						"cat_name" => $this->input->post("txtCategoryName"),
						"parent_id" => $this->input->post("ddlCatType"),
						"cat_desc" => $this->input->post("txtDesc"),						
						"user_updt" => $this->userCrea,
						"date_updt" => date('Y-m-d')
					 );	
			}		

			$this->db->where("cat_id",$id);
			$query=$this->db->update("tbl_category",$data);
			if($query==TRUE){return TURE;}
		}				
	}
	public function delete($id)
	{
		if($id==TRUE)
		{						
			$this->db->where("cat_id",$id);
			$query=$this->db->delete("tbl_category");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>
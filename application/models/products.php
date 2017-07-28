<?php
class Products extends CI_Model
{			
	//var $userCrea;	
	//private $fileData="";	
	public function __construct()
	{
		parent::__construct();
		//$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";				
	}
	public function index()
	{

	}

	public function product($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_category WHERE cat_id='$id'");
		return $query->row();
	}

	public function category(){
		$query = $this->db->query("SELECT cat_name ,parent_id, cat_id FROM tbl_category WHERE parent_id!='0' AND lavel_cat=''");
		return $query->result();
	}

		public function lavel_category1()
	{
		$query = $this->db->query("SELECT cat_name ,parent_id, cat_id, lavel_cat FROM tbl_category WHERE lavel_cat");
		return $query->result();
	}

	public function comment()
	{
		if($this->input->post('cm_desc')==TRUE){
		$data= array(
				'cm_desc'=>$this->input->post('cm_desc'),
				'p_id'=>$this->input->post('p_id'),
				'date_crea'=> date('Y-m-d')
			);
		$this->db->insert("tbl_comment_hdr", $data);
		}

		return false;
	}
}
<?php
class Index_m extends CI_Model
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
	public function get_all_category()
	{
		$query = $this->db->query("SELECT cat_name ,parent_id, cat_id FROM tbl_category");
		return $query->result();
	}
	public function get_main_category($id)
	{
		$query = $this->db->query("SELECT cat_name ,parent_id, cat_icon, cat_desc, cat_id FROM tbl_category WHERE parent_id=0  AND cat_id=$id");
		return $query->row();
	}

	public function get_category()
	{
		$query = $this->db->query("SELECT cat_name ,parent_id, cat_id FROM tbl_category WHERE parent_id=0");
		return $query->result();
	}

	public function get_sub_category()
	{
		$query = $this->db->query("SELECT cat_name ,parent_id, cat_id FROM tbl_category WHERE parent_id!='0' AND lavel_cat=''");
		return $query->result();
	}

	public function sub_category($id)
	{
		$query = $this->db->query("SELECT cat_name ,parent_id, cat_id FROM tbl_category WHERE parent_id='$id' AND lavel_cat='0'");
		return $query->result();
	}

	public function lavel_category($id)
	{
		$query = $this->db->query("SELECT cat_name ,parent_id, cat_id, lavel_cat FROM tbl_category WHERE parent_id='$id'");
		return $query->result();
	}

	public function lavel_category1()
	{
		$query = $this->db->query("SELECT cat_name ,parent_id, cat_id, lavel_cat FROM tbl_category WHERE lavel_cat");
		return $query->result();
	}

	public function get_product()
	{
		$query = $this->db->query("SELECT * FROM `tbl_product` AS p INNER JOIN `tbl_media` AS m ON P.`p_id`=m.`p_id` AND m.media_type='image' GROUP BY m.p_id");
		return $query->result();
	}

	public function product_detail($id="")
	{
		$query = $this->db->query("SELECT * FROM `tbl_product` AS p INNER JOIN tbl_category AS c ON p.cat_id=c.cat_id INNER JOIN `tbl_media` AS m ON P.`p_id`=m.`p_id` WHERE p.p_id='$id' AND media_type='image'");
		return $query->row();
	}

	public function select_product($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_product AS p INNER JOIN tbl_category AS c ON c.cat_id=p.cat_id LEFT JOIN `tbl_media` AS m ON p.`p_id`=m.`p_id` WHERE c.parent_id='$id' AND m.media_type='image' GROUP BY m.p_id ORDER BY m.p_id DESC ");
		return $query->result();
	}
	public function get_product1($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_product AS p INNER JOIN tbl_category AS c ON c.cat_id=p.cat_id LEFT JOIN `tbl_media` AS m ON p.`p_id`=m.`p_id` WHERE m.media_type='image' AND c.cat_id='$id' GROUP BY m.p_id");
		return $query->result();
	}


	public function sub_image($id)
	{
		$query = $this->db->query("SELECT * FROM `tbl_product` AS p INNER JOIN `tbl_media` AS m ON P.`p_id`=m.`p_id`  WHERE p.p_id='$id'");
		return $query->result();
	}

	public function select_comment($id)
	{
		$query= $this->db->query("SELECT * FROM tbl_product AS p  INNER JOIN tbl_comment_hdr AS ch ON ch.p_id=p.p_id WHERE p.p_id='$id'");
		return $query->result();
	}
	public function get_slide_active()
	{
		$query = $this->db->query("SELECT slide_parth FROM tbl_slide WHERE slide_status=1 LIMIT 1");
		return $query->row();
	}
	public function get_slide()
	{
		$query = $this->db->query("SELECT slide_parth FROM tbl_slide WHERE slide_status=1 ORDER BY slide_id DESC LIMIT 3 ");
		return $query->result();
	}
}
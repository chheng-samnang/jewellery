<?php
class Slide extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Slide';
		$this->page_redirect="admin/Slide";								
		$this->load->model("Slide_m", "sm");
	}
	public function index()
	{		
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$data['pageHeader'] = $this->pageHeader;
		$data["action_url"]=array(0=>"{$this->page_redirect}/add",1=>"{$this->page_redirect}/edit",2=>"{$this->page_redirect}/delete"/*,"{$this->page_redirect}/change_password"*/);							
		$data["tbl_hdr"]=array("Slide name","Image","Status","User create","Date create","User update","Date Updt");		
		$row=$this->sm->index();		
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$data["tbl_body"][$i]=array(
										$value->slide_name,
										"<img class='img-thumbnail' src='".base_url("assets/uploads/".$value->slide_parth)."' style='width:70px;' />",																														
																			
										$value->slide_status==1?'<i style="color:#58b358;" title="Enable" class="fa fa-check-circle-o"></i>':'<i style="color:red" title="Disable" class="fa fa-times-circle"></i>',
																												
										$value->user_crea,
										date("d-m-Y",strtotime($value->date_crea)),							
										$value->user_updt,
										$value->date_updt==NULL?NULL:date("d-m-Y",strtotime($value->date_updt)),
										$value->slide_id
									);
			$i=$i+1;
		endforeach;
		}	
		if(!empty($this->session->flashdata('msg'))){$data['msg']=$this->message->success_msg($this->session->flashdata('msg'));}																		
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer');
	}
	public function validation()
	{				
		$this->form_validation->set_rules('txtSlidename','Slide Name','trim|required');
		// $this->form_validation->set_rules('txtPhCode','Phone code','trim|required');
		// $this->form_validation->set_rules('txtPhName','Phone name','trim|required');
		// $this->form_validation->set_rules('txtPhNameKh','Phone name khmer','trim|required');
		// $this->form_validation->set_rules('txtPrice','Price','trim|required');								
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}	
	public function add()
	{		
		// $row=$this->Phone_m->category();					
		// 	if($row==TRUE)
		// 	{
		// 	$option1[NULL]	=	"Choose One";
		// 	foreach($row as $value):						
		// 		$option1[$value->cat_id]=$value->cat_name;								
		// 	endforeach;
		// 	}
		// 	else{$option1[NULL]=NULL;}
		$option= array('1'=>'Enable','0'=>'Disable');			
		$data['ctrl'] = $this->createCtrl($row="",$option);		
		$data['action'] = "{$this->page_redirect}/add_value";
		$data['pageHeader'] = $this->pageHeader;		
		$data['cancel'] = $this->page_redirect;
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/page_add',$data);
		$this->load->view('template/footer');		
	}
	public function add_value()
	{
		if(isset($_POST["btnSubmit"]))
		{			
			if($this->validation()==TRUE)
				{																													             
	                if($this->sm->add()==TRUE)
	                {	       
	                	$this->session->set_flashdata('msg','Save successfully !');       	
						redirect("{$this->page_redirect}/");
						exit;	
	                }	                                																			
				}
			else{$this->add();}		
		}
	}
	public function edit($id="")
	{		
		if($id!="")
		{		
			// $row=$this->Phone_m->category();					
			// if($row==TRUE)
			// {
			// 	$option1[NULL]	=	"Choose One";
			// foreach($row as $value):						
			// 	$option1[$value->cat_id]=$value->cat_name;								
			// endforeach;
			// }
			$option= array('1'=>'Enable','0'=>'Disable');
			$row=$this->sm->index($id);				
			if($row==TRUE)
			{																															
				$data['ctrl'] = $this->createCtrl($row,$option);			
				$data['action'] = "{$this->page_redirect}/edit_value/{$id}";
				$data['pageHeader'] = $this->pageHeader;		
				$data['cancel'] = $this->page_redirect;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view("admin/page_edit",$data);
				$this->load->view('template/footer');
			}
		}
		else{return FALSE;}
	}
	public function edit_value($id="")
	{		
		if(isset($_POST["btnSubmit"]))
		{						
			if($this->validation()==TRUE)
			{	
				$row=$this->sm->edit($id);	
				if($row==TRUE)
	            {	
	            	$this->session->set_flashdata('msg','Change successfully !');                		                	
					redirect("{$this->page_redirect}/");
					exit;	
	            }																				                              												
			}
			else 
			{	
				$this->edit($id);													
			}			
		}
	}	

	public function delete($id="")
	{
		if($id!="")
		{
			$row=$this->sm->delete($id);
			if($row==TRUE){redirect("{$this->page_redirect}/");exit;}
		}
		else{return FALSE;}
	}
	public function createCtrl($row="",$option="",$option1="")
		{	
			if($row!="")
			{		
					$row1=$row->slide_name;						
					$row2=$row->slide_url;
					$row3=$row->slide_status;
					$row4=$row->slide_parth;
					$row5=$row->slide_desc;
					//$row6=$row->ph_status;					
					// $row7=$row->ph_desc;
					// $row8=$row->ph_img;																												
			}											
			//$ctrl = array();
			$ctrl = array(	
							// array(
							// 		'type'=>'dropdown',
							// 		'name'=>'txtCatId',
							// 		'option'=>$option1,
							// 		'selected'=>$row==""? set_value("txtComStatus") : $row1,
							// 		'class'=>'class="form-control"',
							// 		'label'=>'Category name'
							// 	),							

							array(
									'type'=>'text',
									'name'=>'txtSlidename',
									'id'=>'txtSlidename',									
									'value'=>$row==""? set_value("txtSlidename") : $row1,					
									'placeholder'=>'Enter Phone code',									
									'class'=>'form-control',
									'label'=>'Slide Name'																								
								),
							array(
									'type'=>'text',
									'name'=>'txtUrl',
									'id'=>'txtUrl',									
									'value'=>$row==""? set_value("txtUrl") : $row2,					
									'placeholder'=>'Enter Phone name',									
									'class'=>'form-control',
									'label'=>'Slide (URL)'																								
								),
							// array(
							// 		'type'=>'text',
							// 		'name'=>'txtPhNameKh',
							// 		'id'=>'txtPhNameKh',									
							// 		'value'=>$row==""? set_value("txtPhNameKh") : $row4,					
							// 		'placeholder'=>'Enter Phone name khmer',									
							// 		'class'=>'form-control',
							// 		'label'=>'Phone name khmer'																								
							// 	),
							//array(
								// 	'type'=>'text',
								// 	'name'=>'txtPrice',
								// 	'id'=>'txtPrice',									
								// 	'value'=>$row==""? set_value("txtPrice") : $row5,					
								// 	'placeholder'=>'Enter Price',									
								// 	'class'=>'form-control',
								// 	'label'=>'Phone Price'																								
								// ),								
								array(
									'type'=>'dropdown',
									'name'=>'ddlStatus',
									'option'=>$option,
									'selected'=>$row==""? set_value("ddlStatus") : $row3,
									'class'=>'class="form-control"',
									'label'=>'Status'
								),
								array(
									'type'=>'upload',
									'name'=>'txtUpload',
									'id'=>'txtUpload',
									'value'=>$row==""? set_value("txtUpload") : $row4,																		
									'class'=>'form-control',
									'label'=>'Chose Image',
									"img"=>$row==""? set_value("txtUpload") :"<img class='img-thumbnail' src='".base_url("assets/uploads/".$row4)."' style='width:70px;' />",										
								),							
							array(
									'type'=>'textarea',
									'name'=>'txtDesc',
									'value'=>$row==""? set_value("textarea") : $row5,
									'label'=>'Description',
									'rows'=>'10',
									'cols'=>'50'
								),
							);
			return $ctrl;
		}
}
?>

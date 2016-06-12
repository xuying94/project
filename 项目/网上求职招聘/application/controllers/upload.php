<?php

class Upload extends CI_Controller {
 
 function __construct()
 {
  parent::__construct();
  $this->load->helper(array('form', 'url'));
 }
 
 function index()
 { 
  $this->load->view('upload_form', array('error' => ' ' ));
 }

 function do_upload()
 {
		$login_user=$this->session->userdata("login_user");
		$employ_id=$login_user->employ_id;
		$src="{$employ_id}.jpg";
		// var_dump($src);
		// die;
	  $config['upload_path'] = './images/uploads/';//图片路径
	  $config['allowed_types'] = 'gif|jpg|png';
	  $config['max_size'] = '1000';
	  $config['max_width']  = '1024';
	  $config['max_height']  = '768';
	  $config['file_name']=$src;	  //设置图片名为登陆人id$config['file_name']=+$admin_id+'.jpg';
	  $this->load->library('upload', $config);
 
  if ( ! $this->upload->do_upload())
  {
   $error = array('error' => $this->upload->display_errors());
   
   $this->load->view('upload_form', $error);
  } 
  else
  {
   $data = array('upload_data' => $this->upload->data());
   
   $this->load->view('upload_success', $data);
  }
 } 
}
?>
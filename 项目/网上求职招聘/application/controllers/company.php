<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Company extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model("recruit_model");
			$this->load->library('pagination');
		}
		public function company_detail(){ //公司详情
    	$login_user=$this->session->userdata("login_user");
			$company_id=$login_user->company_id;
		$this->load->model("recruit_model");
		$row=$this->recruit_model->get_by_id($company_id);
		$data=array(
			"company"=>$row
		);
		// var_dump($data);
		// die;
        $this->load->view('company/company_detail',$data);
    }
		public function company_edit(){ //公司详情
    	$company_id=($this->input->get('company_id'));
		$this->load->model("recruit_model");
		$row=$this->recruit_model->get_by_id($company_id);
		$data=array(
			"company"=>$row
		);
		// var_dump($data);
		// die;
        $this->load->view('company/company_edit',$data);
    }
		public function company_edit_save(){
			$login_user=$this->session->userdata("login_user");
			$company_id=$login_user->company_id;
			$company_name=$this->input->post('company_name');
			$company_all_name=$this->input->post('company_all_name');
			$company_detail=$this->input->post("company_detail");
			$company_email=$this->input->post("company_email");
			$company_type=$this->input->post('company_type');
			$company_tel=$this->input->post('company_tel');
			$company_corporation=$this->input->post('company_corporation');
			//$company_start_time=$this->input->post('company_start_time');
			$company_city=$this->input->post('company_city');
			$company_address=$this->input->post('company_address');
			$company_contact=$this->input->post('company_contact');
			// $fileField=$this->input->post('fileField');
		    $data1=array(
			'company_name'=>$company_name,
			'company_all_name'=>$company_all_name,
			'company_detail'=>$company_detail,
			'company_email'=>$company_email,
			'company_type'=>$company_type,
			'company_tel'=>$company_tel,
			'company_corporation'=>$company_corporation,
			'company_city'=>$company_city,
			'company_address'=>$company_address,
			'company_contact'=>$company_contact,
		);
		// var_dump($data1);
		// die;
		$this->load->model('recruit_model');
		$row=$this->recruit_model->update_company($company_id,$data1);
		if($row){
		$data=array(
			'company'=>$row
		);
		// var_dump($data);
		// die;
			$this->company_detail();
			
		}else{
			echo"数据库未查到数据";
		}
		}
		public function company_index(){//新建一张存放公司收到简历的表 公司收到的所有简历
			$login_user=$this->session->userdata("login_user");
			$company_id=$login_user->company_id;
			$this->load->model("recruit_model");
			$result=$this->recruit_model->get_profiile_by_id($company_id);
			$data=array(
				"profiles"=>$result
			);
			// var_dump($data);
			// die;
			$this->load->view("company/company_index",$data);
		}
		public function company_all_job(){
			$company_id=($this->input->get('company_id'));
			$this->load->model("recruit_model");
			$result=$this->recruit_model->get_job_by_cid($company_id);
			$data=array(
				"companys"=>$result
			);
			$this->load->view("company/company_all_job",$data);
			// var_dump($result);
			// die;
		}
		public function job_detail(){//给用户查看见职位信息的
		if($this->session->userdata('login_user')){
			$login_user=$this->session->userdata("login_user");
			$employ_id=$login_user->employ_id;
		}else{
			$employ_id="0";
		}
			$recruit_id=($this->input->get('recruit_id'));
			$this->load->model("recruit_model");
			$row=$this->recruit_model->get_job_by_id($recruit_id);
			$favorate_flag="";
			$apply_flag="";
			// var_dump($recruit_id);
			// die;
			$data=array(
				"recruit"=>$row,
				"apply_flag"=>$apply_flag,
				"favorate_flag"=>$favorate_flag
			);
			$this->load->model("recruit_model");
			$row2=$this->recruit_model->get_job_by_2id($recruit_id,$employ_id);
			$this->load->model("recruit_model");
			$row3=$this->recruit_model->get_job_by_2id_from_apply($recruit_id,$employ_id);
			if($row2){
				if($row3){
					$data2=array(
					"recruit"=>$row,
					"favorate_flag"=>"已收藏",
					"apply_flag"=>"已申请"
				);
				$this->load->view("job_detail",$data2);
				}else{
					$data3=array(
					"recruit"=>$row,
					"favorate_flag"=>"已收藏",
					"apply_flag"=>$apply_flag
				);
				$this->load->view("job_detail",$data3);
				}
			}else{
				// var_dump($data);
			// die;
				$this->load->view("job_detail",$data);
			}
			// var_dump($row2);
			// die;
			
		}
		public function show_company(){
			$company_id=($this->input->get('company_id'));
		$this->load->model("recruit_model");
		$row=$this->recruit_model->get_by_id($company_id);
		$data=array(
			"company"=>$row
		);

			$this->load->view("company/show_company",$data);
		}
		public function check_profile(){//查看简历
			$employ_id=($this->input->get('employ_id'));
			$this->load->model('employ_model');
			$row=$this->employ_model->get_by_id($employ_id);
			// $this->load->model('recruit_model');
			// $row=$this->recruit_model->get_recruit_id_by_id($recruit_profile_id);
			$data=array(
				'employ'=>$row
			);
			$this->load->view('company/check_profile',$data);
		}
		public function show_talent_pool(){//查看简历
			$employ_id=($this->input->get('employ_id'));
			$this->load->model('employ_model');
			$row=$this->employ_model->get_by_id($employ_id);
			// $this->load->model('recruit_model');
			// $row=$this->recruit_model->get_recruit_id_by_id($recruit_profile_id);
			$data=array(
				'employ'=>$row
			);
			$this->load->view('company/show_talent_pool',$data);
		}
		public function repply_employ(){//回复用户简历
			$employ_id=$this->input->post("employ_id");
			$company_id=$this->input->post("company_id");
			$company_name=$this->input->post("company_name");
			$employ_news_content=$this->input->post("repply_employ");
			if($employ_news_content=="合适"){
				$employ_news_flag="yes";
			}else{
				$employ_news_flag="no";
			}
			
			// var_dump($employ_news_flag);
			// die;
			$data=array(
				"employ_id"=>$employ_id,
				"company_id"=>$company_id,
				"company_name"=>$company_name,
				"employ_news_content"=>$employ_news_content,
				"employ_news_flag"=>$employ_news_flag
			);
			$this->load->model('recruit_model');
			$row=$this->recruit_model->save_repply($data);
			if($row){
				$this->company_index();
			}else{
				echo"保存失败";
			}
		}
		public function company_recruit(){
			$login_user=$this->session->userdata("login_user");
			$company_id=$login_user->company_id;
			// $company_id=($this->input->get('company_id'));
			$this->load->view("company/company_recruit");
		}
		
		public function add_recruit(){//还没写具体实现呢 发布招聘
   			$company_name=$this->input->post('company_name');
   			$recruit_name=$this->input->post('recruit_name');
			$recruit_address=$this->input->post('recruit_address');
			$recruit_type=$this->input->post('recruit_type');
			$recruit_salary=$this->input->post('recruit_salary');
			$recruit_num=$this->input->post('recruit_num');
			$company_id=$this->input->post('company_id');
			$recruit_work_time=$this->input->post('recruit_work_time');	
			$recruit_detail=$this->input->post('recruit_detail');	
			$recruit_educate=$this->input->post('recruit_educate');		
			$recruit_company_detail=$this->input->post('company_detail');
		    $data=array(
		    'recruit_name'=>$recruit_name,
		    'recruit_detail'=>$recruit_detail,
		    'company_id'=>$company_id,
		    'company_name'=>$company_name,
			'recruit_type'=>$recruit_type,
			'recruit_address'=>$recruit_address,
			'recruit_educate'=>$recruit_educate,
			'recruit_salary'=>$recruit_salary,
			'recruit_work_time'=>$recruit_work_time,
			'recruit_company_detail'=>$recruit_company_detail,
			'recruit_num'=>$recruit_num,
		);
		// print_r($data);
		// die;
		$this->load->model('recruit_model');
		$row=$this->recruit_model->save_recruit($data);
		if(TRUE){
			echo"<script>alert('发布成功！')</script>";
			$this->company_recruit();
		}
else{
	echo"<script>alert('发布失败！')</script>";
}
	}
	public function update_recruit(){
		$recruit_id=($this->input->get('recruit_id'));
			$this->load->model("recruit_model");
			$row=$this->recruit_model->get_job_by_id($recruit_id);
			$data=array(
				"recruit"=>$row
			);	
			// var_dump($data);
			// die;
			$this->load->view("company/update_recruit",$data);
	}

	public function update_recruit_save(){
		$recruit_id=$this->input->post("recruit_id");
		$company_name=$this->input->post('company_name');
   			$recruit_name=$this->input->post('recruit_name');
			$recruit_address=$this->input->post('recruit_address');
			$recruit_type=$this->input->post('recruit_type');
			$recruit_salary=$this->input->post('recruit_salary');
			$recruit_num=$this->input->post('recruit_num');
			$company_id=$this->input->post('company_id');
			$recruit_work_time=$this->input->post('recruit_salary');	
			$recruit_detail=$this->input->post('recruit_detail');	
			$recruit_educate=$this->input->post('recruit_educate');		
			$recruit_company_detail=$this->input->post('company_detail');
		    $data=array(
		    'recruit_name'=>$recruit_name,
		    'recruit_detail'=>$recruit_detail,
		    'company_id'=>$company_id,
		    'company_name'=>$company_name,
			'recruit_type'=>$recruit_type,
			'recruit_address'=>$recruit_address,
			'recruit_educate'=>$recruit_educate,
			'recruit_salary'=>$recruit_salary,
			'recruit_work_time'=>$recruit_work_time,
			'recruit_company_detail'=>$recruit_company_detail,
			'recruit_num'=>$recruit_num,
		);
		// print_r($data);
		// die;
		$this->load->model('recruit_model');
		$row=$this->recruit_model->update_recruit($recruit_id,$data);
		if(TRUE){
			// var_dump($row);
			// die;
			echo"<script>alert('修改成功！')</script>";
			$this->company_all_recruit();
		}
else{
	echo"<script>alert('修改失败！')</script>";
}
	}

	public function delete_recruit(){
		$recruit_id = $this->input->get('recruit_id');
		$this->load->model('recruit_model');
		$this->recruit_model->delete_recruit($recruit_id);
		$this->company_all_recruit();
	}
	public function company_all_recruit(){//公司所有招聘
			$login_user=$this->session->userdata("login_user");
			$company_id=$login_user->company_id;
			$this->load->model("recruit_model");
			$result=$this->recruit_model->get_recruit_by_id($company_id);
			$data=array(
				"recruits"=>$result
			);
			// var_dump($data);
			// die;
			$this->load->view("company/company_all_recruit",$data);
	}
	public function show_recruit(){//企业查看自己的招聘信息
			$recruit_id=($this->input->get('recruit_id'));
			$this->load->model("recruit_model");
			$row=$this->recruit_model->get_job_by_id($recruit_id);
			$data=array(
				"recruit"=>$row
			);	
			$this->load->view("company/show_recruit",$data);
	}
	public function talent_pool(){//人才库
			$this->load->model("recruit_model");
			$result=$this->recruit_model->get_all_profiile();
			$data=array(
				"profiles"=>$result
			);
			// var_dump($data);
			// die;
			$this->load->view("company/talent_pool",$data);
	}

}
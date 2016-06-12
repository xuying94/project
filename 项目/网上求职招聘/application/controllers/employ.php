<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Employ extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model("employ_model");
			$this->load->library('pagination');
		}
		public function change_header(){
			$employ_id=($this->input->get('employ_id'));
			// echo $header;
			// die;
		}
	public function user_center(){//用户中心
		$login_user=$this->session->userdata("login_user");
		$employ_id=$login_user->employ_id;
		// var_dump("$employ_id");
		// die;
		 $this->load->model('employ_model');
		$row=$this->employ_model->get_by_id($employ_id);
		$data=array(
			'employ'=>$row
		);
		$this->load->view('employ/user_center',$data);
	}
	public function user_edit(){//用户资料编辑
	$employ_id=($this->input->get('employ_id'));
		$this->load->model('employ_model');
		$row=$this->employ_model->get_by_id($employ_id);
		$data=array(
			'employ'=>$row
		);
		$this->load->view('employ/user_edit',$data);
	}
		public function user_edit_save(){
			$employ_id=$_POST['employ_id'];
			$employ_name=$this->input->post('employ_name');
			$employ_birth_place=$this->input->post('employ_birth_place');
			$year=$this->input->post("year");
			$month=$this->input->post("month");
			$day=$this->input->post("day");
			$employ_birth="{$year}"."-"."{$month}"."-"."{$day}";
			$employ_job_type=$this->input->post("employ_job_type");
			$employ_work=$this->input->post('employ_work');
			$employ_tel=$this->input->post('employ_tel');
			$employ_graduate_school=$this->input->post('employ_graduate_school');
			$employ_educate=$this->input->post('employ_educate');
			$employ_profess=$this->input->post('employ_profess');
			$employ_email=$this->input->post('employ_email');
			$employ_qq=$this->input->post('employ_qq');
			$employ_study=$this->input->post("study");
			$employ_work_experience=$this->input->post("work_experience");
			$employ_skills=$this->input->post("skills");
			$product_show=$this->input->post("product_show");
			// $fileField=$this->input->post('fileField');
		    $data1=array(
			'employ_name'=>$employ_name,
			'employ_birth_place'=>$employ_birth_place,
			'employ_birth'=>$employ_birth,
			'employ_work'=>$employ_work,
			'employ_tel'=>$employ_tel,
			'employ_graduate_school'=>$employ_graduate_school,
			'employ_educate'=>$employ_educate,
			'employ_profess'=>$employ_profess,
			'employ_email'=>$employ_email,
			'employ_qq'=>$employ_qq,
			'employ_study'=>$employ_study,
			'employ_work_experience'=>$employ_work_experience,
			'employ_skills'=>$employ_skills,
			'product_show'=>$product_show,
			'employ_job_type'=>$employ_job_type
		);
		// var_dump($data1);
		// die;
		$this->load->model('employ_model');
		$row=$this->employ_model->update($employ_id,$data1);
		if($row){
		$data=array(
			'employ'=>$row
		);
		// var_dump($data);
		// die;
			$this->load->view("employ/user_center",$data);
			
		}else{
			echo"数据库未查到数据";
		}
	}		
	public function read_file(){
		$this->load->view("employ/read_file");
	}
	public function user_news(){
		$employ_id=($this->input->get('employ_id'));
		 $this->load->model('employ_model');
		$result=$this->employ_model->get_news_by_id($employ_id);
		$data=array(
			'employs'=>$result
		);
		// var_dump($data);
		// die;
		$this->load->view('employ/user_news',$data);
	}
	
	public function favorate(){
		$recruit_id=($this->input->get('recruit_id'));
		$login_user=$this->session->userdata("login_user");
		$employ_id=$login_user->employ_id;
		$this->load->model("recruit_model");
		// $re=$this->recruit_model->get_re_by_id($recruit_id);
			$result=$this->recruit_model->get_job_by_id($recruit_id);
			$recruit_name=$result->recruit_name;
			$recruit_detail=$result->recruit_detail;
			$company_id=$result->company_id;
			$company_name=$result->company_name;
			$recruit_type=$result->recruit_type;
			$recruit_address=$result->recruit_address;
			$recruit_educate=$result->recruit_educate;
			$recruit_salary=$result->recruit_salary;
			$recruit_work_time=$result->recruit_work_time;
			$recruit_company_detail=$result->recruit_company_detail;
			$recruit_add_time=$result->recruit_add_time;
			$recruit_num=$result->recruit_num;
			// var_dump($result);
			// die;
			$this->load->model("recruit_model");
			$favor=$this->recruit_model->get_job_by_2id($recruit_id,$employ_id);
			if($favor){
				echo"<script>alert('您已经收藏过这个职位了~')</script>";
				$this->my_favorate();
			}else{
			$data=array(				
			"employ_id"=>$employ_id,
			"recruit_id"=>$recruit_id,
			"recruit_name"=>$recruit_name,
			"recruit_detail"=>$recruit_detail,
			"company_id"=>$company_id,			
            'company_name' => $company_name,
            'recruit_type' => $recruit_type,
            "recruit_address"=>$recruit_address,
            "recruit_educate"=>$recruit_educate,
            "recruit_salary"=>$recruit_salary,
            "recruit_work_time"=>$recruit_work_time,
            "recruit_company_detail"=>$recruit_company_detail,
            "recruit_add_time"=>$recruit_add_time,
            "recruit_num"=>$recruit_num
			);
			// print_r($data);
			// die;
			$this->load->model("recruit_model");
			$result=$this->recruit_model->save_favorate($data);
			// var_dump($result);
			// die;
			$this->my_favorate();
			// var recruitId =  $(this).data('id');
      		// location.href = 'employ/favorate?recruit_id='+recruitId;
			}			
	}
			public function esc_favorate(){
				$login_user=$this->session->userdata("login_user");
				$employ_id=$login_user->employ_id;
				$recruit_id=($this->input->get('recruit_id'));
				// var_dump($recruit_id);
				// die;
				$this->load->model("recruit_model");
				$result=$this->employ_model->esc_favorate_by_id($recruit_id,$employ_id);
				$data=array(
				"favorates"=>$result
			);
				$this->job_detail($recruit_id);
			}
		public function my_favorate(){
			$login_user=$this->session->userdata("login_user");
			$employ_id=$login_user->employ_id;
			$this->load->model("employ_model");
			$result=$this->employ_model->get_all_favorate_by_id($employ_id);
			$data=array(
				"favorates"=>$result
			);
			// var_dump($data);
			// die;
			$this->load->view("employ/my_favorate",$data);
		}
	public function apply(){
			$login_user=$this->session->userdata("login_user");
			$employ_id=$login_user->employ_id;
			$employ_name=$login_user->employ_name;
			$recruit_id=($this->input->get('recruit_id'));
			$login_user=$this->session->userdata("login_user");
			$employ_id=$login_user->employ_id;
			$this->load->model("recruit_model");
			$result=$this->recruit_model->get_job_by_id($recruit_id);
			$recruit_name=$result->recruit_name;
			$recruit_detail=$result->recruit_detail;
			$company_id=$result->company_id;
			$company_name=$result->company_name;
			$recruit_type=$result->recruit_type;
			$recruit_address=$result->recruit_address;
			$recruit_educate=$result->recruit_educate;
			$recruit_salary=$result->recruit_salary;
			$recruit_work_time=$result->recruit_work_time;
			$recruit_company_detail=$result->recruit_company_detail;
			$recruit_add_time=$result->recruit_add_time;
			$recruit_num=$result->recruit_num;
			$apply_state="未回复";
			$apply_state_flag="no";
			$recruit_state="未回复";
			$recruit_state_flag="no";
			$this->load->model("recruit_model");
			$row4=$this->recruit_model->get_job_by_2id_from_apply($recruit_id,$employ_id);
			// var_dump($row4);
			// die;
			if($row4){
				echo"<script>alert('您已经申请过这个职位了~')</script>";
				$this->my_apply();
			}else{
			$data=array(				
			"employ_id"=>$employ_id,
			"recruit_id"=>$recruit_id,
			"recruit_name"=>$recruit_name,
			"recruit_detail"=>$recruit_detail,
			"company_id"=>$company_id,			
            'company_name' => $company_name,
            'recruit_type' => $recruit_type,
            "recruit_address"=>$recruit_address,
            "recruit_educate"=>$recruit_educate,
            "recruit_salary"=>$recruit_salary,
            "recruit_work_time"=>$recruit_work_time,
            "recruit_company_detail"=>$recruit_company_detail,
            "recruit_add_time"=>$recruit_add_time,
            "recruit_num"=>$recruit_num,
            "apply_state"=>$apply_state,
            "apply_state_flag"=>$apply_state_flag
			);
			$data2=array(
				"employ_id"=>$employ_id,
				"recruit_id"=>$recruit_id,
				"employ_name"=>$employ_name,
				"recruit_name"=>$recruit_name,
				"recruit_state"=>$recruit_state,
				"recruit_state_flag"=>$recruit_state_flag,
				"company_id"=>$company_id,			
	            'company_name' => $company_name,
				'recruit_state_flag'=>$recruit_state_flag,
				'recruit_state'=>$recruit_state
			);
			// print_r($data2);
			// die;
			$this->load->model("recruit_model");
			$result=$this->recruit_model->save_apply($data);
			$this->load->model("recruit_model");
			$result2=$this->recruit_model->save_recruit_profile($data2);
			// var_dump($result2);
			// die;
			$this->my_apply();
			}		
	}
	public function my_apply(){//显示我的申请
			$login_user=$this->session->userdata("login_user");
			$employ_id=$login_user->employ_id;
			$this->load->model("employ_model");
			$result=$this->employ_model->get_all_apply_by_id($employ_id);
			$data=array(
				"applys"=>$result
			);
			// var_dump($data);
			// die;
			$this->load->view("employ/my_apply",$data);
		}
	public function delete_apply_news(){    //删除简历投递反馈信息
		$apply_id=($this->input->get('apply_id'));
		$login_user=$this->session->userdata("login_user");
		$employ_id=$login_user->employ_id;
		// var_dump($employ_id);
		// die;
		$this->load->model("employ_model");
			$this->employ_model->delete_apply_by_id($apply_id);
			$this->load->model("employ_model");
			$result=$this->employ_model->get_all_apply_by_id($employ_id);
			$data=array(
				"applys"=>$result
			);
			// var_dump($data);
			// die;
			$this->load->view("employ/my_apply",$data);
	}
	public function delete_news(){    //删除简历投递反馈信息
		$employ_news_id=($this->input->get('employ_news_id'));
		var_dump($employ_news_id);
		die;
	}

		public function job_detail($recruit_id){//给用户查看见职位信息的
			$login_user=$this->session->userdata("login_user");
			$employ_id=$login_user->employ_id;
			$recruit_id=($this->input->get('recruit_id'));
			$this->load->model("recruit_model");
			$row=$this->recruit_model->get_job_by_id($recruit_id);
			$favorate_flag="";
			$apply_flag="";
			var_dump($recruit_id);
			die;
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
















// **********************************************************************
public function add_recruit(){
   		if(isset($_POST['sub'])){
   			$recruit_name=$this->input->post('recruit_name');
			$recruit_add_time=date('Y-m-d H-i-s',time());
			$recruit_salary=$this->input->post('recruit_salary');
			$recruit_id=$this->input->post('rid');
			$recruit_work_time=$this->input->post('recruit_salary');
			$recruit_address=$this->input->post('recruit_address');
			$recruit_detail=$this->input->post('recruit_detail');
			$recruit_num=$this->input->post('recruit_num');
			$recruit_contact=$this->input->post('recruit_contact');
			$recruit_email=$this->input->post('recruit_email');
		    $data1=array(
			'recruit_name'=>$recruit_name,
			'recruit_add_time'=>$recruit_add_time,
			'recruit_salary'=>$recruit_salary,
			'recruit_work_time'=>$recruit_work_time,
			'recruit_address'=>$recruit_address,
			'recruit_detail'=>$recruit_detail,
			'recruit_num'=>$recruit_num,
			'recruit_contact'=>$recruit_contact,
			'recruit_email'=>$recruit_email
		);
		$this->load->model('recruit_model');
		$result=$this->recruit_model->save($data1);
		$this->recruit();
		
   	}else{
   		echo"error";
   	}
		
	}
	public function update_recruit(){
		$recruit_id=($this->input->get('recruit_id'));
		 // echo $article_id;
		 // die; 好使
		$this->load->model('recruit_model');
		$row=$this->recruit_model->get_by_id($recruit_id);
		$data=array(
			'recruit'=>$row
		);
		$this->load->view('admin/update_recruit',$data);
		// $this->blog_model->update($blog_id);
		// $this->blog();
	}
	
	// public function delete1_recruit(){
		// $message_id = $this->input->get('message_id');
		// $this->load->model('message_model');
		// $this->message_model->delete($message_id);
		// $this->message();
	// }
	public function message(){
			$this->load->model('message_model');
			$this->load->library('pagination');
			$config['base_url'] = site_url("admin/message");
			$config['total_rows'] = $this->message_model->get_message_count();
			$config['enable_query_strings']=false;
			$config['per_page'] = "8"; 
			$config['uri_segment'] = "3";
			// $config['page_query_string']=true; 
			// $config['use_page_number'] = 'TRUE';
			//把打开的标签放在所有结果的左侧。
			// $config['full_tag_open'] = '<li>';
			// $config['full_tag_close'] = '</li>';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			// **************************
			$config['next_link'] = '>';
			// $config['next_tag_open'] = '<li>';
			// $config['next_tag_close'] = '</li>';
			$config['prev_link'] = '<';
			// $config['prev_tag_open'] = '<li class="prev">';
			// $config['prev_tag_close'] = '</li>';
			
			$config['cur_tag_open'] = '<a class="active">';
		//	“当前页”链接的打开标签。添加样式或是class
			
			$config['cur_tag_close'] = '</a>';
			//“当前页”链接的关闭标签。
			
			//自定义“数字”链接
			
			$config['num_tag_open'] = '<div>';
		//	“数字”链接的打开标签。
			
			$config['num_tag_close'] = '</div>';
			
			$this->pagination->initialize($config); 
			$offset=$this->uri->segment(3);
			// echo $offset;
			// die;
			if($offset==""){
				$offset=0;
			}
			
			// $offset=($offset-1)*$config['per_page'];
			
		
		$this->load->library('pagination');
		$this->load->model('message_model');
		$result=$this->message_model->get_message_by_page($config['per_page'],$offset);
		$data=array(
			'messages'=>$result,
			'total_rows'=>$config['total_rows']
		);
		$this->load->view('admin/message_mgr',$data);
	}
// *************************公司新闻主页新闻分页展示******************************************
public function news(){//标记
			$this->load->library('pagination');
			$config['base_url'] = site_url("admin/news");
			$config['num_links'] = 2;
			$config['total_rows'] = $this->blog_model->get_article_count();
			$config['enable_query_strings']=false;
			$config['per_page'] = "8"; 
			$config['uri_segment'] = "3";
			// $config['page_query_string']=true; 
			// $config['use_page_number'] = 'TRUE';
			//把打开的标签放在所有结果的左侧。
			// $config['full_tag_open'] = '<li>';
			// $config['full_tag_close'] = '</li>';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			// **************************
			$config['next_link'] = '>';
			// $config['next_tag_open'] = '<li>';
			// $config['next_tag_close'] = '</li>';
			$config['prev_link'] = '<';
			// $config['prev_tag_open'] = '<li class="prev">';
			// $config['prev_tag_close'] = '</li>';
			
			$config['cur_tag_open'] = '<a class="active">';
		//	“当前页”链接的打开标签。添加样式或是class
			
			$config['cur_tag_close'] = '</a>';
			//“当前页”链接的关闭标签。
			
			//自定义“数字”链接
			
			$config['num_tag_open'] = '<div>';
		//	“数字”链接的打开标签。
			
			$config['num_tag_close'] = '</div>';
			
			// $this->pagination->initialize($config); 
			// $offset=$this->input->get("per_page");
			// if($offset==""){
				// $offset=1;
			// }
			$this->pagination->initialize($config); 
			$offset=$this->uri->segment(3);
			// echo $offset;
			// die;
			if($offset==""){
				$offset=0;
			}
			
		$this->load->library('pagination');
		$this->load->model('blog_model');
		$result=$this->blog_model->get_by_page($config['per_page'],$offset);
		$data=array(
			'articles'=>$result,
			'total_rows'=>$config['total_rows']
		);
		$this->load->view('news',$data);//good work!
	}

// *************************公司新闻主页新闻分页展示******************************************
	public function search(){
		$key_word=$this->input->get("input-box");
		// echo $key_word;
		// die;
		$blogs=$this->blog_model->get_by_key_word($key_word);
		$data=array('articles'=>$blogs);
		// var_dump($data);
		// die;
		$this->load->view('admin/blog_mgr',$data);//有问题？
	}
	
	public function delete_message(){
		$message_id = $this->input->get('message_id');
		$this->load->model('message_model');
		$this->message_model->delete($message_id);
		$this->message();
	}
   
   	public function change(){
   		if(isset($_POST['sub'])){
   			$title=$this->input->post('title');
			$date=date('Y-m-d H-i-s',time());
			// $author=$this->input->post('author');
			$article_id=$this->input->post('sid');
			$content=$this->input->post('content');
		$data1=array(
			'title'=>$title,
			'date'=>$date,
			// 'author'=>$author,
			'content'=>$content
		);
		$this->load->model('blog_model');
		$result=$this->blog_model->update($article_id,$data1);
		$data=array(
			'blog'=>$result
		);
		$this->load->view('admin/update_blog',$data);
		
   	}else{
   		echo"error";
   	}
		
	}
	
	public function change_recruit(){
   		if(isset($_POST['sub'])){
   			$recruit_name=$this->input->post('recruit_name');
			$recruit_add_time=date('Y-m-d H-i-s',time());
			$recruit_salary=$this->input->post('recruit_salary');
			$recruit_id=$this->input->post('rid');
			$recruit_work_time=$this->input->post('recruit_salary');
			$recruit_address=$this->input->post('recruit_address');
			$recruit_detail=$this->input->post('recruit_detail');
			$recruit_num=$this->input->post('recruit_num');
			$recruit_contact=$this->input->post('recruit_contact');
			$recruit_email=$this->input->post('recruit_email');
		$data1=array(
			'recruit_name'=>$recruit_name,
			'recruit_add_time'=>$recruit_add_time,
			'recruit_salary'=>$recruit_salary,
			'recruit_work_time'=>$recruit_work_time,
			'recruit_address'=>$recruit_address,
			'recruit_detail'=>$recruit_detail,
			'recruit_num'=>$recruit_num,
			'recruit_contact'=>$recruit_contact,
			'recruit_email'=>$recruit_email
		);
		$this->load->model('recruit_model');
		$result=$this->recruit_model->update($recruit_id,$data1);
		$data=array(
			'recruit'=>$result
		);
		$this->load->view('admin/update_recruit',$data);
		
   	}else{
   		echo"error";
   	}
		
	}

	public function show_recruit(){
   		if(isset($_GET['recruit_id'])){
   			$recruit_id=$_GET['recruit_id'];
			// echo $blog_id;
			// die();
			$this->load->model('recruit_model');
			$result=$this->recruit_model->get_by_id($recruit_id);
			// $row=$this->blog_model->get_by_id_comment_id($article_id);
			$data_blog=array(
					'recruit'=>$result
					// 'blogs'=>$row
					
			);
			$this->load->view('admin/show_recruit',$data_blog);
		}
   }
	
	public function delete_recruit(){
		$recruit_id = $this->input->get('recruit_id');
		$this->load->model('recruit_model');
		$this->recruit_model->delete($recruit_id);
		$this->recruit();
	}
	
	public function comment(){
		
		
	}
	
	public function  delete_comment(){
		if(isset($_GET['comment_id'])){
   			$comment_id=$_GET['comment_id'];
			// echo $comment_id;
			// die();还没写完呢
		}else{
			echo "接不到comment_id";
		}
	}
	public function user_blog_center(){
		if(isset($_GET['admin_id'])){
   			$author=$_GET['admin_id'];
			// echo $admin_id;
			// die();
			$this->load->model('admin_model');
			$result=$this->admin_model->get_blog_by_id($author);
			$result1=$this->admin_model->get_name_by_id($author);
			$data=array(
				'blog'=>$result
			);
			$this->load->view('admin/user_center',$data);
		}else{
			echo "接不到admin_id";
		}
		
	}
   

}
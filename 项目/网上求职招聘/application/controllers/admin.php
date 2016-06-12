<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends CI_Controller {
	
		public function __construct(){
			parent::__construct();
			$this->load->model("admin_model");
			$this->load->library('pagination');
		}
		public  function admin_mgr(){
        $this -> load -> model('admin_model');
        $result = $this -> admin_model -> get_all();
//        if($result){
            $data = array(
                'admins' => $result
            );
            $this -> load -> view('admin/admin-mgr', $data);
//        }

    }
		public function chpwd()
	{
		$this->load->view('admin/chpwd');
		
	}
	public function update_pwd(){
		$login_user=$this->session->userdata("login_user");
		$admin_id=$login_user->admin_id;
		$session_pwd=$login_user->admin_password;
		$old_pwd=$this->input->post("old_pwd");
		$pwd1=$this->input->post('new_pwd1');
		$pwd2=$this->input->post('new_pwd2');
		if($session_pwd==$old_pwd){
			if($pwd1!=$pwd2){
			echo"<script>alert('两次输入的密码不一致，请重新输入！')</script>";
			$this->load->view('admin/chpwd');
		}else{			
			$data=array(
			'admin_password'=>$pwd1
			// "admin_id"=>$admin_id
			);
			$this->load->model('admin_model');
			$result=$this->admin_model->update_pwd($admin_id,$data);
			$row=$this->admin_model->get_by_id($admin_id);
		    $this->session->set_userdata("login_user",$row);
			if($row){
				echo"<script>alert('修改成功！')</script>";
				 redirect("welcome/admin_mgr");
			}		  
		 }
		}else{
			echo"<script>alert('旧密码输入错误，请重新输入！')</script>";
			$this->chpwd();
		}		
		}
		
		public function article_mgr(){//标记文章管理
			$this->load->library('pagination');
			$config['base_url'] = site_url("admin/article_mgr");
			$config['num_links'] = 2;
			// $config['total_rows'] = $this->blog_model->get_article_count();
			$config['enable_query_strings']=false;
			$config['per_page'] = "16"; 
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
			'articles'=>$result
			// 'total_rows'=>$config['total_rows']
		);
		$this->load->view('admin/article_mgr',$data);//good work!
	}
		public function show_article(){//显示文章
   		if(isset($_GET['article_id'])){
   			$article_id=$_GET['article_id'];
			// echo $blog_id;
			// die();
			$this->load->model('blog_model');
			$result=$this->blog_model->get_by_id($article_id);
			// $row=$this->blog_model->get_by_id_comment_id($article_id);
			$data_blog=array(
					'blog'=>$result
					// 'blogs'=>$row
					
			);
			$this->load->view('admin/show_article',$data_blog);
		}
   }
		 public function add_article(){//跳转增加文章页面
   		$this->load->view('admin/add_article');
   }
	   public function save_article(){//保存新发布的文章
	   	$title=$this->input->post("title");
		$article_type=$this->input->post("article_type");
		$article_content=$this->input->post("content");
		$data=array(
			"title"=>$title,
			"article_type"=>$article_type,
			"article_content"=>$article_content
		);
		// print_r($data);
		// die();////标记
		$this -> load -> model('blog_model');
	    $this -> blog_model ->add($data);
	    $this -> article_mgr();
	   }
	public function delete_article(){//删除文章
   	
		$article_id = $this->input->get('article_id');
		$this->load->model('blog_model');
		$this->blog_model->delete($article_id);
		$this->article_mgr();
	}
   
   public function update_article(){
   		$article_id=($this->input->get('article_id'));
		 // echo $article_id;
		 // die; 好使
		$this->load->model('blog_model');
		$row=$this->blog_model->get_by_id($article_id);
		$data=array(
			'blog'=>$row
		);
		$this->load->view('admin/update_article',$data);
		// $this->blog_model->update($blog_id);
		// $this->blog();
	
   }
   	public function change(){
   		if(isset($_POST['sub'])){
   			$title=$this->input->post('title');
			$article_type=$this->input->post('article_type');
			$article_id=$this->input->post('sid');
			$article_content=$this->input->post('content');
		$data1=array(
			'title'=>$title,
			'article_type'=>$article_type,
			// 'author'=>$author,
			'article_content'=>$article_content
		);
		$this->load->model('blog_model');
		$result=$this->blog_model->update($article_id,$data1);
		$data=array(
			'blog'=>$result
		);
		$this->load->view('admin/update_article',$data);
		
   	}else{
   		echo"error";
   	}
		
	}
	public function search(){
		$key_words=$this->input->post("key_words");
		$this->load->model('blog_model');
		$result=$this->blog_model->get_by_key_word($key_words);
		$data=array(
			'articles'=>$result
		);
		$this->load->view('admin/article_mgr',$data);
	}

	public function company_mgr(){//标记公司管理
			$this->load->library('pagination');
			$this->load->model('recruit_model');
			$config['base_url'] = site_url("admin/company_mgr");
			$config['num_links'] = 2;
			$config['total_rows'] = $this->recruit_model->get_company_count();
			$config['enable_query_strings']=false;
			$config['per_page'] = "8"; 
			$config['uri_segment'] = "3";
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['next_link'] = '>';
			$config['prev_link'] = '<';
			$config['cur_tag_open'] = '<a class="active">';
			$config['cur_tag_close'] = '</a>';
			$config['num_tag_open'] = '<div>';
			$config['num_tag_close'] = '</div>';
			$this->pagination->initialize($config); 
			$offset=$this->uri->segment(3);
			if($offset==""){
				$offset=0;
			}		
		$this->load->library('pagination');
		$this->load->model('recruit_model');
		$result=$this->recruit_model->get_company_by_page($config['per_page'],$offset);
		$data=array(
			'companys'=>$result,
			'total_rows'=>$config['total_rows']
		);
		$this->load->view('admin/company_mgr',$data);//good work!
	}


	public function show_company(){
		$company_id=($this->input->get('company_id'));
		$this->load->model("recruit_model");
		$row=$this->recruit_model->get_by_id($company_id);
		$data=array(
			"company"=>$row
		);
		// var_dump($data);
		// die;
        $this->load->view('admin/show_company',$data);
	}
	public function delete_company(){
		$company_id = $this->input->get('company_id');
		$this->load->model('recruit_model');
		$this->recruit_model->delete_company_by_id($company_id);
		$this->company_mgr();
	}
		public function employ_mgr(){//标记用户管理
			$this->load->library('pagination');
			$this->load->model('employ_model');
			$config['base_url'] = site_url("admin/employ_mgr");
			$config['num_links'] = 2;
			$config['total_rows'] = $this->employ_model->get_employ_count();
			$config['enable_query_strings']=false;
			$config['per_page'] = "8"; 
			$config['uri_segment'] = "3";
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['next_link'] = '>';
			$config['prev_link'] = '<';
			$config['cur_tag_open'] = '<a class="active">';
			$config['cur_tag_close'] = '</a>';
			$config['num_tag_open'] = '<div>';
			$config['num_tag_close'] = '</div>';
			$this->pagination->initialize($config); 
			$offset=$this->uri->segment(3);
			if($offset==""){
				$offset=0;
			}		
		$this->load->library('pagination');
		$this->load->model('employ_model');
		$result=$this->employ_model->get_employ_by_page($config['per_page'],$offset);
		$data=array(
			'employs'=>$result,
			'total_rows'=>$config['total_rows']
		);
		$this->load->view('admin/employ_mgr',$data);//good work!
	}

public function show_employ(){
		$employ_id=($this->input->get('employ_id'));
		$this->load->model("employ_model");
		$row=$this->employ_model->get_by_id($employ_id);
		$data=array(
			"employ"=>$row
		);
		// var_dump($data);
		// die;
        $this->load->view('admin/show_employ',$data);
	}

		public function delete_employ(){
		$employ_id = $this->input->get('employ_id');
		$this->load->model('employ_model');
		$this->employ_model->delete_employ_by_id($employ_id);
		$this->employ_mgr();
	}
























// *************************公司新闻主页新闻分页展示******************************************

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
	

}
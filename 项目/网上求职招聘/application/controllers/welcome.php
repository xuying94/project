<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
			$this->load->library('pagination');
			$this->load->model('recruit_model');
			$config['base_url'] = site_url("welcome/index");
			$config['num_links'] = 2;
			$config['total_rows'] = $this->recruit_model->get_recruit_count();
			$config['enable_query_strings']=false;
			$config['per_page'] = "3"; 
			$config['uri_segment'] = "3";
			$config['first_link'] = '首页';
			$config['last_link'] = '末页';
			$config['next_link'] = '下页';
			$config['prev_link'] = '上页';
			$config['cur_tag_open'] = '<a class="select">';
			$config['cur_tag_close'] = '</a>';
			// $config['num_tag_open'] = '<div>';
			// $config['num_tag_close'] = '</div>';
			$this->pagination->initialize($config); 
			$offset=$this->uri->segment(3);
			if($offset==""){
				$offset=0;
			}		
		$this->load->model('recruit_model');
		$result=$this->recruit_model->get_recruit_by_page($config['per_page'],$offset);
		$this->load->model("blog_model");
			$article_type="面试";
			$result2=$this->blog_model->get_all_article($article_type);
			$article_type="简历";
			$result3=$this->blog_model->get_all_article($article_type);
			$data=array(
				"recruits"=>$result,
				"interview"=>$result2,
				"profile"=>$result3
			);
		// $data=array(
			// 'companys'=>$result,
			// 'total_rows'=>$config['total_rows']
		// );
		$this->load->view("user_index",$data);
		
		}
		public function search_recruit(){
			$key_word=$this->input->get("key_word");
			$recruit_address=$this->input->get("recruit_address");
			$employ_educate=$this->input->get("employ_educate");
			$recruit_type=$this->input->get("recruit_type");
			// var_dump($recruit_type,$key_word,$recruit_address,$employ_educate);
			// die;
			$this->load->model("recruit_model");
			$result=$this->recruit_model->get_by_key_word($key_word);
			$data=array(
				"companys"=>$result
			);		
			$this->load->model("recruit_model");
			$results=$this->recruit_model->get_by_key_word2($key_word);
			$data2=array(
				"recruits"=>$results
			);
			$arr = empty($result);//公司
			$arr2 = empty($results);//职位
			if($arr=="1"){
				if($arr2=="1"){
					echo"<script>alert('未找到匹配结果，请更换关键词重新搜索~')</script>";
					$this->index();//目前为止功能正常
				}else{
					$recruit_name= $results[0]->recruit_name;
					$this->load->view("show_search2",$data2);
				}
			}else{
				$company_name= $result[0]->company_name;
				$this->load->view("show_search",$data);
				
			}
			
		}
			// $this->load->model("recruit_model");
			// $result=$this->recruit_model->get_all_recruit();
			// $this->load->model("blog_model");
			// $article_type="面试";
			// $result2=$this->blog_model->get_all_article($article_type);
			// $article_type="简历";
			// $result3=$this->blog_model->get_all_article($article_type);
			// $data=array(
				// "recruits"=>$result,
				// "interview"=>$result2,
				// "profile"=>$result3
			// );
			// print_r($result3);
			// die;
			// $this->load->view("user_index",$data);
	// }
	public function show_article(){
		$article_id=($this->input->get('article_id'));
		$this->load->model("blog_model");
		$row=$this->blog_model->get_by_id($article_id);
		$data=array(
			"article"=>$row
		);
		$this->load->view("show_article",$data);
		// print_r($row);
		// die;
		
	}
	public function more_article(){
		$this->load->view("more_article");
	}
	public function get_all_profile(){
		$article_type="面试";
		$this->load->model("blog_model");
		$row=$this->blog_model->get_all_profile($article_type);
		$data=array(
			"article"=>$row
		);
		$this->load->view("more_article",$data);
	}
	public function get_all_interview(){
		$article_type="简历";
		$this->load->model("blog_model");
		$row=$this->blog_model->get_all_profile($article_type);
		$data=array(
			"article"=>$row
		);
		$this->load->view("more_article",$data);
	}
	public function employ_regist(){
   		$this->load->view('employ_regist');	
   }
	public function company_regist(){
   		$this->load->view('company_regist');	
   }
	public function choose(){
		$this->load->view("choose");
	}
	public function login(){
		$this->load->model("recruit_model");
		$result=$this->recruit_model->get_company();
		$data=array(
			"companys"=>$result
		);
		// var_dump($data);
		// die;
		
   		$this->load->view('login',$data);
	
   }
	public function  loginout(){
			
			//$array_items = array('uid' =>'','name' =>'');
			//var_dump($array_items);
			//die();
			//var_dump($sdata);
			//die();
			$query=$this->session->unset_userdata('login_user');
			if($query){
				echo "error";
			}else{
				
				redirect('welcome/login');
			}
		}

	public function check_login(){
        //1. 接数据
       // $this->load->library('session');
        $account = $this -> input -> post('name');
        $password = $this -> input -> post('password');
		$user_type=$_POST['user_type'];
		if($user_type=="admin"){
			 $this -> load -> model('admin_model');
       		$row = $this -> admin_model -> get_by_name_pwd($account,$password);
			 if($row){
			$this->session->set_userdata("login_user",$row);
			// $this->session->set_userdata($data);
			redirect('welcome/admin_mgr');
        }else{
        	echo"<script>alert('用户名或密码错误，请重新输入')</script>";
            $this->login();
        }
		// ************************验证管理员账号*****************************
		}else if($user_type=="company"){
			 $this -> load -> model('recruit_model');
       		 $row = $this -> recruit_model -> get_by_name_pwd($account,$password);
			  if($row){
        		// $newdata = array(
        		// 'company_id' =>$company_id,
			    // 'company_account'  => $account,
			     // 'company_password'     => $password	    
				 // );
				 $this->session->set_userdata("login_user",$row);
			// $this->session->set_userdata($newdata);
			redirect('company/company_index');
        }else{
        	echo"<script>alert('用户名或密码错误，请重新输入')</script>";
            $this->login();
        }
			 // ****************************验证公司账号************************************
		}else{
			 $this -> load -> model('employ_model');
       		 $row = $this -> employ_model -> get_by_name_pwd($account,$password);
			  if($row){
			  
        	// $newdata = array(
        	     // 'employ_account'  => $account,
			     // 'employ_password'  => $password	    
				 // );
			$this->session->set_userdata("login_user",$row);
			redirect('welcome/index');
        }else{
        	echo"<script>alert('用户名或密码错误，请重新输入')</script>";
            $this->login();
        }
		}
    }
		public  function admin_mgr(){
		        $this -> load -> model('admin_model');
		        $result = $this -> admin_model -> get_all();
		//        if($result){
		            $data = array(
		                'admins' => $result
		            );
					// print_r($data);
					// die;
		            $this -> load -> view('admin/admin-mgr', $data);
		//        }
		
		    }
	public function employ_save(){
		$account=$this->input->post("account");
		$sex=$this->input->post("sex");
		$password1=$this->input->post("password1");
		$password2=$this->input->post("password2");
		$employ_name=$this->input->post("name");
		if($password1==$password2){
			$data=array(
				"employ_account"=>$account,
				"employ_password"=>$password1,
				"employ_name"=>$employ_name,
				"employ_sex"=>$sex
			);
			$this -> load -> model('employ_model');
       		$result=$this -> employ_model -> save($data);
			if($result){
				echo"<script>alert('恭喜 注册成功！')</script>";
			redirect('welcome/login');//(this)当前类的afterlogin函数
			}else{
				$this->employ_regist();
			}
		}else{
			echo"<script>alert('两次密码不一致，请重新输入')</script>";
			$this->employ_regist();
		}
	}
	public function company_save(){
		$account=$this->input->post("account");
		$sex=$this->input->post("sex");
		$password1=$this->input->post("password1");
		$password2=$this->input->post("password2");
		$company_name=$this->input->post("name");
		if($password1==$password2){
			$data=array(
				"company_account"=>$account,
				"company_password"=>$password1,
				"company_name"=>$company_name,
				"sex"=>$sex
			);
			$this -> load -> model('recruit_model');
       		$result=$this -> recruit_model -> save($data);
			if($result){
				echo"<script>alert('恭喜 注册成功！')</script>";
			redirect('welcome/login');//(this)当前类的afterlogin函数
			}else{
				$this->company_regist();
			}
		}else{
			echo"<script>alert('两次密码不一致，请重新输入')</script>";
			$this->company_regist();
		}
	}

	public function company_all(){
			$this->load->model("recruit_model");
			$result=$this->recruit_model->get_all();
			$data=array(
				"companys"=>$result
			);
			$this->load->view("company_all",$data);
		}
	
	
	
	
	public function get_blog(){
		$page = $this -> input -> get('page');
		$offset=($page - 1) * 6;
		$this -> load -> model('blog_model');
		$all = $this -> blog_model -> get_all();
		$total = count($all);
		$total_page = ceil($total / 6);
		$result = $this -> blog_model -> get_by_page($page);
		$json = array(
			'data' => $result,
			'isEnd' => $page/6+1<$total_page?false:true
		);
		echo json_encode($json);
	}

	public function get_news(){
		$this -> load -> model('blog_model');
		$total=$this->blog_model->get_all();
		$count=count($total);
		// echo $count;
		// die;
		$all = $this -> blog_model -> get_news();
		
		// print_r($all);
		// die;
		$data=array(
			'articles'=>$all,
			'total'=>$count
		);
		$this->load->view("admin/news",$data);
		// $this->load->view("welcome/haha",$data);
	}
	public function show_news(){
   		if(isset($_GET['article_id'])){
   			$article_id=$_GET['article_id'];
			// echo $blog_id;
			// die();
			$this->load->model('blog_model');
			$result=$this->blog_model->get_by_id($article_id);
			// $row=$this->blog_model->get_by_id_comment_id($article_id);
			$data_blog=array(
					'article'=>$result
					// 'blogs'=>$row
					//?blog_id=<?php echo $blog->blog_id; 传递参数
			);
			$this->load->view('admin/show_news',$data_blog);
		}
		else{
			echo "error";
		}
   }
		
		public function get_recruit(){
		$this -> load -> model('recruit_model');
		$total=$this->recruit_model->get_all();
		$count=count($total);
		// echo $count;
		// die;
		$all = $this -> recruit_model -> get_recruit();
		
		// print_r($all);
		// die;
		$data=array(
			'recruits'=>$all,
			'total'=>$count
		);
		$this->load->view("recruit",$data);
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
					//?blog_id=<?php echo $blog->blog_id; 传递参数
			);
			$this->load->view('show_recruit',$data_blog);
		}
		else{
			echo "error";
		}
   }
	
}



















<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load -> model('seller_model');

	}
	//卖家中心 交易管理 开始
	public function sel_deal(){
		$this -> load -> view('seller_trade');
	}
	//卖家中心 交易管理 结束

	//修改烘焙师 个人资料 开始
	public function index(){
		$query = $this -> seller_model -> get_user();
		//var_dump($query);die;
		$data = array(
				"query" => $query
		);
		$this -> load -> view('edit_baker',$data);
	}

	public function edit(){
		$user = $this -> seller_model -> get_by_userid(1);
		$this -> session -> set_userdata('user', $user);
		$this->load->view('edit_baker');
	}

	public function do_hongbei(){
		$name=htmlspecialchars($this->input->post('name'));
		$youxiang=htmlspecialchars($this->input->post('youxiang'));
		$Tel=htmlspecialchars($this->input->post('Tel'));
		$person=htmlspecialchars($this->input->post('person'));
		$x=htmlspecialchars($this->input->post('x'));
		$birthday=htmlspecialchars($this->input->post('birthday'));
		$gx=htmlspecialchars($this->input->post('gx'));
		$receiv=htmlspecialchars($this->input->post('receiv'));
		$this->seller_model->get_by_name_youxiang_Tel_person_x_birthday_gx_receiv($name,$youxiang,$Tel,$person,$x,$birthday,$gx,$receiv);
		// if($user){
		// $this->session->set_userdata("hongpei_user",$row);
		// $this->load->view('index');
		// }
		// else{
		// $this->load->view('hongpei');
		$query = $this -> seller_model -> get_user();
		$data = array(
				"query" => $query
		);
		$this->load->view('edit_baker',$data);
	}

	public function upload_product(){

		$name=$this->input->post('name');
		$youxiang=$this->input->post('youxiang');
		$Tel=$this->input->post('Tel');
		$person=$this->input->post('person');
		$x=$this->input->post('x');
		$birthday=$this->input->post('birthday');
		$gx=$this->input->post('gx');
		$receiv=$this->input->post('receiv');
		$this->seller_model->get_by_name_youxiang_Tel_person_x_birthday_gx_receiv($name,$youxiang,$Tel,$person,$x,$birthday,$gx,$receiv);

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '10000';
		$config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		if (!$this->upload->do_upload("acc_pic")) {
			echo '上传图片失败，可能是图片过大，不要上传超过10M的图片！';
		} else {
			$upload_data = $this->upload->data();

			if ($upload_data['file_size']) {

				$this->load->library("image_lib");

				$config['image_library'] = 'gd2';
				$config['source_image'] = $upload_data['full_path'];
				$config['thumb_marker'] = '';
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['master_dim'] = 'width';
				$config['width'] = 500;
				$config['height'] = 300;

				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				$this->image_lib->clear();
				$data['user_pic'] = $upload_data['file_name'];

				$config2['image_library'] = 'gd2';
				$config2['source_image'] = $upload_data['full_path'];
				$config2['thumb_marker'] = '_thumb';
				$config2['create_thumb'] = TRUE;
				$config2['maintain_ratio'] = TRUE;
				$config['master_dim'] = 'width';
				$config2['width'] = 140;
				$config2['height'] = 140;

				$this->image_lib->initialize($config2);
				$this->image_lib->resize();
				$thumb_image_name = $upload_data["raw_name"] . "_thumb" . $upload_data["file_ext"];
				$data['product_picture'] = $thumb_image_name;
			}
			$data = array(
					'user_pic_thumb' =>$thumb_image_name
			);
			$result = $this ->user_model -> upload_product($data);

			$query = $this -> user_model -> get_user();
			$data = array(
					"query" => $query
			);
			$this->load->view('index',$data);

			// if($result){
			// redirect('welcome/index');
			// }

		}}

	//修改烘焙师 个人资料 结束


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
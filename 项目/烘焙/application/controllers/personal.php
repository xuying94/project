<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personal extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load->model('personal_model');
		$this->load->library('pagination');
	}
	//个人主页 开始
	public function person(){
		$this -> load -> view('person');
	}
	//个人主页 结束


	//发布新品 开始
	public function release()
	{
		$this->load->view('release');
	}
	public function upload_product()
	{
		$product_name = htmlspecialchars($this -> input -> post('product_name'));
		$product_price = htmlspecialchars($this -> input -> post('product_price'));
		$product_introduce =  htmlspecialchars($this -> input -> post('product_introduce'));

		$data = array(
				'product_name'=>$product_name,
				'product_price'=>$product_price,
				'product_introduce'=>$product_introduce
		);
		$result = $this ->personal_model -> upload_product($data);
		redirect('personal/release');
	}
	//发布新品 结束

	//购物订单 开始
	public function shopping_order(){
		$state = $this ->input -> get('order_state');

		$page = $this -> input -> get('per_page');
		if (empty($page)) {
			$page = 0;
		}

		$config['base_url'] = site_url('welcome/shopping_order?');//'http://localhost/admin/welcome/help';
		$total = $this -> personal_model ->get_total_orders();
		$config['total_rows'] = $total;
		$config['per_page'] =3;
		$config['first_link'] = '<<首页';
		$config['last_link'] = '末页>>';
		$config['next_link'] = '下一页>';
		$config['prev_link'] = '<上一页';

		$config['page_query_string'] = TRUE;

		$this->pagination->initialize($config);
		$rs = $this -> personal_model -> get_all_orders($page,$config['per_page'],$state);
		$data = array(
				"orders" => $rs,
		);
		$this->load->view('shopping_order',$data);

	}

	//购物订单 结束



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("product_model");
		$this->load->library('pagination');
	}
	//主页 开始
		public function zhuye(){
			$this -> load -> view('zhuye');
		}
	//主页 结束

    //蛋糕分类列表 开始
	public function prod_list()
	{
		$sort = $this->input->get('sort');
		$size = $this->input->get('size');
		$price = $this->input->get('pril');
		$search = $this->input->post('search');
		//var_dump($search);die;
		$url = site_url('product/prod_list?');
		if($sort){
			if($sort && $size && $price || $sort && $size || $sort && $price || $sort || $search){
				$arr = array();
				if($size){
					$arr['size'] = $size;
					$url .= "&size=".$size;
				}
				if($price){
					$arr_price = explode('-',$price);
					$url .= "&pril=".$price;
					$arr['price1'] = $arr_price[0];
					$arr['price2'] = $arr_price[1];
				}
				if($sort){
					$arr_sort = explode('-',$sort);
					$url .= "&sort=".$sort;
					$arr['sort1'] = $arr_sort[0];
					$arr['sort2'] = $arr_sort[1];
				}
			}
		}else{
			$size = $this->input->get('size');
			$price = $this->input->get('pril');
			$arr = array();
			if($size){
				$arr['size'] = $size;
				$url .= "&size=".$size;
			}
			if($price){
				$arr_price = explode('-',$price);
				$url .= "&pril=".$price;
				$arr['price1'] = $arr_price[0];
				$arr['price2'] = $arr_price[1];
			}
		}

		$page = $this -> input -> get('per_page');
		if (empty($page)) {
			$page = 0;
		}
		$total = $this -> product_model -> get_all_num($arr);

		$config['base_url'] = $url;
		$config['total_rows'] = $total;
		$config['per_page'] = 12;
		$config['first_link'] = '<<首页';
		$config['last_link'] = '末页>>';
		$config['next_link'] = '下一页>';
		$config['prev_link'] = '<上一页';
		$config['page_query_string'] = TRUE;
		$this->pagination->initialize($config);

		$product = $this -> product_model -> prod($page, $config['per_page'],$arr);
		$pro = $this -> product_model -> prod_sale();

		$data = array(
			'product'=>$product,
			'pro'=>$pro
		);
		$this -> load-> view('product_list',$data);
	}
	//蛋糕分类列表结束

	//蛋糕师 蛋糕列表 开始
	public function cake_list() {
		$userId = 5;
		//$baker = $this -> product_model -> get_name_by_product_id($userId);
		$cates = $this -> product_model -> get_all_cates1($userId);
		$cate1 = $this -> input -> get('cate1');
		$results = $this -> product_model -> get_all_cakes1($cate1,$userId);
		$data=array(
				'results' => $results
		);
		$this -> load -> view('cake_list', $data);




		//是否点击了一级种类
		/*if ($cate1) {
			$cates2 = $this -> product_model -> get_cates2_by_cate1($cate1);
			$cate2 = $this -> input -> get('cate2');
			//是否点击了二级种类
			if ($cate2) {
				//$cakes = $this -> product_model -> get_cakes_by_cate2($cate2, $userId);
			} else {//只点击了一级没有点击二级
				$cakes = $this -> product_model -> get_all_cakes1($cate1,$userId);
			}
		} else {
			$cakes = $this -> product_model -> get_all_cakes($userId);
			$cates2 = $this -> product_model -> get_all_cates2($userId);
			$i = 0;
		foreach ($cakes as $cake) {

			$pId = $cake -> product_id;
			$price[$i] = $this -> product_model -> get_price_by_product_id($pId);
			$sell[$i] = $this -> product_model -> sell($pId);
			//var_dump($sell);die;
			$comment[$i] = $this -> product_model -> comment($pId);
			$picture[$i] = $this -> product_model -> picture($pId);
			$i++;
		}
		$data = array('cates' => $cates, 'cakes' => $cakes, 'price' => $price, 'sell' => $sell, 'comment' => $comment, 'picture' => $picture, 'baker' => $baker, 'cates2' => $cates2);
		}

		//var_dump($cakes);die;

		$cate1 = $this -> input -> get('cate1');
		$cakes = $this -> product_model -> get_all_cakes1($cate1,$userId);*/

	}
	// 蛋糕师 蛋糕列表 结束


	//蛋糕详情 开始
	/**
	 * 根据product_id查询一些相关信息
	 * @param $pid 产品ID
	 */
	public function detail($pid){
		$query=$this->product_model->search_by_pid($pid);
		$photo=$this->product_model->search_photo_by_pid($pid);
	    $size=$this->product_model->search_sizes_by_pid($pid);
		
		$volume=$this->product_model->search_volume_by_pid($pid);
		
		 $totals=$this->product_model->search_comment_by_pid($pid);
		 $pic=$this->product_model->get_pic_count($pid);
		 $good=$this->product_model->get_good_count($pid);
		 
		 $middle=$this->product_model->get_middle_count($pid);
		 $bad=$this->product_model->get_bad_count($pid);
		 $bid= $query->baker_id;
		 $product=$this->product_model->search_by_bid($bid);
		 $video=$this->product_model->search_video_by_bid($bid);
		 // var_dump($video);
		 // die();
		$data=array(
			'message'=>$query,
			'photo'=>$photo,
			'size'=>$size,
			'volume'=>$volume,
			'product'=>$product,
			'video'=>$video,
			'total'=>$totals,
			'good'=>$good,
			'middle'=>$middle,
			'bad'=>$bad,
			'pic'=>$pic
			
			
			// 'comment'=>$comment,
			// 'recommend'=>$recommend
			
		);
		 $this->load->view('cake_detail',$data);	
	}
	public function get_cake_by_size(){
		$size=$this->input->get('data');
		$data=$this->product_model->search_by_size($size);
		echo json_encode($data);
	}
	public function get_comment_by_state(){
		$state=$this->input->get('state');
		$pid=$this->input->get('p_id');
		if($state=='all'){
			$all_comment= $this->product_model->get_all_comment($pid);
			foreach($all_comment as $comment){
				$cid = $comment->comment_id;
				$comment->pic = $this->product_model->get_picture_by_cid($cid);
			}
			echo json_encode($all_comment);
		}else if($state=='pic'){
			$pic_comment=$this->product_model->get_pic_comment($pid);
			foreach($pic_comment as $comment){
				$cid = $comment->comment_id;
				$comment->pic=$this->product_model->get_picture_by_cid($cid);
			}
			echo json_encode($pic_comment);
		}else{
			$good_comment=$this->product_model->get_comment_by_state($pid,$state);
			foreach($good_comment as $comment){
				$cid = $comment->comment_id;
				$comment->pic=$this->product_model->get_picture_by_cid($cid);
			}
			echo json_encode($good_comment);
		}
		
		
		
	}
	
	//蛋糕详情 结束




}

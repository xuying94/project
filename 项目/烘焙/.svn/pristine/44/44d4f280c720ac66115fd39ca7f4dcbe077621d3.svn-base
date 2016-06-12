<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Personal_model extends CI_Model{
		//个人主页 开始



		//个人主页 结束


		//购物订单 开始
		public function get_all(){
			//$this -> db -> select("order.*");
			//$this -> db -> from('t_order order');
			//$this -> db -> join("t_order_item order_item","order.order_id=order_item.order_id");
			//$this -> db -> join("t_product product","product.product_id=order_item.product_id");
			//$this -> db -> order_by("t_order.order_date","desc");
			//return $this -> db -> get() -> result();
			$query=$this->db->query("SELECT * FROM t_order, t_order_item, t_product, t_user, t_product_picture  where t_order.order_id=t_order_item.order_id and t_product.product_id=t_order_item.product_id and t_user.user_id=t_product.baker_id and t_order.user_id=1 order by t_order.order_date desc");

			return $query-> result();

		}

		public function get_total_orders(){
			$query=$this->db->query('SELECT * FROM t_order, t_order_item, t_product, t_user, t_product_picture
									  where t_order.order_id=t_order_item.order_id and t_product.product_id=t_order_item.product_id
									  and t_user.user_id=t_product.baker_id and t_product.product_id=t_product_picture.product_id
									  order by t_order.order_date desc ');
			return $query->num_rows();
		}
		public function get_all_orders($start,$page,$state){
//			$this->db->limit($page,$start);
			if (empty($state)) {
				$query=$this->db->query("SELECT * FROM t_order, t_order_item, t_product, t_user, t_product_picture
									  where t_order.order_id=t_order_item.order_id and t_product.product_id=t_order_item.product_id
									  and t_user.user_id=t_product.baker_id and t_product.product_id=t_product_picture.product_id
									  order by t_order.order_date desc limit $start,$page");
			}else{
				$query=$this->db->query("SELECT * FROM t_order, t_order_item, t_product, t_user, t_product_picture
									  where t_order.order_id=t_order_item.order_id and t_product.product_id=t_order_item.product_id
									  and t_user.user_id=t_product.baker_id and t_product.product_id=t_product_picture.product_id
									  and t_order.order_state = $state
									  order by t_order.order_date desc limit $start,$page");
			}
			return $query-> result();

//			return $this -> db -> get('t_order')->result();
		}
		public function change_check($order_id){
			$true = "3";
			$arr = array(
					"order_state" =>$true
			);
			$this->db->where('order_id',$order_id);
			$this->db->update('t_order',$arr);
		}

		//购物订单 结束

		//新品发布 开始
		public function upload_product($data){
			$this ->db -> insert('t_product',$data);
			if($this -> db -> affected_rows()>0){
				return TRUE;
			}
			return FALSE;
		}

		//新品发布 结束










	}
?>
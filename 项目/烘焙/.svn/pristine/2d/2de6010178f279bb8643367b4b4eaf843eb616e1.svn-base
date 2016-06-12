<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

    // 蛋糕分类列表开始
    public function prod($startnum,$pagesize,$arr){
        if(array_key_exists('search',$arr)){
            $search = $arr['search'];
            $sql="select prod.*,ps.*,t_user.username,t_user.address,proc.*,prod_comm.comms,prod_sales.sales
                    from t_size ps,t_product prod,t_user,t_product_picture proc,
                         (select prod.product_id, count(comm.product_id) as comms
                            from t_product prod left join t_product_comment comm
                          on prod.product_id=comm.product_id group by prod.product_id) prod_comm,
                         (select prod.product_id, count(item.product_id) as sales
                            from t_product prod left join t_order_item item
                          on prod.product_id=item.product_id group by prod.product_id) prod_sales
                    where prod.product_id=prod_comm.product_id and prod.product_id=prod_sales.product_id and prod.baker_id=t_user.user_id
                          and prod.product_id=ps.product_id and prod.product_id=proc.product_id like'%$search%'
                          group by prod.product_id";
        }

        if(array_key_exists('sort1',$arr)){
            if($arr['sort1'] == 'good' || $arr['sort1'] == 'popular'){
                $sql = "select prod.*,ps.*,t_user.username,t_user.address,proc.*,prod_comm.comms,prod_sales.sales,prod_goods.goods,prod_collects.collects
                        from t_size ps,t_product prod,t_user,t_product_picture proc,
                                 (select prod.product_id, count(comm.product_id) as comms
                                    from t_product prod left join t_product_comment comm
                                  on prod.product_id=comm.product_id group by prod.product_id) prod_comm,
                                 (select prod.product_id, sum(comm.good_comment) as goods
                                    from t_product prod left join t_product_comment comm
                                  on prod.product_id=comm.product_id group by prod.product_id) prod_goods,
                                 (select prod.product_id, count(item.product_id) as sales
                                    from t_product prod left join t_order_item item
                                  on prod.product_id=item.product_id group by prod.product_id) prod_sales,
                                 (select prod.product_id, count(pc.product_id) as collects
                                    from t_product prod left join t_collect_product pc
                                    on prod.product_id=pc.product_id group by prod.product_id) prod_collects
                        where prod.product_id=prod_comm.product_id and prod.product_id=prod_sales.product_id and prod.baker_id=t_user.user_id
                                    and prod.product_id=ps.product_id and prod.product_id=proc.product_id and prod_goods.product_id=prod.product_id
                                    and prod.product_id=prod_collects.product_id";
                if(array_key_exists('size',$arr)){
                    $size = $arr['size'];
                    $sql .= " and ps.size = $size";
                }
                if(array_key_exists('price1',$arr) && array_key_exists('price2',$arr)){
                    $first = $arr['price1'];
                    $last = $arr['price2'];
                    $sql .= " and ps.price between $first and $last";
                }
                if($arr['sort1'] == 'good' && $arr['sort2']){
                    $sc =  $arr['sort2'];
                    $sql .= " order by prod_goods.goods $sc";
                }
                if($arr['sort1'] == 'popular' && $arr['sort2']){
                    $sc =  $arr['sort2'];
                    $sql .= " order by prod_collects.collects $sc";
                }

            }else{
                $sql="select prod.*,ps.*,t_user.username,t_user.address,proc.*,prod_comm.comms,prod_sales.sales
                from t_size ps,t_product prod,t_user,t_product_picture proc,
                     (select prod.product_id, count(comm.product_id) as comms
                        from t_product prod left join t_product_comment comm
                      on prod.product_id=comm.product_id group by prod.product_id) prod_comm,
                     (select prod.product_id, count(item.product_id) as sales
                        from t_product prod left join t_order_item item
                      on prod.product_id=item.product_id group by prod.product_id) prod_sales
                where prod.product_id=prod_comm.product_id and prod.product_id=prod_sales.product_id and prod.baker_id=t_user.user_id
                      and prod.product_id=ps.product_id and prod.product_id=proc.product_id";

                if(array_key_exists('size',$arr)){
                    $size = $arr['size'];
                    $sql .= " and ps.size = $size";
                }
                if(array_key_exists('price1',$arr) && array_key_exists('price2',$arr)){
                    $first = $arr['price1'];
                    $last = $arr['price2'];
                    $sql .= " and ps.price between $first and $last";
                }
                if($arr['sort1'] == 'price' && $arr['sort2']){
                    $sc =  $arr['sort2'];
                    $sql .= " order by ps.price $sc";
                }
                if($arr['sort1'] == 'sale' && $arr['sort2']){
                    $sc =  $arr['sort2'];
                    $sql .= " order by prod_sales.sales $sc";
                }

            }
        }else{
            $sql="select prod.*,ps.*,t_user.username,t_user.address,proc.*,prod_comm.comms,prod_sales.sales
                    from t_size ps,t_product prod,t_user,t_product_picture proc,
                         (select prod.product_id, count(comm.product_id) as comms
                            from t_product prod left join t_product_comment comm
                          on prod.product_id=comm.product_id group by prod.product_id) prod_comm,
                         (select prod.product_id, count(item.product_id) as sales
                            from t_product prod left join t_order_item item
                          on prod.product_id=item.product_id group by prod.product_id) prod_sales
                    where prod.product_id=prod_comm.product_id and prod.product_id=prod_sales.product_id and prod.baker_id=t_user.user_id
                          and prod.product_id=ps.product_id and prod.product_id=proc.product_id";
            if(array_key_exists('size',$arr)){
                $size = $arr['size'];
                //var_dump($size);die;
                $sql .= " and ps.size = $size";
            }
            if(array_key_exists('price1',$arr) && array_key_exists('price2',$arr)){
                $first = $arr['price1'];
                $last = $arr['price2'];
                //var_dump($first);die;
                $sql .= " and ps.price between $first and $last";
            }
        }
       // $sql .= " group by prod.product_id";
        $sql .= " limit $startnum,$pagesize";

        $query = $this -> db -> query($sql) -> result();
        return $query;
    }
    public function get_all_num($arr){
        $sql="select prod.*,ps.*,t_user.username,t_user.address,proc.*,prod_comm.comms,prod_sales.sales,prod_goods.goods,prod_collects.collects
                        from t_size ps,t_product prod,t_user,t_product_picture proc,
                                 (select prod.product_id, count(comm.product_id) as comms
                                    from t_product prod left join t_product_comment comm
                                  on prod.product_id=comm.product_id group by prod.product_id) prod_comm,
                                 (select prod.product_id, sum(comm.good_comment) as goods
                                    from t_product prod left join t_product_comment comm
                                  on prod.product_id=comm.product_id group by prod.product_id) prod_goods,
                                 (select prod.product_id, count(item.product_id) as sales
                                    from t_product prod left join t_order_item item
                                  on prod.product_id=item.product_id group by prod.product_id) prod_sales,
                                 (select prod.product_id, count(pc.product_id) as collects
                                    from t_product prod left join t_collect_product pc
                                    on prod.product_id=pc.product_id group by prod.product_id) prod_collects
                        where prod.product_id=prod_comm.product_id and prod.product_id=prod_sales.product_id and prod.baker_id=t_user.user_id
                                    and prod.product_id=ps.product_id and prod.product_id=proc.product_id and prod_goods.product_id=prod.product_id
                                    and prod.product_id=prod_collects.product_id";
            if(array_key_exists('size',$arr)){
                $size = $arr['size'];
                $sql .= " and ps.size = $size";
            }
            if(array_key_exists('price1',$arr) && array_key_exists('price2',$arr)){
                $first = $arr['price1'];
                $last = $arr['price2'];
                $sql .= " and ps.price between $first and $last";
            }
            if(array_key_exists('sort1',$arr) && array_key_exists('sort2',$arr)){
                if($arr['sort1'] == 'price' && $arr['sort2']){
                    $sc =  $arr['sort2'];
                    $sql .= " order by ps.price $sc";
                }
                if($arr['sort1'] == 'sale' && $arr['sort2']){
                    $sc =  $arr['sort2'];
                    $sql .= " order by prod_sales.sales $sc";
                }
                if($arr['sort1'] == 'popular' && $arr['sort2']){
                    $sc =  $arr['sort2'];
                    $sql .= " order by prod_collects.collects $sc";
                }
                if($arr['sort1'] == 'good' && $arr['sort2']){
                    $sc =  $arr['sort2'];
                    $sql .= " order by prod_goods.goods $sc";
                }
            }
        //$sql .= " group by prod.product_id";
        return $this -> db -> query($sql) -> num_rows();
    }

    public function prod_sale(){
        $sql = "select  prod.*,ps.*,proc.*,prod_sales.sales
                from t_size ps,t_product prod,t_product_picture proc,(select prod.product_id, count(*) as sales from t_product prod, t_order_item item where prod.product_id=item.product_id group by prod.product_id) prod_sales
                where prod.product_id=prod_sales.product_id and prod.product_id=ps.product_id and prod.product_id=proc.product_id order by prod_sales.sales desc limit 4";
        $query = $this -> db -> query($sql) -> result();
        return $query;
    }
    // 蛋糕分类列表结束


    // 蛋糕师 蛋糕列表 开始
    /*获取蛋糕师信息
	 * $userId,烘焙师的id
	 * */
    public function get_name_by_product_id($userId) {
        $query = $this -> db -> get_where('t_user', array('user_id' => $userId, 'is_baker' => 1)) -> row();
        //var_dump($query);die;
        return $query;
    }

    /*获取该烘焙师的所有蛋糕一级种类
     * $userId,烘焙师id
     * */
    public function get_all_cates1($userId) {
        return $this -> db -> query("select  t_category.* from t_category where t_category.baker_id=$userId") -> result();
    }

    /*获取该烘焙师的所有蛋糕二级种类
     * $userId,烘焙师id
     * */
    public function get_all_cates2($userId) {
        return $this -> db -> query("select  t_category.* from t_category where t_category.baker_id=$userId and category_p_id is not null") -> result();
        //var_dump($a);die;
    }

    /*获取该烘焙师的所有蛋糕
     * $userId,烘焙师id
     * */
    public function get_all_cakes($userId) {
        $cakes = $this -> db -> query("select  t_product.* from t_product where t_product.baker_id=$userId") -> result();
        return $cakes;
    }

    /*获取每个蛋糕的最低价格
     * $pId,蛋糕的id
     * */
    public function get_price_by_product_id($pId) {

        $pic = $this -> db -> query("select  t_size.price from t_size where t_size.product_id=$pId and t_size.size=6") -> row();
        //var_dump($pic);die;
        return $pic;
    }

    /*获取每个蛋糕的销量
     * $pId,蛋糕的id
     * */
    public function sell($pId) {
        $query = $this -> db -> query("select sum(amount) as sell from t_order_item where t_order_item.product_id=$pId") -> row();
        //if($query -> sell == null){
        //$query -> sell = 0;
        //}else{
        return $query;
        //}
        //var_dump($query);die;
    }

    /*获取每个蛋糕的评论数
     * $pId,蛋糕的id
     * */
    public function comment($pId) {
        $query = $this -> db -> get_where('t_product_comment', array('product_id' => $pId)) -> result();
        return count($query);
    }

    /*获取每个蛋糕的缩略图片
     * $pId,蛋糕的id
     * */
    public function picture($pId) {
        $query = $this -> db -> query("select t_product_picture.picture_thumb  from t_product_picture where t_product_picture.product_id=$pId and t_product_picture.is_cover=1") -> row();
        //	var_dump($query);die;
        return $query;
    }

    /*获取已点击的一级种类下的二级种类
     * $userId,烘焙师的id;$cate1,一级种类的名字
     * */
    public function get_cates2_by_cate1($cate1) {
        return $this -> db -> query("select t_category.* from t_category where t_category.category_p_id=
					(select t_category.category_id from t_category where t_category.category_id=$cate1)") -> result();
        //var_dump($cates2);die;
    }

    /*获取该烘焙师的所有蛋糕
     * $userId,烘焙师id
     * */
    public function get_cakes_by_cate2($cate2, $userId) {
        return $this -> db -> query("select t_product.* from t_product where t_product.category_id=
				(select t_category.category_id from t_category where t_category.baker_id=$userId and t_category.category_name='$cate2')") -> result();
        //var_dump($cakes);die;
    }

    /*获取该烘焙师的所有蛋糕
     * $userId,烘焙师id
     * */
    public function get_all_cakes1($cate1,$userId) {
        $sql1 = "select prod.*,size.*,baker.*,prod_comm.comms,prod_sales.sales,pc.*,cate.*
					from t_product prod,t_size size ,t_user baker,t_product_picture pc,t_category cate,

						(select prod.product_id, count(comm.product_id) as comms
							from t_product prod left join t_product_comment comm
						on prod.product_id=comm.product_id group by prod.product_id) prod_comm,
					 (select prod.product_id, count(item.product_id) as sales
							from t_product prod left join t_order_item item
						on prod.product_id=item.product_id group by prod.product_id) prod_sales

					where  prod.product_id=size.product_id and prod_comm.product_id=prod.product_id and prod.product_id=prod_sales.product_id and baker.user_id=prod.baker_id and prod.baker_id=$userId  and prod.product_id=pc.product_id and cate.baker_id=$userId and prod.category_id ";
        $sql2 = " in
					(select cate1.category_id from t_category cate1 where cate1.category_id=$cate1
					union
					select cate2.category_id
					from t_category cate1, t_category cate2
					where cate1.category_id=cate2.category_p_id
					and cate1.category_id=$cate1) ";
        $sql3 = "group by prod.product_id";
        $sql="";
        if($cate1){

        }else{
            $sql1.=$sql3;
            $sql.=$sql1;
        }

        return $this -> db -> query($sql) -> result();
        //var_dump($cakes);die;
    }


    // 蛋糕师 蛋糕列表 结束
    
    
    //蛋糕详情  开始
    public function search_by_pid($pid){
		$this->db->select('t_user.*,t_product.*');
		$this->db->from('t_product');
		$this->db->join('t_user','t_product.baker_id=t_user.user_id');
		$this->db->where('t_product.product_id',$pid);
		return $this->db->get()->row(); 
	}
	 public function search_sizes_by_pid($pid){
		 $r = $this -> db -> query("select * from t_size where t_size.product_id=$pid order by size asc")->result();
		   return $r;
		}
	 public function search_by_size($size){
	 	return $this->db->get_where('t_size',array('size'=>$size))->row();
	 }
	 public function search_photo_by_pid($pid){
		$query=$this->db->get_where('t_product_picture',array('product_id'=>$pid),4);
			return $query->result();
		 }
		public function search_volume_by_pid($pid){
		 	return $this->db->query("select sum(amount) as amounts from t_order_item item where item.product_id=$pid")->row();
		 }
		public function search_by_bid($bid){
       //如何select产品的名字和id 用逗号隔开还是空格
			$this->db->select('product.*,picture.*');
			$this->db->from('t_product product');
			$this->db->join('t_product_picture picture','product.product_id=picture.product_id');
			$this->db->limit(4);
			$this->db->where('product.baker_id',$bid);
			$this->db->where('picture.is_cover',1);
			return $this->db->get()->result();
		}
		public function search_video_by_bid($bid){
			$query=$this->db->get_where('t_video',array('user_id'=>$bid));
			return $query->result();
		}
		public function search_comment_by_pid($pid){
			return $this->db->query("select count(good_comment) as total from t_product_comment comment where product_id=$pid")->row();
		}
		public function get_pic_count($pid){
			return $this->db->query("select count(pic.comment_id) as pic from t_product_comment com,t_product_comment_picture pic where com.product_id=$pid and com.comment_id=pic.comment_id")->row();
		}
		public function get_good_count($pid){
			return $this->db->query("select count(good_comment) as good from t_product_comment comment where product_id=$pid and good_comment=1")->row();
		}
		public function get_middle_count($pid){
			return $this->db->query("select count(good_comment) as middle from t_product_comment comment where product_id=$pid and good_comment=0")->row();
		}
		public function get_bad_count($pid){
			return $this->db->query("select count(good_comment) as bad from t_product_comment comment where product_id=$pid and good_comment=-1")->row();
		}
		public function get_all_comment($pid){
			$this->db->select('comment.*,user.nickname');
			$this->db->from('t_product_comment comment');
			$this->db->join('t_user user','user.user_id=comment.user_id');
			//$this->db->join('t_product_comment_picture picture','picture.comment_id=comment.comment_id');
			$this->db->where('comment.product_id',$pid);
			return $this->db->get()->result();
		}
		public function get_pic_comment($pid){
			$this->db->select('comment.*,user.nickname,picture.*');
			$this->db->from('t_product_comment comment');
			$this->db->join('t_user user','user.user_id=comment.user_id');
			$this->db->join('t_product_comment_picture picture','picture.comment_id=comment.comment_id');
			$this->db->where('comment.product_id',$pid);
			return $this->db->get()->result();
		}
		public function get_picture_by_cid($cid){
			$query=$this->db->get_where('t_product_comment_picture',array('comment_id'=>$cid));
			return $query->result();
		}
		public function get_comment_by_state($pid,$state){
			$this->db->select('comment.*,user.nickname');
			$this->db->from('t_product_comment comment');
			$this->db->join('t_user user','user.user_id=comment.user_id');
			$this->db->where('comment.product_id',$pid);
			$this->db->where('comment.good_comment',$state);
			return $this->db->get()->result();
		}
	
		
		
    
    
    
    
    
    
    
    
    
    
    //蛋糕详情  结束



}
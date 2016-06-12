<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_model extends CI_Model{
    //卖家中心 交易管理 开始
    //卖家中心 交易管理 结束


    //修改烘焙师 个人资料 开始
    public function get_by_name_youxiang_Tel_person_x_birthday_gx_receiv($name,$youxiang,$Tel,$person,$x,$birthday,$gx,$receiv){
        $this->db->where('user_id', 1);
        $query=$this->db->update('t_user',array('email'=>$youxiang,'nickname'=>$name,'tel'=>$Tel,'province'=>$person,'sex'=>$x,'per_sign'=>$gx,'rec_addr'=>$receiv));

    }

    public function get_by_userid($user_id){
        return $this -> db -> get_where('t_user' ,array('user_id' => $user_id)) -> row();
    }


    public function upload_product($data){
        $this ->db -> insert('t_user',$data);
        if($this -> db -> affected_rows()>0){
            return TRUE;
        }
        return FALSE;
    }
    public function get_user(){
        $query = $this->db->get_where('t_user' ,array('user_id' => 1))->result();

        return $query;

    }

    //修改烘焙师 个人资料 结束
}
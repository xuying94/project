<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

    //蛋糕师注册登录  开始
    public function get_by_firstname_lastname($firstname, $lastname) {
        $query = $this -> db -> get_where('t_user', array('username' => $firstname, 'password' => $lastname));
        return $query -> row();
    }

    public function save($firstname, $psd1) {
        $query = $this -> db -> query("insert into t_user(username,password) values('$firstname','$psd1')");
        //return $query;
        // $this->db->insert('t_user',$data);
        if ($query) {
            return TRUE;
        }
        return FALSE;
    }
    public function bakercheck($name,$num){

        $query= $this -> db -> query("insert into t_baker(realname,idcard) values('$name','$num')");
        if ($query) {
            return TRUE;
        }
        return FALSE;
    }

    //蛋糕师注册登录  结束

    //蛋糕师修改个人资料 开始
    public function update_user($name,$youxiang,$Tel,$person,$x,$birthday,$per_sign,$rec_addr,$is_city,$city){
        $this->db->where('user_id', 1);
        $query=$this->db->update('t_user',array('email'=>$youxiang,'nickname'=>$name,'tel'=>$Tel,'province'=>$person,'sex'=>$x,'birthday'=>$birthday,'per_sign'=>$per_sign,'rec_addr'=>$rec_addr,'is_city'=>$is_city));

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

    //蛋糕师修改个人资料 结束
}
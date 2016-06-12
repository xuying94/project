<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function get_by_name_pwd($name, $password){
      //  $query=$this->db->query('select * from t_admin where admin_name="$admin_name" and admin_pwd="$admin_pwd"');
        $data = array(
        	// 'admin_id' =>$admin_id,
            'admin_name' => $name,
            'admin_password' => $password
       );
		//$this->session->userdata($data);
       return $this -> db -> get_where('t_admin', $data) -> row();
       // return $query->row();
    }
public function get_by_id($admin_id){
      //  $query=$this->db->query('select * from t_admin where admin_name="$admin_name" and admin_pwd="$admin_pwd"');
        $data = array(
        	//'admin_id' =>$admin_id,
            'admin_id' => $admin_id
       );
		//$this->session->userdata($data);
       return $this -> db -> get_where('t_admin', $data) -> result();
       // return $query->row();
    }
    public function get_all(){
        return $this -> db -> get('t_admin') -> result();
    }
	
    public function update_pwd($admin_id,$data){
	    	$this->db->where('admin_id',$admin_id);
			$this->db->update('t_admin',$data);
			return $this->db->get_where('t_admin',array('admin_id'=>$admin_id))->row();
			// $this->db->where('t_admin.admin_id',$admin_id);
			// return $this->db->update('t_admin',$data)->result;
			
	}

}




















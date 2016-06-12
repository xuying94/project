<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employ_model extends CI_Model {

    public function get_by_name_pwd($account, $password){
      //  $query=$this->db->query('select * from t_admin where admin_name="$admin_name" and admin_pwd="$admin_pwd"');
        $data = array(
            'employ_account' => $account,
            'employ_password' => $password
       );
       return $this -> db -> get_where('t_employ', $data) -> row();
    }
public function get_by_id($employ_id){
        $data = array(
            'employ_id' => $employ_id
       );
       return $this -> db -> get_where('t_employ', $data) ->row();
    }
	public function get_all_favorate_by_id($employ_id){
        $data = array(
            'employ_id' => $employ_id
       );
       return $this -> db -> get_where('t_favorate', $data) ->result();
    }
	public function get_all_apply_by_id($employ_id){
        $data = array(
            'employ_id' => $employ_id
       );
       return $this -> db -> get_where('t_apply', $data) ->result();
    }

	public function delete_apply_by_id($apply_id){
        $this -> db -> delete('t_apply', array('apply_id' => $apply_id));
    }
	public function delete_employ_by_id($employ_id){
        $this -> db -> delete('t_employ', array('employ_id' => $employ_id));
    }
    public  function save($data){
		if($this->db->insert('t_employ',$data)>0){
				return TRUE;
			}else{
				return FALSE;	
			}
			
		}

   public function update($employ_id,$data1){
		    $this->db->where('employ_id',$employ_id);
			$this->db->update('t_employ',$data1);
			return $this->db->get_where('t_employ',array('employ_id'=>$employ_id))->row();
}
   public function get_employ_by_page($limit,$offset){
  		// $offset=8;
		
       //return $this->db->get('t_blog', 6, $page) -> result();
       $this -> db -> select("*");
       $this -> db -> from('t_employ');
       //$this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
       $this -> db -> limit($limit, $offset);
       return $this -> db -> get() -> result();
   }
   
		public function get_news_by_id($employ_id){
			return $this->db-> get_where('t_news', array(
           'employ_id' => $employ_id
       		)) -> result();
	}
			public function get_employ_count(){
			return $this->db->count_all("t_employ");
		}


}




















<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_model extends CI_Model {

   public function save($data){
      $this->db->insert('t_message',$data);
   }
	public function get_all(){
        return $this -> db -> get('t_message') -> result();
    }

   public  function  get_by_username($username){
      return $this -> db -> get_where('t_message', array(
          'username' => $username
      )) -> row();
   }
   public  function delete($message_id){
        $this -> db -> delete('t_message', array('message_id' => $message_id));
    }
   
   public function get_message_by_page($limit,$offset){
  		// $offset=8;
		
       //return $this->db->get('t_blog', 6, $page) -> result();
       $this -> db -> select("*");
       $this -> db -> from('t_message');
       //$this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
       $this -> db -> limit($limit, $offset);
       return $this -> db -> get() -> result();
   }
   
   public function get_message_count(){
			return $this->db->count_all("t_message");
		}

}




















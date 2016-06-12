<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recruit_model extends CI_Model {

	public function get_by_name_pwd($account, $password){
        $data = array(
            'company_account' => $account,
            'company_password' => $password
       );
       return $this -> db -> get_where('t_company', $data) -> row();
    }
	public function get_profiile_by_id($company_id){
		// $limit=9;
	   $this -> db -> select("*");
       $this -> db -> from('t_recruit_profile');
	   $this->db->where("company_id",$company_id);
       // $this -> db -> limit($limit);
	   $this->db->order_by("recruit_send_time","desc");
       return $this -> db -> get() -> result();
	}
	public function update_company($company_id,$data1){
		    $this->db->where('company_id',$company_id);
			$this->db->update('t_company',$data1);
			return $this->db->get_where('t_company',array('company_id'=>$company_id))->row();
}
	
   public  function save($data){
		if($this->db->insert('t_company',$data)>0){
				return TRUE;
			}else{
				return FALSE;	
			}
			
		}
	public function get_all(){
        return $this -> db -> get('t_company') -> result();
    }
	public function get_company(){
        $this -> db -> select("*");
        $this -> db -> from('t_company');
		$this -> db -> limit("5");
        return $this -> db -> get() -> result();
    }
	public function get_all_recruit(){
        return $this -> db -> get('t_recruit') -> result();
    }
	public function get_all_profiile(){
		return $this -> db -> get('t_employ') -> result();
	}
	public function get_job_by_id($recruit_id){
		return $this->db->get_where('t_recruit',array(
			'recruit_id'=>$recruit_id
		))->row();
	}
	public function get_favorate_recruit_by_id($data){
		return $this->db->get_where('t_recruit',array(
			'recruit_id'=>$data
		))->row();
	}
	public function get_job_by_2id($recruit_id,$employ_id){
		return $this->db-> get_where('t_favorate', array(
           'recruit_id' => $recruit_id,
           'employ_id'=>$employ_id
       )) -> row();
	}
	public function get_job_by_2id_from_apply($recruit_id,$employ_id){
		return $this->db-> get_where('t_apply', array(
           'recruit_id' => $recruit_id,
           'employ_id'=>$employ_id
       )) -> row();
	}
		public function get_by_id($company_id){
		return $this->db-> get_where('t_company', array(
           'company_id' => $company_id
       )) -> row();
	}
		public function get_job_by_cid($company_id){
		return $this->db-> get_where('t_recruit', array(
           'company_id' => $company_id
       )) -> result();
	}
		public function delete_company_by_id($company_id){
        $this -> db -> delete('t_company', array('company_id' => $company_id));
    }
		public function esc_favorate_by_id($recruit_id,$employ_id){
			 $this -> db -> delete('t_favorate', array(
			 'recruit_id_id' => $recruit_id_id,
			 'employ_id'=>$employ_id
			 ));
		}
		public function get_recruit_by_id($company_id){
			return $this->db-> get_where('t_recruit', array(
           'company_id' => $company_id
       		)) -> result();
		}
		
		public function save_repply($data){
			if($this->db->insert('t_news',$data)>0){
				return TRUE;
			}else{
				return FALSE;	
			}
		}
		public  function save_recruit($data){
		if($this->db->insert('t_recruit',$data)>0){
				return TRUE;
			}else{
				return FALSE;	
			}
			
		}
			
		public function save_favorate($data){
			
	   if($this->db->insert('t_favorate',$data)>0){
				return TRUE;
			}else{
				return FALSE;	
			}
		}
		public function get_re_by_id($recruit_id){
			
	   if($this->db->insert('t_favorate',$recruit_id)>0){
				return TRUE;
			}else{
				return FALSE;	
			}
		}
		
		public  function save_apply($data){//标记
		if($this->db->insert('t_apply',$data)>0){
				return TRUE;
			}else{
				return FALSE;	
			}
			
		}
		public  function save_recruit_profile($data2){//标记
		if($this->db->insert('t_recruit_profile',$data2)>0){
				return TRUE;
			}else{
				return FALSE;	
			}
			
		}
		
		
   public  function delete_recruit($recruit_id){
        $this -> db -> delete('t_recruit', array('recruit_id' => $recruit_id));
    }
   
   public function update_recruit($recruit_id,$data){
		    $this->db->where('recruit_id',$recruit_id);
			$this->db->update('t_recruit',$data);
			return $this->db->get_where('t_recruit',array('recruit_id'=>$recruit_id))->row();
}
   
   public function get_recruit_by_page($limit,$offset){
  		// $offset=8;
		
       //return $this->db->get('t_blog', 6, $page) -> result();
       $this -> db -> select("*");
       $this -> db -> from('t_recruit');
       //$this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
       $this -> db -> limit($limit, $offset);
       return $this -> db -> get() -> result();
   }
   public function get_company_by_page($limit,$offset){
  		// $offset=8;
		
       //return $this->db->get('t_blog', 6, $page) -> result();
       $this -> db -> select("*");
       $this -> db -> from('t_company');
       //$this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
       $this -> db -> limit($limit, $offset);
       return $this -> db -> get() -> result();
   }
   
   
   public function get_company_count(){
			return $this->db->count_all("t_company");
		}
   public function get_recruit_count(){
			return $this->db->count_all("t_recruit");
		}
   
 
	public function add($data){
		$this->db->insert('t_recruit',$data);
	}
	public function update($recruit_id,$data1){
		    $this->db->where('recruit_id',$recruit_id);
			$this->db->update('t_recruit',$data1);
			return $this->db->get_where('t_recruit',array('recruit_id'=>$recruit_id))->row();
}
		public function get_by_key_word($key_word){//根据关键词搜索
			$this->db->select("t_company.*");
			$this->db->from("t_company");
			// $this->db->join("t_blog_catalogs catalog","blog.catalog_id=catalog.catalog_id");
			$this->db->like('company_name', $key_word,'both');
            $this->db->or_like('company_detail', $key_word,'both');
			// $this->db->where("TITLE",$key_word);
			// $this->db->where('TITLE', $key_word);
			// $this->db->or_where('CONTENT', $key_word);
			// $this->db->order_by("add_time","desc");
			return $this->db->get()->result();
		}
		
		public function get_by_key_word2($key_word){//根据关键词搜索
			$this->db->select("t_recruit.*");
			$this->db->from("t_recruit");
			// $this->db->join("t_blog_catalogs catalog","blog.catalog_id=catalog.catalog_id");
			$this->db->like('recruit_name', $key_word,'both');
            $this->db->or_like('recruit_detail', $key_word,'both');
			// $this->db->where("TITLE",$key_word);
			// $this->db->where('TITLE', $key_word);
			// $this->db->or_where('CONTENT', $key_word);
			// $this->db->order_by("add_time","desc");
			return $this->db->get()->result();
		}
		public function get_by_key_word3($key_word){//根据关键词搜索
			$this->db->select("t_recruit.*");
			$this->db->from("t_recruit");
			// $this->db->join("t_blog_catalogs catalog","blog.catalog_id=catalog.catalog_id");
			$this->db->like('recruit_name', $key_word,'both');
            $this->db->or_like('recruit_detail', $key_word,'both');
			// $this->db->where("TITLE",$key_word);
			// $this->db->where('TITLE', $key_word);
			// $this->db->or_where('CONTENT', $key_word);
			// $this->db->order_by("add_time","desc");
			return $this->db->get()->result();
		}

}




















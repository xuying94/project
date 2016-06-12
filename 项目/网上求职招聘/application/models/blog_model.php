<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {
// *********************************************
		public function get_article_count(){
			return $this->db->count_all("t_article");
		}
		
// *************************************************
    public function get_all(){
        $this -> db -> select("*");
        $this -> db -> from('t_article article');
        // $this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
        return $this -> db -> get() -> result();
    }
 public function get_all_article($article_type){
 	// var_dump($article_type);
	// die;
       $this -> db -> select("*");
        $this -> db -> from('t_article');
        $this->db->where("article_type",$article_type);
		$this -> db -> limit("5");
        return $this -> db -> get() -> result();
    }
 public function get_all_profile($article_type){
       $this -> db -> select("*");
        $this -> db -> from('t_article');
        $this->db->where("article_type",$article_type);
        return $this -> db -> get() -> result();
    }
 public function get_all_interview($article_type){
       $this -> db -> select("*");
        $this -> db -> from('t_article');
        $this->db->where("article_type",$article_type);
        return $this -> db -> get() -> result();
    }
   public function get_by_page($limit,$offset){
  		// $offset=5;
		
       //return $this->db->get('t_blog', 6, $page) -> result();
       $this -> db -> select("*");
       $this -> db -> from('t_article');
       //$this -> db -> join('t_admin admin', 'article.author=admin.admin_id');
       $this -> db -> limit($limit, $offset);
       return $this -> db -> get() -> result();
   }
   public  function  get_by_id_comment_id($blog_id){
   	return $this->db->query('select * from t_blog,t_comment where t_article.article_id=t_comment.article_id and t_article.article_id='.$article_id)-> result();
      
   }
	public function get_by_id($article_id){
		return $this->db-> get_where('t_article', array(
           'article_id' => $article_id
       )) -> row();
	}
   	public  function delete($article_id){
        $this -> db -> delete('t_article', array('article_id' => $article_id));
    }
	public function update($article_id,$data1){
		    $this->db->where('article_id',$article_id);
			$this->db->update('t_article',$data1);
			return $this->db->get_where('t_article',array('article_id'=>$article_id))->row();
}
	public function show_blog($blog_id,$data){
			 $this->db->where('blog_id',$blog_id,'comment_id',$comment_id);
			$this->db->update('t_blog',$data);
			return $this->db->get_where('t_blog',array('blog_id'=>$blog_id,'comment_id'=>$comment_id))->row();
	}
	public function add($data){
		$this->db->insert('t_article',$data);
	}
	public function get_news(){
		// $sql="select * from t_article limit=6 order by desc";
		// return $result=$this->db->query('');
		// return $this->db->get('t_article', 6) -> result();
		$limit=9;
	   $this -> db -> select("*");
       $this -> db -> from('t_article');
       $this -> db -> limit($limit);
	   $this->db->order_by("date","desc");
       // $this->db->orderd("desc");
       return $this -> db -> get() -> result();
	}
	
	public function get_by_key_word($key_words){//根据关键词搜索
			$this->db->select("*");
			$this->db->from("t_article");
			$this->db->like('title', $key_words,'both');
            $this->db->or_like('article_content', $key_words,'both');
			$this->db->or_like('article_type', $key_words,'both');
			$this->db->order_by("article_date","desc");
			return $this->db->get()->result();
			// return $this->db->query('SELECT * FROM t_blogs ')->result();
		}
	


}

















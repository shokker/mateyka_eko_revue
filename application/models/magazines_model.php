<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazines_model extends CI_Model{

	var $table = 'magazines';


	function find($limit = null, $offset = 0, $user_id = null, $q = null){
// 		SELECT pt.post_id AS `post_id`, GROUP_CONCAT(t.tag) AS `tags`
// FROM post_tags AS pt
// INNER JOIN tags AS t ON pt.tag_id = t.tag_id
// GROUP BY `post_id`
		$this->db->select('magazines.*,users.username');
        $this->db->join('users', 'users.id = magazines.user_id');
        if ($q != null) {
            $this->db->like('title', $q);
        }
        if($user_id != null){
        	$this->db->where('user_id',$user_id);
        }
        $this->db->where('type','magazine');
        $this->db->limit($limit, $offset);
        $this->db->order_by('published_at', 'desc');
        $query = $this->db->get($this->table);

        return $query->result_array();
	}

	function find_active($limit = null, $offset = 0, $q = null){
		$this->db->select('magazines.*,users.username');
        $this->db->join('users', 'users.id = magazines.user_id');
        if ($q != null) {
            $this->db->like('title', $q);
        }
        $this->db->where('status',1);
        $this->db->where('type','magazine');
        $this->db->limit($limit, $offset);
        $this->db->order_by('published_at', 'desc');
        $query = $this->db->get($this->table);

        return $query->result_array();
	}





	function create($magazine){
        $magazine['slug'] = url_title($magazine['title'],'-',true);
		$this->db->insert($this->table, $magazine);
	}

	function update($post,$id){
		$post['slug'] = url_title($post['title'],'-',true);
		$post['body'] = trim(preg_replace('/\s\s+/', ' ',$post['body']));
		$this->db->where('id',$id);
		$this->db->update($this->table,$post);
	}

	function delete($id){
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}

	function find_by_id($id){
		$this->db->where('id',$id);
		return $this->db->get($this->table,1)->row_array();
	}

	function find_by_slug($slug){
		$this->db->select('posts.*,users.username');
        $this->db->join('users', 'users.id = posts.user_id');
		$this->db->where('slug',$slug);
		return $this->db->get($this->table,1)->row_array();
	}

	function all_urls(){
		$posts = $this->db->select('id,title,slug')->where(array('status' => 1))->order_by('id','desc')->get($this->table)->result_array();
		$all_urls = array();
		if(!empty($posts)){
			foreach($posts as $post){
				$all_urls['read/'.$post['slug']] = $post['title'];
			}
		}
		
		return $all_urls;
	}

}
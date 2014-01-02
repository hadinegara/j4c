<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog_model extends CI_Model {
	
	/**
	 * Detail Blog
	 * @param	int blog id
	 * @return	mixed|boolean FALSE
	 */
	function detail($blog_id)
	{
		if($blog_id == '')
			return FALSE;
		
		$get = $this->db->get_where('blog', array('id'=>$blog_id, 'status'=>'active'));
		if($get && $get->num_rows()>0)
			return $get->row_array();
		else
			return FALSE;
	}
	
	/**
	 * Get Popular
	 * @param	int limit
	 * @return	mixed|boolean FALSE
	 */
	function get_popular($limit=5)
	{
		$get = $this->db->limit($limit)
						->order_by('view_count DESC, date_create DESC')
						->get('blog');
		
		if($get && $get->num_rows())
		{
			return $get->result_array();
		}
		else
		{
			return FALSE;
		}
	}
	
	/**
	 * Get Posted
	 * @param	int limit
	 * @param	int offset
	 * @param	mixed condition
	 * @return	mixed|boolean FALSE
	 */
	function get_posted($limit=10, $offset=0, $condition=array('status'=>'active'))
	{
		if(is_array($condition) && count($condition))
			$this->db->where($condition);
			
		$get = $this->db->limit($limit, $offset)
						->order_by('date_create DESC')
						->get('blog');
		
		if($get && $get->num_rows())
		{
			return $get->result_array();
		}
		else
		{
			return FALSE;
		}
	}
	
	/**
	 * Get total active blog post
	 * @param	mixed condition
	 * @return 	int
	 */
	function get_total($condition=array())
	{
		if(is_array($condition) && count($condition) > 0)
			return $this->db->where($condition)->count_all_results('blog');
		else
			return $this->db->count_all('blog');
	}
	
	/**
	 * Get total active blog post by keyword
	 * @param	string keyword
	 * @return 	int
	 */
	function get_total_search($keyword='')
	{
		if($keyword == '')
			return FALSE;
		
		$like_clause = array();
		foreach(explode(' ', $keyword) as $key)
			$like_clause[] = " title LIKE '%{$key}%' OR summary LIKE '%{$key}%' ";
		
		$sql = "SELECT COUNT(*) AS numrows FROM blog WHERE status='active' AND ".
			   "(". implode(' OR ', $like_clause) .")";
	    
		$get = $this->db->query($sql);
		if($get && $get->num_rows()>0)
		{
			$row = $get->row_array();
			return (int)$row['numrows'];
		}
		else
		{
			return FALSE;
		}
	}
	
	/**
	 * Get blog post by keyword
	 * @param	string keyword
	 * @param	int limit
	 * @param	int offset
	 * @return 	int
	 */
	function search($keyword='', $limit=10, $offset=0)
	{
		if($keyword == '')
			return FALSE;
		
		$like_clause = array();
		foreach(explode(' ', $keyword) as $key)
			$like_clause[] = " title LIKE '%{$key}%' OR summary LIKE '%{$key}%' ";
		
		$sql = "SELECT * FROM blog WHERE status='active' AND (". implode(' OR ', $like_clause) .") ".
			   "ORDER BY date_create DESC LIMIT {$offset},{$limit}";
	    
		$get = $this->db->query($sql);
		if($get && $get->num_rows()>0)
		{
			return $get->result_array();
		}
		else
		{
			return FALSE;
		}
	}
	
	/**
	 * Update view count
	 * @param	int blog id
	 * @return 	booleam
	 */
	function update_view_count($blog_id)
	{
		if($blog_id == '')
			return FALSE;
			
		return $this->db->query("UPDATE blog SET view_count=view_count+1 WHERE id=?", array($blog_id));
	}
}    

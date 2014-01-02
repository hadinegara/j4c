<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog_model extends CI_Model {
	
	/**
	 * Detail Blog
	 * param	int blog id
	 * return	mixed|boolean FALSE
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
	 * Get Posted
	 * param	int limit
	 * param	int offset
	 * param	mixed condition
	 * return	mixed|boolean FALSE
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
	 * Save new blog
	 * param	mixed data
	 * return	boolean
	 */
	function save_new_blog($data)
	{
		if(! is_array($data) || count($data) == 0)
			return FALSE;
			
		$data['date_create'] = date('YmdHis');
		return $this->db->insert('blog', $data);
	}

	/**
	 * Save edited blog
	 * param	mixed data
	 * param	int blog id
	 * return	boolean
	 */
	function save_edited_blog($data, $blog_id)
	{
		if(! is_array($data) || count($data) == 0 || $blog_id == '')
			return FALSE;
			
		return $this->db->update('blog', $data, array('id'=>$blog_id));
	}

	/**
	 * Set Blog Status
	 * param	int blog id
	 * param	string status
	 * return	boolean
	 */
	function set_status($blog_id, $status='archive')
	{
		return $this->db->update('blog', 
			array('status' => $status),
			array('id' => $blog_id)
		);
	}

}    

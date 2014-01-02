<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends MY_Controller {

	var $limit = 10;
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'blog_model'
		));
		
		// set active menu
		Menu::$active_menu = 'blog';
	}
	
	function index($offset=0)
	{
		$offset = abs((int)$offset);
		
		// get total blog
		$total_blog = $this->blog_model->get_total();
		
		$vars = array(
			// blog list
			'blog' => $this->blog_model->get_posted($this->limit, $offset),
			
			// paging
			'paging' => Pagination::run(array(
				'first_url' => base_url('blog'),
				'base_url' => base_url('blog/page'),
				'total_rows' => $total_blog,
				'per_page' => $this->limit
			)),
			
			// blog offset
			'offset' => $offset
		);
		
		if($vars['blog'] != FALSE)
		{
			$this->_data['content'] = $this->load->view('blog/front', $vars, TRUE);
			$this->load->view('default', $this->_data);
		}
		else
		{
			show_404();
		}
	}
	
	function page($page=1)
	{
		$page = abs((int)$page);
		$offset = ($page <= 0) ? 0 : ($this->limit*($page-1));
		$this->index($offset);
	}
	
	function read($blog_id)
	{
		if($blog_id == '')
			show_404();
		
		$detail = $this->blog_model->detail($blog_id);
		if($detail == FALSE)
			show_404();
		
		// update view count
		$sess_update_count = 'update_count_'. $blog_id;
		if($this->session->userdata($sess_update_count) != TRUE)
		{
			$this->session->set_userdata($sess_update_count, TRUE);
			$this->blog_model->update_view_count($blog_id);
		}
		
		$this->_data['content'] = $this->load->view('blog/read', array('detail'=>$detail), TRUE);
		$this->load->view('default', $this->_data);
	}
	
	function search($page=1)
	{
		if(isset($_POST['keyword']))
		{
			$url['q'] = url_title($this->input->post('keyword', TRUE), ' ');			
			redirect(base_url('blog/search?'. http_build_query($url)), 'location', 301);
		}
		
		if(isset($_GET['q']) && $_GET['q'] != '')
		{
			$keyword = $this->input->get('q', TRUE);
			
			// offset page
			$page = abs((int)$page);
			$offset = ($page <= 0) ? 0 : ($this->limit*($page-1));

			// get total blog
			$total_blog = $this->blog_model->get_total_search($keyword);
			
			$vars = array(
				// blog list
				'blog' => $this->blog_model->search($keyword, $this->limit, $offset),
				
				// paging
				'paging' => Pagination::run(array(
					'afix_url' => '?q='. urlencode($keyword),
					'first_url' => base_url('blog/search'),
					'base_url' => base_url('blog/search'),
					'total_rows' => $total_blog,
					'per_page' => $this->limit
				)),
				
				// blog offset
				'offset' => $offset,
				
				// keyword
				'keyword' => $keyword
			);
			
			$this->_addjs(array(
				assets_url('libs/jquery/highlight/jquery.highlight.js'),
				'app-blog-search.js'
			));
			
			$this->_data['content'] = $this->load->view('blog/search_result', $vars, TRUE);
			$this->load->view('default', $this->_data);
		}
	}
	
}
<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog extends MY_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        // load library
        $this->load->library('form_validation');
        
        // load library
        $this->load->model('blog_model');
        
        // set page title
        $this->_data['page_title'] = 'Blog';
        
        // set active menu
        Menu::$active_menu = 'blog';
    }
	
	function archive($offset=0)
	{
        // set active submennu
        Menu::$active_submenu = 'archive';
		
		$limit = 10;
		$offset = (int)abs($offset);
	
        // load blog
		$vars = array(
			// post
			'post' => $this->blog_model->get_posted($limit, $offset, array('status'=>'archive')),
			
			// offset
			'offset' => $offset
		);
		
        $this->_data['content'] = $this->load->view('blog/archive', $vars, TRUE);
		
        $this->load->view('default', $this->_data);
	}
	
    function create($vars='')
    {
        // set active submennu
        Menu::$active_submenu = 'create';
        
        // load form
        $this->_data['content'] = $this->load->view('blog/form', $vars, TRUE);
        
        // add js files
        $this->_addjs(array(
            assets_url('libs/tinymce/js/tinymce/tinymce.min.js'),
            assets_url('libs/tinymce/nrplugins/nrimage.js'),
            assets_url('libs/tinymce/init-blog.js')
        ));
        
        $this->load->view('default', $this->_data);
    }
    
    function edit($blog_id)
    {
		if($blog_id == '')
			show_404();
		
		$vars = array(
			'detail' => $this->blog_model->detail($blog_id)
		);
		
		if($vars['detail'] == FALSE)
			show_404();
		
        // set active submennu
        Menu::$active_submenu = 'edit';
		
        // load form
        $this->_data['content'] = $this->load->view('blog/form_edit', $vars, TRUE);
        
        // add js files
        $this->_addjs(array(
            assets_url('libs/tinymce/js/tinymce/tinymce.min.js'),
            assets_url('libs/tinymce/nrplugins/nrimage.js'),
            assets_url('libs/tinymce/init-blog.js')
        ));
        
        $this->load->view('default', $this->_data);
    }
    
    function index()
    {
		$limit = 10;
		$offset = 0;
	
        // load blog
		$vars = array(
			// post
			'post' => $this->blog_model->get_posted($limit, $offset),
			
			// offset
			'offset' => $offset
		);
		
        $this->_data['content'] = $this->load->view('blog/table', $vars, TRUE);
		
        $this->load->view('default', $this->_data);
    }
    
    function save()
    {
		$this->form_validation->set_error_delimiters('<p class="form-error">', '</p>');
		
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('tag', 'tag', 'trim');
		$this->form_validation->set_rules('summary', 'summary', 'trim|required');
		$this->form_validation->set_rules('blog_content', 'blog content', 'trim|required');
		if($this->form_validation->run() !== FALSE)
		{
			$save = $this->blog_model->save_new_blog(array(
				'title'        => $this->input->post('title', TRUE),
				'tag'          => $this->input->post('tag', TRUE),
				'summary'      => $this->input->post('summary', TRUE),
				'blog_content' => $this->input->post('blog_content', TRUE),
			));
			if($save)
			{
				$this->session->set_flashdata('flashdata', '<strong>Blog Saved</strong><br/>'. $title);
				redirect(base_url('blog'));
			}
			else
			{
				$this->create(array(
					'error' => 'Could not save new blog.'
				));
			}
		}
		else
		{
			$this->create();
		}
    }
    
    function save_edited()
    {
		$this->form_validation->set_error_delimiters('<p class="form-error">', '</p>');
		
		$this->form_validation->set_rules('id', 'Blog ID', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('tag', 'tag', 'trim');
		$this->form_validation->set_rules('summary', 'summary', 'trim|required');
		$this->form_validation->set_rules('blog_content', 'blog content', 'trim|required');
		
		if($this->form_validation->run() !== FALSE)
		{
			$id = $this->input->post('id', TRUE);
			$save = $this->blog_model->save_edited_blog(array(
				'title'        => $this->input->post('title', TRUE),
				'tag'          => $this->input->post('tag', TRUE),
				'summary'      => $this->input->post('summary', TRUE),
				'blog_content' => $this->input->post('blog_content'),
			), $id);
			
			if($save)
			{
				$this->session->set_flashdata('flashdata', '<strong>Blog Post Updated</strong><br/>'. $title);
				redirect(base_url("blog/edit/{$id}"));
			}
			else
			{
				$this->create(array(
					'error' => 'Edit could not be saved.'
				));
			}
		}
		else
		{
			echo validation_errors();
			//$this->edit($this->input->post('id', TRUE));
		}
    }
    
	function set_status()
	{
		$blog_id = $this->input->get('id', TRUE);
		$status  = $this->input->get('status', TRUE);
		$message = ($status == 'archive') ? 'archived' : 'Actived';
		
		if($blog_id != '')
		{
			$archive = $this->blog_model->set_status($blog_id, $status);
			if($archive)
				echo json_encode(array(
					'success' => TRUE,
					'message' => 'Blog Post '. ucfirst($message)
				));
			else
				echo json_encode(array(
					'success' => FALSE,
					'message' => 'Blog post couldn\'t be '. $message
				));
		}
		else
		{
			echo json_encode(array(
				'success' => FALSE,
				'messahe' => 'No id found'
			));
		}
	}
    
}
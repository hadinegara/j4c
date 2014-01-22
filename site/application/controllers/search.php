<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'job_model'
		));
		
		$this->_addjs(array(
			assets_url('libs/jquery/highlight/jquery.highlight.js'),
			'app-search.js'
		));
	}
	
	private function advanced_search()
	{
		$post_data = array(
			'keyword'        => $this->input->post('keyword', TRUE),
			'search_in'      => $this->input->post('search_in', TRUE),
			'location'       => $this->input->post('location', TRUE),
			'specialization' => $this->input->post('specialization', TRUE),
			'salary_min'     => $this->input->post('salary_min', TRUE),
			'salary_max'     => $this->input->post('salary_max', TRUE),
			'job_type'       => $this->input->post('job_type', TRUE),
			'job_experience' => $this->input->post('job_experience', TRUE),
			'job_time'       => $this->input->post('job_time', TRUE)
		);
		
		$sql = "";
		
		// where clause
		// keyword in
		switch($post_data['search_in'])
		{
			case 'all':
				$sql .= "(";
				$sql .= "`job`.`title` LIKE '%{$post_data['keyword']}%' OR ";
				$sql .= "`job`.`description` LIKE '%{$post_data['keyword']}%' OR ";
				$sql .= "`job`.`requirement` LIKE '%{$post_data['keyword']}%'";
				$sql .= ")";
			break;
			case 'title':
				$sql .= "`job`.`title` LIKE '%{$post_data['keyword']}%'";
			break;
			case 'company_name':
				$sql .= "`company`.`name` LIKE '%{$post_data['keyword']}%'";
			break;
		}
		$sql .= " OR ";
		
		// where location
		if($post_data['location'] != '')
		{
			$sql .= ($sql != '' ? ' AND ' : '') . "`job`.`location` LIKE '%{$post_data['location']}%'";
		}
		
		// where specialization
		if($post_data['specialization'] != '')
		{
			$sql .= ($sql != '' ? ' AND ' : '') . "`job`.`category` = '{$post_data['specialization']}'";
		}
		
		// month salary
		if($post_data['salary_min'] != '')
		{
			$sql .= $sql != '' ? ' AND ' : '';
			$sql .= "(";
			$sql .= "`job`.`month_salary` = '{$post_data['salary_min']}' OR ";
			$sql .= "CAST(`job`.`month_salary` AS SIGNED) > {$post_data['salary_min']} OR ";
			$sql .= "`job`.`month_salary` LIKE '{$post_data['salary_min']}-%'";
			$sql .= ($post_data['salary_max'] == '') ? ")" : " OR ";
		}
		if($post_data['salary_max'] != '')
		{
			$sql .= "`job`.`month_salary` = '{$post_data['salary_max']}' OR ";
			$sql .= "`job`.`month_salary` LIKE '%-{$post_data['salary_max']}'";
			$sql .= ")";
		}
		
		// job type
		if(is_array($post_data['job_type']) && count($post_data['job_type'])>0)
		{
			$sql .= $sql != '' ? ' AND ' : '';
			foreach($post_data['job_type'] as $i=>$type)
			{
				$sql .= "`job`.`job_type` = '{$type}'";
				$sql .= (($i+1) != count($post_data['job_type'])) ? " OR " : "";
			}
		}
        $sql = rtrim(trim($sql), 'OR');
		
		
		// job_experience
		if($post_data['job_experience'] != '')
		{
			$exp = explode('-', $post_data['job_experience']);
			
			$sql .= $sql != '' ? ' AND ' : '';			
			if(isset($exp[1]))
			{
				$sql .= "(`job`.`experience` >= ". ($exp[0]*12) ." AND `job`.`experience` <= ". ($exp[1]*12) .")";
			}
			else
			{
				$sql .= "`job`.`experience` >= ". ($exp[0]*12);
			}
		}
		
		
		// job_time
		if($post_data['job_time'] != '')
		{
			// 3d, 1w, 
			$interval = str_replace(array('d','w','m'), array(' DAY',' WEEK',' MONTH'), $post_data['job_time']);
			$sql .= $sql != '' ? ' AND ' : '';			
			$sql .= "`job`.`date_create` >= DATE_SUB(`job`.`date_create`, INTERVAL {$interval})";
		}
		
		// joint all
		$sql = "SELECT company.company_id, company.name AS company_name, job.* ".
			   "FROM company, job WHERE job.company_id=company.company_id AND ". 
			   "job.status='publish' AND ". $sql ." ORDER BY job.date_close DESC, job.date_create DESC";
		$sql = str_replace("OR  AND", "OR", $sql);
		
		$get = $this->db->query($sql);
		if($get && $get->num_rows()>0)
		{
			$vars = array(
				'result' => $get->result_array(),
				'keyword' => url_title($post_data['keyword'], '+')
			);
			
			$this->_data['content'] = $this->load->view('search/result', $vars, TRUE);		
			$this->load->view('default', $this->_data);
		}
		else
		{
		      echo $sql;
            var_dump($get->num_rows());
			//show_404();
		}
	}
	
	function index()
	{
		if(isset($_POST['search']))
		{
			$url['q'] = url_title($this->input->post('search', TRUE), ' ');
			if($this->input->post('location', TRUE) != '')
				$url['l'] = $this->input->post('location', TRUE);
			
			redirect(base_url('search?'. http_build_query($url)), 'location', 301);
		}
		else
		{
			$q = $this->input->get('q', TRUE);
			$l = $this->input->get('l', TRUE);
			
			if(trim($q) != '')
			{
				$result = $this->job_model->simple_search($q, $l);
                if($result !== FALSE)
                {
    				$vars = array(
    					'result' => $result,
    					'keyword' => trim("{$q}+{$l}", '+')
    				);
    				
    				$this->_data['content'] = $this->load->view('search/result', $vars, TRUE);
    				$this->load->view('default', $this->_data);
                }
                else
                {
    				$this->session->set_userdata('error_simple_search', lang('msg_no_result'));
    				redirect(base_url(), 'location');
                }
			}
			else
			{
				$this->session->set_userdata('error_simple_search', lang('msg_no_keyword'));
				redirect(base_url(), 'refresh');
			}
		}
	}
	
	function advanced()
	{
		if(! isset($_GET['do']) || (isset($_POST['keyword']) && $_POST['keyword'] == ''))
		{
			Menu::$active_menu = 'search';
			
			$vars = array(
				'categories' => $this->job_model->categories(),
				'locations'  => $this->job_model->locations()
			);
			
			if(isset($_POST['keyword']) && $_POST['keyword'] == '')
			{
				$vars['errmsg'] = lang('msg_no_keyword');
			}
			
			$this->_data['content'] = $this->load->view('search/advanced', $vars, TRUE);
			$this->load->view('default', $this->_data);
		}
		else
		{
			$this->advanced_search();
		}
	}
	
}
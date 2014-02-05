<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'job_model',
			'seeker_model',
			'resume_model'
		));
		
		// set active menu
		Menu::$active_menu = 'my_job';
		Menu::$active_submenu = 'resume';
		
		// add css
		$this->_addcss(array(
			assets_url('libs/bootstrap/css/datepicker.css')
		));
		
		// add js
		$this->_addjs(array(
			assets_url('libs/bootstrap/js/bootstrap-datepicker.js'),
			'app-resume.js'
		));
	}
	
	
	/**
	 * PRIVATE
	 */
	private function _update_personal_info()
	{
		// get seeker id
		$seeker_id = $this->session->userdata('seeker_id');
		if($seeker_id == '')
		{
			echo json_encode(array(
					'success' => FALSE,
					'message' => $this->lang->line('msg_seeker_id_not_found')
			));
			exit;
		}
		
		$post_data = array(
			'first_name'  => $this->input->post('first_name', TRUE),
			'last_name'   => $this->input->post('last_name', TRUE),
		  //'email'       => $this->input->post('email', TRUE),
			'address'     => $this->input->post('address', TRUE),
			'phone'       => $this->input->post('phone', TRUE),
			'mobile'      => $this->input->post('mobile', TRUE),
			'dob'         => $this->input->post('dob', TRUE),
			'pob'         => $this->input->post('pob', TRUE),
			'gender'      => $this->input->post('gender', TRUE),
			'religion'    => $this->input->post('religion', TRUE),
			'height'      => $this->input->post('height', TRUE),
			'weight'      => $this->input->post('weight', TRUE),
			'nationality' => $this->input->post('nationality', TRUE)
		);
		
		// reformat dob
		$dob = explode('-', $post_data['dob']); // dd-mm-yyyy -> yyyymmdd
		$post_data['dob'] = @$dob[2] . @$dob[1] . @$dob[0];
		
		// save
		$save = $this->resume_model->update_personal_info($post_data, $seeker_id);
		
		// reformat dob and gender to readable format
		// send back to client
		$post_data['dob'] = date('d F Y', strtotime($post_data['dob']));
		$post_data['gender'] = $this->lang->line('label_gender_'. strtolower($post_data['gender']));
		
		// send output
		exit(json_encode(array(
			'success' => $save,
			'message' => ($save == TRUE) ? $this->lang->line('msg_personal_info_saved') : $this->lang->line('msg_personal_info_failure_saved'),
			'data'    => $post_data
		)));
	}
	
	private function _update_skill()
	{
		// get seeker id
		$seeker_id = $this->session->userdata('seeker_id');
		if($seeker_id == '')
		{
			echo json_encode(array(
				'success' => FALSE,
				'message' => $this->lang->line('msg_seeker_id_not_found')
			));
			exit;		
		}
			
		// grab posted data
		$skills = $this->input->post('skill', TRUE);
		$prof   = $this->input->post('proficiency', TRUE);
		
		if(count($skills))
		{
			$data = array();
			$date_create = date('YmdHis');
			foreach($skills as $i=>$skill)
			{
				if($skill != '')
				{
					$data[] = array(
						'seeker_id' => $seeker_id,
						'skill' => $skill,
						'proficiency' => $prof[$i],
						'date_create' => $date_create
					);
				}
			}
			
			// save
			$save = $this->resume_model->save_skills($data);
			
			// update data output
			foreach($data as $i=>$item)
			{
				$data[$i]['proficiency'] = $this->lang->line('label_level_'. $item['proficiency']);
			}
			
			// send output
			echo json_encode(array(
				'success' => $save,
				'message' => ($save == TRUE) ? $this->lang->line('msg_skill_saved') : $this->lang->line('msg_skill_failure_saved'),
				'data'    => $data
			));
		}
		else
		{
			echo json_encode(array(
				'success' => FALSE,
				'message' => $this->lang->line('msg_please_fill_the_form')
			));
		}
	}
    
	private function _update_language()
	{
		// get seeker id
		$seeker_id = $this->session->userdata('seeker_id');
		if($seeker_id == '')
		{
			echo json_encode(array(
				'success' => FALSE,
				'message' => $this->lang->line('msg_seeker_id_not_found')
			));
			exit;		
		}
			
		// grab posted data
		$langs   = $this->input->post('language', TRUE);
		$spoken  = $this->input->post('spoken', TRUE);
		$written = $this->input->post('written', TRUE);
		
		if(count($langs))
		{
			$data = array();
			$date_create = date('YmdHis');
			foreach($langs as $i=>$lang)
			{
				if($lang != '')
				{
                    $lang = url_title($lang, '-', TRUE);
                    $lang = ucwords(str_replace('-', ' ', $lang));
                    
					$data[] = array(
						'seeker_id' => $seeker_id,
						'language' => $lang,
						'spoken' => $spoken[$i],
						'written' => $written[$i],
						'date_create' => $date_create
					);
				}
			}
			
			// save
			$save = $this->resume_model->save_language($data);
            
			// send output
			echo json_encode(array(
				'success' => $save,
				'message' => ($save == TRUE) ? $this->lang->line('msg_language_saved') : $this->lang->line('msg_language_failure_saved'),
				'data'    => $data
			));
		}
		else
		{
			echo json_encode(array(
				'success' => FALSE,
				'message' => $this->lang->line('msg_please_fill_the_form')
			));
		}
	}
	
	private function _update_reference()
	{
		// get seeker id
		$seeker_id = $this->session->userdata('seeker_id');
		if($seeker_id == '')
		{
			echo json_encode(array(
				'success' => FALSE,
				'message' => $this->lang->line('msg_seeker_id_not_found')
			));
			exit;		
		}
		
		$post_data = array(
			'id' => $this->input->post('id', TRUE),
			'mode' => $this->input->post('mode', TRUE),
			'seeker_id' => $seeker_id,
			'data' => array(
				'name' 			=> $this->input->post('name', TRUE),
				'phone' 		=> $this->input->post('phone', TRUE),
				'email' 		=> $this->input->post('email', TRUE),
				'company' 		=> $this->input->post('company', TRUE),
				'position' 		=> $this->input->post('position', TRUE),
				'relationship' 	=> $this->input->post('relationship', TRUE)
			)
		);
		
		$save = $this->resume_model->save_reference($post_data);
		echo json_encode(array(
			'success' => ($save !== FALSE) ? TRUE : FALSE,
			'message' => ($save !== FALSE) ? $this->lang->line('msg_reference_saved') : $this->lang->line('msg_reference_failure_saved'),
			'data' => $post_data['data'],
			'id' => $save
		));
	}
	/** end of PRIVATE */
	
	
	function index()
	{
		// define content
		$vars = array(
			'active_tab' => 'resume',
			'info' => $this->seeker_model->get_full_info($this->session->userdata('seeker_id'))
		);
        //echo '<pre>'; print_r($vars['info']); exit;
        
		$this->_data['content'] = $this->load->view('my_job/resume', $vars, TRUE);
		$this->load->view('default', $this->_data);	
	}
    
    function photo()
    {
        $seeker_id = $this->session->userdata('seeker_id');
        
        if(! isset($_FILES['userfile']))
        {
            $vars = FALSE;
            $photo_url = $this->session->userdata('uploaded_photo_url');
            if($photo_url != '')
            {
                $vars = array('photo_url' => $photo_url);
                $this->session->unset_userdata('uploaded_photo_url', '');
            }
            else
            {
                $photo_url = $this->seeker_model->get_pics($seeker_id);
                if($photo_url != '')
                {
                    $photo_url = static_url("s/{$seeker_id}/{$photo_url}");
                    $vars = array('photo_url' => $photo_url);
                }
            }
            
            $this->load->view('my_job/photo-upload', $vars);
        }
        else
        {
            $static_path = 'D:/WWW-Root/GitHub/j4c/site/static/s/';
            $upload_path = $static_path . $seeker_id;
            if(! is_dir($upload_path))
            {
                mkdir($upload_path);
                copy($static_path . 'index.html', $upload_path .'/index.html');
            }
            
            $config['upload_path']    = $upload_path;
    		$config['allowed_types']  = 'jpg|png';
    		$config['max_width']      = 500;
    		$config['max_height']     = 500;
    		$config['overwrite']      = TRUE;
    		$config['file_name']      = substr(md5($seeker_id), 0, 5);
    
    		$this->load->library('upload', $config);
    
    		if ( ! $this->upload->do_upload())
    		{
    			$error = array('error' => $this->upload->display_errors());    
    			$this->load->view('my_job/photo-upload', $error);
    		}
    		else
    		{
    			$data = $this->upload->data();
                $this->seeker_model->update_pics($data['file_name'], $seeker_id);
                
                $photo_url = static_url("s/{$seeker_id}/{$data['file_name']}");
                $this->session->set_userdata('uploaded_photo_url', $photo_url);
                
                redirect("my_job/resume/photo?r=". md5(microtime()), "refresh");
    		}
        }
    }
	
	function update($part='')
	{
		if($part == '')
			show_404();
		
		$method_name = '_update_'. strtolower(trim($part));
		if(method_exists($this, $method_name))
			$this->$method_name();
		else
			show_404();
	}

}

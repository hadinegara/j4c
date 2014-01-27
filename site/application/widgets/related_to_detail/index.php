<?php 

class Related_to_detail extends Widget {

	function run($current_detail='')
	{
		if(! isset($this->job_model))
			$this->load->model('job_model');
		
        // get related
        $related_name = $this->session->userdata('related_name');
        $related_value = $this->session->userdata('related_value');
        $related = FALSE;
        
        switch($related_name)
        {
            case 'company':
                $related = $this->job_model->get_by_company($related_value);
                $company_detail = $this->company_model->get_detail($related_value);
                $related_detail['name'] = $company_detail['name']; 
                break;
            case 'location':
                $related = $this->job_model->get_by_location($related_value);
                $related_detail['name'] = preg_replace('/[^a-z0-9]/i', ' ', $related_value);
                break;
            case 'spec':
                $related = $this->job_model->get_by_specialization($related_value);
                $spec_detail = $this->job_model->get_spec_detail($related[0]['category']);
                $related_detail['name'] = $spec_detail['name'];
                break;
        }
        
        $this->render(array(
            'current' => $current_detail,
            'related_name' => $related_name,
            'related_value' => $related_value,
            'related_detail' => $related_detail,
            'jobs' => $related
        ));
	}

}
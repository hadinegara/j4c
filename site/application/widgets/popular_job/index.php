<?php 

class Popular_job extends Widget {

	function run()
	{
		if(! isset($this->job_model))
			$this->load->model('job_model');
		
		$popular = $this->job_model->get_popular(5);
		if(is_array($popular) && count($popular)>0)
		{
			$this->render(array('popular'=>$popular));
		}
	}

}
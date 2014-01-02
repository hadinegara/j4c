<?php 

class Popular_article extends Widget {

	function run()
	{
		if(! isset($this->blog_model))
			$this->load->model('blog_model');
		
		$popular = $this->blog_model->get_popular(5);
		if(is_array($popular) && count($popular)>0)
		{
			$this->render(array('popular'=>$popular));
		}
	}

}
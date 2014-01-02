<?php 

class Pagination {
	
	function run($config=array())
	{
		$default = array(
			'centered' 			=> FALSE,
			'full_tag_open' 	=> '<div class="pagination"><ul>',
			'full_tag_close' 	=> '</ul></div>',
			'first_link' 		=> 'First',
			'first_tag_open' 	=> '<li>',
			'first_tag_close' 	=> '</li>',
			'last_link' 		=> 'Last',
			'last_tag_open' 	=> '<li>',
			'last_tag_close' 	=> '</li>',
			'next_link' 		=> '&rsaquo;',
			'next_tag_open' 	=> '<li>',
			'next_tag_close' 	=> '</li>',
			'prev_link' 		=> '&lsaquo;',
			'prev_tag_open' 	=> '<li>',
			'prev_tag_close' 	=> '</li>',
			'cur_tag_open' 		=> '<li class="disabled"><a href="javascript:void(0);">',
			'cur_tag_close' 	=> '</a></li>',
			'num_tag_open' 		=> '<li>',
			'num_tag_close' 	=> '</li>',
			'use_page_numbers' 	=> TRUE
		);
		$options = array_merge($default, (array)$config);
		
		$ci =& get_instance();
		$ci->load->library('pagination');
		
		$this->pagination->initialize($options);
		$link = $this->pagination->create_links();
		if($link != '')
		{
			// centered position
			if(isset($options['centered']) && $options['centered'] == TRUE)
				$link = str_replace('pagination', 'pagination pagination-centered', $link);
			
			// afix url
			if(isset($options['afix_url']) && $options['afix_url'] != '')
			{
				define('APA', $options['afix_url']);
				$link = preg_replace_callback('/(href="[^"]+)/i', 
							function($matches){
								if(! preg_match('/javascript/i', @$matches[0]))
									return @$matches[0] .'?'. trim(APA,'?');
								return @$matches[0];
							}, 
						$link);
			}
				//$link = preg_replace('/(href="[^"]+)/i', '$1?'. trim($options['afix_url'],'?'), $link);
				
			return $link;
		}
		else
		{
			return FALSE;
		}
	}
	
	function replace_callback($matches)
	{
		return "::". $matches ."::";
	}

}
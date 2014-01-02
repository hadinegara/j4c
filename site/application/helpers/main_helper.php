<?php 

/**
 * URL for assets files
 */
function assets_url($uri='')
{
	return base_url("assets/{$uri}");
}

/**
 * Active FULL URL
 */
function full_url($uri='')
{
	$full = 'http://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	if($uri != '')
	{
		if(strpos($uri, '?') !== FALSE && strpos($full, '?') != FALSE)
		{
			$full .= str_replace('?', '&', $uri);
		}
		else
		{
			$full = rtrim($full, '/') .'/'. $uri;
		}
	}
	
	return $full;
}

/**
 * Decrypt
 */
function dec($text)
{
	$text = substr($text, -10).substr($text, 0, (strlen($text)-10));
	$text = explode('::', base64_decode($text));	
	return isset($text[1]) ? $text[1] : FALSE;
}

/**
 * Encrypt
 */
function enc($text)
{
	$text = date('YmdHis') .'::'. $text;
	$encoded = str_replace('=', '', base64_encode($text));
	return substr($encoded, 10).substr($encoded, 0, 10);
}

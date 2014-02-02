<?php 

/**
 * URL for assets files
 */
function assets_url($uri='')
{
    $langs = json_decode(LANGS, TRUE);
    $assets_url = base_url();
    foreach($langs as $prefix=>$name)
    {
       $assets_url = str_replace("/{$prefix}", '', trim($assets_url, '/'));
    }
    $assets_url .= '/assets/';
	return rtrim($assets_url, '/') . ($uri != '' ? "/{$uri}" : '');
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

function lang_url($lang='en')
{
    $langs = json_decode(LANGS, TRUE);
    $lang_url = base_url();
    foreach($langs as $prefix=>$name)
    {
       $lang_url = str_replace("/{$prefix}", '', trim($lang_url, '/'));
    }
    
    $lang_url .= ($lang != 'en') ? "/{$lang}/" : '/';
    return str_replace(base_url(), $lang_url, full_url());
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

/**
 * URL for static files
 */
function static_url($uri='')
{
    $langs = json_decode(LANGS, TRUE);
    $static_url = base_url();
    foreach($langs as $prefix=>$name)
    {
       $static_url = str_replace("/{$prefix}", '', trim($static_url, '/'));
    }
    $static_url .= '/static/';
	return rtrim($static_url, '/') . ($uri != '' ? "/{$uri}" : '');
}

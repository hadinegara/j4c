<?php 
function set_lang(){}

$langs = array(
    'id' => 'Bahasa',
    'en' => 'English'
);
define('LANGS',     json_encode($langs));

$paths = explode('/', @$_SERVER['PATH_INFO']);
if(is_array($paths) && isset($paths[1]))
{
    if(array_key_exists($paths[1], $langs))
    {
        define('LANG_ACTIVE', strtolower($langs[$paths[1]]));
        define('LANG_PREFIX', $paths[1]);
    }
    else
    {
        define('LANG_ACTIVE', 'english');
        define('LANG_PREFIX', 'en');
    }
}
else
{
    define('LANG_ACTIVE', 'english');
    define('LANG_PREFIX', 'en');
}
<?php
if($_SERVER['HTTP_HOST']!='skymp3.in'){
	header('Location: http://skymp3.in'.$_SERVER['REQUEST_URI'],TRUE,301);
	exit;
}

define('SF_ROOT_DIR',    realpath(dirname(__FILE__).'/../skyitech'));
define('SF_APP',         'backend');
define('SF_ENVIRONMENT', 'skymp3');
define('SF_DEBUG',       false);

require_once(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

sfContext::getInstance()->getController()->dispatch();
<?php

define('EASY_F_PLUGIN_URL',  get_template_directory_uri().'/includes/easy_installer/');
define('EASY_F_PLUGIN_PATH', get_template_directory().'/includes/easy_installer/');

$easy_metadata = array(
		"config" => EASY_F_PLUGIN_PATH."/demo_data_here/config.xml",
		"image" => "dummy.jpg"
	);

if(file_exists($easy_metadata['config'])) :
$xml= simplexml_load_file($easy_metadata['config']);
$easy_metadata['data'] = $xml;
else :
$easy_metadata['data'] = false;
endif;

// Init Core Rountines
require_once('ioa_hooks.php');


require_once(EASY_F_PLUGIN_PATH.'classes/class_installer_helper.php');
require_once(EASY_F_PLUGIN_PATH.'classes/class_admin_panel_maker.php');

require_once('ioa_functions.php');
require_once(EASY_F_PLUGIN_PATH.'admin/backend.php');

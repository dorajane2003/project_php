<?php
$app_path = dirname(__FILE__);
define("APPPATH",$app_path);

$config_folder = "config";
define("CONFIGPATH",APPPATH.DIRECTORY_SEPARATOR.$config_folder);

$core_folder = "core";
define("COREPATH",APPPATH.DIRECTORY_SEPARATOR.$core_folder);

$helper_folder = "helper";
define("HELPERPATH",APPPATH.DIRECTORY_SEPARATOR.$helper_folder);

$lib_folder = "lib";
define("LIBPATH",APPPATH.DIRECTORY_SEPARATOR.$lib_folder);

$mod_folder = "modules";
define("MODPATH",APPPATH.DIRECTORY_SEPARATOR.$mod_folder);

require COREPATH.DIRECTORY_SEPARATOR."appload.php";
?>
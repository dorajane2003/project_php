<?php
/*
 * --------------------------------------------------
 * app path
 * --------------------------------------------------
 */
$app_path = dirname(__FILE__);
define("APPPATH",$app_path);
/* 
 * --------------------------------------------------
 * core path 
 * --------------------------------------------------
*/
$core_folder = 'core';
define("COREPATH",APPPATH.DIRECTORY_SEPARATOR.$core_folder);

/*
 * ----------------------------------------------------
 * helper path
 * ---------------------------------------------------- 
 */
$helper_folder = "helper";
define("HELPERPATH",APPPATH.DIRECTORY_SEPARATOR.$helper_folder);

/*
 * ----------------------------------------------------
 * layout path
 * ----------------------------------------------------
 */
$layout_folder = "layout";
define("LAYOUTPATH", APPPATH.DIRECTORY_SEPARATOR.$layout_folder);

/*
 * ----------------------------------------------------
 * lib path
 * ----------------------------------------------------
 */
$lib_folder = 'lib';
define("LIBPATH", APPPATH.DIRECTORY_SEPARATOR.$lib_folder);

/*
 * ------------------------------------------------------
 * module path 
 * ------------------------------------------------------
 */
$module_folder = "modules";
define("MODPATH", APPPATH.DIRECTORY_SEPARATOR.$module_folder);

/*
 * ------------------------------------------------------
 * config path
 * ------------------------------------------------------
 */ 
$config_folder = "config";
define("CONFIGPATH", APPPATH.DIRECTORY_SEPARATOR.$config_folder);

require COREPATH.DIRECTORY_SEPARATOR."appload.php";
?>
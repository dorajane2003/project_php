<?php
$path = MODPATH.DIRECTORY_SEPARATOR.get_module().DIRECTORY_SEPARATOR."controllers".DIRECTORY_SEPARATOR.get_controller()."Controller.php";
if (file_exists($path))
    require $path;
else
    echo "Path {$path} does not exist!";

$action_name = get_action().'Action';
call_function(array('construct', $action_name));
?>
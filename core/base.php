<?php
/*
 * ------------------------------------------------------------------
 * THE BASIC FUNCTIONS, EXAMPLE:  
 * + Function get_header()
 * + Function get_footer()
 * + Function load($type,$name): load file of lib/helper
 * + Function load_module($name): load module of file 
 * + Function load_view($name,$data_send = array()): load view
 * + Function get_module(): get module name
 * + Function get_controller(): get controller name
 * + Function get_action(): get action name
 * + Function call_function() 
 * ------------------------------------------------------------------
 */

defined("APPPATH") OR EXIT('Không có quyền truy cập phần base này!');

function get_module(){
    global $config;
    $module = isset($_GET['mod']) ? $_GET['mod'] : $config['default_module'];
    return $module; 
}

function get_controller(){
    global $config;
    $controller = isset($_GET['controller']) ? $_GET['controller'] : $config['default_controller'];
    return $controller;
}

function get_action(){
    global $config;
    $action = isset($_GET['action']) ? $_GET['action'] : $config['default_action'];
    return $action;
}

function load($type,$name){
    if ($type == 'lib' )
       $path = LIBPATH.DIRECTORY_SEPARATOR."{$name}.php";
    else
        if ($type == 'helper')
            $path = HELPERPATH.DIRECTORY_SEPARATOR."{$name}.php";
    
    if (file_exists($path))
        require $path;
    else 
        echo "File {$path} không tồn tại";
}

/*
 * -----------------------------
 * callFunction
 * -----------------------------
 * Gọi đến hàm theo tham số biến
 */
function call_function($list_function = array()){
    if (is_array($list_function))
        foreach ($list_function as $f)
            if (function_exists($f))
                $f();
}

function load_model($name){
    $path = MODPATH.DIRECTORY_SEPARATOR.get_module().DIRECTORY_SEPARATOR."models".DIRECTORY_SEPARATOR."{$name}Model.php";
    if (file_exists($path))
        require $path;
    else 
        echo "Module {$path} không tồn tại";
}

function load_view($name, $data_send = array()){
    global $data;
    $data = $data_send;
    $path = MODPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $name . 'View.php';
    if (file_exists($path)) {
        if ( !empty($data)) {
            foreach ($data as $key_data => $v_data) {
                $$key_data = $v_data;
            }
        }
        
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function get_header($name = ""){
    $header = empty($name) ? "header" : "header-{$name}";
    $path = LAYOUTPATH.DIRECTORY_SEPARATOR."{$header}.php";
    global $data;
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function get_footer($name = ""){
    $footer = empty($name) ? "footer" : "footer-{$name}";
    $path = LAYOUTPATH.DIRECTORY_SEPARATOR."{$footer}.php";
    global $data;
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}
?>
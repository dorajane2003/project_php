<?php
ob_start();
session_start();
$config['base_url'] = "http://localhost/WEB/back_end/Lession/session_29/ismartMVC.com/admin/"; 
$config['default_module'] = "home"; 
$config['default_controller'] = "index"; 
$config['default_action'] = "index"; 

// set time zone ở HCM để dùng time
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
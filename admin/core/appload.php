<?php
defined("APPPATH") OR exit("Không được truy cập phần appload này");
/*
 * ----------------------------------------------------------------------------------------
 * REQUIRE NHỮNG FILE CONFIG, FILE DÙNG CHUNG VÀO TRONG ĐÂY
 * VÍ DỤ NHƯ: 
 * __ 3 FILE CONFIG "autoload.php","config.php","database.php" NGOÀI RA
 * TA CÒN CÓ THỂ CONFIG EMAIL,...
 * __ FILE DÙNG NHƯ: "database.php" trong lib, FILE 'base.php' trong core (file này chứa
 * những hàm như get_header(),get_footer(), load_model(), load_view(),...)
 * ----------------------------------------------------------------------------------------
 */

/*
 * ------------------------------------------------------
 * require config/autoload
 * ------------------------------------------------------
 */ 
require CONFIGPATH.DIRECTORY_SEPARATOR."config.php";
require CONFIGPATH.DIRECTORY_SEPARATOR."autoload.php";
/*
 * ------------------------------------------------------
 * require config/config
 * ------------------------------------------------------
 */ 
/*
 * ------------------------------------------------------
 * require config/email
 * ------------------------------------------------------
 */ 
require CONFIGPATH.DIRECTORY_SEPARATOR."email.php";

/*
 * ------------------------------------------------------
 * require config/database
 * ------------------------------------------------------
 */ 
require CONFIGPATH.DIRECTORY_SEPARATOR."database.php";
/*
 * ------------------------------------------------------
 * require core/base
 * ------------------------------------------------------
 */ 
require COREPATH.DIRECTORY_SEPARATOR."base.php";
/*
 * ------------------------------------------------------
 * require lib/database
 * ------------------------------------------------------
 */ 
require LIBPATH.DIRECTORY_SEPARATOR."database.php";
/*
 * ------------------------------------------------------
 * require config/email
 * ------------------------------------------------------
 */ 
require LIBPATH.DIRECTORY_SEPARATOR."email.php";
/*
 * ------------------------------------------------------
 * Gọi biến $db ra để connect với database
 * Biến db nằm trong config/database
 * ------------------------------------------------------
 */ 
db_connect($db);

// autoload những file trong lib, helper dùng chung 
if (is_array($autoload)){
    foreach($autoload as $type=> $list_auto){
        if (!empty($list_auto)){
            foreach ($list_auto as $name)
                load($type,$name);
        }
    }
}

/*
 * -----------------------------------------------------------
 * require core/router để điều khiển hoạt động trong hệ thống
 * -----------------------------------------------------------
 */ 

if (!empty($_COOKIE['is_login'])){
    $_SESSION['is_login'] = true;
    $_SESSION['user_login'] = $_COOKIE['user_login'];
}

if (empty($_SESSION['is_login']) &&  get_module() != 'user')
    redirect("?mod=user&action=login");
    
require COREPATH.DIRECTORY_SEPARATOR."router.php";
?>
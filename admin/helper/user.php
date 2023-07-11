<?php
    function get_display_user(){
        if (!empty($_SESSION['user_login']))
            $username = $_SESSION['user_login'];
        $user = db_fetch_row("SELECT `display_name` FROM `tbl_users` WHERE `username` = '$username'");
        return $user['display_name'];
    }

    function get_username(){
        if (!empty($_SESSION['user_login']))
            return $_SESSION['user_login'];
    }
?>
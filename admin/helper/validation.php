<?php
    function isEmpty($value){
        if (empty($value))
            return true;
        return false; 
    }

    function isUsername($username){
        $patten = "/^[A-Za-z0-9_\.]{6,32}$/";
        if (preg_match($patten,$username,$match))
            return true;
        return false;
    }

    function isPassword($password){
        $patten = "/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/";
        if (preg_match($patten,$password,$match))
            return true;
        return false;
    }

    function is_login(){
        if (isset($_SESSION['is_login']))
            return true;
        return false;
    }

    function user_login(){
        if (!empty($_SESSION['user_login']))
            return $_SESSION['user_login'];
        return false;
    }

    function info_user($username,$field){
        if (is_login()){
            global $list_users;
            foreach ($list_users as $value)
                if ($value['username'] == $username) 
                    if (array_key_exists($field,$value))
                        return $value[$field];
        }
        return false;
    }

    function check_login($username, $password){
        $num_row = db_num_rows("SELECT * FROM `tbl_users` WHERE `username`='{$username}' AND `password`=md5('{$password}') AND `is_active` != '0'");
        return $num_row > 0 ? true : false;
    }
?>
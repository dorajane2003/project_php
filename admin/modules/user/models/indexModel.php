<?php
    function login($username,$password,$remember_me){
                if ($remember_me == true){
                    setcookie('is_login',true,time()+3600, '/');
                    setcookie('user_login',$username,time()+3600, '/');
                }
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;  
                
    }

    function user_exist($username,$email){
        $sql = "SELECT * FROM `tbl_users` WHERE `username` = '{$username}' OR `email` = '{$email}'";
        return db_num_rows($sql) > 0 ? true : false;
    }

    function email_exist($email){
        $sql = "SELECT * FROM `tbl_users` WHERE `email` = '{$email}'";
        return db_num_rows($sql) > 0 ? true : false;
    }

    function signup($data){
        $sql = "INSERT INTO `tbl_users` (`user_id`,`fullname`,`email`,`username`,`password`,`active_token`) VALUES (NULL,'{$data['fullname']}','{$data['email']}','{$data['username']}',md5('{$data['password']}'),'{$data['active_token']}')";
        return db_query($sql);
    }

    function logout(){
        unset($_SESSION['is_login']);
        unset($_SESSION['user_login']);
        setcookie('is_login',true,time()-3600, '/');
        setcookie('user_login',true,time()-3600, '/');
        header("Location: ?mod=user&action=login");
    }

    function reset_Pass($password,$token){
        return db_update('tbl_users',array('password'=> $password),"`reset_pass_token` = '{$token}'");
    }

    function check_macth_pass($pass,$rePass){
        return $pass == $rePass;       
    }

    function update_info_user($data){
        $username = get_username();
        return db_update('tbl_users',$data,"`username` = '{$username}'");
    }

    function is_pass_old($pass){
        $username = get_username();
        $sql = "SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `password` = '{$pass}'";
        return db_num_rows($sql) > 0 ? true : false;
    }

    function get_user_by_username($username){
        $sql = "SELECT * FROM `tbl_users` WHERE `username` = '{$username}'";
        $item = db_fetch_row($sql);
        return (!empty($item)) ? $item : false;
    }
   
?>
<?php
    function login($username,$password,$remember_me){
                if ($remember_me == true){
                    setcookie('is_login',true,time()+3600, '/');
                    setcookie('user_login',$username,time()+3600, '/');
                }
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;  
                
    }

    function check_active($username){
        $num_row = db_num_rows("SELECT * FROM `tbl_users` WHERE `username`='{$username}' AND `is_active` != '0'");
        return $num_row > 0 ? true : false;
    }

    function user_exist($username,$email){
        $sql = "SELECT * FROM `tbl_users` WHERE `username` = '{$username}' OR `email` = '{$email}'";
        return db_num_rows($sql) > 0 ? true : false;
    }

    function email_exist($email){
        $sql = "SELECT * FROM `tbl_users` WHERE `email` = '{$email}'";
        return db_num_rows($sql) > 0 ? true : false;
    }

    function update_reset_token($data){
            return db_update('tbl_users',array('reset_pass_token'=> $data['reset_pass_token'] ),"`email` = '{$data['email']}'");
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
        header("Location: ?mod=user");
    }
    function active_user($token){
        $sql = "SELECT * FROM `tbl_users` WHERE `active_token` = '{$token}' AND `is_active` = 0";
        if (db_query($sql))
            return db_update('tbl_users',array('is_active'=> 1 ),"`active_token` = '{$token}'");
    }

    function check_reset_token_user($token){
        $sql = "SELECT * FROM `tbl_users` WHERE `reset_pass_token` = '{$token}' ";
        return db_num_rows($sql) > 0 ? true : false;
    }

    function get_user_by_token($token){
        $sql = "SELECT * FROM `tbl_users` WHERE `reset_pass_token` = '{$token}' ";
        return db_fetch_row($sql);
    }

    function reset_Pass($password,$token){
        return db_update('tbl_users',array('password'=> $password),"`reset_pass_token` = '{$token}'");
    }

    function check_macth_pass($pass,$rePass){
        return $pass == $rePass;
            
    }

?>
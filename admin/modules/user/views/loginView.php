<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title_page;?></title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/login.css">
    <script src="public/js/jquery-3.6.4.min.js"></script>
    <script src="public/js/signup-login-logout/login_signup-Ajax.js"></script>
</head>
<body>

<?php
global $error;
?>

<section id="wp-form-login">
        <form action="" id="form-login" method="post" onsubmit="return checkLogin()">
            <h1>LOGIN ADMIN</h1>   
            <div class="body-form">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                <p class="username_error error"></p>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <p class="password_error error"></p>
    
                <p class="login_error error">
                    <?php
                        if (!empty($error['status']))
                            echo $error['status'];
                    ?>
                </p>
                
                <label for="remember_me"><input type='checkbox' name="remember_me" id="remember_me" value="remember"> Ghi nhớ đăng nhập</label>
                <!-- setcookie('is_login',true,time()+3600, '/'); -->
                <input type="submit" id="btn_login" name="btn_login" value="Login">
                <a href="?mod=user&action=reset">Quên mật khẩu?</a>
            </div>
        </form>
    </section>
    
    </body>
</html>
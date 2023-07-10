<?php
get_header("signup_login");
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
    
<?php
get_footer("signup_login");
?>
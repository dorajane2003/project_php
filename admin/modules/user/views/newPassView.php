<?php
get_header("signup_login");
global $error;
?>
<section id="wp-form-login">
        <form action="" id="form-login" method="post" onsubmit="return checkLogin()">
            <div class="body-form">
            <h1>KHÔI PHỤC MẬT KHẨU</h1>
            <?php 
                if (!isset($is_change)){
            ?>
            <label for="password">Password New</label>
            <input type="password" name="password" id="password">
            <p class="password_error error">
            <?php
                if (!empty($error['password']))
                    echo $error['password'];
            ?>
            </p>

            <label for="rePassword">Repeat Password New</label>
            <input type="password" name="rePassword" id="rePassword">
            <p class="rePassword_error error">
            <?php
                if (!empty($error['rePassword']))
                    echo $error['rePassword'];
            ?>
            </p>
            <input type="submit" id="btn_login" name="btn_change" value="Thay đổi mật khẩu">     
            <?php
                } else {
                    if ($is_change){

            ?>
                <img src="https://static-00.iconduck.com/assets.00/success-icon-512x512-qdg1isa0.png" alt="" width="50">
               
            <?php }
                else {
            ?>
                <img src="data:image/png;base64,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" alt="" width="50">
            <?php
                }
            ?>
             <p class="content">
                    <?php
                        echo $content;
                    ?>
                </p>
            <?php
            } 
            ?>
            </div>
        </form>

       
    </section>   
<?php
get_footer("signup_login");
?>
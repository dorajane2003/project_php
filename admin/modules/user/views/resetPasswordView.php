<?php
get_header("signup_login");
global $error;
?>

<section id="wp-form-login">
        <form action="" id="form-login" method="post" >
            <div class="body-form body-form-reset">
                <h1>KHÔI PHỤC MẬT KHẨU</h1>
                <label for="email">Email tài khoản của bạn</label>
                <input type="text" name="email" id="email">
                <p class="email_error error">
                    <?php 
                        if (!empty($error['status'])){
                            echo $error['status'];
                        }
                    ?>
                </p>
                <input type="submit" id="btn_login" name="btn_reset" value="Gửi mail xác nhận!">
                <table class="button">
                    <tr>
                        <td><a href="?mod=user">Đăng nhập</a></td>
                        <td><a href="?mod=user&action=signup">Đăng ký</a></td>
                    </tr>
                </table>
            </div>
        </form>
    </section>
<?php
    if (!empty($flag_reset) && $flag_reset == true){
?>
    <div id="modal-show">
        <div class="modal-form">
            <div class="modal-body">
                <img src="https://static-00.iconduck.com/assets.00/success-icon-512x512-qdg1isa0.png" alt="" width="50">
                <p>Mã xác thực đã được gửi vào thư, vui lòng xác thực tài khoản!</p>
            </div>
        </div>
</div>
<?php
    }
?>
<?php
get_footer("signup_login");
?>
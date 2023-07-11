<?php
get_header();
?>
<style>
    .error{
        color:red;
        font-weight: bold;
    }
</style>
<div id="main-content-wp" class="change-pass-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=user&controller=team&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
       <?php get_sidebar("users"); ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <?php 
                        if (isset($update_success) && $update_success == true){
                    ?>

                    <script>
                        alert("Cập nhật thành công!");
                    </script>

                    <?php } ?>


                <form method="POST">
                    <label for="old-pass">Mật khẩu cũ</label>
                    <input type="password" name="pass-old" id="pass-old" value="<?php if (!empty($value['pass-old'])) echo $value['pass-old'];?>">
                    <p class="error">
                        <?php
                            if (!empty($error['pass-old']))
                                echo $error['pass-old'];
                                
                        ?>
                    </p>
                    <label for="new-pass">Mật khẩu mới</label>
                    <input type="password" name="pass-new" id="pass-new" value="<?php if (!empty($value['pass-new'])) echo $value['pass-new'];?>">
                    <p class="error">
                        <?php
                            if (!empty($error['pass-new']))
                                echo $error['pass-new'];
                        ?>
                    </p>
                    <label for="confirm-pass">Xác nhận mật khẩu</label>
                    <input type="password" name="confirm-pass" id="confirm-pass" value="<?php if (!empty($value['confirm-pass'])) echo $value['confirm-pass'];?>">
                    <p class="error">
                        <?php
                            if (!empty($error['confirm-pass']))
                                echo $error['confirm-pass'];
                        ?>
                    </p>
                    <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                </form>
                 
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>
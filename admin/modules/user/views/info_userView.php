<?php
get_header();
global $error;
?>
<style>
    #email{ 
    cursor: not-allowed; 
    background: #f3f3f3;
}
</style>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=user&controller=team&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar("users");?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="display-name" id="display-name" value="<?php echo $info_user['display_name']; ?>">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" placeholder="<?php echo get_username(); ?>" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="<?php echo $info_user['email']; ?>" readonly="readonly">
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="tel" id="tel" value="<?php echo $info_user['num_phone']; ?>">
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"><?php echo $info_user['address']; ?></textarea>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
global $error;
?>
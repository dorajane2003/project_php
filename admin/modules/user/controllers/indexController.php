<?php
    function construct(){
        load_model("index");
    }

    function loginAction(){
        // echo date("h:m:s d/m/Y");

        if (isset($_POST['btn_login'])){
            global $error;
    
            $remember = false;
            if (!empty($_POST['remember_me']))
                $remember = true;
            
           
                if (check_login($_POST['username'],$_POST['password'])){
                    login($_POST['username'],$_POST['password'],$remember);
                    redirect();
                }
            }else 
                $error['status'] = "Bạn chưa xác thực email, vui lòng thử lại!"; 

        $data['title_page'] = "Login";
        load_view("login",$data);
    }

    function logoutAction(){
        logout();
        
    }

    function resetAction(){
        global $error;
        $error = array();
        $token = isset($_GET['token']) ? $_GET['token'] : NULL;
        
        // Check token if token is exists => change new Password  
        // Else => process when user forgot password. User enters email => Server provide a token for user's mail 
        if (!empty($token)){
            $data['title_page'] = "Active tài khoản"; 
            if (check_reset_token_user($token)){
                if (isset($_POST['btn_change'])){
                    // Check password
                    if (!empty($_POST['password']))
                       $password =  $_POST['password'];
                    else 
                        $error['password'] = "Vui lòng nhập password";
    
                    // Check repeat password
                    if (!empty($_POST['rePassword'])){
                        if (!check_macth_pass($password,$_POST['rePassword']))
                            $error['rePassword'] = "Password không khớp";
                    }
                    else
                        $error['rePassword'] = "Vui lòng nhập lại password";
                    
                    if (empty($error)){
                        if (reset_Pass(md5($password),$token)){
                            $link_login = base_url("?mod=user");
                            $data['is_change'] = true;
                            $data['content'] = "Thay đổi mật khẩu thành công, ấn vào link để đăng nhập! <a href='{$link_login}'>Đăng nhập</a>";
                        }
                    }
                }
            }    
            else {
                $data['is_change'] = false;
                $data['content'] = "Mã thay đổi mật khẩu không hợp lệ hoặc mã đã dùng trước đó!";
            }
            load_view('newPass',$data);     
        }
        else
        {
            $data['title_page'] = "Quên mật khẩu";
            if (isset($_POST['btn_reset'])){
                if (!empty($_POST['email']))
                    $email = $_POST['email'];
                else 
                    $error['email'] = "Vui lòng nhập email";
                
                if (!empty($email)){
                    if ((email_exist($email))){  
                        $reset_pass_token = md5($email.time());
                        $data_user = array(
                            'email' => $email,
                            'reset_pass_token' => $reset_pass_token
                        );
                    
                        #CHECK UPDATE RESET TOKEN
                        if (update_reset_token($data_user)){
                            $data['flag_reset'] = true;
                            $link_active = base_url("?mod=user&action=reset&token={$reset_pass_token}");
                            $content = "<h3>Link thay đổi mật khẩu tài khoản của bạn </h3> 
                                        <br>
                                        <button style='display: block; border: none; padding: 12px 24px; background-color: blue;'>
                                            <a style='color: #fff' href='{$link_active}'>Mã thay đổi mật khẩu</a>
                                        </button>
                                        <p>Bỏ qua email này nếu bạn không có đăng ký tài khoản trên hệ thống Dora Jane</p>";
                            
                            #SEND MAIL TOKEN 
                            send_mail($email,'', "THAY ĐỔI MẬT KHẨU!",$content);
                        }
                    }else 
                        $error['status'] = "Email không tồn tại trên hệ thống, vui lòng thử lại!"; 
                }
            }
            load_view("resetPassword",$data);
        }
    }

    function signupAction(){
        global $flag;
        if (isset($_POST['btn_signup'])){
            if (!user_exist($_POST['username'],$_POST['email'])){
                $active_token = md5($_POST['username'].time());
                $data = array(
                    'fullname' => $_POST['fullname'],
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'email' => $_POST['email'],
                    'active_token' => $active_token
                );
                $link = base_url("?mod=user&action=active&reset_token={$active_token}");
                $content = "<h1>Chào bạn {$data['fullname']}</h1>
                            <h3>Link kích hoạt tài khoản của bạn </h3> 
                            <br>
                            <button style='display: block; border: none; padding: 12px 24px; background-color: blue;'>
                                <a style='color: #fff' href='{$link}'>Kích hoạt tài khoản</a>
                            </button>
                            <p>Bỏ qua email này nếu bạn không có đăng ký tài khoản trên hệ thống Dora Jane</p>";
                if (signup($data)){
                    $flag = true;
                    send_mail('dorajane08kc@gmail.com',"Kim Cương", "Kích hoạt tài khoản!",$content);
                }
                else {
                    echo "Đăng ký không thành công, vui lòng thử lại!";
                }
            }      
        }
        $data['title_page'] = "Đăng ký tài khoản mới";
        load_view("signup",$data);
    }

    function info_userAction(){
        $data['title_page'] = "Thông tin tài khoản";
        
        if (isset($_POST['btn-submit'])){
                $data_import = array();
                if (!empty($_POST['display-name']))
                    $data_import['display_name'] = $_POST['display-name'];

                if (!empty($_POST['email']))
                    $data_import['email']= $_POST['email'];

                if (!empty($_POST['tel']))
                    $data_import['num_phone']= $_POST['tel'];

                if (!empty($_POST['address']))
                    $data_import['address']= $_POST['address'];
                
                if (!empty($data_import))
                    update_info_user($data_import);
                
            }
        $data['info_user'] = get_user_by_username(get_username());
        load_view('info_user',$data);
    }

    function reset_PassAction(){
        $data = array();
        $data['title_page'] = "Đổi mật khẩu";
        if (isset($_POST['btn-submit'])){
            foreach ($_POST as $key=> $value){
                if ($key != 'btn-submit')
                    if (empty($value))
                        $data['error'][$key] = "Vui lòng nhập dữ liệu!";
                    else
                        $data["value"][$key] = $value;
            }

            if (!is_pass_old(md5($_POST['pass-old'])))
                $data['error']['pass-old'] = "Mật khẩu cũ không khớp!";

            if (!check_macth_pass($_POST['pass-new'],$_POST['confirm-pass']))
                $data['error']['confirm-pass'] = "Mật khẩu mới không khớp!";

            if (empty($data['error'])){
                $pass = md5($_POST['pass-new']);
                $data_import = array(
                    'password' => $pass
                );

                if (update_info_user($data_import))
                    $data['update_success'] = true;
                else
                    $data['update_success'] = false;
            }

        }
        load_view('reset_Pass',$data);
    }
?>
<?php
    function construct(){
    }

    function indexAction(){
        $data['title_page'] = "Quản lý ISMART";
        load_view("index",$data);
    }
?>
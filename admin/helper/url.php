<?php
    function redirect($url=""){
        global $config;
        if (!empty($url))
            header("Location: {$url}");
        else
            header("Location: ?mod={$config['default_module']}&action={$config['default_action']}");
    }

    function base_url($url = "") {
        global $config;
        return $config['base_url'].$url;
    }
    
?>
<?php
defined("APPPATH") or exit("Bạn không có quyền truy cập phần này");

require CONFIGPATH.DIRECTORY_SEPARATOR."config.php";

require CONFIGPATH.DIRECTORY_SEPARATOR."autoload.php";

require CONFIGPATH.DIRECTORY_SEPARATOR."database.php";

require COREPATH.DIRECTORY_SEPARATOR."base.php";

require LIBPATH.DIRECTORY_SEPARATOR."database.php";

db_connect($db);
if (is_array($autoload)){
    foreach ($autoload as $type=>$list_auto)
        if (!empty($list_auto))
            foreach ($list_auto as $name)
                load($type,$name);
}

require COREPATH.DIRECTORY_SEPARATOR."router.php";
?>
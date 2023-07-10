<?php
/*
 * ----------------------------------------------------------------------------------
 * AUTOLOAD dùng để thêm những phần hệ thống tự động load
 * vào trong hệ thống MVC 
 * Ví dụ như nếu trong chương trình toàn bộ website cần có phần paging thì ta sẽ đưa 
 * paging trong phần helper vào trong autoload 
 * ----------------------------------------------------------------------------------
 */ 

$autoload['helper'] = array("validation","url");
$autoload['lib'] = array();
?>
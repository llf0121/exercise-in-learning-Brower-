<?php
header('content-type:text/html;charset=utf-8');


class Index{

    public function __construct(){
        //获得数据库内容
        $this->data=include 'libs/database.php';
        //        设置时区
        date_default_timezone_set('prc');
    }

    public function entry(){
      include 'views/show.php';
    }
}
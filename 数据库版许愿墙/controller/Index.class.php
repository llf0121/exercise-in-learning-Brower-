<?php
header('content-type:text/html;charset=utf-8');


class Index{
	public $pdo;
    public function __construct(){
        //获得数据库内容
        $this->data=include 'libs/database.php';
        //        设置时区
        date_default_timezone_set('prc');
        //连接数据库
   		$this->pdo = (new Sql)->connect();
    }

    public function entry(){
    	$result=$this->pdo->query('select * from article');
    	$data=$result->fetchAll(PDO::FETCH_ASSOC);
      include 'views/show.php';
    }
}
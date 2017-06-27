<?php
	
	class Sql{
		public $dsn='mysql:host=localhost;dbname=wish';
		public $username = 'root';//数据库服务器用户名
		public $password = 'root';//数据库服务器密码
		public $pdo;//连接后获得的pdo资源
//		主要有以下功能

//1.连接数据库
		public function connect(){

			header('content-type:text/html;charset=utf-8');
			//	连接数据库
			//如果在try之中产生了"PDO的异常错误"会被catch捕捉到
			try {
				//连接数据库并且选择数据库
				$this->pdo = new PDO($this->dsn, $this->username, $this->password);
			//		设置字符集
				$this->pdo -> query("set names utf8");
				//设置错误(异常错误，能被catch捕获到)
			$this->pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);				
			}catch (PDOException $e) {//捕获错误之后，由开发人员自由处理
				echo "<span style='color:red'>" . $e -> getMessage() . "</span>";
			}
			return $this->pdo;
		}
	}
		
?>
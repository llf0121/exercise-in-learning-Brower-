<?php


class Login{

    private  $db;
    private  $dir;
    public $pdo;
//    类中包含了三个主要的方法 1.进入注册登录界面 2、注册 3、登录 4、退出  5.进入后台admin页面

    public  function __construct(){
        date_default_timezone_set('prc');
        session_start();
		//连接数据库
   		 $this->pdo = (new Sql)->connect();
    }

    //1. 显示登录及注册界面
    public function log_reg(){
        if((isset($_SESSION['sta'])&&$_SESSION['sta']==1)||isset($_SESSION['access'])){
            echo "<script>location.href='index.php?c=login&a=admin'</script>>";
            die;
        };
        // 查询数据
                try{
                	$result=$this->pdo->query("select * from article");
                	$data=$result->fetchAll(PDO::FETCH_ASSOC);
                }catch(PDOException $e) {//捕获错误之后，由开发人员自由处理
				echo "<span style='color:red'>" . $e -> getMessage() . "</span>";
			};
        include 'views/log_reg.html';
    }




    //显示验证码
    public function code(){
        (new Check)->show('#ffffff');
    }

//    2.注册
    public function reg(){
        //检测数据是否存在且不为空
        if(isset($_POST)&&$_POST['name']&&$_POST['pwd']&&$_POST['code']){
//          判断验证码是否正确
            if($_SESSION['code']==$_POST['code']){
                // 将数据存入数据库
                try{
                	$this->pdo->exec("insert into user set uname='".$_POST['name']."',password='" . md5($_POST['pwd']) . "'");
                }catch(PDOException $e) {//捕获错误之后，由开发人员自由处理
				echo "<span style='color:red'>" . $e -> getMessage() . "</span>";
			};
                //后台页面通行证
                $_SESSION['access']='yes';
                $this->_tip('注册成功，即将跳转至后台页面','login','admin');
            }else{
                $this->_tip('验证码错误','login','log_reg');
            }

        }
    }



//    3.登录
    public  function log(){
//遍历数据库，与post的数据进行对比，如果正确，就进入show
		  try{
                $result=$this->pdo->query("select * from user");
                //	获得比较干净的关联数组
				$data = $result->fetchAll(PDO::FETCH_ASSOC);
                }catch(PDOException $e) {//捕获错误之后，由开发人员自由处理
				echo "<span style='color:red'>" . $e -> getMessage() . "</span>";
			}
//遍历
        foreach ($data as $k=>$v){
            if($v['uname']==$_POST['name']&&$v['password']==md5($_POST['pwd'])){

                if(isset($_POST['sta'])){
                    //存入登录状态
                    $_SESSION['sta']=$_POST['sta'];
                    //创建本地cookie，延长时间
                    setcookie(session_name(),session_id(),time()+7*3600*24,'/');
                };
                //后台页面通行证
                $_SESSION['access']='yes';
                //获得登录用户的序号
                $_SESSION['key']=$k;
                //跳转
                $this->_tip('登陆成功','login','admin');

            }
        }
        $this->_tip('登陆失败','login','log_reg');

    }


//    4.退出
    public function out(){
        session_destroy();
        session_unset();
        $this->_tip('退出成功,返回首页','Index','entry');

    }

    //5. 进入后台首页
    public function admin(){
//        如果没有通信证，禁止访问
        if (!isset($_SESSION['access'])||$_SESSION['access']!='yes'){

            $this->_tip('你没有访问权限','Index','entry');
            die;
        }
		 try{
                $result=$this->pdo->query("select * from article");
                //	获得比较干净的关联数组
				$data = $result->fetchAll(PDO::FETCH_ASSOC);
                }catch(PDOException $e) {//捕获错误之后，由开发人员自由处理
				echo "<span style='color:red'>" . $e -> getMessage() . "</span>";
			}
        include 'views/admin.html';
    }


    //5.信息提示
    private function _tip($str,$c,$a){
        echo "
                    <script>
                        alert('{$str}');
                        location.href='index.php?c='+'{$c}'+'&a='+'{$a}';           
                     </script>";
    }
    
    
}
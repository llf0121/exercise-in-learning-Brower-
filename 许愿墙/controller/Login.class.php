<?php


class Login{

    private  $db;
    private  $dir;

//    类中包含了三个主要的方法 1.进入注册登录界面 2、注册 3、登录 4、退出  5.进入后台admin页面

    public  function __construct(){
        date_default_timezone_set('prc');
        $this->db=include 'libs/admindata.php';
        $this->dir='libs/admindata.php';
        session_start();
    }

    //1. 显示登录及注册界面
    public function log_reg(){
        if((isset($_SESSION['sta'])&&$_SESSION['sta']==1)||isset($_SESSION['access'])){
            echo "<script>location.href='index.php?c=login&a=admin'</script>>";
            die;
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
            //对用户注册信息进行验证
//          判断验证码是否正确
            print_r($_SESSION);
            if($_SESSION['code']==$_POST['code']){
                // 将数据存入数据库
                $arr=array(
                    'name'=>$_POST['name'],//用户名
                    'pwd'=>$_POST['pwd'],//用户密码
                );
                $this->db[]=$arr;
                // 将重写后的数据转成字符串存回去
                $str="<?php \n\r return  ".var_export($this->db,true)."\n\r ?>";
                file_put_contents($this->dir,$str);
                //后台页面通行证
                $_SESSION['access']='yes';
                $this->_tip('注册成功，即将跳转至后台页面','login','admin');
            }else{
                $this->_tip('验证码错误','login','log_show');
            }

        }
    }









//    3.登录
    public  function log(){
//遍历数据库，与post的数据进行对比，如果正确，就进入show

//遍历
        foreach ($this->db as $k=>$v){
            if($v['name']==$_POST['name']&&$v['pwd']==$_POST['pwd']){

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
<?php
header('content-type:text/html;charset=utf-8');

class Article{
    public $data;
    public $dir_data;

    public function __construct(){
        //设置时区
        date_default_timezone_set('prc');
        //获得数据库数据，并存入数组
        $this->data=include'libs/database.php';
        //设置数据库地址
        $this->dir_data='libs/database.php';

    }

    public function editShow(){
        //        如果没有通信证，禁止访问
        session_start();
        if (!isset($_SESSION['access'])||$_SESSION['access']!='yes'){
            $this->_success('你没有访问权限','index.php?c=Index&a=entry');
        }

        include  'views/editShow.html';
    }
    public function addShow(){
        include  'views/addShow.html';
    }

    //删除文章的方法

    public function del(){
        //   获得序号
        $id=$_GET['id'];
        //删除对应序号的数据
        unset($this->data[$id]);
        //将删除完成后的数组存回数据库
        $this->_putdata($this->data);
//        成功增加后提示信息
        $this->_success('成功删除');

    }


    //编辑文章的方法
    public function edit(){
//        将获得数据重新重新写回数据库
//        获得序号
        $id=$_GET['id'];
//        替换原来的内容
        $this->data[$id]=array(
            'username'=>$_POST['username'],
            'content'=>$_POST['content'],
            'date'=>time(),
        );
//        存回数据库
        $this->_putdata($this->data);
//        成功增加后提示信息
        $this->_success('成功修改');
    }


    //新增文章的方法
    public function add(){
//        将获得的数据组合成数组，并写回数据库
        $arr=array(
            'username'=>$_POST['username'],
            'content'=>$_POST['content'],
            'date'=>time(),
        );
        //追加到数组末尾
        $this->data[]=$arr;
        //存回数据库
        $this->_putdata($this->data);
//        成功增加后提示信息
       $this->_success('成功发布新文章');
    }


    private function _putdata($arr){
//        将数据转化为字符串，并存回数据库
        $str="<?php \n\r return ".var_export($arr,true)." \n\r ?>";
        //存入数据库
        file_put_contents($this->dir_data,$str);
    }

    private function _success($str,$url='index.php?c=login&a=admin'){
        echo "<script>
            location.href='{$url}';
            alert('{$str}');        
            </script>";
    }
}
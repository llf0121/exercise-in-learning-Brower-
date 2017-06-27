<?php
header('content-type:text/html;charset=utf-8');

class Page
{
    private $pic_dir;
    private $to_file;
    private $pic_path;
    private $data;
    private  $data_dir;

    public function __construct()
    {
        $this->data_dir='libs/database.php';
        //获得数据库内容
        $this->data=include 'libs/database.php';
        //        最终图片存放地点
        $this->pic_dir = 'libs/images/pic_data/';
        //        设置时区
        date_default_timezone_set('prc');
    }


//接口方法
    public function newtips()
    {
        session_start();
//        判断验证码是否正确
        if ($_SESSION['code'] == $_POST['code']) {
            if (isset($_POST['username']) && isset($_POST['content']) && $_POST['username'] && $_POST['content']) {
//          将文件信息写入数据库
                $this->_write();
            }else{
                echo json_encode(array('sta' => '请输入正确的内容'));
            }
        }else{
            echo json_encode(array('sta' => '验证码错误'));
        }
    }


//        将上传的图像移动至图像存放地

        private function _move()
        {
            //图像最终路径
            $this->to_file = $this->pic_dir . time() . $_FILES['pic']['size'] . "." . pathinfo($_FILES['pic']['name'])['extension'];
            //移动文件
            move_uploaded_file($_FILES['pic']['tmp_name'], $this->to_file);
            //    设置数据库中的图片存放的地址
            $this->pic_path = $this->pic_dir . time() . $_FILES['pic']['size'] . "." . pathinfo($_FILES['pic']['name'])['extension'];
        }


        //将上传的信息写入数据库

        private function _write()
        {
                $arr = array(
                    'username' => $_POST['username'],
                    'content' => $_POST['content'],
                    'date' => time(),
//                'src' => $this->pic_path
                );
                //  将得到的数据写入content中去
                $this->data[] = $arr;
                //将重写后的数组组合成字符串存回去
                $str = "<?php \n\r return " . var_export($this->data, true) . "\n\r?>";
                //      存回去
                file_put_contents($this->data_dir, $str);
                echo json_encode(array('sta' => 'ok'));

        }


}
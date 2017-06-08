<?php
if (isset($_POST['username']) && isset($_POST['content']) && $_POST['username'] && $_POST['content']) {
//设置文件移动目的地及文件名
   //最终路径
    $to_file="../Images/pic_data/".time().$_FILES['pic']['size'].".". pathinfo($_FILES['pic']['name'])['extension'];
    //移动文件
    move_uploaded_file($_FILES['pic']['tmp_name'],$to_file);
    //        设置时区
    date_default_timezone_set('prc');
//    设置数据库中存放的文件地址
    $pic_path="Images/pic_data/".time().$_FILES['pic']['size'].".". pathinfo($_FILES['pic']['name'])['extension'];

    $arr = array(
        'username' => $_POST['username'],
        'content' => $_POST['content'],
        'date' => time(),
        'src'=>$pic_path
    );
    //获得content文件里储存的内容s
    $content = include 'content.php';
    //  将get到的数据写入content中去
    $content[] = $arr;
    //将重写后的数组组合成字符串存回去
    $str = "<?php \n\r return " . var_export($content, true) . "\n\r?>";
//            存回去
    file_put_contents('content.php', $str);

    //跳转到index
    echo
    '<script>
            location.href="../index.php";
        </script> ';

};
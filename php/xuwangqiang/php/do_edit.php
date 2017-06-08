<?php
//    用户将数据修改完成后，再写入原来的数组中，将对应的值改掉
//获得content文件里储存的内容
$content = include 'content.php';
//        设置时区
date_default_timezone_set('prc');
//如果头像被修改
if(!empty($_FILES['pic']['name'])) {
////设置文件移动目的地及文件名
    $to_file = "../Images/pic_data/" . time() . $_FILES['pic']['size'] . "." . pathinfo($_FILES['pic']['name'])['extension'];
//移动文件
    move_uploaded_file($_FILES['pic']['tmp_name'], $to_file);
//删除之前的文件
    unlink('../' . $content[$_POST['num']]['src']);
    //    设置数据库中存放的文件地址
    $pic_path="Images/pic_data/".time().$_FILES['pic']['size'].".". pathinfo($_FILES['pic']['name'])['extension'];
}else{
    $pic_path=$content[$_POST['num']]['src'];
};
$arr = array(
    'username' => $_POST['username'],
    'content' => $_POST['content'],
    'date' =>time(),
    'src'=>$pic_path
);
//  将post到的数据写入content中去
$content[$_POST['num']] = $arr;
//将重写后的数组组合
$str = "<?php \n\r return ".var_export($content, true)."\n\r?>";
//            存回去
file_put_contents('content.php', $str);
//跳转到index
echo
        '<script>
            location.href="../index.php";
        </script> ';


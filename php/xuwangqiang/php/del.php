<?php

if(isset($_GET['num'])){

    //获得content文件里储存的内容
    $num=$_GET['num'];
    $content = include 'content.php';
//    删除所储存的图片
    unlink('../'.$content[$num]['src']);
    unset($content[$num]);
    //将重写后的数组组合成字符串存回去
    $str = "<?php \n\r return " . var_export($content, true) . "\n\r?>";
//            存回去
    file_put_contents('content.php', $str);
//跳转到index
    echo'<script>
        location.href="../index.php";
        </script> ';
}

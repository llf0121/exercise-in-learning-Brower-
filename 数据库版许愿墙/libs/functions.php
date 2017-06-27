<?php
header('content-type:text/html;charset=utf-8');

//自动跳转函数
function go($msg,$url){
    echo  "<script>alert('{$msg}');location.href='{$url}'</script>";
}

//自动加载类文件
function __autoload($classname){
    include 'controller/'.$classname.'.class.php';
}


//用来输出数据的函数
function p($x){
    if (is_string($x)) {
        echo $x;
        return;
    }
    if (is_array($x)) {
        echo <<<hd
        <style>
        pre{
            border: 1px solid #aaa;
            background: #EEEEEE;
            border-radius:5px;
            padding: 5px;
        }
</style>
hd;
        echo '<pre>';
        print_r($x);
        echo '</pre>';
        return;
    }
    var_dump($x);
}

//用来控制配置项的函数
function C($x=null,$y=null){
    static $config = array();
//    如果传入的是一个数组
    if (is_array($x)) {
//        将传入的数组和已有的配置数组合并
        $config = array_merge($config,$x);
//        return $config;
    }
//    如果传入两个参数
    if (is_string($x) && !is_null($y)) {
//        将配置项改掉
        $config[$x] = $y;
        return $config;
    }

//    如果只传第一个参数
    if (is_string($x) && is_null($y)) {
        return $config[$x];
    }

//    如果不传参数
    if (is_null($x) && is_null($y)) {
        return  $config;
    }

}
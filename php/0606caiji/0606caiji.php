<!doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
<body>
<?php
//获取卢松松之家所有标题和文章
//http://lusongsong.com/
//首先获得页面源代码
$cont=include 'content.php';
$page=file_get_contents('http://lusongsong.com/' );

//匹配所有文章的地址
$href_preg='/<h2><a href="(.*?)" title="(.*?)".*?<\/h2>/is';
//匹配ul
preg_match_all($href_preg,$page,$arr);
//获得标题
foreach ($arr[2] as $k=>$v){
    $cont[$k]['title']=$v;
}
//获得内容
foreach ($arr[1] as $k=>$v){
//    获得具体页面的内容
    $html=file_get_contents($v);
//  匹配内容
    $cont_preg='/<dd class="con">.*?<\/div>/is';
    preg_match_all($cont_preg,$html,$content);
    $cont[$k]['cont']=$content[0][0];
}

$str = "<?php \n\r return " . var_export($cont, true) . "\n\r?>";
//            存回去
file_put_contents('content.php', $str);
?>
</body>
</html>
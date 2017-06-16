<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>HouDun许愿墙</title>
    <link rel="stylesheet" href="../Css/index.css" />
    <link rel="stylesheet" href="../Css/font/iconfont.css">
    <script type="text/javascript" src='../Js/jquery-1.7.2.min.js'></script>
    <script type="text/javascript" src='../Js/index.js'></script>
</head>
<body>
<div id='top'>
    <span id='send'></span>
</div>
    <?php
    //获得content里储存的内容
    $content= include 'content.php';
    //获得get过来的num,并修改对应的数组数据
    $num=$_GET['num'];//获得id

 //生成一个form表单，客户修改完成后提交

    echo "<div id='send-form' class='new'>
                <img class='edit_pic' src='../".$content[$num]['src']."' alt='' >
                <p class='title'><span>许下你的愿望</span><a href='' id='close'></a></p>
                <form action='do_edit.php' name='wish'  id='wish'   method='post'  enctype='multipart/form-data'>
                    <p>
                        <label for='username'>昵称：</label>
                        <input type='text' name='username' id='username' value='" .$content[$num]['username']."'/>
                    </p>
                     <p id='tu'>
                        <label for='pic'>请上传头像<i class='iconfont icon-jiahao'></i></label>
                        <input type='file' id='pic' value='' name='pic'/>
                     </p>
                    <p>
                        <label for='content'>愿望：(您还可以输入&nbsp;<span id='font-num'>50</span>&nbsp;个字)</label>
                        <textarea name='content' id='content' >".$content[$num]['content']. "</textarea>
                    </p>
                    <input type='hidden' name='num' value='" .$num."'/>
                    <input  type='submit' id='send-btn' value=' '/>
                </form>
            </div>";
    ?>
<!--[if IE 6]>
<script type="text/javascript" src="../Js/iepng.js"></script>
<script type="text/javascript">
    DD_belatedPNG.fix('#send,#close,.close', 'background');
</script>
<![endif]-->
</body>
</html>
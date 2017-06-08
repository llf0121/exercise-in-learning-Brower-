<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>HouDun许愿墙</title>
	<link rel="stylesheet" href="./Css/index.css" />
    <link rel="stylesheet" href="Css/font/iconfont.css">
	<script type="text/javascript" src='./Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='./Js/index.js'></script>
</head>
<body>
	<div id='top'>
		<span id='send'></span>
	</div>
	<div id='main'>
        <?php
        //        设置时区
        date_default_timezone_set('prc');
        //获得content里储存的内容
        $content= include 'php/content.php';
        //				遍历获得内容，并输出
        foreach ($content as $k=>$v){
//            随机生成一个(1,5)的随机数
            $r=mt_rand(1,5);
            $time=date('y-m-d h:m:s',$content[$k]['date']);
           echo  "<dl class='paper a".$r."'>
                         <img src='".$content[$k]['src']."' alt=''>
                        <dt>
                            <span class='username'>".$content[$k]['username']."</span>
                            <span class='num'><a href='php/edit.php?num=".$k."'>编辑</a></span>
                        </dt>
                        <dd class='content'>".$content[$k]['content']."</dd>
                        <dd class='bottom'>
                            <span class='time'>".$time."</span>
                            <a href='php/del.php?num=".$k."' class='close'></a>
                        </dd>
		        </dl>";
        }
        ?>

	</div>

    <div id='send-form'>
        <p class='title'><span>许下你的愿望</span><a href="" id='close'></a></p>
        <form action="php/tijiao.php" name='wish' method="post"  enctype="multipart/form-data">
            <p>
                <label for="username">昵称：</label>
                <input type="text" name='username' id='username'/>
            </p>
            <p id="tu">
                <label for="pic">请上传头像<i class="iconfont icon-jiahao"></i></label>
                <input type="file" id="pic" value="" name="pic"/>
            </p>
            <p>
                <label for="content">愿望：(您还可以输入&nbsp;<span id='font-num'>50</span>&nbsp;个字)</label>
                <textarea name="content" id='content'></textarea>
            </p>
            <input  type="submit" id='send-btn' value=" "/>
        </form>
    </div>
<!--[if IE 6]>
    <script type="text/javascript" src="./Js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('#send,#close,.close','background');
    </script>
<![endif]-->
</body>
</html>
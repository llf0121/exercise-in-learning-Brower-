<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>许愿墙</title>
    <link rel="stylesheet" href="views/css/test.css">
    <script type="text/javascript" src="views/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="views/js/show.js"></script>
    <script type="text/javascript" src="views/js/ajax.js"></script>
</head>
<body>
    <div id="top">
      <div>
          <p></p>
          <a href="javascript:void(0)" id="xuyuan">我要许愿</a>
      </div>
    </div>
    <div id="list">
        <?php
                $data=$this->data;
                //	遍历获得内容，并输出
                foreach ($data as $k=>$v) {
                    $time = date('y-m-d h:m:s', $data[$k]['date']);
                    echo "<div class='box'>
                    <span class='content'>{$data[$k]['content']}</span>
                    <span class='time'>{$time}</span>
                    <span class='name'>{$data[$k]['username']}</span>
                </div>";
                }
                ?>
    </div>

    <div id="wish" style="display: none" >
        <form action="" name='wish' method="post"  id="wishform1">
            <span>您的称呼</span>
            <input type="text" name="username" value=""  id='username'/>
            <span>许愿内容</span>
            <textarea name="content" id='content'></textarea>
            <span>验证码</span>
            <input type="text" name="code" value="" id="code"/>
            <img src="index.php?c=login&a=code" alt="" onclick="this.src='index.php?c=login&a=code&t='+Math.random()" alt="" id="pic">
            <input type="submit" name="sub" value="好了，发布愿望"/>
        </form>
    </div>

</body>
</html>
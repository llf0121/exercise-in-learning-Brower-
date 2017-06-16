<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户登录</title>
    <style>
        *{
            padding:0;
            margin:0;
        }
        form{
            width:400px;
            height:500px;

            box-shadow: 0 0 5px grey;
            margin:100px auto;
            background: #EFEBEB;
        }

        form dl dd{
            width:400px;
            height:50px;
            position: relative;
            margin-bottom: 20px;
        }
        form label{
            position: absolute;
            height:50px;
            font-size: 20px;
            line-height: 50px;
            left:0;
            top:0;
            padding: 0 10px;
        }
        form input{
            position: absolute;
            height:30px;
            width:200px;
            background: white;
            right:30px;
            top:0;
            margin:10px 0;
            border:1px solid black;
        }
        img{
            display: block;
            width:200px;
            position: absolute;
            left:50%;
            top:0;
            transform: translatex(-50%);

        }
    </style>
</head>
<body>
<form action="" method="post">
    <dl>
        <dd>
            <label for="name">用户名:</label>
            <input type="text" name="name" value="" id="name">
        </dd>
        <dd>
            <label for="psw"> 密码:</label>
            <input type="password" name="psw" value="" id="psw">
        </dd>
        <dd>
            <label for="code">请输入验证码:</label>
            <input type="text" name="code" id="code" value="">
        </dd>
        <dd>
            <img src="yanzhengma.php" alt="" id="pic">
        </dd>
    </dl>




</form>
<script>
    var pic=document.getElementById('pic');
    pic.onclick=function(){
        this.src='yanzhengma.php?a='+Math.random();
    }
</script>
</body>
</html>
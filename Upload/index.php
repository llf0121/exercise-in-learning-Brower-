<?php
header('content-type:text/html;charset=utf-8');
?>
<!doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form{
            width:300px;
            height:200px;
            margin:100px auto;
        }
        form input{
            display: block;
            width:200px;
            height:30px;
            margin:20px auto;
        }
    </style>
</head>
<body>

    <form action="php/upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file[]"/>
        <input type="file" name="file[]"/>
        <input type="file" name="file[]"/>
        <input type="submit" name="sub" value="提交上传">
    </form>


</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>缩略图</title>
    <style>
        *{
            padding:0;
            margin:0;
        }
        form{
            width:250px;
            margin:100px auto;
            box-shadow: 0 0 5px grey;
            padding:10px 0;
        }
        form label,input{
            width:200px;
            height:30px;
            margin:10px auto;
            background: white;
            border:1px solid grey;
            display: block;
        }
        form label{
            text-align: center;
            border:none;
        }
    </style>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <label for="pic">请选择上传图片</label>
    <input type="file" name="pic[]" id="pic">
    <input type="file" name="pic[]" id="pic">
    <input type="file" name="pic[]" id="pic">
    <input type="submit" name="sub" value="提交" style="width: 100px;border-radius: 15px">
</form>

</body>
</html>



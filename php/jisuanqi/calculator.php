<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>在线计算器</title>
    <script src="jquery-1.11.3.min.js"></script>
    <style>
        *{
            padding:0;
            margin:0;
        }
        table {
            width: 600px;
            height: 600px;
            margin: 100px auto;
            /*border:10px solid red;*/
            box-shadow: grey 0 0 12px 10px;
        }
        table tr{
            display: block;
            margin:10px 0px;
            width:100%;
            height:120px;
            box-sizing: border-box;
        }
        input{
            display: block;
            width:150px;
            height:120px;
            font-size: 40px;
            box-sizing: border-box;
            border-radius: 14px;
            margin: 0px 3px;
            background: black;
            color: white;
        }
        input.reset{
            display: block;
            width:625px;
            height:120px;
            font-size: 40px;
            box-sizing: border-box;
            margin:0 auto;

        }
        h2{
            width:620px;
            height:120px;
            font-size: 40px;
            line-height: 120px;
            box-sizing: border-box;
            border:4px solid grey;
            background: #EEEEEE;
            border-radius:9px;
            margin-left: 3px;
        }
    </style>
</head>
<body>
    <table   cellspacing="0px">
        <form action=""  method="get">
            <tr class="one">
                <th colspan="4">
                    <?php
                    if(isset($_GET['cal'])&&isset($_GET['num1'])&&isset($_GET['num2'])){
                               if(($_GET['cal']=='')&&($_GET['num1']=='')&&($_GET['num2']=='')){
                                   echo "<h2></h2>";
                               }else{
                                   switch ($_GET['cal']){
                                    case  '+':
                                        $result=$_GET['num1']+$_GET['num2'];
                                        break;
                                    case  '-':
                                        $result=$_GET['num1']-$_GET['num2'];
                                        break;
                                    case  '*':
                                        $result=$_GET['num1']*$_GET['num2'];
                                        break;
                                    case  '/':
                                        $result=$_GET['num1']/$_GET['num2'];
                                        break;
                                   };
                                   echo"<h2> $result</h2>";
                                }
                    }else{
                        echo "<h2></h2>";
                    }
                    ?>
                </th>
            </tr>
            <tr>
                <th><input  class="num" type="button" value="1" /></th>
                <td><input class="num" type="button" value="2"/></td>
                <td><input class="num" type="button" value="3"/></td>
                <td><input class="cl" type="button" value="+"/></td>
            </tr>
            <tr>
                <th><input class="num" type="button" value="4"/></th>
                <td><input class="num" type="button" value="5"/></td>
                <td><input class="num" type="button" value="6"/></td>
                <td><input class="cl" type="button" value="-"/></td>
            </tr>
            <tr>
                <th><input class="num" type="button" value="7"/></th>
                <td><input class="num" type="button" value="8"/></td>
                <td><input class="num" type="button" value="9"/></td>
                <td><input class="cl"  type="button" value="*"/></td>
            </tr>
            <tr>
                <th><input class="num" type="button" value="0"/></th>
                <td><input class="num" type="button" value="."/></td>
                <td><input class="sub" type="submit" value="="/></td>
                <td><input class="cl" type="button" value="/"/></td>
            </tr>
            <tr>
                <input type="hidden" name="num1" value="" id="num1"/>
                <input type="hidden" name="num2" value="" id="num2"/>
                <input type="hidden" name="cal" value="" id="cal"/>
                <th colspan="4"><input type="reset" value="RESET" class="reset"> </th>
            </tr>

        </form>
    </table>


    <script>

                var num1='';
                var num2='';
//        给所有的input加单击事件
        $("input:not('.reset')").click(function() {
//           先判断所点击的input里的是什么，数字还是运算符还是点
            //获得所点击的空格的数据类型
            var v = $(this).attr("class");
//            获得所点击的空格的值
            var re = $(this).val();
//            获得当前运算符的值
            var t = $("#cal").val();
            //不同类型的数据对应不同处理
            switch (v) {
//                如果是数字，就判断是第几个数字
                case 'num':

                    if (t == '') {//如果此时运算符为空，就说明输入的是第一个数字
//                        将数字转为字符串
                        var n1 = re.toString();
                        num1 += n1;
                        //将num1显示在上方
                        $("h2").html(num1);
                        $("#num1").val(num1);
                    } else {
                        var n2 = re.toString();
                        num2 += n2;
                        $("h2").html(num2);
                        $("#num2").val(num2);
                    };

                    break;
                case  'cl':
                    $("#cal").val(re);
                    break;
                case 'sub':
                    $("form")[0].submit();
                    break;
            }
        });

        $("input.reset").click(function(){
            $("#num1").val('');
            $("#num2").val('');
            $("#cal").val('');
            $("form")[0].submit();
        })
    </script>

</body>
</html>
/**
 * Created by king on 2017/6/16.
 */
$(function () {
    // 获取要用到的元素
    var username=$('#username');
    var cont=$('#content');
    var code=$('#code');
    var list=$('#list');
    var pic=$('#pic');

    // 当form表单提交时，会先触发此方法
    $('#wishform1').submit(function(){
        $.ajax({
            type: "POST",//发送至服务器的方式
            url: "index.php?c=Page&a=newtips",//服务器接受地址
            data: {
                'username':username.val(),//用户名
                'content':cont.val(),//内容
                'code':code.val()//验证码
            },
            dataType:'json',//返回的数据格式
            success: function(data){//成功返回时将写的内容写回网页
                if(data.sta=='ok') {
                    //准备好要写回去的内容
                    var time = new Date();//获得一个时间对象
                    var name = username.val();
                    var content = cont.val();
                    var mon = time.getMonth() + 1;
                    var time_str = time.getFullYear() + '-' + mon + '-' + time.getDate();
                    //组合一个结构，用于追加
                    var str = "<div class='box'><span class='content'>" + content + "</span><span class='time'>" + time_str + "</span><span class='name'>" + name + "</span></div>";
                    //追加入当前页面
                    list.append(str);
                    // 关掉许愿框
                    username.val('');
                    cont.val('');
                    code.val('');
                    pic.trigger("click");
                    $('#wish').hide();
                    $('#list').show();
                }else{
                    alert(data.sta);
                }
            }
        });
        return false;
    })
})
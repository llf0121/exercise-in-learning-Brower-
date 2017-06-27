/**
 * Created by king on 2017/6/17.
 */
$(function () {
    // tab切换效果
    $('#bkg .tab span').click(function () {
        var num=$(this).index();
        $('#bkg .content form').eq(num).show().siblings('form').hide();
        $(this).css({'border-bottom':'1px solid #4583BB'}).siblings('span').css({'border-bottom':'none'})
    });

})
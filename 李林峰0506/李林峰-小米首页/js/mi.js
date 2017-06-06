$(function(){

	//导航栏购物车下拉效果开始
	$("#header #h-box .buy_box ").mouseenter(function(){
		$(this).find("div").css({'display':'block'}).animate({'height':"100px"},500);
	}).mouseleave(function(){
		$(this).css({'ovreflow':'hidden'}).find("div").animate({'height':"0px"},500);
})
	//导航栏购物车下拉结束
	
	//轮播区开始
//	设定大总管变量
	var c=0;
//	设置定时器
   var timer=setInterval(function(){
   	c++;
   	c=c==5?0:c;
// 	让c号图片显示,让其他兄弟元素隐藏
	$("#lunbo .right a").eq(c).stop().fadeIn(1000).siblings('a').stop().fadeOut(1000);
//	让c号小圆点变色,其他兴地元素变灰
	$("#lunbo .right ul li").eq(c).css({'background':'rgba(255,255,255,0.4)'}).siblings('li').css({'background':'rgba(0,0,0,0.4)'})
   },4000);
   
// 给li加单击事件
    $("#lunbo .right ul li").click(function(){
//  	停止定时器
		clearInterval(timer);
//  	获取当前点击的li的序号
		var num=$(this).index();
		c=num;
// 	让c号图片显示,让其他兄弟元素隐藏
	$("#lunbo .right a").eq(c).stop().fadeIn(1000).siblings('a').stop().fadeOut(1000);
//	让c号小圆点变色,其他兴地元素变灰
	$("#lunbo .right ul li").eq(c).css({'background':'rgba(255,255,255,0.4)'}).siblings('li').css({'background':'rgba(0,0,0,0.4)'})
    });
   
// 给左箭头绑定单击事件,,鼠标移动事件，鼠标移除事件

   $("#lunbo .right span.l").click(function(){
   	clearInterval(timer);
   	c--;
   	c=c==0?4:c;
   	// 	让c号图片显示,让其他兄弟元素隐藏
	$("#lunbo .right a").eq(c).stop().fadeIn(1000).siblings('a').stop().fadeOut(1000);
//	让c号小圆点变色,其他兴地元素变灰
	$("#lunbo .right ul li").eq(c).css({'background':'rgba(255,255,255,0.4)'}).siblings('li').css({'background':'rgba(0,0,0,0.4)'})
   	
   }).mouseenter(function(){
   	$(this).css({'background':'rgba(0,0,0,0.4)','cursor':'pointer'}).find('i').css({'color':'white'});
   }).mouseleave(function(){
   	$(this).css({'background':'rgba(0,0,0,0)','cursor':'default'}).find('i').css({'color':' rgba(208,208,208,0.6)'});
   })
   
   // 给右箭头绑定单击事件,鼠标移动事件，鼠标移除事件

   $("#lunbo .right span.r").click(function(){
   	clearInterval(timer);
   	c++;
   	c=c==5?0:c;
   	// 	让c号图片显示,让其他兄弟元素隐藏
	$("#lunbo .right a").eq(c).stop().fadeIn(1000).siblings('a').stop().fadeOut(1000);
//	让c号小圆点变色,其他兴地元素变灰
	$("#lunbo .right ul li").eq(c).css({'background':'rgba(255,255,255,0.4)'}).siblings('li').css({'background':'rgba(0,0,0,0.4)'});
   	
   }).mouseenter(function(){
   	$(this).css({'background':'rgba(0,0,0,0.4)','cursor':'pointer'}).find('i').css({'color':'white'});
   }).mouseleave(function(){
   	$(this).css({'background':'rgba(0,0,0,0)','cursor':'default'}).find('i').css({'color':'rgba(208,208,208,0.6)'});
   })
	//	轮播区结束
	
	//智能硬件区	
//	给所有box加鼠标移入和移出事件
	$("#bkg div.box").mouseenter(function(){
		$(this).css({'position':'relative','top':'-3px'});
		
	}).mouseleave(function(){
		$(this).css({'position':'relative','top':'0px'});
	})
	//	智能硬件结束
})

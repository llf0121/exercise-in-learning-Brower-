$(function(){
//	大总管变量
	var c = 0;
//	设置状态变量
var sta=1;
//	给右边按钮加点击事件
	$("#jd span.r").click(function(){
		if(sta==0){
			return;
		}
		sta=0;
		c++;
		if (c==4) {
			$("#jd .dahezi").css({'left':'0'});
			c = 1;
		}
//		计算DIV左边的距离
		var l = c*-1000;
		
		$("#jd .dahezi").stop().animate({'left':l+'px'},500,function(){	sta=1;});

	})
	
	//加jd加鼠标移入事件
	$("#jd").mouseenter(function(){
		//让左右箭头颜色发生变化
		$(this).children("span").css({'display':'block'});
	})
	
	//给jd加鼠标移出事件
	$("#jd").mouseleave(function(){
		//让左右箭头颜色发生变化
		$(this).children("span").css({'display':'none'});
	})
	//	给左边按钮加点击事件
	$("#jd span.l").click(function(){
		if(sta==0){
			return;
		}
		sta=0;
		c--;
		if (c==-1) {
			$("#jd .dahezi").css({'left':'-1000*3'});
			c = 2;
		}
//		计算DIV左边的距离
		var l = c*-1000;
		
		$("#jd .dahezi").stop().animate({'left':l+'px'},500,function(){	sta=1;});

	})
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
})
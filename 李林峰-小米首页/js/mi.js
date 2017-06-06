$(function(){

	//导航栏购物车下拉效果开始
	$("#header #h-box .buy_box ").mouseenter(function(){
		$(this).find("div").css({'display':'block'}).animate({'height':"100px"},500)
	});
	$("#header #h-box .buy_box ").mouseleave(function(){
		$(this).find("div").animate({'height':"0px"},500,function(){
			$(this).css({'display':'none'});
		})
})
	//导航栏购物车下拉结束
	
	
	//搜索区开始
	//给所有a加鼠标移入事件
	$("#search .center .center_box a").mouseenter(function(){
		//让移入的a里的文字变色
		$(this).css({'color':'#ff6700'})
	}).not($(".spe")).mouseenter(function(){
		//获得当前移入a的序号
		var num=$(this).index();
		//让对应的menue菜单显示,让兄弟menue隐藏
		$("#search .main .center .center_cont ").css({'display':'block'}).stop().animate({'height':'244px'},300);
		$("#search .main .center .center_cont .menue").eq(num).show().siblings('div').hide();
	})
		//给所有a加鼠标移出事件
	$("#search .center .center_box a").mouseleave(function(){
		//让移出后的a里的文字变色
		$(this).css({'color':'#333'});
		//获得当前移出的a的序号
		var num=$(this).index();
		//让menue隐藏
		$("#search .main .center .center_cont ").stop().animate({'height':'0px'},300,function(){
			$(this).css({'display':'none'});
			$(this).find('.menue').hide();});
		});
		
//	给选项卡加鼠标移入事件
		$("#search .center_cont  .menue").mouseenter(function(){
			var num=$(this).index();
		$("#search .main .center .center_cont ").stop();
		$("#search .main .center .center_cont .menue").eq(num).show().siblings('.menue').hide();
		})
//   给选项卡加鼠标移出事件
		$("#search .center_cont  .menue").mouseleave(function(){
			var num=$(this).index();
		$("#search .main .center .center_cont ").stop().animate({'height':'0px'},300,function(){
			$(this).css({'display':'none'});
			$(this).find('.menue').hide();});
		})
	//搜索区结束

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
	
	//明星单品区开始
//	设置定时器
//设置大总管变量
	var k=0;
	var timer=setInterval(function(){
		k++;
		k=k==2?0:k;
//		设置左边距
		var l=k*-1225;
//		将边距设置回去
		$(".star .star_out").animate({'left':l+'px'},300);
	//让左右箭头变色
	   $(".star>span").eq(k).find('i').css({'color':'#E2E0E0'});
	    $(".star>span").eq(k).siblings('span').find('i').css({'color':'#B4B0B0'});
	},8000)
	
//	给左箭头加单击事件
	$(".star span.l").click(function(){
		if(k<=0){
			return;
		}
		k--;
		var l=k*-1225;
//		将边距设置回去
		$(".star .star_out").animate({'left':l+'px'},300);
	//让左右箭头变色
	   $(".star>span").eq(k).find('i').css({'color':' #E2E0E0'});
	    $(".star>span").eq(k).siblings('span').find('i').css({'color':'#B4B0B0'});
	})
//	给左箭头加移入移出事件
	$(".star span.l").mouseenter(function(){
		if(k==0){
			return;
		}
		$(this).find('i').css({'color':'#FF6712'});
	}).mouseleave(function(){
		$(this).find('i').css({'color':' #E2E0E0'});
	});
	
	//给右箭头加单击事件
	$(".star span.r").click(function(){
		if(k>=1){
			return;
		}
		k++;
		var l=k*-1225;
//		将边距设置回去
		$(".star .star_out").animate({'left':l+'px'},300);
	//让左右箭头变色
	   $(".star>span").eq(k).find('i').css({'color':' #E2E0E0'});
	    $(".star>span").eq(k).siblings('span').find('i').css({'color':'#B4B0B0'});
	})
	
	//给右箭头加移入移出事件
	$(".star span.r").mouseenter(function(){
		if(k==1){
			return;
		}
		$(this).find('i').css({'color':'#FF6712'});
	}).mouseleave(function(){
		$(this).find('i').css({'color':' #E2E0E0'});
	});
	//明星单品区结束
	
	
	
//	给所有box加鼠标移入和移出事件
	$("#bkg div.box").mouseenter(function(){
		$(this).animate({'top':'-3px'},300);
		$(this).find('.des').stop().animate({'height':'76px'});
		
	});
	$("#bkg div.box").mouseleave(function(){
		$(this).animate({'top':'0px'},300);;
		$(this).find('.des').stop().animate({'height':'0px'});
	});
	
	//搭配区开始
//	给li设置鼠标移入事件
	
	$("#bkg .match .list li").mouseenter(function(){
		//获得当前移入的li的序号
		var j=$(this).index();
//		alert($(this).html());
//		让对应序号的区块儿显示
		$(this).parents('.match').find('.r-aside').eq(j).show().siblings('.r-aside').hide();
//		让当前的li设置下边框
		$(this).css({'border-bottom':'2px solid #FF6700','color':'#FF6700'}).siblings('li').css({
			'border-bottom':'none','color':'#333'});
		
	})
	 
	//搭配区结束
	
	
	//内容区开始
//	给内容区加移入移出事件

		$("#content .neirong").mouseenter(function(){
			//让移入的区域变色
			$(this).children("span").css({'background':'rgba(135,126,147,0.2)'});
		}).mouseleave(function(){
			$(this).children("span").css({'background':'rgba(135,126,147,0'});
		})

//		首先遍历四个内容区块

		$("#content .neirong").each(function(k,v){
			(function(i){
			//	声明大总管变量
				var c=0;
			
				//给左键头加单击事件
				$("#content .neirong").eq(i).find('span.l').click(function(){
//			alert(i);
					c--;
					if(c==-1){
						c=0;
						return;
					}
//						alert(c);
			//		设置kezi的left值,并赋值回去
			$(this).siblings('.kezi').animate({'left':c*-291+'px'},500);
			//让对应的小圆点变色
			$(this).siblings('ul').find('li').eq(c).css({'background':'white','border':'2px solid #FF8330'});
			$(this).siblings('ul').find('li').eq(c).siblings('li').css({'background':'#B0B0B0','border':'none'});
				})
				//给右键头加单击事件
				$("#content .neirong").eq(i).find('span.r').click(function(){
//					alert(i);
					c++;
					if(c==3){
						c=2;
						return;
					}
//					alert(c);
			//		设置kezi的left值,并赋值回去
				$(this).siblings('.kezi').animate({'left':c*-291+'px'},500);
				
//			让对应小圆点变色		
			$(this).siblings('ul').find('li').eq(c).css({'background':'white','border':'2px solid #FF8330'});
			$(this).siblings('ul').find('li').eq(c).siblings('li').css({'background':'#B0B0B0','border':'none'});
				})
			})(k);
		})
	//内容区结束
	
	
	//视频区开始
//	给每个按钮加单击事件
	$("#video .box span.video").click(function(){
//	点击后获得当前可视区域宽度和高度
	var width=document.documentElement.clientWidth;
	var height=document.documentElement.clientHeight;
	
	
//	将得到的宽高设置给monitor
	$("#video .monitor").css({'width':width,'height':height,}).show();
	
	//让对应的div显示，让其他div隐藏
		var n=$(this).parent().index()-2;
		
		$("#video .monitor div").eq(n).animate({'height':'597px'},300,function(){
			$(this).animate({'top':height/2-300},1000);
		}).show().siblings().hide();
		
		//
	})
	
//	给每个close加单击事件

	$("#video  .monitor div i").click(function(){
	//让视频暂停
	$(this).siblings('video')[0].pause();
	$(this).siblings('video')[0].currentTime=0;
//		先让div向上走，然后收起，再让整个monitor淡出
		$(this).parent().animate({'top':'0px'},500,function(){
			$(this).animate({'height':0},300,function(){
				$(this).parent().fadeOut(300);
			});
		})
		
	})
	
	//	视频区结束
})

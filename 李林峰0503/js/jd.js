window.onload=function(){
	//抓取所需元素
	var left=document.getElementById("left");
	var box=document.getElementById("box");
	var right=document.getElementById("right");
	var gaizi=document.getElementById("gaizi");
	var pic=document.getElementById("pic");
	
	//给设置鼠标移动事件
	 gaizi.onmousemove=function(e){
	//设置右侧及选中去显示
	 box.style.display='block';
	 right.style.display='block';
	 //获得事件对象
	 var ev=window.event||e;
	 //获得鼠标相对于事件源的距离
	 var left=ev.offsetX||ev.layerX;
	
	 var top=ev.offsetY||ev.layerY;
	 //将鼠标的位置赋值给选中区域
	  var box_left=left-(box.offsetWidth/2);
	  var box_top=top-(box.offsetHeight/2);
	  //判断选中区域的边界
	  if(box_left<0){
	  	box_left=0;
	  }
	  if(box_left>112){
	  	box_left=112;
	  } 
	  if(box_top<0){
	  	box_top=0;
	  }
	  if(box_top>211){
	  	box_top=211;
	  }
	  //将选中区域的位置赋值回去
	  box.style.left=box_left+'px';
	  box.style.top=box_top+'px';
	  
	  //设置右边图片边距
	  pic.style.left=box_left*(-256/112)+'px';
	  pic.style.top=box_top*(-482/211)+'px';
	 };
	 //设置移出事件
	 gaizi.onmouseout=function(){
	 	box.style.display='none';
	 	right.style.display='none';
	 }
}

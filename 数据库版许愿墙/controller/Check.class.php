<?php

class Check{
    protected $img;
    protected $size=40;
    protected $angel;
    protected $bkg_color;
    protected $num=4;
    protected  $line_num=40;
    protected $dot_num=400;
    protected $color;
    protected $font='libs/font.ttf';
    protected $seed='qwertyupasdfghjkxcvbnm3456789';
    protected $str_show;

    public function __construct(){
        header('content-type:image/png');

    }
    public function show($secai,$x=300,$y=150){
//        1.创建画布

        $this->__creatbkg($secai,$x,$y);

//        2.填写文字
            $this->__write($x,$y);

//        3.画干扰线
            $this->__line($x,$y);
//        4.画干扰点
           $this->__dot($x,$y);

//        5.输出
        imagepng($this->img);
//        6.销毁
        imagedestroy($this->img);
    }



    //        创建画布
    private  function __creatbkg($secai,$x,$y){
        $this->img=imagecreatetruecolor($x,$y);
    //        配色
        $this->bkg_color=imagecolorallocate($this->img,0,0,hexdec($secai));
    //        给画布填充颜色
        imagefill($this->img,0,0,$this->bkg_color);
    }

//    写字
    private function __write($x,$y){
        $code='';
        for ($i=0;$i<$this->num;$i++){
//            每次写一个数字就存入session中
            $this->color=imagecolorallocate($this->img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
            $this->angel=mt_rand(-60,60);
            $this->str_show=$this->seed[mt_rand(0,strlen($this->seed)-1)];
            $code.=$this->str_show;
            $s=$i*$x/4+20;
            imagettftext($this->img,$this->size,$this->angel,$s,$y/2+20,$this->color,$this->font,$this->str_show);
        }
        $_SESSION['code']=$code;
    }

//    画干扰线
   private function __line($x,$y){
       for($i=0;$i<$this->line_num;$i++){
           $this->color=imagecolorallocate($this->img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
           imageline($this->img,mt_rand(0,$x),mt_rand(0,$y),mt_rand(0,$x),mt_rand(0,$y),$this->color);
       }

   }

//   画干扰点

    private function __dot($x,$y){
        for($i=0;$i<$this->dot_num;$i++){
            $this->color=imagecolorallocate($this->img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
            imagesetpixel($this->img,mt_rand(0,$x),mt_rand(0,$y),$this->color);
        }
    }

}


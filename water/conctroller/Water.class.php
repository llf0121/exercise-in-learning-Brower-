<?php
header('content-type:text/html;charset=utf-8');


class Water{
    private $img;
    private $water;
    private $source='water.png';
    private $left;
    private $top;
    private $imgw;
    private $imgh;
    private $waterw;
    private $waterh;



    public function __construct(){
        header('content-type:image/png');
    }

    public function  show($aim){
    //        1.加载图片资源
            $this->__aimload($aim);
//              2.加载水印资源
            $this->water=imagecreatefrompng($this->source);
//              3.设置水印位置
            $this->__setposition();
//            4.合并
            imagecopymerge($this->img,$this->water,$this->left,$this->top,0,0,$this->waterw,$this->waterh,40);
//            5.输出
            imagepng($this->img);
//            6.销毁
            imagedestroy($this->img);
           }



       private function __aimload($aim){
           switch(pathinfo(basename($aim))['extension']){
               case 'gif':
                   $this->img=imagecreatefromgif($aim);
                   break;
               case 'png':
                   $this->img=imagecreatefrompng($aim);
                   break;
               default :
                   $this->img=imagecreatefromjpeg($aim);
                   break;
            }

        }

    private function __setposition(){
        $this->imgw=imagesx($this->img);
        $this->imgh=imagesy($this->img);
        $this->waterw=imagesx($this->water);
        $this->waterh=imagesy($this->water);
        $this->left=$this->imgw - $this->waterw;
        $this->top=$this->imgh-$this->waterh;

    }


}

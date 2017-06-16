<?php
header('content-type:text/html;charset=utf-8');

class Suolve{
    private $witdh=200;
    private $height;
    private $ori_w;
    private $ori_h;
    private $img;
    private $ori;
    private $dir='thumb';
    private $thumb_name;



    public function suo($img){
//        1.引入原图
        $this->__insert($img);
//        2.创建画布
        $this->__create_box();
//        3.合并
        $this->__combie();
//        4.输出并存储
        $this->__output($img);
//        5.销毁
        imagedestroy($this->img);
    }

    private function  __insert($img){
        switch(pathinfo(basename($img))['extension']){
            case 'gif':
                $this->ori=imagecreatefromgif($img);
                break;
            case 'png':
                $this->ori=imagecreatefrompng($img);
                break;
            default :
                $this->ori=imagecreatefromjpeg($img);
                break;
        }
    }


    private  function __create_box(){
//        获得原图大小
            $this->ori_w=imagesx($this->ori);
            $this->ori_h=imagesy($this->ori);
            $this->height=($this->witdh/$this->ori_w)*$this->ori_h;
            $this->img=imagecreatetruecolor($this->witdh,$this->height);
    }

    private function __combie(){
        imagecopyresized($this->img,$this->ori,0,0,0,0,$this->witdh,$this->height,$this->ori_w,$this->ori_h);
    }

    private  function __output($img){
        is_dir($this->dir)||mkdir($this->dir,0777,true);
//        获得最终文件名
        $this->thumb_name=$this->dir.'/'.pathinfo(basename($img))['filename'].'thumb.'.pathinfo(basename($img))['extension'];
        imagepng($this->img,$this->thumb_name);
    }

}
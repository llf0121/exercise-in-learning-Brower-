<?php
header('content-type:text/html;charset=utf-8');

class Fileupload{
    private $type=array('jpg','jpeg','png','bmp','gif');
    private $to_file='../lib/data/';

    public function up()  {
//    需要执行3个功能
        // 1.数据重组
        $combie = $this->__combie();
        //2.文件过滤
        //如果过滤没问题就继续移动，如果过滤失败就报错
        $err=$this->__filter($combie);
        if($err[0]!=6) {
            $this->__error($err);
            return false;
        }
        $result = array();
        foreach ($combie as $k => $v) {//3.文件移动
            $result[] = $this->__filemove($v);
        }
        $this->__error($err);
        return $result;//将最后移动完毕的地址返回
    }





    private function __combie(){
//        将获得file数据重新组合成数组
        $combie=array();
        echo '<br/>';echo '<br/>';echo '<br/>';
       for ($i=0;$i<count($_FILES['file']['name']);$i++){
            $combie[]=array(
                'name'=>$_FILES['file']['name'][$i],
                'type'=>$_FILES['file']['type'][$i],
                'tmp_name'=>$_FILES['file']['tmp_name'][$i],
                'error'=>$_FILES['file']['error'][$i],
                'size'=>$_FILES['file']['size'][$i],
            );
       }
       return $combie;
    }


    private function __filter($arr){
//        对重组后的数据进行过滤判断
/*  1.上传的文件是否符合要求上传的文件类型
 *  2.上传的文件大小是否符合要求上传的大小
 */
        $total=0;//所有上传文件总大小
        foreach ($arr as $k => $v) {
//                获得文件类型
            switch(true){
                case $v['error']==4:
                    $error=array('4','no_file',$v['name'],'no file');
                    return $error;//返回错误号
                case $v['error']==3:
                    $error=array('3','up_error',$v['name'],'文件部分上传');
                    return $error;//返回错误号
                case $v['error']==2:
                    $error=array('7','html_size_error',$v['name'],'文件大小超出表单界限');
                    return $error;//返回错误号
                case $v['error']==1:
                    $error=array('8','sever_size_error',$v['name'],$v['size']);
                    return $error;//返回错误号
                case !in_array(pathinfo($v['name'])['extension'], $this->type):
                    $error = array('2', 'type_error',$v['name'], $v['type']);
                    return $error;//返回错误号
                case $v['size'] > 2 * pow(1024, 2):
                    $error = array('1', 'single_size_error',$v['name'], $v['size']);
                    return $error;//返回错误号
                default:
                    $total = $total + $v['size'];
            }
        };
        if($total>8*pow(1024,2)){
            $error=array('5','total_size_error','all',$total);
            return $error;//返回错误号
        }else{
            $error=array('6','no_error','all','成功');
            return $error;
        }
    }


    private function __filemove($arr){
    //            组合新地址
        $ext=$this->to_file.time().$arr['size'].mt_rand(1,10000).'.'.pathinfo($arr['name'])['extension'];
//        移动之前判断文件目录是否存在
        is_dir(dirname($ext))||mkdir(dirname($ext),0777,true);
//        移动文件
        move_uploaded_file($arr['tmp_name'],$ext);
        return $ext;
    }

    private  function __error($arr){
            switch ($arr[0]){
                case 1:
                   echo "错误号：{$arr[0]}<br/>你上传的".$arr[2]."文件大小为".$arr[3]/pow(1021,2)."M,已超出要求，请重新选择文件";
                   break;
                case 2:
                     echo"错误号：{$arr[0]}<br/>你上传的".$arr[2]."文件类型为{$arr[3]},不符合规定,必须是jpg,jpeg,png,bmp,gif中的一种";
                    break;
                case 3:
                    echo "错误号：{$arr[0]}<br/>文件部分上传";
                    break;
                case 4:
                    echo "错误号：{$arr[0]}<br/>没有文件被上传";
                    break;
                case 5:
                    echo "错误号：{$arr[0]}<br/>你上传的文件总大小为".$arr[3]/pow(1024,2)."M,已超出要求，请重新选择文件";
                    break;
                case 6:
                    echo "上传文件成功";
                    break;
                case 7:
                    echo "错误号：{$arr[0]}<br/>你上传的文件总大小已超出表单界限值，请重新选择图片";
                    break;
                case 8:
                    echo "错误号：{$arr[0]}<br/>你上传的{$arr[2]},文件大小已超出服务器界限值，请重新选择图片";
                    break;
            }


    }


}
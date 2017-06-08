<?php
include 'fileCopy.php';
include_once 'fileDelete.php';

//创建一个目录移动的函数，传入要移动的文件的路径，和目标路径
//第一个参数为要移动的文件路径
//第二个参数为移动的目的地
//整体思路：
//1.先写好文件复制函数
//2.将文件复制到目标地点
//3.删除原来的文件
function dirMove($a,$b){

    //将文件复制到目标地点，然后删除原来的文件
        fileCopy($a,$b);
         fileDelete($a);
};

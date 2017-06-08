<?php


//创建一个函数，能够传入一个文件路径，然后递归删除所有文件，
function fileDelete($str){

//        判断传进来的是文件还是目录,如果是文件直接删除，如果是目录就递归删除
    if (is_dir($str)) {//是目录就递归
//    首先罗列出文件内所有的文件
        $re = glob($str . '/*');
//    对得到的数组进行遍历
        foreach ($re as $k => $v) {
//       判断遍历到的是否为目录，如果是目录就调用函数delete(),
//       如果是文件就执行unlink()

            is_dir($v) ?  fileDelete($v) : unlink($v);
        }
//    如果传入的目录中没有文件，则调用函数rmdir();
        rmdir($str);
    }
    if(!is_dir($str)){//是文件就删除
        unlink($str);
    }
}

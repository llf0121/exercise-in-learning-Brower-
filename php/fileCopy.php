<?php

include 'fileDelete.php';
//创建一个从($a)复制文件到($b)的函数
//第一个参数为要复制的文件路径
//第二个参数为复制的目的地
//整体思路：
//目标地点如果有同名文件，则先删除已存在文件，再将文件复制到此处

            function fileCopy($a,$b){
//        获得文件或目录名字
                $a_name = basename($a);
//        判断b处是否有a，如果有就先删除b处的a
                $b_name=$b . '\\' . $a_name;
                if (file_exists( $b_name)) {
//                   删除($b处的)文件
                    fileDelete($b_name);
                }
                //然后将($a处的)文件复制到此处
//               判断$a是文件或者是目录
                    if (is_dir($a)) {//如果是目录则递归进入
//                       在$b处创建一个目录
                        mkdir( $b_name,'0777');
//                        将原来文件罗列出来
                        $re_a = glob($a . '/*');
//                        对得到的结果进行遍历
                        foreach ($re_a as $k => $v) {
                            fileCopy($v,$b_name);
                        }
                    }
                     if(!is_dir($a)){
                        copy($a,$b_name);
                     }
            }



            $str='libei';
            $str2='C:\Users\king\Desktop';

            fileCopy($str,$str2);
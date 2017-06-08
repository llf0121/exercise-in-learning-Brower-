<?php
header('content-type:text/html;charset=utf-8');



//2、创建操作网站配置文件的C函数
//	1、导入配置
//	C($syaConfig);
//	2、修改单项配置
//	C('CODE_LEN','20');
//	3、读取相关配置内容
//	C('CODE_LEN');


//假设系统配置
$sysConfig = array(
    'CODEL_LEN'=>'4',
    'CODEL_BG'=>'black',
    'CODEL_WORDS'=>'123456789ABCDEF'
);




function C($a,$b=null){
    global $sysConfig;
//    如果只传入一个参数，且参数为数组，则说明要导入自定义的配置
    if(isset($a)&&!isset($b)&&is_array($a)){
//        将两个数组合并
       $sysConfig=array_merge($sysConfig,$a);
        return $sysConfig;
    };



//    如果传入两个参数，且都为字符串，则说明要修改单项配置或查询
    if(isset($a)&&isset($b)&&is_string($a)&&is_string($b)){
//        判断传入的$a,$b是否为原数组的键名

//        如果$a和$b都是键名，则输出对应的键值
       if( array_key_exists($a,$sysConfig)&&array_key_exists($b,$sysConfig)){
            echo "$a".'=>'."$sysConfig[$a]".'<br/>';
            echo "$b".'=>'."$sysConfig[$b]".'<br/>';
       };
//       如果$a是键名,$b不是，则说明要修改单项配置
       if(array_key_exists($a,$sysConfig)&&!array_key_exists($b,$sysConfig)){
            $sysConfig[$a]=$b;

       }

       if(!array_key_exists($a,$sysConfig)&&!array_key_exists($b,$sysConfig)){
            echo '你输入的参数有误，请重新输入';
       }

        return $sysConfig;
    };




//    如果传入一个参数，说明要查询
    if(isset($a)&&!isset($b)&&is_string($a)){
        if( array_key_exists($a,$sysConfig)){
            echo "$a".'=>'."$sysConfig[$a]".'<br/>';
        }else{
            echo '你输入的参数不存在，请重新输入';
        }
    };
}



//$useConfig = array(
//    'CODEL_LEN'=>'3',
//    'CODEL_BG'=>'white',
//);
//
//C($useConfig);
//print_r($sysConfig);



//C('CODEL_LEN','CODEL_BG');


//C('CODEL_LEN');


//C('CODEL');


//C('CODEL_LEN','20');
//print_r($sysConfig);
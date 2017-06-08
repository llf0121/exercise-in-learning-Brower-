<?php
header('content-type:text/html;charset=utf-8');


function toUpper($arr){
    //将数组中所有的键名都转成大写
    $re= array_change_key_case($arr,CASE_UPPER);
    foreach ($re as $k=>$v){

        if(is_array($v)){
            $re[$k]=toUpper($v);
        }
    }

    return $re;

}


$arr1=array('one'=>'1',
            'two'=>array(
                        'name'=>'jack',
                        'home'=>array(
                                        'pro'=>'shanxi',
                                        'city'=>'ankang'
                                    )
                         ),
    );
print_r(toUpper($arr1));
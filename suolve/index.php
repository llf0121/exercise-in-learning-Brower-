<?php
header('content-type:text/html;charset=utf-8');

include 'controller/Suolve.class.php';
include 'Upload/conctroller/Fileupload.class.php';

$small=new Suolve();
$small->suo('3.jpg');
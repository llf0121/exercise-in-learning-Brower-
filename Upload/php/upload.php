<?php
header('content-type:text/html;charset=utf-8');
include '../conctroller/Fileupload.class.php';
include '../lib/functions.php';

$upload=new Fileupload;

p($upload->up());
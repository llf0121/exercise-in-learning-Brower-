<?php
header('content-type:text/html;charset=utf-8');

include 'libs/functions.php';

$c=isset($_GET['c'])?ucfirst($_GET['c']):'Index';
$a=isset($_GET['a'])?$_GET['a']:'entry';

(new $c)->$a();



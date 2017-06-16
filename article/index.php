<?php
header('content-type:text/html;charset=utf-8');
include 'controller/Article.class.php';
include  'controller/Fileupload.class.php';

$article=new Article;
$src=[];
if(isset($_GET['src'])){
    $file=new Fileupload;
    $src=$file->up();
    if(!$src){
        die;
    }
    $path=isset($_GET['path'])?$_GET['path']:'index';
    $article->$path($src[0]);
}else {
    $path = isset($_GET['path']) ? $_GET['path'] : 'index';
    $article->$path();
}























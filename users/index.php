<?php


var_dump(__FILE__);
define('DX_ROOT_DIR', dirname(__FILE__) . '/');
define('DX_ROOT_PATH', basename(dirname(__FILE__) . '/'));
var_dump(DX_ROOT_PATH);

$request = $_SERVER['REQUEST_URI'];
$request_home = '/'.DX_ROOT_PATH;

var_dump($request);

if(!empty($request)){
    if(0===strpos($request,$request_home)){
        $request=substr($request, strlen($request_home));

        var_dump($request);
    }
}



session_start();
if(!isset($_SESSION['count'])){
    $_SESSION['count'] =0;
}

echo "Session counter: ".++$_SESSION['count']."</br>";

if(isset($_COOKIE['user'])){
    echo "Welcome".$_COOKIE['user']."!";
}else{
    echo "Welcome Joe!@";
}


?>
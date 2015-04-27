<form method="post" action="index.php">
    First Name: <input type="text" name="first-name"/>
    Last Name: <input type="text" name="last-name">
    <input type="submit" value="go"/>
</form>


<?php
// in cmd enter chrome --allow-file-access-from-files

//var_dump($_SERVER);
//var_dump(__FILE__);
define( 'DX_DS', DIRECTORY_SEPARATOR );
define('DX_ROOT_DIR', dirname(__FILE__) . '/');
define('DX_ROOT_PATH', basename(dirname(__FILE__) . '/'));

$request = $_SERVER['REQUEST_URI'];
$request_home = '/' . DX_ROOT_PATH;

var_dump($request);
echo "--------------";

$controller = 'master';
$method = 'index';
$param = array();

include_once 'controllers/master.php';

if (!empty($request)) {
    if (0 === strpos($request, $request_home)) {
        $request = substr($request, strlen($request_home));

        $components = explode('/', $request, 3);

        if (1 < count($components)) {
            list($controller, $method) = $components;

            if (isset($components[2])) {
                $param = $components[2];
            }

            include_once 'controllers/' . $controller . 'php';
        }
    }
}

var_dump($controller);
var_dump($method);
var_dump($param);


$controller_class = '\Controllers\\' . ucfirst($controller) . '_Controller';
$instance = new $controller_class();

if(method_exists($instance, $method)){
    call_user_func_array(array($instance, $method), array($param));
}


session_start();
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
}

echo "Session counter: " . ++$_SESSION['count'] . "</br>";

if (isset($_COOKIE['user'])) {
    echo "Welcome " . $_COOKIE['user'] . "!";
} else {
    echo "Welcome Joe!@";
}
setcookie("user", "momo", time() +5);
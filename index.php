<?php
require __DIR__ . "/inc/bootstrap.php";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );
$routes = ['addToCart','getProduct'];

if (!isset($uri[3]) || (isset($uri[2]) && !in_array($uri[3], $routes))) {
    header("HTTP/1.1 404 Not Found");
    exit();
}
require __DIR__ . "/Controller/Api/ProductController.php";

$objFeedController = new ProductController();

switch ($uri[3]){
    case 'addToCart':
        $strMethodName = $uri[3].'Action';
        break;
    case 'getProduct':
        $strMethodName = $uri[3];
}
$objFeedController->{$strMethodName}();




?>
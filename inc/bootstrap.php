<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

define("PROJECT_ROOT_PATH", __DIR__ . "/");
// include main configuration file
require_once PROJECT_ROOT_PATH."config.php";
// include the base controller file
require_once PROJECT_ROOT_PATH . "../Controller/Api/BaseController.php";
// include the use model file
require_once PROJECT_ROOT_PATH . "../Model/ProductModel.php";
<?php
set_include_path("./src");
require_once ("Router.php");
require_once ("model/QuizStorageMySQL.php");
require_once("model/AccountStorageMySQL.php");
require_once("model/AuthenticationManager.php");


/** LOCAL DATABASE !!!*/

$user="root";
$pass="";
$pdo=new PDO("mysql:host=localhost;dbname=partnerquest", $user, $pass);

/** END ------- */


$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$quizStorageSQL=new QuizStorageMySQL($pdo);
$accountStorageSQL = new AccountStorageMySQL($pdo);
$authentificationManager = new AuthenticationManager($accountStorageSQL);
$router = new Router();
$router->main($quizStorageSQL,$accountStorageSQL,$authentificationManager);
?>

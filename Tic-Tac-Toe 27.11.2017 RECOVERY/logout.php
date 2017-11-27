<?php
include 'authorize.php';

$db = json_decode(file_get_contents("users.json"), true);
$db[$user_record["login"]]["status"]= "offline";


file_put_contents("users.json", json_encode($db));
setcookie("token", $token, time () - 1, "auth.php");
header('Location: login.php');  

?>
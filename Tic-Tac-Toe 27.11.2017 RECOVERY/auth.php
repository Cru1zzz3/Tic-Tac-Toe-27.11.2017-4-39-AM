<?php

function randomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 32; $i++) {
        $randstring = $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}


$login = $_GET["login"];
$pass = $_GET["pass"];

$db = json_decode(file_get_contents("users.json"), true);


$found = false;
 foreach ($db as $name){
 	if (($name["login"] == $login) && ( $name["pass"] == $pass))
 		{
 			$found = true;
 			if (isset($db[$login])){
 				$token = randomString();
 				setcookie("token", $token);
 				$db[$login]["token"] = $token;
 				$db[$login]["status"] = "online";
 				file_put_contents("users.json", json_encode($db));
 			}
 		}
 	if ( $found == true){
 		header('Location: index.php?status=online');
 	}
 	else { 
 			header('Location: login.php?error=1');
 	}


 }
?>

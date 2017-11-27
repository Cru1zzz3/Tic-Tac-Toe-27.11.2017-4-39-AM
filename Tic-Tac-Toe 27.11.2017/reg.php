<?php

function randomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 32; $i++) {
        $randstring =  $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}


$login = $_GET["login"];
$found = false;

$db = json_decode(file_get_contents("users.json"), true);

foreach ($db as $record) {
	if (isset($record["login"])){
        if ($record["login"]== $login){
            $found = true;
        break;
        }
		
	}
}
	
if ($found == true){
	 header ('Location: registration.php?error=1');
	}
else {
$db[$login]["login"]= $_GET["login"];
$db[$login]["pass"]= $_GET["pass"];
$db[$login]["status"]= "online";
$db[$login]["rating"]= "1400";
if (isset($db[$login]["games"]))
{
    }
    else {
  $db[$login]["games"]["game_id"] = NULL;
}
$token = randomString();
setcookie("token", $token);
$db[$login]["token"] = $token;
file_put_contents("users.json", json_encode($db));
header('Location: index.php?status=online');
}

?>

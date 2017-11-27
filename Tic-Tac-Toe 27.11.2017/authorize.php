<?php

if (isset($_COOKIE['token']))
{
	
	$token = $_COOKIE['token'];

	$db = json_decode(file_get_contents("users.json"), true);

	$found = false;
	
	foreach ($db as $record) {
		if (isset($record["token"])){
			if ($record["token"] == $token){
				$found = true;
				$user_record = $record;
				break;
			}
			else $record["token"] = NULL;
		}
	}

	if ($found){
		$user_record = $record;

	}
	else {
		header('Location: registration.php');
	}

}
else
{
	header('Location: login.php');
}
?>
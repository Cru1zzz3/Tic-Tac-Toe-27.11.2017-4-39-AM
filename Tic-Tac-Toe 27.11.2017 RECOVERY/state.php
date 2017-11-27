<?php

$db = json_decode(file_get_contents("games.json"), true);

if (isset($db["game".$_GET["game_id"]])){
	//print json_encode($db["game".$_GET["game_id"]]["moves"]);
	print json_encode($db["game".$_GET["game_id"]]);
}

?>
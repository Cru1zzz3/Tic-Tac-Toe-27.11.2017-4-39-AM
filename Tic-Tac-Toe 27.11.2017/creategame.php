<?php 


$gameDB = json_decode(file_get_contents("games.json"), true);



file_put_contents("games.json", json_encode($db));


?>
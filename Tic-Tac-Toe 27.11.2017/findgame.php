<?php

include 'authorize.php';



$gameDB = json_decode(file_get_contents("games.json"), true);

$status = $_GET["status"];

$db = json_decode(file_get_contents("users.json"), true);



		$activeGamesCount = 0;
		$findingGamesCount = 0;

		foreach ($gameDB as $gameid) {
			if (isset($gameid)){
				if ($gameid["status"] == 'playing'){
					$activeGamesCount++;
				}

				if ($gameid["status"] == 'finding'){
					$findingGamesCount++;
				}

				if ($gameid["activePlayers"] == '0'){
					// unset($gameDB["game_".$db[$user_record["login"]]["games"]["game_id"]]);
				}
			
			}	
		}


	if ($status == "find"){

		$db[$user_record["login"]]["status"] = "finding"; 

		

		if ($findingGamesCount == 0){
			$gameDB["game_".($activeGamesCount+1).""]["status"] = 'finding';
			
			$gameDB["game_".($activeGamesCount+1).""]["activePlayers"] = '1';
			$gameDB["game_".($activeGamesCount+1).""]["players"]["X"] = $db[$user_record["login"]]["login"];
			$gameDB["game_".($activeGamesCount+1).""]["players"]["O"] = NULL;
			$db[$user_record["login"]]["games"]["game_id"] = ''.($activeGamesCount+1).'';

		}

		if ($findingGamesCount != 0){
			foreach ($gameDB  as $activegames) {
				if (isset($activegames)){
						if ($gameid["status"] == 'finding'){

							if (empty($gameDB["game_".($activeGamesCount+1).""]["players"]["X"])){

								

								$gameDB["game_".($activeGamesCount+1).""]["players"]["X"] = $db[$user_record["login"]]["login"];

								
							}

							else { 
								

								// if X player wants to find anoter game it will not add him as O player in already exited game

								if (($gameDB["game_".($activeGamesCount+1).""]["players"]["X"]) !=  ($db[$user_record["login"]]["login"])){

								$gameDB["game_".($activeGamesCount+1).""]["players"]["O"] = $db[$user_record["login"]]["login"];
								$gameDB["game_".($activeGamesCount+1).""]["activePlayers"] = '2';
								$gameDB["game_".($activeGamesCount+1).""]["status"] = 'playing';

								$db[$user_record["login"]]["status"] = 'playing';
								$db[$user_record["login"]]["games"]["game_id"] = ''.($activeGamesCount+1).'' ;

								 $db[$gameDB["game_".($activeGamesCount+1).""]["players"]["X"]]["status"] = 'playing';

								 $db[$gameDB["game_".($activeGamesCount+1).""]["players"]["X"]]["games"]["game_id"] = ''.($activeGamesCount+1).'' ;
								}
								
							}
						
						}
				}
			}
		}

		file_put_contents("users.json", json_encode($db));
		file_put_contents("games.json", json_encode($gameDB));

		// header ('Location: index.php?status=finding&findingGamesCount='.$findingGamesCount.'&activegames='.$activeGamesCount.'');
		header ('Location: index.php?status=finding');

	}

	if ($status == "stopfind"){

		if ( $gameDB["game_".$db[$user_record["login"]]["games"]["game_id"].""]["players"]["X"] == $db[$user_record["login"]]["login"] )

			//$playerX = ($gameDB["game_".$db[$user_record["login"]]["games"]["game_id"].""]["players"]["X"]);

	        //	header("Location: index.php?playerX='.$playerX.'");

		{
			
			 $gameDB["game_".$db[$user_record["login"]]["games"]["game_id"].""]["players"]["X"] = NULL;
			 
		}
		
		if ( ($gameDB["game_".$db[$user_record["login"]]["games"]["game_id"].""]["players"]["O"]) == ($db[$user_record["login"]]["login"]) )

		{	 
			 $gameDB["game_".$db[$user_record["login"]]["games"]["game_id"].""]["players"]["O"] = NULL;
			
		}

			$gameDB["game_".$db[$user_record["login"]]["games"]["game_id"].""]["activePlayers"] = '0';
			$gameDB["game_".$db[$user_record["login"]]["games"]["game_id"].""]["status"] = NULL;
		
		if ($gameDB["game_".$db[$user_record["login"]]["games"]["game_id"].""]["activePlayers"] == "0"){

			unset($gameDB["game_".$db[$user_record["login"]]["games"]["game_id"].""]);
		}


		$db[$user_record["login"]]["status"] = "online";
		$db[$user_record["login"]]["games"]["game_id"] = NULL; 
	

	 //	echo ($gameDB["game_".$playerActiveGame.""]["players"]["X"]);
		// echo ( $gameDB["game_".($db[$user_record["login"]]["games"]["game_id"]).""]["players"]["X"] );

		
		
					
		

		
	

	//	gamesMonitoring();

		file_put_contents("users.json", json_encode($db));
		file_put_contents("games.json", json_encode($gameDB));










	   header ('Location: index.php?status=online');





	}








?>
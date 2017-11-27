
<table id="onlineTable">
			
				<tr>
				<th> Login  </th>
				<th> Status </th> 
				<th>  Rating </th> 
				</tr>
				<?php 
				global $count;	
				
				$db = json_decode(file_get_contents("users.json"), true);

				foreach ($db as $record) {
					if (isset($record["login"])){
						if ($record["status"] != "offline"){
							print ("<tr>");
							print ("<td>".$record["login"]."</td>");
							print ("<td>".$record["status"]."</td>");
								if ($record["status"] == "finding"){
								$count++;
								findingQuery($record, $count);
								}
							print ("<td>".$record["rating"]."</td>");
							print ("</tr>");
							}

						}	
					}


				
				
				file_put_contents("users.json", json_encode($db));

				function findingQuery($record, $count){

					$playersQuery = json_decode(file_get_contents("playersQuery.json"), true);

					$playersQuery["player_".$count.""] = $record["login"];


					file_put_contents("playersQuery.json", json_encode($playersQuery));			

				}


				?> 	
</table>
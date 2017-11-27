<?php
	include 'authorize.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>tic-tac-toe</title>
		<style type="text/css">
			#turn {
				color : red;
			}

			#board td {
				text-align: center;
			}

		</style>

		<script type="text/javascript" src="jquery-3.2.1.js"></script>
	</head>

	<body>
		Hello, <?php
		print $user_record["login"]."<br>";
		print "your rating is:". $user_record["rating"]."<br>";
		print "status: ".$user_record["status"]."<br>";
		?>
		<table border="1">
			<tr><td>game_id</td></tr>
			<tbody>
			<?php

				foreach ($user_record["games"] as $game_id) {
					if(isset($game_id["game_id"])){
						print "<tr><td><a href= game.php?game_id=".$user_record["games"]["game_"]." ".$user_record["games"]["game_id"]."</a></td></tr>";
					}
					else print "<tr><td>NO ACTIVE GAMES</td></tr>";
				}
			?>
			</tbody>

		</table>



<hr> <table id="onlineTable" border="1"> </table> </hr>
	
<script>

   $(document).ready(function(){
   		refreshTable();
	});

	
   function refreshTable(){
   	$('#onlineTable').load('onlineTable.php',function(){
   		setTimeout(refreshTable, 3000);
   	});
   }


	</script>



		<hr>
			<form action = "logout.php">

 				 <button type="submit"  > Logout </button>
 				 
			</form>
			</hr> 


<!--
		<hr>
			<form action = "creategame.php">

 				 <button type="submit" name="game" value="create" > Create game </button>
 				 
			</form> 
		</hr>

			<form action = "findgame.php">

 				 <button type="submit" name="state" value="find"> Find game </button>
 				 
			</form> 

			<form action = "findgame.php">

 				 <button type="submit" name="state" value="stop" > Stop find game </button>
 				 
			</form> 
		</hr>

 --> 

	
	<hr>
		<form action = "findgame.php">
		<?php if ($_GET["status"] == 'online')
		{
			echo('<button type="submit" name ="status" value ="find"> Play game </button>');
		} 
		?>	
		</form>
	</hr>

	<hr>
		<form action = "findgame.php">
		<?php if ($_GET["status"] == 'finding'){
			echo('<button type="submit" name ="status" value ="stopfind"> Stop find game </button>');
		}
		 ?>
		</form>
	</hr>










		<hr>
      <form action ="clear.php">
         <button type="submit"> cookie </button>
      </form>
</hr>

	</body>
	
</html>
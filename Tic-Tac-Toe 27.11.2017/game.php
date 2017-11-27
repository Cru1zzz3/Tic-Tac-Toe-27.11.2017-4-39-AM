<?php
 include 'authorize.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>tic-tac-toe</title>

		<style>
		#board td {
			width: 20px;
		}
		</style>

		<script type="text/javascript" src="jquery-3.2.1.js"></script>
	</head>

	<body onload="initfield();">
		<script>

			var sign = 'X';

			function poll(){
				$.ajax({
				url : "state.php?game_id= <?php print $_GET['game_id'] ?>",
				type : "GET",
				dataType: "json",
				success : function(data){
					$("#turn").html(data.players[data.turn] + "'s turn");
					for (move in data.moves){
						$("#"+move).html(data.moves[move]);
					}
				}
			})				
				setTimeout(poll, 1000)
			}

			setTimeout(poll, 1000)

			function initfield(){
				for (let r = 0; r < 50; r++){
					let row = "";
					for (let c = 0; c < 50; c++){
						row += "<td id='r"+r+"c"+c+"' onclick = \"onCellClick(this)\">&nbsp</td>"
					}
					$("#board").append("<tr>" + row + "</tr>");
				}
				console.log('field created');
			}

			$.ajax({
				url : "state.php?game_id=<?php print $_GET['game_id'] ?>",
				type : "GET",
				dataType: "json",
				success : function(data){
					for (move in data.moves){
						$("#"+move).html(data.moves[move]);
					}
				}
			})

			function onCellClick(el){
				$.ajax({
					url : "move.php?cell="+el.id+"&game_id=<?php print $_GET['game_id'] ?>",
					type : "GET",
					dataType: "json",
					success : function(data){
							//console.log("ok");
							if (data.result == "OK")
								$("#"+el.id).html(sign);
						}
					
				})				
			}

		</script>
	</body>

	Game: <?php print $_GET["game_id"]; ?>

	<div id="turn"></div>
	<table id="board" border="1">
	</table>
</html>
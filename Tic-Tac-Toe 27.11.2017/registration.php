<!DOCTYPE html>
<html>
	<head>
		<title> Registration</title>
	</head>

	<body>
  <b> Registration blank for Tic-Tac-Toe 3641 Stanislav Udartsev game</b>
  
 <form action="reg.php">

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="login" required> <br>
    <?php
      if (isset($_GET["error"])){
        
        echo ('Такой пользователь уже существует <br/>');

      } 
    ?>
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required><br>

      <label><b> Repeat password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required><br><br>

    <button type="submit">Register</button>
  </div>
</form> 

	</body>
</html>
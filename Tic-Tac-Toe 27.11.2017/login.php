

<!DOCTYPE html>
<html>
	<head>
		<title>login tic-tac-toe</title>
	</head>

	<body>
 <form action="auth.php">

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="login" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>

    <button type="submit">Login</button>
  </div>
</form> 
<?php
  if (isset($_GET["error"])){
    echo ('Неверные имя пользователя или пароль');
  } 
?>


<hr>
      <form action ="registration.php">
         <button type="submit"> Registration </button>
      </form>
    </hr>
    <hr>
  
<hr>
      <form action ="clear.php">
         <button type="submit"> cookie </button>
      </form>
</hr>
	</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Registration system </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
		<div class="header">
			<h2>Telegram User</h2>
		</div>
		<div class="container">

			<div>
				<h2 align="center">Table</h2>
			</div>
			<?php
				$con = mysqli_connect("localhost","root", "", "login"); 
				$select = "SELECT * FROM users";
				$result = mysqli_query($con, $select);
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					echo "<br>
						login: $row[login]";
						echo"<td>" . "<img src='" . $row['photo'] . "' ></img>" . "</td><br>
						Name: $row[name] <br>
						SecondName: $row[secondname]<br>
						Role: $row[role]<br>";
				}
				mysqli_close($con);
			?>
			<form class="" action="login.php">
				<button type="submit" class="btn" name="log">Login</button>
			</form>
		</div>	
</body>
</html>

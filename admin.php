<?php
	session_start();
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
		<div class="container">
			<label for=""> Table</label>
				<?php
				$login = $_SESSION['login'];
				$password = $_SESSION['password'];

				$con = mysqli_connect("localhost","root", "", "login"); 
				//if(isset($_POST['log'])){
					$login = mysqli_real_escape_string($con,$login);
					$password = mysqli_real_escape_string($con,$password);
				
							$select = "SELECT * FROM users";
							$result = mysqli_query($con, $select);
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
								$idnum = $row['id'];
								echo "<br>
								<form class='' action='User.php' method='POST'>
									<input type='hidden' name='id' value='$idnum'>
									<button type='submit' class='info_btn' name='log'>Change</button>
								</form>";
								
								echo "<br>
								<form class='' action='DeleteUser.php' method='POST'>
									<input type='hidden' name='id' value='$idnum'>
									<button type='submit' class='info_btn' name='log'>Delete</button><br>
								</form>";
								<br>
								echo "<br>
								Login: $row[login]";
								echo"<td>" . "<img src='" . $row['photo'] . "' ></img>" . "</td><br>
								Name: $row[name] <br>
								SecondName: $row[secondname]<br>
								Role: $row[role]<br>";
								
							}
				mysqli_close($con);
				?>
			
				
			<form class="" action="UserPage.php" method="POST">
				<button type="submit" class="btn" name="log">ChangeSettings</button>
			</form>
			<form class="" action="addUser.php" method="POST">
				<button type="submit" class="btn" name="log">Add User</button>
			</form>
		<a href="Logout.php">Log out</a>
		</div>	
</body>
</html>
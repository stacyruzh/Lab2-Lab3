 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
		$(document).on("click","#login_btn",function(){
			window.location.href="login.php";
		});
	});
	</script>	
</head>
<body>
	<div class="header">
		<h2>Telegram User</h2>
	</div>
	<form class="">
		<div class="container">
			<div>
				<h2 align="center">No such user</h2>
			</div>
			<!--<a href="GuestPage.php"> Login as a guest</a>-->
			<p>
				<a href="GuestPage.php">Login as a guest</a>
			</p>
			
			<button type="button" class="btn" id="btn">Return</button>
		</div>	
	</form>
</body>
</html>
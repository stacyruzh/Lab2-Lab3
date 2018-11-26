
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
	$(document).ready(function(){
    	$("#back").click(function(){
			window.location.href="index.html";
		});
	$(".info_btn").click(function(){
        	var ch_id=$(this).attr("id");
       		$.post("UserPage.php",{id:ch_id},function(data){
       			$("#section").html(data);
       		}, "html"
       		);
		}); 
    });
</script>	
<?php
session_start();
	$login = $_SESSION['login'];
	$password = $_SESSION['password'];
	$id = $_POST['id'];
	$role=$_SESSION['role'];
	$con = mysqli_connect("localhost","root", "", "login");
	//if(isset($_POST['log'])){
		$login = mysqli_real_escape_string($con,$login);
		$password = mysqli_real_escape_string($con,$password);
		$select = "SELECT * FROM users WHERE id='$id'";
		$result = mysqli_query($con, $select);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo "<br>
			login: $row[login]";
			echo"<td>" . "<img src='" . $row['photo'] . "' ></img>" . "</td><br>
			Name: $row[name] <br>
			SecondName: $row[secondname]<br>
			Role: $row[role]<br>";
		if($id==$_SESSION['id'] || $role=="admin"){
			echo "<br>";
			echo "<button type='button' class='info_btn' id='".$row['id']."'>Change</button>";
		}
		echo "<button type='button' class='del_btn' id='back'>Back</button><br>";
		
	//}
	mysqli_close($con);
?>
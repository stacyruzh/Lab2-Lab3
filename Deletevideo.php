<?php
	session_start();
	$id = $_POST['id'];
	
	$con = mysqli_connect("localhost","root", "", "login");
		//if(isset($_POST['log'])){
			$select = "DELETE FROM videos WHERE id='$id'";
			$result = mysqli_query($con, $select);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		//}
		
		mysqli_close($con);
		//header("Location: process.php");
		/*$id = $_POST['id'];

		$res=mysqli_query($db, "SELECT * FROM info WHERE id=$id");
		$row=mysqli_fetch_array($res);
		unlink("uploads/$row[image]"); //удаление картинки из папки 

		mysqli_query($db, "DELETE FROM info WHERE id=$id");
		header('location: media.php');*/
?>
	
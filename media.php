<?php
include("config.php");
?>

<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
	<title>Registration system </title>
	<link rel="stylesheet" type="text/css" href="style.css">

   <?php
    include("config.php");
 
    if(isset($_POST['but_upload'])){
       $maxsize = 5242880; // 5MB
 
       $name = $_FILES['file']['name'];
       $target_dir = "uploads/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");
       $con = mysqli_connect("localhost", "root", "", "login");

       // Check extension
       if( in_array($videoFileType,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            echo "File too large. File must be less than 5MB.";
          }else{
            // Upload
            $select = "INSERT INTO videos(name,location)
				VALUES('".$name."','".$target_file."')";

			$result = mysqli_query($con, $select);
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
       
              echo "Upload successfully.";
            }
          }

       }else{
          echo "Invalid file extension.";
       }
 
     }?>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script>
		$(document).ready(function(){
	    	$("#back").click(function(){
				window.location.href="index.html";
			});
	</script>

  </head>
  <body>
  	  <div class="header">
		<h2>Telegram User</h2>
	</div>

    <form method="post" action="" enctype='multipart/form-data'>
      <input type='file' name='file' />
      <input type='submit' value='Upload' name='but_upload'>
    </form>

	<div>
 
     <?php
     $fetchVideos = mysqli_query($con, "SELECT location FROM videos ORDER BY id DESC");
     while($row = mysqli_fetch_assoc($fetchVideos)){
       $location = $row['location'];
       echo "<div >";
       echo "<video src='".$location."' controls width='320px' height='200px' >";
       echo "</div>";
       echo " <form class='' href='Deletevideo.php' method='POST'>
		<input type='hidden' name='id'>
		<button type='submit' class='info_btn' name='log'>Delete</button>
		</form>";
     }?>


		<iframe width="560" height="315" src="https://www.youtube.com/embed/HqR9OThQa4A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

		<audio controls="controls">
			<source src="uploads/song.mp3" type="audio/mp3">
		</audio>

		<video width="560" height="315" controls="controls">
			<source src="uploads/video.mp4" type="video/mp4">
		</video>
    </div>

    <form class="" action="index.html">
			<button type="submit" class="media_btn" id="media_btn" name="log">Home</button>
	</form>

  </body>
</html>
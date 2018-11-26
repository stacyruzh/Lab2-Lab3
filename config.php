<?php

$con = mysqli_connect("localhost","root", "", "login"); 
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
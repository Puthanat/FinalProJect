<?php
include('server.php');

$Ch_ID = mysqli_real_escape_string($conn,$_POST['Ch_ID']);
$Co_H = mysqli_real_escape_string($conn,$_POST['Co_H']);
$Co_D = mysqli_real_escape_string($conn,$_POST['Co_D']);
$Co_Name = mysqli_real_escape_string($conn,$_POST['Co_Name']);

$query="INSERT INTO content(Ch_ID,Co_H,Co_D,Co_Name) VALUES('$Ch_ID','$Co_H','$Co_D','$Co_Name')";

if(mysqli_query($conn,$query)){
      echo "Complete";
}else{
      echo "error";
}
?>
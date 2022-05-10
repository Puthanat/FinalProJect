<?php
include('server.php');

$Ch_ID = mysqli_real_escape_string($conn,$_POST['Ch_ID']);
$Ch_Chapter = mysqli_real_escape_string($conn,$_POST['Ch_Chapter']);
$Ch_Category = mysqli_real_escape_string($conn,$_POST['Ch_Category']);
$Ch_Name = mysqli_real_escape_string($conn,$_POST['Ch_Name']);

$query="INSERT INTO checkpoint(Ch_ID,Ch_Chapter,Ch_Category,Ch_Name) VALUES('$Ch_ID','$Ch_Chapter','$Ch_Category','$Ch_Name')";

if(mysqli_query($conn,$query)){
      echo "Complete";
}else{
      echo "error";
}
?>
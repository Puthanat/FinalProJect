<?php
include('server.php');

$Ch_ID = mysqli_real_escape_string($conn,$_POST['Ch_ID2']);
$Co_H = mysqli_real_escape_string($conn,$_POST['Co_H2']);
$Co_D = mysqli_real_escape_string($conn,$_POST['Co_D2']);
$Co_Name = mysqli_real_escape_string($conn,$_POST['Co_Name2']);

$query="UPDATE content SET Co_Name='$Co_Name' WHERE Ch_ID=$Ch_ID AND Co_H=$Co_H AND Co_D=$Co_D";

if(mysqli_query($conn,$query)){
      echo "Complete";
}else{
      echo "error";
}
?>
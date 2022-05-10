<?php
include('server.php');

$id=$_POST['A_ID'];
$firstname = mysqli_real_escape_string($conn,$_POST['A_Name']);
$lastname = mysqli_real_escape_string($conn,$_POST['A_Lastname']);
$section = mysqli_real_escape_string($conn,$_POST['A_Section']);
if($id!=''){
$query="UPDATE account SET A_Name='$firstname',A_Lastname='$lastname',A_Section='$section' WHERE A_ID=$id";
}
if(mysqli_query($conn,$query)){
      echo "ok";
}else{
      echo "error";
}
?>


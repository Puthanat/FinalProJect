<?php
include('connection.php');
if(isset($_POST["A_ID"])){
      $id = mysqli_real_escape_string($conn, $_POST["A_ID"]);
	$sql = "SELECT * FROM checkid WHERE A_ID = '$id'";
	$result = mysqli_query($conn, $sql);
      if(!$result){
            echo 0;           
      }else if(mysqli_num_rows($result2)==0){
            echo 0;
      }else{
            echo 1; 
      }
} 
?>
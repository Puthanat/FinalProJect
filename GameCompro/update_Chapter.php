<?php
include('server.php');

$Ch_ID = mysqli_real_escape_string($conn,$_POST['Ch_ID2']);
$Ch_Name = mysqli_real_escape_string($conn,$_POST['Ch_Name2']);

$query="UPDATE checkpoint SET Ch_Name='$Ch_Name' WHERE Ch_ID=$Ch_ID";

if(mysqli_query($conn,$query)){
      echo "Complete";
}else{
      echo "error";
}
?>
<?php
include('server.php');

$Q_ID =$_POST['Q_ID'];
$Ch_ID = mysqli_real_escape_string($conn,$_POST['Ch_ID']);
$Q_Name = mysqli_real_escape_string($conn,$_POST['Q_Name']);
$Q_a = mysqli_real_escape_string($conn,$_POST['Q_a']);
$Q_b = mysqli_real_escape_string($conn,$_POST['Q_b']);
$Q_c = mysqli_real_escape_string($conn,$_POST['Q_c']);
$Q_d = mysqli_real_escape_string($conn,$_POST['Q_d']);
$Q_answer = mysqli_real_escape_string($conn,$_POST['Q_answer']);

if($Q_ID!=''){
      $query="UPDATE question SET Q_Name='$Q_Name',Q_a='$Q_a',Q_b='$Q_b',Q_c='$Q_c',Q_d='$Q_d',Q_answer='$Q_answer' WHERE Q_ID=$Q_ID";
}else{
      $query="INSERT INTO question(Ch_ID,Q_Name,Q_a,Q_b,Q_c,Q_d,Q_answer) VALUES('$Ch_ID','$Q_Name','$Q_a','$Q_b','$Q_c','$Q_d','$Q_answer')";
}

if(mysqli_query($conn,$query)){
      echo "Complete";
}else{
      echo "error";
}
?>
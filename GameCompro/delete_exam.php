<?php 
    require_once('server.php');
    $id=$_POST['id'];
    $sql="DELETE FROM question WHERE Q_ID = $id";
    $query=mysqli_query($conn,$sql);
?>
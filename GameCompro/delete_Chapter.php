<?php 
    require_once('server.php');
    $id=$_POST['id'];
    $sql="DELETE FROM checkpoint WHERE Ch_Chapter = $id";
    $query=mysqli_query($conn,$sql);
?>
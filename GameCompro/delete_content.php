<?php 
    require_once('server.php');
    $id=$_POST['id'];
    $id2=$_POST['id2'];
    $sql="DELETE FROM content WHERE Ch_ID = $id AND Co_H = $id2";
    $query=mysqli_query($conn,$sql);
?>
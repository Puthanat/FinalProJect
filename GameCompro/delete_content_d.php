<?php 
    require_once('server.php');
    $id  = $_POST['id'];
    $id2 = $_POST['id1'];
    $id3 = $_POST['id2'];
    $target= "css/images/";

    $sql = "SELECT * FROM content WHERE Ch_ID = $id AND Co_H = $id2 AND Co_D = $id3";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    $images =  $row['Co_Picture'];

    $sql2="DELETE FROM content WHERE Ch_ID = $id AND Co_H = $id2 AND Co_D = $id3";
    $query2=mysqli_query($conn,$sql2);
    if($query2){
      unlink($target.$images);
      echo "Complete";
      exit();
    }
?>
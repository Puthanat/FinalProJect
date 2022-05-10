<?php
include('connection.php');
if(isset($_POST["id"])){
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        $id2 = mysqli_real_escape_string($conn, $_POST["id2"]);
        $sql = "SELECT * FROM content WHERE Ch_ID = $id AND Co_H = $id2";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            echo "Ch_ID:".$row['Ch_ID']."|Co_H:".$row['Co_H']."|Co_D:".$row['Co_D']."|Co_Name:".$row['Co_Name']."*";     
            }
        }   
} 
?>
<?php
include('connection.php');

if(isset($_POST["S_Point"])){
        $id = mysqli_real_escape_string($conn, $_POST["A_ID"]);
        $point = $_POST["S_Point"];
        $point = $point * 10;
        $cid = mysqli_real_escape_string($conn, $_POST["id"]);
        //$now = date_create(timezone_open('Asia/Bangkok'))->format('Y-m-d H:i:s');
        $date = date_create('2000-01-01', timezone_open('Pacific/Nauru'));
        $now = date_create('now', timezone_open('Asia/Bangkok'))->format('Y-m-d H:i:s');
        $sql = "INSERT INTO score (A_ID,S_Point,Ch_ID,Datetime) VALUES ('$id','$point','$cid','$now')";
        $result = mysqli_query($conn, $sql);
        if($result){
                echo "1";
        }else{
                echo "0";
        }
}
?>
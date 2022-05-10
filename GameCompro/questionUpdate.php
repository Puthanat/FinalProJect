<?php
include('connection.php');

$Q_ID = $_POST['editQ_ID'];
$Q_Name = $_POST['editQ_Name'];
$Q_a = $_POST['editQ_a'];
$Q_b = $_POST['editQ_b'];
$Q_c = $_POST['editQ_c'];
$Q_d = $_POST['editQ_d'];
$Q_answer = $_POST['editQ_answer'];
$Q_count = $_POST['editQ_count'];

$whereField = $_POST['whereField'];
$whereCondition = $_POST['whereCondition'];



$sql = "update question set Q_ID='".$Q_ID."', Q_Name='".$Q_Name."', Q_a='".$Q_a."', Q_b='".$Q_b."', Q_c='".$Q_c."', Q_d='".$Q_d."', Q_answer='".$Q_answer."', Q_count='".$Q_count."'where ".$whereField."='".$whereCondition."'";
mysqli_query($connect, $sql);


?>
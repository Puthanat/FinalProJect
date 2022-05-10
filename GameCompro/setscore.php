<?php
include('connection.php');
if(isset($_POST["A_ID"])){
    $id = mysqli_real_escape_string($conn, $_POST["A_ID"]);
    $sql = "SELECT S_Point FROM score WHERE A_ID = '$id' AND Ch_ID = 1";
    $result = mysqli_query($conn, $sql);
    $sql2 = "SELECT S_Point FROM score WHERE A_ID = '$id' AND Ch_ID = 2";
    $result2 = mysqli_query($conn, $sql2);
    if(!$result && !$result2){
    echo "ผิดพลาดในการอ่านฐานข้อมูล";

    }else{
        while ($data = mysqli_fetch_row($result)) {
        $total = 0 + $data[0];
        }
        while ($data = mysqli_fetch_row($result2)) {
        $total2 = 0 + $data[0];
        }
        $score = ($total + $total2)/2;
        if($score >=80) { $num= "ดีมาก" ; }
          else if (($score>=60)&&($$score<=79)) { $num= "ดี" ; }
          else if (($score>=40)&&($score<=59)) { $num= "ปานกลาง" ; }
          else if (($score>=20)&&($score<=39)) { $num= "ค่อนข้างแย่" ; }
          else  { $num= "แย่" ; }
        $sql3 = "UPDATE account SET A_Point = '$score',A_Grade = '$num' WHERE A_ID = '$id'";
        $result3 = mysqli_query($conn, $sql3);
        if(!$result3){
            echo "ผิดพลาดในการอ่านฐานข้อมูล";
        
        }else{
          $sql4 = "DELETE FROM score WHERE A_ID = '$id'";
          $result4 = mysqli_query($conn, $sql4);
          if(!$result4){
            echo "ผิดพลาดในการอ่านฐานข้อมูล";
          }else{
            $down = "SELECT * FROM checkid WHERE A_ID = '$id' AND Ch_ID = 2";
            $resultdown = mysqli_query($conn, $down);
            if(!$resultdown){
              echo 0;
            }else if(mysqli_num_rows($resultdown)==0){
              echo 0;
            }else{
              $down2 = "DELETE FROM checkid WHERE A_ID = '$id'";
              $resultdown2 = mysqli_query($conn, $down2);
              if($resultdown){
                echo "บันทึกข้อมูลเรียบร้อย";
              }
            }
          }
        }
    }
}
?>
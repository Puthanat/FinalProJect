<?php
include("connection.php");
if(isset($_POST["A_new_ID"])){
      $A_ID = mysqli_real_escape_string($conn, $_POST["A_new_ID"]);
      $sql = "SELECT * FROM checkid WHERE A_ID = '$A_ID'";
      $result = mysqli_query($conn, $sql);
      if(!$result){
            echo 0;
      }else if(mysqli_num_rows($result)==0){
            $sql2 = "INSERT INTO checkid (A_ID,Ch_ID) VALUES ('$A_ID','1')";
            $result2 = mysqli_query($conn, $sql2);
            if(!$result2){
                  echo 0;
            }else{
                  echo 1;
            }
      }else{
            $sql3 = "DELETE FROM checkid WHERE A_ID = '$A_ID'";
            $result3 = mysqli_query($conn, $sql3);
            if(!$result3){
                  echo 0;
            
            }else{
                  $sql4 = "INSERT INTO checkid (A_ID,Ch_ID) VALUES ('$A_ID','1')";
                  $result4 = mysqli_query($conn, $sql4);
                  if(!$result4){
                        echo 0;
                  }else{
                        echo 1;
                  }
            }
      }
}else if(isset($_POST["A_con_ID"])){
      $A_ID = mysqli_real_escape_string($conn, $_POST["A_con_ID"]);
      $sql = "SELECT * FROM checkid WHERE A_ID = '$A_ID' AND Ch_ID = 1";
      $result = mysqli_query($conn, $sql);
      if(!$result){
            echo 0;

      }else if(mysqli_num_rows($result)==0){
            $sql2 = "SELECT * FROM checkid WHERE A_ID = '$A_ID' AND Ch_ID = 2";
            $result2 = mysqli_query($conn, $sql2);
            if(!$result2){
                  echo 0;           
            }else if(mysqli_num_rows($result2)==0){
                  echo 0;
            }else{
                  echo "2"; 
            }

      }else{
            echo "1";
      }
}else if(isset($_POST["A_next_ID"])){
      $A_ID = mysqli_real_escape_string($conn, $_POST["A_next_ID"]);
      $sql = "SELECT * FROM checkid WHERE A_ID = '$A_ID' AND Ch_ID = 1";
      $result = mysqli_query($conn, $sql);
      if(!$result){
            echo 0;
      }else{
            $up = "UPDATE checkid SET Ch_ID = 2 WHERE A_ID = '$A_ID'";
            $resultup = mysqli_query($conn, $up);
            if($resultup){
                  echo 2;
            }
      }
}
?>
<?php
// include('connection.php');
// if(isset($_POST["id"])){
//     $id = mysqli_real_escape_string($conn, $_POST["id"]);
//     if($id == "5"){
//         $sql = "select * from question where Ch_ID = 5 ORDER BY RAND() LIMIT 10 ";
//         $result = mysqli_query($conn, $sql);

//         if(mysqli_num_rows($result)>0){
//         while($row = mysqli_fetch_assoc($result)){
//             echo "Q_ID:".$row['Q_ID']."|Q_Name:".$row['Q_Name']."|Q_a:".$row['Q_a']."|Q_b:".$row['Q_b']."|Q_c:".$row['Q_c']."|Q_d:".$row['Q_d']."|Q_answer:".$row['Q_answer']."*";     
//             }
//         }   
//     }else{
//         $sql = "select * from question where Ch_ID = 8 ORDER BY RAND() LIMIT 10 ";
//         $result = mysqli_query($conn, $sql);

//         if(mysqli_num_rows($result)>0){
//         while($row = mysqli_fetch_assoc($result)){
//             echo "Q_ID:".$row['Q_ID']."|Q_Name:".$row['Q_Name']."|Q_a:".$row['Q_a']."|Q_b:".$row['Q_b']."|Q_c:".$row['Q_c']."|Q_d:".$row['Q_d']."|Q_answer:".$row['Q_answer']."*";     
//             }
//         }  
//     }
// }
?>
<?php
include('connection.php');
if(isset($_POST["id"])){
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
        $sql = "select * from question where Ch_ID = $id ORDER BY RAND() LIMIT 10 ";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            echo "Q_ID:".$row['Q_ID']."|Q_Name:".$row['Q_Name']."|Q_a:".$row['Q_a']."|Q_b:".$row['Q_b']."|Q_c:".$row['Q_c']."|Q_d:".$row['Q_d']."|Q_answer:".$row['Q_answer']."*";     
            }
        }   
} 
?>
<?php
include('server.php');

$Ch_ID = mysqli_real_escape_string($conn,$_POST['Ch_ID']);
$Co_H = mysqli_real_escape_string($conn,$_POST['Co_H']);
$Co_D = mysqli_real_escape_string($conn,$_POST['Co_D']);
$Co_Name = mysqli_real_escape_string($conn,$_POST['Co_Name']);
$Co_Description = mysqli_real_escape_string($conn,$_POST['Co_Description']);
$file_name = $_FILES['Co_Picture']['name'];
$file_tmp  = $_FILES['Co_Picture']['tmp_name'];
$extension = array("jpeg","jpg","png","gif","JPEG","JPG","PNG","GIF");
$target= "css/images/";
$ext = pathinfo($file_name,PATHINFO_EXTENSION);

if($file_name){
      if(in_array($ext,$extension)){     
            if(!file_exists($target.$file_name)){
                  if(move_uploaded_file($file_tmp,$target.$file_name)){
                        $sql ="INSERT INTO content(Ch_ID,Co_H,Co_D,Co_Name,Co_Description,Co_Picture) 
                              VALUES('$Ch_ID','$Co_H','$Co_D','$Co_Name','$Co_Description','$file_name')";
                        $query = mysqli_query($conn,$sql);
                        if($query){
                              echo "Complete";
                              exit();
                        }
                  }
            }else{
                  $filename = basename($file_name,$ext);
                  $newfilename = $filename.time().".".$ext;
                  if(move_uploaded_file($file_tmp,$target.$newfilename)){
                        $sql ="INSERT INTO content(Ch_ID,Co_H,Co_D,Co_Name,Co_Description,Co_Picture) 
                        VALUES('$Ch_ID','$Co_H','$Co_D','$Co_Name','$Co_Description','$newfilename')";
                        $query = mysqli_query($conn,$sql);
                        if($query){
                              echo "Complete";
                              exit();
                        }
                  }
            }
      }else{
            echo 'error';
            exit();
      }
}else{
      $sql ="INSERT INTO content(Ch_ID,Co_H,Co_D,Co_Name,Co_Description) 
      VALUES('$Ch_ID','$Co_H','$Co_D','$Co_Name','$Co_Description')";
      $query = mysqli_query($conn,$sql);
      if($query){
            echo "Complete";
            exit();
      }
}
?>
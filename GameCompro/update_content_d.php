<?php
include('server.php');

$Ch_ID = mysqli_real_escape_string($conn,$_POST['Ch_ID2']);
$Co_H = mysqli_real_escape_string($conn,$_POST['Co_H2']);
$Co_D = mysqli_real_escape_string($conn,$_POST['Co_D2']);
$Co_Name = mysqli_real_escape_string($conn,$_POST['Co_Name2']);
$Co_Description = mysqli_real_escape_string($conn,$_POST['Co_Description2']);
$file_name = $_FILES['Co_Picture2']['name'];
$file_tmp  = $_FILES['Co_Picture2']['tmp_name'];
$extension = array("jpeg","jpg","png","gif","JPEG","JPG","PNG","GIF");
$target= "css/images/";
$ext = pathinfo($file_name,PATHINFO_EXTENSION);

$sql2 = "SELECT * FROM content WHERE Ch_ID = $id AND Co_H = $id2 AND Co_D = $id3";
$query2 = mysqli_query($conn,$sql2);
$row = mysqli_fetch_array($query2);
$images =  $row['Co_Picture'];
unlink($target.$images);

if($file_name){
      if(in_array($ext,$extension)){     
            if(!file_exists($target.$file_name)){
                  if(move_uploaded_file($file_tmp,$target.$file_name)){
                        $sql="UPDATE content SET Co_Name='$Co_Name',Co_Description='$Co_Description',Co_Picture='$file_name' 
                              WHERE Ch_ID=$Ch_ID AND Co_H=$Co_H AND Co_D=$Co_D";
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
                        $sql="UPDATE content SET Co_Name='$Co_Name',Co_Description='$Co_Description',Co_Picture='$newfilename' 
                              WHERE Ch_ID=$Ch_ID AND Co_H=$Co_H AND Co_D=$Co_D";
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
      $sql="UPDATE content SET Co_Name='$Co_Name',Co_Description='$Co_Description' 
      WHERE Ch_ID=$Ch_ID AND Co_H=$Co_H AND Co_D=$Co_D";
      $query = mysqli_query($conn,$sql);
      if($query){
            echo "Complete";
            exit();
      }
}     
?>
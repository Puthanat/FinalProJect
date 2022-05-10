 <?php
include('server.php');

$id=$_POST['A_ID'];
$user = mysqli_real_escape_string($conn,$_POST['A_User']);
if($id!=''){
      $arr_char = str_split($user);
      $count = strlen($user);
      $set = "";
      foreach ($arr_char as $element) {
            if (is_numeric($element)) {
                  $set = $set.$element;
            } else {
                continue;
            }      
        }
      $password = substr($set, -4);
      $query="UPDATE account SET A_Password='$password' WHERE A_ID=$id";
}
if(mysqli_query($conn,$query)){
      echo "ok";
}else{
      echo "error";
}
?>
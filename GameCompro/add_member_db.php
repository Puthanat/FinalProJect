้
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <link rel="stylesheet" href="css/manubar2.css">
</head>

<body>
      <div class="wrapper">
            <?php
      session_start();
      include('server.php');

      $errors = array();

      if(isset($_POST['reg_user'])){
            $firstname = mysqli_real_escape_string($conn,$_POST['A_Name']);
            $lastname = mysqli_real_escape_string($conn,$_POST['A_Lastname']);
            $username = mysqli_real_escape_string($conn,$_POST['A_User']);
            $password = mysqli_real_escape_string($conn,$_POST['A_Password']);
            $section = mysqli_real_escape_string($conn,$_POST['A_Section']);
            
            $user_check_query = "SELECT * FROM account WHERE A_User = '$username'";
            $query = mysqli_query($conn,$user_check_query);
            $result = mysqli_fetch_assoc($query);

            if($result){
                  if($result['A_User'] === $username){
                        echo "<script>";
                        echo "Swal.fire({
                                    icon: 'error',
                                    text: 'รหัสนักศึกษาได้ถูกใช้ไปแล้ว',
                                    confirmButtonText: `Ok`,
                                    confirmButtonColor: '#c43131',
                                    }).then((result) => {
                                    if (result.isConfirmed) {
                                          window.location = 'add_member.php';
                                    }
                              });";
                        echo "</script>";
                  }
                  if($username < 13){
                        echo "<script>";
                        echo "Swal.fire({
                                    icon: 'error',
                                    text: 'กรุณาใส่รหัสให้ครบ13หลัก',
                                    confirmButtonText: `Ok`,
                                    confirmButtonColor: '#c43131',
                                    }).then((result) => {
                                    if (result.isConfirmed) {
                                          window.location = 'add_member.php';
                                    }
                              });";
                        echo "</script>";  
                  }
            }else{
                  if(count($errors) == 0){
                  $sql = "INSERT INTO account (A_User,A_Password,A_Name,A_Lastname,A_Section) 
                  VALUES ('$username','$password','$firstname','$lastname','$section')";
                  mysqli_query($conn,$sql);
                  echo "<script>";
                  echo "Swal.fire({
                              icon: 'success',
                              text: 'สมัครสมาชิกนักศึกษาเรียบร้อย',
                              confirmButtonText: `Ok`,
                              confirmButtonColor: '#c43131',
                              }).then((result) => {
                              if (result.isConfirmed) {
                                    window.location = 'member.php';
                              }
                        });";
                  echo "</script>";
                  }
            }
            
            
      }
?>
      </div>
</body>

</html>
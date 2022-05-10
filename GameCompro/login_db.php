<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $query = "SELECT * FROM account WHERE A_User = '$username' AND A_Password = '$password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_array($result);

                $_SESSION['A_User'] = $username;
                $_SESSION['A_Role'] = $row["A_Role"];
                if($_SESSION['A_Role'] == "admin"){                                      
                    header("location: index.php");
                }else{                 
                    echo "<script>";
                    echo "Swal.fire({
                        icon: 'error',
                        text: 'คุณไม่ใช่ Admin ไม่สามารถเข้าได้',
                        confirmButtonText: `Ok`,
                        confirmButtonColor: '#c43131',
                      }).then((result) => {
                        if (result.isConfirmed) {
                          window.location = 'login.php';
                        }
                      });";
                    echo "</script>";
                }
            } else {
                echo "<script>";
                echo "Swal.fire({
                        icon: 'error',
                        text: 'รหัสผ่านไม่ถูกต้อง',
                        confirmButtonText: `Ok`,
                        confirmButtonColor: '#c43131',
                      }).then((result) => {
                        if (result.isConfirmed) {
                          window.location = 'login.php';
                        }
                      });";
                echo "</script>";
            }
        } else {
            echo "<script>";
            echo "Swal.fire({
                        icon: 'error',
                        text: 'รหัสผ่านไม่ถูกต้อง',
                        confirmButtonText: `Ok`,
                        confirmButtonColor: '#c43131',
                      }).then((result) => {
                        if (result.isConfirmed) {
                          window.location = 'login.php';
                        }
                      });";
            echo "</script>";
        }
    }
?>

</body>

</html>
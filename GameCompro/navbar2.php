<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
    session_start();

    include('server.php'); 
    
    if (!isset($_SESSION['A_User'])) {
        header('location: login.php');
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['A_User']);
        header('location: login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/manubar2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="header-menu">
                <div class="title">
                    <a href="index.php">
                        <img src="css/images/logo2.png" width="160" height="100">
                    </a>
                </div>
                <!-- <div class="sidebar_btn">
                    <i class="fas fa-bars"></i>
                </div> -->
                <ul>
                    <li><a href="index.php?logout='1'"><i class="fas fa-power-off"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar">
            <div class="sidebar-menu">
                <center class="profile">
                    <img src="css/images/1.png" alt="">
                    <p><?php echo $_SESSION['A_User']; ?></p>
                </center>

                <li class="item" id="profile">
                    <a href="#profile" class="menu-btn">
                        <i class="fas fa-id-card"></i><span>สมาชิก<i class="fas fa-angle-right drop-down"></i></span>
                    </a>
                    <div class="sub-menu">
                        <a href="member.php"><i class="fas fa-users"></i><span>จัดการสมาชิก</span></a>
                        <a href="add_member.php"><i class="fas fas fa-user-plus"></i><span>เพิ่มสมาชิก</span></a>
                    </div>
                </li>
                <li class="item" id="messages">
                    <a href="content.php" class="menu-btn">
                        <i class="fas fa-feather"></i><span>เนื้อหา</span>
                    </a>
                </li>
                <li class="item" id="messages">
                    <a href="examination.php" class="menu-btn">
                        <i class="fas fa-book"></i><span>ข้อสอบ</span>
                    </a>
                </li>
            </div>
        </div>
    </div>
    <!-- <script type="text/javascript">
        $(document).ready(function () {
            $(".sidebar_btn").click(function () {
                $(".wrapper").toggleClass("collapse");
            });
        });
    </script> -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('.menu-btn').click(function () {
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.drop-down').toggleClass('rotate');
            });
        });
    </script>
</body>

</html>
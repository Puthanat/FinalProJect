<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
      <link rel="stylesheet" href="css/manubar2.css">
      <link rel="stylesheet" href="css/style2.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="css/manubar2.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
      <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
      <!-- datatable lib -->
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
      </script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/manubar2.css">
  <style>
    .form_wrap .input_wrap[data-error].input{
      border-color: #c92432;
      color: #c92432;
      background: #fffafa;
    }
    .form_wrap .input_wrap[data-error]::after{
      content: attr(data-error);
      font-size: 0.80em;
      color: #c92432;
      display: block;
      margin: 10px 0;
    }
  </style>
</head>

<body>

  <?php include('navbar2.php'); ?>
  <div class="wrapper">
    <div class="main-container">
      <div class="card">
        <div class="registration">
          <div class="title section3">
            สมัครสมาชิกนักศึกษา
          </div>

          <form action="add_member_db.php" method="post">
            <div class="form_wrap">
              <div class="input_grp">
                <div class="input_wrap">
                  <label for="firstname">ชื่อ</label>
                  <input type="text" name="A_Name" id="A_Name"  required>
                </div>
                <div class="input_wrap">
                  <label for="lastname">นามสกุล</label>
                  <input type="text" name="A_Lastname" id="A_Lastname" required>
                </div>
              </div>
              <div class="input_wrap" data-error="กรุณาใส่รหัสให้ครบ13หลัก">
                <label for="username">รหัสนักศึกษา</label>
                <input type="text" name="A_User" id="A_User" maxlength="13" required>
              </div>
              <div class="input_wrap">
                <label for="password">รหัสผ่าน</label>
                <input type="password" name="A_Password" id="A_Password" required>
              </div>
              <div class="input_wrap">
                <label for="section">Section</label>
                <div class="custom_select">
                  <select name="A_Section" id="section" required>
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                  </select>
                </div>
              </div>
              <div class="input_wrap">
                <input type="submit" name="reg_user" value="ยืนยัน" class="submit_btn">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#A_User').mask('000000000000-0');
    })
  </script>
</body>

</html>
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
  <!-- bootstrap Lib -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/manubar2.css">
  <!-- datatable lib -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <style type="text/css">
    h1 {
      text-align: center;
      padding-bottom: 30px;
    }
  </style>
</head>

<body>
  <?php 
    include('navbar2.php');
    require_once('server.php');
    if(isset($_GET['page'])){

    }else{
      $page = 1;
    }

    $record_show = 3;
    $offset = ($page - 1) * $record_show;
    $sql_total = "SELECT * FROM account WHERE A_Role = 'member'";
    $query_total = mysqli_query($conn,$sql_total);
    $row_total = mysqli_num_rows($query_total);
    $page_total = ceil($row_total/$record_show);

    $sql= sprintf("SELECT * FROM account WHERE A_Role = 'member' ORDER BY A_Section");
    $sql .= "LIMIT $offset,$record_show";
    $query = mysqli_query($conn,$sql);

    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
      $id = $_GET['id'];
      echo "<script>";
      echo "Swal.fire({
            text: 'คุณต้องการจะลบนักศึกษาออกใช่ไหม',
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'member.php?action=confirm-delete&id=".$id."'
            }else{
              window.location.href = 'member.php'
            }
          })";
      echo "</script>";
    }
    if(isset($_GET['action']) && $_GET['action'] == 'confirm-delete'){
      $id = $_GET['id'];
      $sql = sprintf("DELETE FROM account WHERE A_ID = '%s'",$id);
      $query_action = mysqli_query($conn,$sql);
      echo "<script>";
      if($query_action){
        echo "Swal.fire({
                icon : 'success',
                text : 'ลบออกจากระบบเรียบร้อย',
                showConfirmButton : false,
                timer: 2000
              }).then((result) => {
                if (result.isDismissed) {
                  window.location.href = 'member.php'
                }
              });";
      }else{
        echo "Swal.fire({
                icon : 'error',
                title : 'Oops. . . ',
                text : 'Somethine went wrong!',     
               }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = 'member.php'
                }
              });";
      }
      echo "</script>";
    }
  ?>
  <div class="wrapper">
    <div class="main-container">
      <div class="card">
        <div class="container">
          <h1 class="text-center my-2 section3">ตารางนักศึกษา</h1>
          <form name="search_member" id="search_member" method="POST" action="member.php">
            <div class="input-group">
              <div class="form-outline">
                <select class="form-control" name="select1" id="select1">
                  <option value="1">เลือกข้อมูล</option>
                  <option value="A_User">รหัสนักศึกษา</option>
                  <option value="A_Name">ชื่อ</option>
                  <option value="A_Lastname">นามสกุล</option>
                  <option value="A_Section">Section</option>
                </select>
              </div>
              <div class="form-outline">
                <input type="search" id="search" name="search" class="form-control" />
              </div>
              <button type="submit" id="submit" name="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
              </button>
              <input type="button" class="btn btn-primary" name="research" id="research" value="ล้างข้อมูล">
            </div>
          </form><br>
          <table class="table table-borderless table-hover" id="userTable">
            <thead align="center" class="table-dark">
              <tr>
                <th width="20%">รหัสนักศึกษา</th>
                <th width="20%">ชื่อ</th>
                <th width="20%">นามสกุล</th>
                <th width="10%">Section</th>
                <th width="10%">คะแนน</th>
                <th width="10%">Action</th>
              </tr>
            </thead>
            <tbody id="output" class="table-secondary table-bordered"></tbody>
          </table>
        </div>
        <div id="pagination"></div>
        <div id="pagination_search"></div>
      </div>
    </div>
  </div>
  <?php require 'editmember.php'?>
</body>
<script>
  $(document).ready(function () {

    all_user();

    function all_user(page) {
      console.log('all_user', page)
      $.ajax({
        url: 'all_member.php',
        type: 'POST',
        data: {
          page: page
        },
        dataType: 'json',
        success: function (data) {
          var trstring = "";
          $.each(data.data, function (key, value) {
            trstring += `
              <tr>
                  <td>${value.A_User}</td>
                  <td>${value.A_Name}</td>
                  <td>${value.A_Lastname}</td>
                  <td class="text-center">${value.A_Section}</td>
                  <td class="text-center">${value.A_Point}</td>
                  <td class="text-center">
                  <a name="edit" id="${value.A_ID}" class="btn btn-warning btn-sm edit_data">Edit</a>
                  <a href="?action=delete&id=${value.A_ID}" class="btn btn-danger btn-sm">delete</a>
                </td>
              </tr>`;
            $('table tbody').html(trstring);
          });
          $('#pagination').html(data.output).show();
          $('#pagination_search').html(data.output).hide();
        }
      });
    }
    $(document).on("click", "#pagination .page-item", function () {
      console.log('check1')
      var page = $(this).attr("id");
      $("#search_member").trigger('reset');
      all_user(page);
    });
    $('#insert-form').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        url: "insert.php",
        method: "post",
        data: $('#insert-form').serialize(),
        beforeSend: function () {
          $('#insert').val("Insert..");
        },
        success: function (data) {
          Swal.fire({
            icon: 'success',
            text: 'แก้ไขข้อมูลเรียบร้อย',
            showConfirmButton: false,
            timer: 2000
          }).then((result) => {
            if (result.isDismissed) {
              window.location.href = 'member.php'
            }
          })
          $('#insert-form')[0].reset();
          $('#dataModal').modal('hide');
        }
      });
    });
    $('#insert-form').on('reset', function (e) {
      e.preventDefault();
      Swal.fire({
        text: 'คุณต้องการ Reset รหัสผ่านใช่ไหม',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            icon: 'success',
            text: 'Reset รหัสผ่านเรียบร้อย',
            showConfirmButton: false,
            timer: 2000
          }).then((result) => {
            if (result.isDismissed) {
              $.ajax({
                url: "resetpassword.php",
                method: "post",
                data: $('#insert-form').serialize(),
                beforeSend: function () {
                  $('#insert').val("Insert..");
                },
                success: function (data) {
                  location.reload();
                }
              });
            }
          })
        }
      })
    });
    $('#userTable').on('click', '.edit_data', (function () {
      var uid = $(this).attr("id");
      $.ajax({
        url: "fetch.php",
        method: "POST",
        data: {
          id: uid
        },
        dataType: "json",
        success: function (data) {
          $('#A_ID').val(data.A_ID);
          $('#A_User').val(data.A_User);
          $('#A_Name').val(data.A_Name);
          $('#A_Lastname').val(data.A_Lastname);
          $('#A_Section').val(data.A_Section);
          $('#dataModal').modal('show');
        },
        error: function (request, status, error) {
          console.log(error)
        }
      })
    }));

    ////////////////////////////////////////////////////////////
    /////

    $('form#search_member').submit(function (event) {
      event.preventDefault();
      var page = 1;
      var select = $('select#select1').val();
      var search = $('input#search').val();


      search_user(page, select, search)

    });

    ////////////////////////////////////////////////////////////
    /////


    $(document).on("click", "#pagination_search .page-item", function () {
      console.log('check2')
      var page = $(this).attr("id");
      var select = $('select#select1').val();
      var search = $('input#search').val();

      search_user(page, select, search)
    });

    ////////////////////////////////////////////////////////////
    /////


    $('input#research').click(function () {
      $("#search_member").trigger('reset');
      $('input#search').focus();
      all_user(1);
    });

    ////////////////////////////////////////////////////////////
    /////

    function search_user(page, select, search) {
      console.log('search_user', page, select, search)
      $.ajax({
        url: 'search.php',
        type: 'POST',
        dataType: 'json',
        data: {
          select: select,
          search: search,
          page: page
        },
        success: function (data) {
          if (data.search_data.length != 0) {

            var trstring = "";

            var countrow = 1;

            $.each(data.search_data, function (key, value) {
              trstring += `
              <tr>
                  <td>${value.A_User}</td>
                  <td>${value.A_Name}</td>
                  <td>${value.A_Lastname}</td>
                  <td class="text-center">${value.A_Section}</td>
                  <td class="text-center">${value.A_Point}</td>
                  <td>
                  <a name="edit" id="${value.A_ID}" class="btn btn-warning btn-sm edit_data">Edit</a>
                  <a href="?action=delete&id=${value.A_ID}" class="btn btn-danger btn-sm">del</a>
                </td>
              </tr>`;
              $('table tbody').html(trstring);
              countrow++;
            });

          } else {
            Swal.fire({
              icon: 'error',
              text: 'ค้นหาข้อมูลไม่พบ',
              confirmButtonText: `Ok`,
              confirmButtonColor: '#c43131',
            }).then((result) => {
              if (result.isConfirmed) {
                window.location = 'member.php';
              }
            });
          }
          $('#pagination_search').html(data.output).show();
          $('#pagination').html(data.output).hide();
        }
      });
    }

  });
</script>

</html>
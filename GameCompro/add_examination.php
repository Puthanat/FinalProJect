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
</head>

<body>

  <?php 
    include('navbar2.php');
    $id = $_GET['id'];
    require_once('server.php'); 
    $sql="SELECT * FROM question WHERE Ch_ID = $id";
    $query=mysqli_query($conn,$sql);
  ?>
  <div class="wrapper">
    <div class="main-container">
      <div class="card">
        <div class="container">

          <h1 class="text-center my-3 section3">ตารางข้อสอบ
            <?php
              echo "Chapter $id";
            ?></h1>
          <div align="left">
            <a href="examination.php" class="btn btn-dark">
            <i class="fas fa-angle-left"></i><span>  Back</span>
            </a>
          </div>
          <div align="right">
            <button type="button" name="add" id="<?=$id?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fas fa-plus"></i><span> Add</span>
            </button>
          </div><br>
          <table class="table table-borderless table-hover" id="examTable">
            <thead align="center" class="table-dark">
              <tr>
                <th width="70%">คำถาม</th>
                <th width="5%">View</th>
                <th width="5%">Edit</th>
                <th width="5%">Delete</th>
              </tr>
            </thead>
            <tbody class="table-secondary table-bordered" ></tbody>
          </table>
        </div>
        <div id="pagination"></div>
      </div>
    </div>
    </div>
  <?php
   require 'view_examination.php';
   require 'insert_examination.php';
   require 'edit_examination.php';
   ?>
</body>
<script>
$(document).ready(function () {
  all_exam();
  function all_exam(page) {
    var id = <?php echo $id ?>;
    $.ajax({
      url: 'all_exam.php',
      type: 'POST',
      data:{page:page,
            id:id},
      dataType: 'json',
      success: function (data) {
        var trstring = "";
        $.each(data.data, function (key, value) {
          trstring += `
            <tr>
                <td>${value.Q_Name}</td>
                <td>
                <input type="button" name="view" value="view" class="btn btn-primary btn-xs view_data"
                  id="${value.Q_ID}" />
                </td>
                <td>
                <input type="button" name="edit" value="edit" class="btn btn-warning btn-xs edit_data"
                  id="${value.Q_ID}" />
                </td>
                <td>
                <input type="button" name="delete" value="delete" class="btn btn-danger btn-xs delete_data"
                  id="${value.Q_ID}" />
                </td>
            </tr>`;
          $('table tbody').html(trstring);
        });
        $('#pagination').html(data.output).show();
      }
    });
  }
  $(document).on("click","#pagination .page-item",function(){
    console.log('check1')
    var page = $(this).attr("id");
    all_exam(page);
  });
  $('#insert-form').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: "insert_exam.php",
      method: "post",
      data: $('#insert-form').serialize(),
      beforeSend: function () {
        $('#insert').val("Insert..");
      },
      success: function (data) {
        Swal.fire({
          icon: 'success',
          text: 'แก้ไขข้อสอบเรียบร้อย',
          showConfirmButton: false,
          timer: 2000
        }).then((result) => {
          if (result.isDismissed) {
            window.location.href = 'add_examination.php?id=<?=$id?>'
          }
        })
        $('#insert-form')[0].reset();
        $('#addModal').modal('hide');
      }
    });
  });
  $('#insert-form2').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: "insert_exam.php",
      method: "post",
      data: $('#insert-form2').serialize(),
      beforeSend: function () {
        $('#insert').val("Insert..");
      },
      success: function (data) {
        Swal.fire({
          icon: 'success',
          text: 'เพิ่มข้อสอบเรียบร้อย',
          showConfirmButton: false,
          timer: 2000
        }).then((result) => {
          if (result.isDismissed) {
            window.location.href = 'add_examination.php?id=<?=$id?>'
          }
        })
        $('#insert-form2')[0].reset();
        $('#addModal').modal('hide');
      }
    });
  });
  $('#examTable').on('click', '.delete_data', (function () {
    var uid = $(this).attr("id");
    Swal.fire({
      text: 'คุณต้องการลบข้อสอบนี้ใช่ไหม',
      icon: 'error',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          icon: 'success',
          text: 'ลบข้อสอบเรียบร้อย',
          showConfirmButton: false,
          timer: 2000
        }).then((result) => {
          if (result.isDismissed) {
            $.ajax({
              url: "delete_exam.php",
              method: "post",
              data: {
                id: uid
              },
              success: function (data) {
                location.reload();
              }
            });
          }
        })
      }
    }) 
  }));

  $('#examTable').on('click', '.view_data', (function () {
    var id = '<?php echo $id ?>';
    console.log(id);
    var uid = $(this).attr("id");
    $.ajax({
      url: "select_exam.php",
      method: "post",
      data: {
        id: uid
      },
      success: function (data) {
        $('#detail').html(data);
        $('#dataModal').modal('show');
      }
    }); 
  }));
  $('#examTable').on('click', '.edit_data', (function () {
    var uid = $(this).attr("id");
    $.ajax({
      url: "fetch_exam.php",
      method: "POST",
      data: {
        id: uid
      },
      dataType: "json",
      success: function (data) {
        $('#Q_ID').val(data.Q_ID);
        $('#Q_Name').val(data.Q_Name);
        $('#Q_a').val(data.Q_a);
        $('#Q_b').val(data.Q_b);
        $('#Q_c').val(data.Q_c);
        $('#Q_d').val(data.Q_d);
        $('#Q_answer').val(data.Q_answer);
        $('#insert').val("Update");
        $('#editModal').modal('show');
      }
    }); 
  }));
});
</script>

</html>
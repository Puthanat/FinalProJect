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
    require_once('server.php');
    $sql="SELECT * FROM checkpoint";
    $query=mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($query);

?>
  <div class="wrapper">
    <div class="main-container">
      <div class="card">
        <h1 class="text-center my-3 section3">เนื้อหา</h1>
        <div class="card-container">
        <div align="right">
          <button type="button" name="add" id="<?=$num_rows?>" class="btn btn-success" data-bs-toggle="modal"
            data-bs-target="#addModal">
            <i class="fas fa-plus"></i><span> Add</span>
          </button>
        </div><br>
          <?php 
            while($row = mysqli_fetch_array($query)) {
        ?>
          <?php 
          $id = $row['Ch_Chapter'];
          $sql1="SELECT * FROM content WHERE Ch_ID = $id AND Co_D = 0";
          $query1=mysqli_query($conn,$sql1);
          $num_rows1 = mysqli_num_rows($query1);
        ?>
          <a class="a go_data" id="<?php echo $row['Ch_Chapter']; ?>"
            href="add_content.php?id=<?php echo $row['Ch_Chapter']; ?>">
            <div class="sub-card">
              <div class="section"><?php echo $row['Ch_Category']; ?></div>
              <div class="number">Content (<?php echo $num_rows1; ?>)</div>
              <div class="description"><?php echo $row['Ch_Name']; ?></div>
            </div>
          </a>
          <div align="right mb-4" id="examTable">
            <input type="button" name="edit" value="Edit" class="btn btn-warning btn-xs edit_data"
              id="<?=$row['Ch_Chapter']?>" />
            <?php 
              if ($row['Ch_Chapter'] == $num_rows)
              {
              ?>
            <input type="button" name="delete" value="Delete" class="btn btn-danger btn-xs delete_data"
              id="<?=$row['Ch_Chapter']?>" />
          </div>
          <?php
              }
            ?>
        </div><br>
        <?php
          } 
        ?>
      </div>
    </div>
  </div>
  <?php 
    require 'insert_Chapter.php';
    require 'edit_Chapter.php'; 
  ?>
  </div>
</body>
<script>
  $(document).ready(function () {
    $('#insert-form').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        url: "insert_Chapter_db.php",
        method: "post",
        data: $('#insert-form').serialize(),
        beforeSend: function () {
          $('#insert').val("Insert..");
        },
        success: function (data) {
          Swal.fire({
            icon: 'success',
            text: 'เพิ่ม Chapter เรียบร้อย',
            showConfirmButton: false,
            timer: 2000
          }).then((result) => {
            if (result.isDismissed) {
            location.reload();
          }
          })
          $('#insert-form')[0].reset();
          $('#addModal').modal('hide');
        }
      });
    });
    $('.delete_data').on('click', function () {
      var uid = $(this).attr("id");
      Swal.fire({
        text: 'คุณต้องการลบ Chapter นี้ใช่ไหม',
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            icon: 'success',
            text: 'ลบ Chapter เรียบร้อย',
            showConfirmButton: false,
            timer: 2000
          }).then((result) => {
            if (result.isDismissed) {
              $.ajax({
                url: "delete_Chapter.php",
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
    });
    $('.edit_data').on('click', function () {
      var uid = $(this).attr("id");
      $.ajax({
        url: "fetch_chapter.php",
        method: "POST",
        data: {
          id: uid
        },
        dataType: "json",
        success: function (data) {
          $('#Ch_ID2').val(data.Ch_ID);
          $('#Ch_Chapter2').val(data.Ch_Chapter);
          $('#Ch_Category2').val(data.Ch_Category);
          $('#Ch_Name2').val(data.Ch_Name);
          $('#insert2').val("Update");
          $('#editModal').modal('show');
        }
      });
    });
    $('#insert-form2').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: "update_Chapter.php",
      method: "post",
      data: $('#insert-form2').serialize(),
      beforeSend: function () {
        $('#insert').val("Insert..");
      },
      success: function (data) {
        Swal.fire({
          icon: 'success',
          text: 'แก้ไข Chapter เรียบร้อย',
          showConfirmButton: false,
          timer: 2000
        }).then((result) => {
          if (result.isDismissed) {
            location.reload();
          }
        })
        $('#insert-form2')[0].reset();
        $('#editModal').modal('hide');
      }
    });
  });
  });
</script>

</html>
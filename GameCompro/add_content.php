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
    $id  = $_GET['id'];
    $id2 = 0;
    require_once('server.php'); 
    $sql="SELECT * FROM content WHERE Ch_ID = $id  AND Co_D = 0";
    $query=mysqli_query($conn,$sql);
  ?>
      ?>
      <div class="wrapper">
            <div class="main-container">
                  <div class="card">
                        <h1 class="text-center my-3 section3">เนื้อหา
                              <?php
              echo "Chapter $id";
            ?></h1>
                        <div class="container">
                              <div align="left">
                                    <a href="content.php" class="btn btn-dark">
                                          <i class="fas fa-angle-left"></i><span> Back</span>
                                    </a>
                              </div>
                              <div align="right">
                                    <button type="button" name="add" id="<?=$id?>" class="btn btn-success"
                                          data-bs-toggle="modal" data-bs-target="#addModal">
                                          <i class="fas fa-plus"></i><span> Add</span>
                                    </button>
                              </div><br>
                              <div class="card-container">

                                    <?php 
            while($row = mysqli_fetch_array($query)) {
        ?>
                                    <table>
                                          <thead align="center" style="height:100px">
                                                <tr style="vertical-align:center">
                                                      <th width="90%"> <a class="a go_data"
                                                                  id="<?php echo $row['Co_H']; ?>"
                                                                  href="add_content_d.php?id=<?php echo $row['Ch_ID'];?>&id2=<?php echo $row['Co_H'];?>">
                                                                  <div class="sub-card2">
                                                                        <div class="section2">
                                                                              <?php echo $row['Co_Name']; ?></div>
                                                                  </div>
                                                            </a> </th>
                                                            <?php if($row['Co_Name'] == "ประวัติความเป็นมาของคอมพิวเตอร์" || $row['Co_Name'] == "วิวัฒนาการของเครื่องคอมพิวเตอร์" ||
                                                                     $row['Co_Name'] == "ส่วนประกอบคอมพิวเตอร์" || $row['Co_Name'] == "องค์ประกอบคอมพิวเตอร์" ||
                                                                     $row['Co_Name'] == "สัญลักษณ์การเขียน Flowchart" || $row['Co_Name'] == "ลักษณะการเขียน Flowchart" ||
                                                                     $row['Co_Name'] == "ขั้นตอนการนำคอมพิวเตอร์มาใช้ในการแก้ปัญหา" || $row['Co_Name'] == "Pseudo Code"
                                                                  || $row['Co_Name'] == "ประเภทของไวรัสคอมพิวเตอร์"){
                                                                  // continue;
                                                            ?>
                                                      <th width="5%"> <input type="hidden" name="edit" value="Edit"
                                                                  class="btn bth btn-warning  edit_data"
                                                                  id="<?=$row['Co_H']?>" /></th>
                                                      <th width="5%"> <input type="hidden" name="delete" value="Delete"
                                                                  class="btn bth btn-danger  delete_data"
                                                                  id="<?=$row['Co_H']?>" /></th>
                                                            <?php }else{ ?>
                                                      <th width="5%"> <input type="button" name="edit" value="Edit"
                                                                  class="btn bth btn-warning  edit_data"
                                                                  id="<?=$row['Co_H']?>" /></th>
                                                      <th width="5%"> <input type="button" name="delete" value="Delete"
                                                                  class="btn bth btn-danger  delete_data"
                                                                  id="<?=$row['Co_H']?>" /></th>
                                                                  <?php } ?>
                                                </tr>
                                          </thead>
                                    </table>


                                    <?php
                                    $id2 = $row['Co_H'];
                              
          } 
          require 'insert_content.php';
          require 'edit_content.php'; 
        ?>
                              </div>
                        </div>
                  </div>
            </div>
</body>
<script>
      $(document).ready(function () {
            $('#insert-form').on('submit', function (e) {
                  e.preventDefault();
                  $.ajax({
                        url: "insert_content_db.php",
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
                  var uid = <?php echo $id ?>;
                  var uid2 = $(this).attr("id");
                  Swal.fire({
                        text: 'คุณต้องการลบเนื้อหา Chapter นี้ใช่ไหม',
                        icon: 'error',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                  }).then((result) => {
                        if (result.isConfirmed) {
                              Swal.fire({
                                    icon: 'success',
                                    text: 'ลบเนื้อหา Chapter เรียบร้อย',
                                    showConfirmButton: false,
                                    timer: 2000
                              }).then((result) => {
                                    if (result.isDismissed) {
                                          $.ajax({
                                                url: "delete_content.php",
                                                method: "post",
                                                data: {
                                                      id: uid,
                                                      id2: uid2
                                                },
                                                success: function (
                                                      data
                                                ) {
                                                      location
                                                            .reload();
                                                }
                                          });
                                    }
                              })
                        }
                  })
            });
            $('.edit_data').on('click', function () {
                  var uid = <?php echo $id ?> ;
                  var uid2 = $(this).attr("id");
                  $.ajax({
                        url: "fetch_content.php",
                        method: "POST",
                        data: {
                              id: uid,
                              id2: uid2
                        },
                        dataType: "json",
                        success: function (data) {
                              $('#Ch_ID2').val(data.Ch_ID);
                              $('#Co_H2').val(data.Co_H);
                              $('#Co_D2').val(data.Co_D);
                              $('#Co_Name2').val(data.Co_Name);
                              $('#insert2').val("Update");
                              $('#editModal').modal('show');
                        }
                  });
            });
            $('#insert-form2').on('submit', function (e) {
                  e.preventDefault();
                  $.ajax({
                        url: "update_content.php",
                        method: "post",
                        data: $('#insert-form2').serialize(),
                        beforeSend: function () {
                              $('#insert').val("Insert..");
                        },
                        success: function (data) {
                              Swal.fire({
                                    icon: 'success',
                                    text: 'แก้ไขเนื้อหา Chapter เรียบร้อย',
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
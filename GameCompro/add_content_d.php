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
    $id2 = $_GET['id2'];
    $id3 = 0 ;
    require_once('server.php'); 
    $sql="SELECT * FROM content WHERE Ch_ID = $id  AND Co_H = $id2 AND Co_D != 0";
    $query=mysqli_query($conn,$sql);
    $sql2="SELECT * FROM content WHERE Ch_ID = $id AND Co_H = $id2 AND Co_D = 0";
    $query2=mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_array($query2);
  ?>
      ?>
      <div class="wrapper">
            <div class="main-container">
                  <div class="card">
                        <h1 class="text-center my-3 section3"><?php echo $row2['Co_Name'];?></h1>
                        <div class="container">
                              <div align="left">
                                    <a href="add_content.php?id=<?=$id?>" class="btn btn-dark">
                                          <i class="fas fa-angle-left"></i><span> Back</span>
                                    </a>
                              </div>
                              <div align="right">
                                    <button type="button" name="add" id="<?=$id?>" class="btn btn-success"
                                          data-bs-toggle="modal" data-bs-target="#addModal">
                                          <i class="fas fa-plus"></i><span> Add</span>
                                    </button>
                              </div><br>
                              <?php 
            while($row = mysqli_fetch_array($query)) {
        ?>
                              <table>
                                    <thead align="center" style="height:100px">
                                          <tr style="vertical-align:center">
                                                <th width="90%"> <a name="view" class="view_data" id="<?=$row['Co_D']?>">  
                                                            <button class="bth bth-1 section2">
                                                                  <?php echo $row['Co_Name']; ?>
                                                            </button>
                                                      </a></th>
                                                <th width="10%"></th>
                                                <th width="10%"> <input type="button" name="edit" value="Edit"
                                                            class="btn bth btn-warning  edit_data"
                                                            id="<?=$row['Co_D']?>" /></th>
                                                <th width="10%"> <input type="button" name="delete" value="Delete"
                                                            class="btn bth btn-danger  delete_data"
                                                            id="<?=$row['Co_D']?>" /></th>
                                                            <input type="hidden" id="<?=$row['Co_D']?>" /></th>
                                          </tr>
                                    </thead>
                              </table>


                              <?php
                                    $id3 = $row['Co_D'];
          }
          require 'insert_content_d.php';
          require 'edit_content_d.php';
          require 'view_content_d.php';
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
                  var action = $(this).attr('action');
                  var formdata = new FormData();
                  formdata.append('Co_Picture', $('input[name=Co_Picture]')[0].files[0]);
                  formdata.append('Ch_ID', $('input[name=Ch_ID]').val());
                  formdata.append('Co_H', $('input[name=Co_H]').val());
                  formdata.append('Co_D', $('input[name=Co_D]').val());
                  formdata.append('Co_Name', $('input[name=Co_Name]').val());
                  formdata.append('Co_Description', $('textarea[name=Co_Description]').val());
                  $.ajax({
                        url: action,
                        type: "post",
                        data: formdata,
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                              $('#insert').val("Insert..");
                        },
                        success: function (data) {
                              Swal.fire({
                                    icon: 'success',
                                    text: 'เพิ่มข้อมูลเรียบร้อย',
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
                  var uid1 = <?php echo $id2 ?>;
                  var uid2 = $(this).attr("id");
                  Swal.fire({
                        text: 'คุณต้องการลบข้อมูลนี้ใช่ไหม',
                        icon: 'error',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                  }).then((result) => {
                        if (result.isConfirmed) {
                              Swal.fire({
                                    icon: 'success',
                                    text: 'ลบข้อมูลเรียบร้อย',
                                    showConfirmButton: false,
                                    timer: 2000
                              }).then((result) => {
                                    if (result.isDismissed) {
                                          $.ajax({
                                                url: "delete_content_d.php",
                                                method: "post",
                                                data: {
                                                      id: uid,
                                                      id1: uid1,
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
                  var uid = <?php echo $id ?>;
                  var uid1 = <?php echo $id2 ?>;
                  var uid2 = $(this).attr("id");
                  $.ajax({
                        url: "fetch_content_d.php",
                        method: "POST",
                        data: {
                              id: uid,
                              id1: uid1,
                              id2: uid2
                        },
                        dataType: "json",
                        success: function (data) {
                              $('#Ch_ID2').val(data.Ch_ID);
                              $('#Co_H2').val(data.Co_H);
                              $('#Co_D2').val(data.Co_D);
                              $('#Co_Name2').val(data.Co_Name);
                              $('#Co_Description2').val(data.Co_Description);
                              $('#insert2').val("Update");
                              $('#editModal').modal('show');
                        }
                  });
            });
            $('#insert-form2').on('submit', function (e) {
                  e.preventDefault();
                  var action = $(this).attr('action');
                  var formdata = new FormData();
                  formdata.append('Co_Picture2', $('input[name=Co_Picture2]')[0].files[0]);
                  formdata.append('Ch_ID2', $('input[name=Ch_ID2]').val());
                  formdata.append('Co_H2', $('input[name=Co_H2]').val());
                  formdata.append('Co_D2', $('input[name=Co_D2]').val());
                  formdata.append('Co_Name2', $('input[name=Co_Name2]').val());
                  formdata.append('Co_Description2', $('textarea[name=Co_Description2]').val());
                  $.ajax({
                        url: action,
                        type: "post",
                        data: formdata,
                        contentType: false,
                        processData: false,
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
                                          location.reload();
                                    }
                              })
                              $('#insert-form2')[0].reset();
                              $('#editModal').modal('hide');
                        }
                  });
            });
            $('.view_data').on('click', function () {
                  var uid = <?php echo $id ?>;
                  var uid1 = <?php echo $id2 ?>;
                  var uid2 = $(this).attr("id");
                  $.ajax({
                        url: "select_content_d.php",
                        method: "POST",
                        data: {
                              id: uid,
                              id1: uid1,
                              id2: uid2
                        },
                        success: function (data) {
                        $('#detail').html(data);
                        $('#dataModal').modal('show');
                        }
                  });
            });
            function readURL(input,id){
                  if(input.files && input.files[0]){
                        var reader = new FileReader();

                        reader.onload = function(e){
                              $('#'+id).attr('src',e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                  }
            }
            $('.select-image').change(function(){
                  var id = $(this).data('preview');
                  readURL(this,id);
            });  
            $('.select-image2').change(function(){
                  var id = $(this).data('preview');
                  readURL(this,id);
            });
      });
</script>

</html>
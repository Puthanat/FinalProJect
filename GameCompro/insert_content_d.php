<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <form method="post" action="insert_content_d_db.php" id="insert-form" enctype="multipart/form-data">
                              <input type="hidden" value="<?=$id?>" id="Ch_ID" name="Ch_ID">
                              <input type="hidden" value="<?=$id2?>" id="Co_H" name="Co_H">
                              <input type="hidden" value="<?=$id3 + 1?>" name="Co_D" id="Co_D"/>                              
                              <img src="" id="preview1" width="200" style=" display:block; margin-left:auto; margin-right:auto;"></br>
                              <label>รูปภาพ</label>
                              <input class="form-control form-control-sm select-image" data-preview="preview1" type="file" name="Co_Picture" id="Co_Picture"></br>
                              <label>ชื่อ</label>
                              <input type="text" name="Co_Name" id="Co_Name" class="form-control" required /></br>
                              <label>เนื้อหา</label>
                              <textarea class="form-control" name="Co_Description" id="Co_Description" rows="3"></textarea></br>
                              <input type="submit" id="insert" class="btn btn-success" />
                        </form>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
            </div>
      </div>
</div>
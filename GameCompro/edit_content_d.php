<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <form method="post" action="update_content_d.php" id="insert-form2" enctype="multipart/form-data">
                              <input type="hidden"  id="Co_H2" name="Co_H2">
                              <input type="hidden"  name="Co_D2" id="Co_D2"/>
                              <input type="hidden"  id="Ch_ID2" name="Ch_ID2">
                              <img src="" id="preview2" width="200" style=" display:block; margin-left:auto; margin-right:auto;"></br>
                              <label>รูปภาพ</label>
                              <input class="form-control form-control-sm select-image2" data-preview="preview2" type="file" name="Co_Picture2" id="Co_Picture2"></br>
                              <label>ชื่อ</label>
                              <input type="text" name="Co_Name2" id="Co_Name2" class="form-control" required /></br>
                              <label>เนื้อหา</label>
                              <textarea class="form-control" name="Co_Description2" id="Co_Description2" rows="3"></textarea></br>
                              <input type="submit" id="insert" class="btn btn-success" />
                        </form>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
            </div>
      </div>
</div>
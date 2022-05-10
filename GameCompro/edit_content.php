<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขเนื้อหา Chapter <?=$id?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <form method="post" id="insert-form2">
                              <input type="hidden" id="Ch_ID2" name="Ch_ID2">
                              <input type="hidden" id="Co_H2" name="Co_H2">
                              <input type="hidden" name="Co_D2" id="Co_D2"/>
                              <label>ชื่อ</label>
                              <input type="text" name="Co_Name2" id="Co_Name2" class="form-control" required /></br>
                              <input type="submit" id="insert2" class="btn btn-success" />
                        </form>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                  </div>
            </div>
      </div>
</div>
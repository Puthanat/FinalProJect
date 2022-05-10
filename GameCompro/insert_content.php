<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มเนื้อหา Chapter <?=$id?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <form method="post" id="insert-form">
                              <input type="hidden" value="<?=$id?>" id="Ch_ID" name="Ch_ID">
                              <input type="hidden" value="<?=$id2 + 1?>" id="Co_H" name="Co_H">
                              <input type="hidden" value="0" name="Co_D" id="Co_D"/>
                              <label>ชื่อ</label>
                              <input type="text" name="Co_Name" id="Co_Name" class="form-control" required /></br>
                              <input type="submit" id="insert" class="btn btn-success" />
                        </form>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                  </div>
            </div>
      </div>
</div>
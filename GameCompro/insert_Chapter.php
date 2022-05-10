<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่ม Chapter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <form method="post" id="insert-form">
                              <?php $num_rows = $num_rows + 1;?>
                              <input type="hidden" value="<?=$num_rows?>" id="Ch_ID" name="Ch_ID">
                              <input type="hidden" value="<?=$num_rows?>" id="Ch_Chapter" name="Ch_Chapter">
                              <label>Chapter</label>
                              <input type="text" value="Chapter <?=$num_rows?>" name="Ch_Category" id="Ch_Category" class="form-control" readonly />
                              <label>ชื่อ</label>
                              <input type="text" name="Ch_Name" id="Ch_Name" class="form-control" required /></br>
                              <input type="submit" id="insert" class="btn btn-success" />
                        </form>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                  </div>
            </div>
      </div>
</div>
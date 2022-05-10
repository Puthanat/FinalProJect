<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไข Chapter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <form method="post" id="insert-form2">
                              <input type="hidden" id="Ch_ID2" name="Ch_ID2">
                              <input type="hidden" id="Ch_Chapter2" name="Ch_Chapter2">
                              <label>Chapter</label>
                              <input type="text"  name="Ch_Category2" id="Ch_Category2" class="form-control" readonly />
                              <label>ชื่อ</label>
                              <input type="text" name="Ch_Name2" id="Ch_Name2" class="form-control" required /></br>
                              <input type="submit" id="insert2" class="btn btn-success" />
                        </form>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                  </div>
            </div>
      </div>
</div>
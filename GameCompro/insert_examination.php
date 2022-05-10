<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5>ข้อสอบ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <form method="post" id="insert-form">
                              <?php $id = $_GET['id'];?>
                              <input type="hidden" id="Q_ID" name="Q_ID">
                              <input type="hidden" value="<?=$id?>" id="Ch_ID" name="Ch_ID">
                              <label>คำถาม</label>
                              <input type="text" name="Q_Name" id="Q_Name" class="form-control" required />
                              <label>คำตอบที่ 1</label>
                              <input type="text" name="Q_a" id="Q_a" class="form-control" required />
                              <label>คำตอบที่ 2</label>
                              <input type="text" name="Q_b" id="Q_b" class="form-control" required />
                              <label>คำตอบที่ 3</label>
                              <input type="text" name="Q_c" id="Q_c" class="form-control" required />
                              <label>คำตอบที่ 4</label>
                              <input type="text" name="Q_d" id="Q_d" class="form-control" required />
                              <label>คำตอบที่ถูกต้อง</label>
                              <div class="custom_select">
                                    <select name="Q_answer" class="form-control" id="Q_answer" required>
                                          <option value=""></option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                    </select>
                              </div><br>
                              <input type="submit" id="insert" class="btn btn-success" />
                        </form>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                  </div>
            </div>
      </div>
</div>
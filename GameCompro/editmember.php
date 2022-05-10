<div id="dataModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">แก้ไขข้อมูลนักศึกษา</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="insert-form">
          <label>รหัสนักศึกษา</label>
          <input type="hidden" id="A_ID" name="A_ID">
          <input type="text" name="A_User" id="A_User" maxlength="13" class="form-control" readonly>
          <label for="firstname">ชื่อ</label>
          <input type="text" name="A_Name" id="A_Name" class="form-control" required>
          <label for="lastname">นามสกุล</label>
          <input type="text" name="A_Lastname" id="A_Lastname" class="form-control" required>
          <label for="section">Section</label>
          <div class="custom_select">
            <select name="A_Section" id="A_Section" class="form-control" required>
              <option value=""></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
            </select>
          </div>
          <br>
          <button type="submit" id="insert" class="btn btn-primary">แก้ไขข้อมูล</button>
          <button type="reset"  id="reset"  class="btn btn-dark">Reset Password</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
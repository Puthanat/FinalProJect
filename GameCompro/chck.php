<?php  foreach($query as $value): ?>
              <tr>
                <td><?=$value['Q_Name'] ?></td>
                <td align="center"><?=$value['Q_count'] ?></td>
                <td align="center"><?=$value['Q_count_correct'] ?></td>
                <td align="center"><?=$value['Q_count_incorrect'] ?></td>
                <td>
                  <input type="button" name="view" value="view" class="btn btn-primary btn-xs view_data"
                    id="<?php echo $value['Q_ID'] ?>" />
                </td>
                <td>
                  <input type="button" name="edit" value="edit" class="btn btn-warning btn-xs edit_data"
                    id="<?php echo $value['Q_ID'] ?>" />
                </td>
                <td>
                  <input type="button" name="delete" value="delete" class="btn btn-danger btn-xs delete_data"
                    id="<?php echo $value['Q_ID'] ?>" />
                </td>
              </tr>
              <?php  endforeach;  ?>
<div class="modal fade" id="myModal<?= $modal ?>">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #d3e58a;">
              <h4 class="modal-title kcal">Breakfast</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background-color: #effe6d">
              <table class="table">
                <tr>
                  <th>Food</th>
                  <th>g</th>
                  <th>kcal/100g</th>
                </tr>
                <?php foreach ($namirnice as $namirnica) : ?>
                <?php echo "<tr>
                  <td>".$namirnica['ime']."</td>
                  <td>".$namirnica['kolicina']."</td>
                  <td>200</td>
                </tr>" ?>
                <?php endforeach; ?>

              </table>
            </div>
            <div class="modal-footer" style="background-color: #d3e58a;">
              <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
            </div>
          </div>
        </div>
      </div>
     
 <!--FOOD LOG--------------------------------------------------------------------------------------------------------->
    <div class="row">
      <div class="col-sm-12">
        <h3 class="hh3">Food Log</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <input class="add" type="button" data-toggle="modal" data-target="#myModal0" value="+Add Meal">
        <div class="modal fade" id="myModal0">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #d3e58a;">
                <h4 class="modal-title kcal">Add your meal</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body" style="background-color: #fe6d73">
                  <form id="form" action="/user/food/" method="post">
                      
                      
                  Name:
                  <span name="counterr" class="counter"></span>
                  <input type="text" name="obrok" style="color:black; background-color: #ffffff !important;">
                  <br>
                  <br>
                  
                  
                  Food:
                  <input list="food1"  name="food1" style="background-color: #ffffff !important; color: black">
                  <datalist id="food1" style="background-color: #e9f1d0; color: black">
                     <?php foreach ($foodOptions as $option) : ?>
                        <?php echo view("components/dailylog-items/groceries_option_item.php",$option)?> 
                    <?php endforeach; ?>
                  </datalist>
                  <input type="number" name="g1" style="color:black; background-color: #ffffff !important;"> g <br><br>
                  
                  <button id="addFoodButton" type="button" class="btn btn-danger" onclick="addFood()" >Add Food</button>
                  <button id="submitButton" type="submit" name="acceptbtn2" class="btn btn-danger">OK</button>
                  
                </form>
              </div>
              <div class="modal-footer" style="background-color: #d3e58a;">
                    <form acion='/user/cancel/' method="post">
                    <button type="submit" class="btn btn-danger" >Cancel</button>
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div> <br><br>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <section class="u-align-center u-clearfix u-palette-3-light-2 u-section-1" id="carousel_56cf"
          style="background-color: #e9f1d0 !important;">  
          <div class="u-repeater u-repeater-1">
                <?php foreach ($dailyMeals as $meal) : ?>
                <?= view_cell('\App\Libraries\DailyLog::dailyFood', $meal) ?>
            <?php endforeach; ?>
          </div>

        </section>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <p style="font-weight: 600; font-size: 40px; text-align: right; color: #fe6d73;">+<?= $ukupnaPotrosnja ?>kcal</p>
      </div>
    </div>

    <div class="row">
        
    </div>
       
            
<!--      <div class="modal fade" id="myModal4">
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
                <tr>
                  <td>Jaja</td>
                  <td>20</td>
                  <td>200</td>
                </tr>
                <tr>
                  <td>Slanina</td>
                  <td>50</td>
                  <td>400</td>
                </tr>
                <tr>
                  <td>Jaja</td>
                  <td>20</td>
                  <td>200</td>
                </tr>

              </table>
            </div>
            <div class="modal-footer" style="background-color: #d3e58a;">
              <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
            </div>
          </div>
        </div>

      </div>
      <div class="modal fade" id="myModal5">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #d3e58a;">
              <h4 class="modal-title kcal">Lunch</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background-color: #effe6d">
              <table class="table">
                <tr>
                  <th>Food</th>
                  <th>g</th>
                  <th>kcal/100g</th>
                </tr>
                <tr>
                  <td>Jaja</td>
                  <td>20</td>
                  <td>200</td>
                </tr>
                <tr>
                  <td>Slanina</td>
                  <td>50</td>
                  <td>400</td>
                </tr>
                <tr>
                  <td>Jaja</td>
                  <td>20</td>
                  <td>200</td>
                </tr>
              </table>
            </div>
            <div class="modal-footer" style="background-color: #d3e58a;">
              <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
            </div>
          </div>
        </div>

      </div>
      <div class="modal fade" id="myModal6">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #d3e58a;">
              <h4 class="modal-title kcal">Dinner</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background-color: #effe6d">
              <table class="table">
                <tr>
                  <th>Food</th>
                  <th>g</th>
                  <th>kcal/100g</th>
                </tr>
                <tr>
                  <td>Jaja</td>
                  <td>20</td>
                  <td>200</td>
                </tr>
                <tr>
                  <td>Slanina</td>
                  <td>50</td>
                  <td>400</td>
                </tr>
                <tr>
                  <td>Jaja</td>
                  <td>20</td>
                  <td>200</td>
                </tr>
              </table>
            </div>
            <div class="modal-footer" style="background-color: #d3e58a;">
              <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
            </div>
          </div>
        </div>

      </div>
    </div>-->

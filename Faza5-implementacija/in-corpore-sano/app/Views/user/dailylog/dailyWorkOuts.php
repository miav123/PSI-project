<!--        Teodora Glisic 19/0572-->
<div class="row">
      <div class="col-sm-12">
          <h3 class="hh3">Training Log</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <input class="add btn btn-floating u-btn-round u-radius-50 
                    u-btn-6 u-hover-palette-1-light-1" type="button" data-toggle="modal" 
                    style="color: #ffffff" data-target="#myModal" value="+Add Training">
        <div class="modal fade" id="myModal">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #d3e58a;">
                <h4 class="modal-title kcal">Add your excercise</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body" style="background-color: #fe6d73">
                  <form  action="/user/training/" method="post" >
                  Excercise:
                  <input list="browsers"  style="color: black; background-color: #ffffff !important;"
                         name="exercise" required="true" maxlength="50">
                  <datalist id='browsers' style="background-color: #e9f1d0;">
                    <?php foreach ($trainingOptions as $option) : ?>
                        <?php echo view("components/dailylog-items/training_option.php",$option)?> 
                    <?php endforeach; ?>
                  </datalist>
                  <br>
                  <br>
                  Time:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="number" style="color:black; background-color: #ffffff !important;" name="time" min="0.001"> h 
                  <br>

                <button type="submit" class="btn btn-danger"  name= "acceptbtn1" style="
                        margin-left: 70%">OK</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" >Cancel</button>
                   
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div> <br><br>
    </div>

     <?php foreach ($dailyWorkouts as $workout) : ?>
               <?= view_cell('\App\Libraries\DailyLog::dailyWorkOuts', $workout) ?> 
            <?php endforeach; ?>
          
    <div class="row">
      <div class="col-12">
        <p style="font-weight: 600; font-size: 40px; text-align: right; color: #fe6d73;">-<?= $lostKcal ?> kcal</p>
      </div>
    </div>




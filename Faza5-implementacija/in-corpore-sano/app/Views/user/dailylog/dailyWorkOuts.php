<div class="row">
      <div class="col-sm-12">
        <h3 class="hh3">Training Log</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <input class="add" type="button" data-toggle="modal" data-target="#myModal" value="+Add Training">
        <div class="modal fade" id="myModal">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #d3e58a;">
                <h4 class="modal-title kcal">Add your excercise</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body" style="background-color: #fe6d73">
                  <form  action="/user/training/" method="post">
                  Excercise:
                  <input list="browsers"  style="color: black; background-color: #ffffff !important;"
                         name="exercise" required="true" maxlength="50">
                  <datalist id='browsers' style="background-color: #e9f1d0;">
<!--                <option value="Weight Lifting: general">
                    <option value="Swimming">
                    <option value="Yoga">
                    <option value="...">-->
                    <?php foreach ($trainingOptions as $option) : ?>
                        <?php echo view("components/dailylog-items/training_option.php",$option)?> 
                    <?php endforeach; ?>
                  </datalist>
                  <br>
                  <br>
                  Time:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="text" style="color:black; background-color: #ffffff !important;" name="time">
<!--              </div>
              <div class="modal-footer" style="background-color: #d3e58a;">-->
                <button type="submit" class="btn btn-danger"  name= "acceptbtn1">OK</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
          

<!--    <div class="row">
      <div class=" offset-2 col-sm-8">
        <div class="d-flex w-100 justify-content-between"
          style="height: 70%; padding: 2%; border-radius: 20px !important; background-color: #f7f44c;">
          <img src="../images/training-panda.jpg" style="border-radius: 50%;">
          <div class="container" style="text-align: center; background-color: #f7f44c !important;">
            <div class="row">
              <div class="col-sm-12">
                <h4 class="kcal">Ashtanga yoga</h4>
                Duration time : 1,5h
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12" style="text-align: right;">
                <p class="kcal">-200kcal</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="row">
      <div class=" offset-2 col-sm-8">
        <div class="d-flex w-100 justify-content-between"
          style=" height: 70%; padding: 2%; border-radius: 20px !important; background-color: #f7f44c;">
          <img src="../images/training-panda.jpg" style="border-radius: 50%;">
          <div class="container" style="text-align: center; background-color: #f7f44c!important;">
            <div class="row">
              <div class="col-12">
                <h4 class="kcal">Dizanje tegova</h4>
                Duration time : 10min
              </div>
            </div>
            <div class="row">
              <div class="col-12" style="text-align: right;">
                <p class="kcal">-1200kcal</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>-->
    <div class="row">
      <div class="col-12">
        <p style="font-weight: 600; font-size: 40px; text-align: right; color: #fe6d73;">-<?= $lostKcal ?> kcal</p>
      </div>
    </div>




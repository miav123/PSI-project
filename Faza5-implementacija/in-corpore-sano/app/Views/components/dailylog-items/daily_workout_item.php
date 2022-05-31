<div class="row">
      <div class=" offset-2 col-sm-8">
        <div class="d-flex w-100 justify-content-between"
          style="height: 70%; padding: 2%; border-radius: 20px !important; background-color: #f7f44c;">
          <?php $broj = rand(0,3) ?>
          <?php if($broj < 1): ?>
          <img src="/assets/images/dailylog/training/training-panda.jpg" style="border-radius: 50%;">
          <?php elseif($broj < 2):?>
          <img src="/assets/images/dailylog/training/training-panda.jpg" style="border-radius: 50%;">
          <?php elseif($broj <= 3): ?>
          <img src="/assets/images/dailylog/training/training-panda.jpg" style="border-radius: 50%;">
           <?php endif; ?>
          <div class="container" style="text-align: center; background-color: #f7f44c !important;">
            <div class="row">
              <div class="col-sm-12">
                <h4 class="kcal"><?= $name ?></h4>
                Duration time : <?= $time ?> min
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12" style="text-align: right;">
                <p class="kcal">-<?= $kcal ?>kcal</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

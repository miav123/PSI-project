<div class="list-group-item <?= $type ?>">
    <div class="row align-items-center text-sm-center text-md-left">
        <div class="col-sm-12 col-md-2 text-center">
            <img src="
                <?php if($type == 'water'): ?>
                    /assets/images/challenge/glass.png
                <?php elseif($type == 'food'): ?>
                    /assets/images/challenge/apple.png
                <?php elseif($type == 'train'): ?>
                     /assets/images/challenge/runner.png
                 <?php endif; ?>
            " class="challenge-img">
        </div>
        <div class="col-sm-12 col-md-7 col-lg-8">
            <h5 class="mb-1 align-self-center nice-font challenge-title"><?= $title ?></h5>
            <p class="trainer-name nice-font" style="margin-top:5px;"><?= $trainer ?></p>
            <p class="mb-1 challenge-description nice-font"><?= $description ?></p>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-2 text-center" style="margin-top:15px;">
            <img src="
                <?php if($level == 'e'): ?>
                    /assets/images/challenge-level/easy.png
                <?php elseif($level == 'm'): ?>
                    /assets/images/challenge-level/medium.png
                <?php elseif($level == 'h'): ?>
                     /assets/images/challenge-level/hard.png
                 <?php endif; ?>
            " class="level-image">
            <h2 class="challenge-points"><?= $points ?></h2>
            <h2 class="challenge-points"><?= $percent ?>%</h2>
        </div>
    </div>
    <div class="row text-sm-center text-md-right">
        <div class="col-sm-12 col-md-12" style="margin-bottom:10px;">
            <form action="/user/leavechallenge/<?= $i ?>" method="post">
                <button type="submit" name= "leavebtn" class="btn btn-floating  u-btn-round   u-radius-50 u-btn-6 u-custom-color-6 u-hover-custom-color-7">
                    <i class="fas fa-trash-alt"></i>
                    LEAVE
                </button>
            </form>
        </div>
    </div>
</div>
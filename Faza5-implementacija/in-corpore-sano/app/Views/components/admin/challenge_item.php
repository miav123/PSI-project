<!-- Mia Vucinic 0224/2019 -->
<div class="list-group-item <?= $type ?>"  id="challenge_<?= $id ?>">
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
            " class="challenge-image">
        </div>
        <div class="col-sm-12 col-md-7 col-lg-8">
            <h5 class="mb-1 align-self-center nice-font challenge-title"><?= $title ?></h5>
            <p class="trainer-name nice-font"><?= $trainer ?></p>
            <p class="mb-1 challenge-description nice-font"><?= $description ?></p>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-2 text-center">
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
        </div>
    </div>
    <div class="row text-sm-center text-md-right">
        <div class="col-sm-12 col-md-12">
            <button type="button" class="btn btn-primary btn-floating btn-delete nice-font
                <?php if($type == 'water'): ?>
                    blue-button
                <?php elseif($type == 'food'): ?>
                    green-button
                <?php elseif($type == 'train'): ?>
                    red-button
                 <?php endif; ?>" name="deletebtn" id="<?= $id ?>">
                <i class="fas fa-trash-alt"></i>
                DELETE
            </button>
        </div>
    </div>
</div>
<!--        Teodora Glisic 19/0572-->
<section class=" u-clearfix u-palette-3-light-2 u-section-1" id="carousel_56cf"
    style="background-color: #e58add !important;">
    <h3>Log in achievements</h3>
    <div class="u-repeater u-repeater-1" style="padding: 1%; margin: 1%;">
          <?php foreach ($loginBadges as $loginBadge) : ?>
                <?= view_cell('\App\Libraries\Badge::loginBadgeItem', $loginBadge) ?>
            <?php endforeach; ?>
    </div>
</section>
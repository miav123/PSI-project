<section class=" u-clearfix u-palette-3-light-2 u-section-1" id="carousel_56cf"
    style="background-color: #f1b0bb !important;">
    <h3>Training achievements</h3>
   <div class="u-repeater u-repeater-1" style="padding: 1%; margin: 1%;">
         <?php foreach ($trainingBadges as $trainingBadge) : ?>
                <?= view_cell('\App\Libraries\Badge::trainingBadgeItem', $trainingBadge) ?>
            <?php endforeach; ?>
<!--  <div
        class="u-align-center u-border-12 u-border-palette-2-light-1 u-container-style u-custom-border u-list-item u-radius-27 u-repeater-item u-shape-round u-white u-list-item-1">
        <div class=" u-container-layout u-similar-container u-valign-top u-container-layout-1">
          <img src="../images/training-panda.jpg" alt=""
            class=" image u-expanded-width u-image u-image-contain u-image-default u-image-1" data-image-width="626"
            data-image-height="626">
          <h4 class="u-text u-text-default u-text-palette-2-light-1 u-text-1">Godlike</h4>
          <p class="u-text u-text-palette-1-dark-2 u-text-2">Swim for 1h every day, 7 days</p>
        </div>
      </div>
     
      </div>-->
    </div>
  </section>

  <br>
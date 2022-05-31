<section class=" u-clearfix u-palette-3-light-2 u-section-1" id="carousel_56cf"
    style="background-color: #e9f1d0 !important;">
    <h3>Food achievements</h3>
    <div class="u-repeater u-repeater-1" style="padding: 1%; margin: 1%;">
        
          <?php foreach ($foodBadges as $foodBadge) : ?>
                <?= view_cell('\App\Libraries\Badge::foodBadgeItem', $foodBadge) ?>
            <?php endforeach; ?>
<!--      <div
        class="train u-align-center u-border-12  u-container-style u-custom-border u-list-item u-radius-27 u-repeater-item u-shape-round u-white u-list-item-1">
        <div class=" u-container-layout u-similar-container u-valign-top u-container-layout-1">
          <img src="../images/meal-1.jpg" alt=""
            class="u-expanded-width u-image u-image-contain u-image-default u-image-1" data-image-width="626"
            data-image-height="626">
          <h4 class="u-text u-text-default u-text-palette-2-light-1 u-text-1">Healthy Vegan</h4>
          <p class="u-text u-text-palette-1-dark-2 u-text-2">No meat for 4 days</p>
        </div>
      </div>
      <div
        class="u-align-center u-border-12 train u-container-style u-custom-border u-list-item u-radius-27 u-repeater-item u-shape-round u-white u-list-item-2">
        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-2">
          <img src="../images/meal-2.jpg" alt=""
            class="u-expanded-width u-image u-image-contain u-image-default u-image-2" data-image-width="626"
            data-image-height="626">
          <h4 class="u-text u-text-default u-text-palette-2-light-1 u-text-3">Beast</h4>
          <p class="u-text u-text-palette-1-dark-2 u-text-4">Eat meat every day</p>
        </div>
      </div>
      <div
        class="u-align-center u-border-12 train u-container-style u-custom-border u-list-item u-radius-27 u-repeater-item u-shape-round u-white u-list-item-3">
        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
          <img src="../images/meal-3.jpg" alt=""
            class="u-expanded-width u-image u-image-contain u-image-default u-image-3" data-image-width="626"
            data-image-height="626">
          <h4 class="u-text u-text-default u-text-palette-2-light-1 u-text-5">Lucky stomach</h4>
          <p class="u-text u-text-palette-1-dark-2 u-text-6">Eat avocado two days in row</p>
        </div>
      </div>-->
    </div>
  </section>
  <br>


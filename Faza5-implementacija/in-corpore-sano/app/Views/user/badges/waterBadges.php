  <section class=" u-clearfix u-palette-3-light-2 u-section-1" id="carousel_56cf"
    style="background-color: #abf3ef !important;">
    <h3>Water log achievements</h3>
    <div class="u-repeater u-repeater-1" style="padding: 1%; margin: 1%;">
        
          <?php foreach ($waterBadges as $waterBadge) : ?>
                <?= view_cell('\App\Libraries\Badge::waterBadgeItem', $waterBadge) ?>
            <?php endforeach; ?>
    </div>
  </section>

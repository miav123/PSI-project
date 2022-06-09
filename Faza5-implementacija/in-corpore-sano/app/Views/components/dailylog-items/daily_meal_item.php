<!--        Teodora Glisic 19/0572-->
            <div data-toggle="modal" data-target="#myModal<?= $modalNum ?>"
              class="u-align-center u-border-12 colorFood u-container-style u-custom-border u-list-item u-radius-27 u-repeater-item u-shape-round u-white
              u-list-item-<?= $modalNum ?>">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-<?= $modalNum ?>">
                  <img src="<?= $picturePath ?>" alt=""
                  class="u-expanded-width u-image u-image-contain u-image-default u-image-1" data-image-width="626"
                  data-image-height="626" >
                <h4 class="u-text u-text-default u-text-palette-2-light-1 u-text-1"><?= $name ?></h4>
                <p class="u-text u-text-palette-1-dark-2 u-text-2">+<?= $kcalObroka ?> kcal</p>
              </div>
            </div>

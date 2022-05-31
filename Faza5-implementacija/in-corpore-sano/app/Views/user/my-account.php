<section class="u-clearfix u-custom-color-5 u-section-1" id="carousel_dae6">

<!-- Modal-Username -->
<div class="modal fade" id="myModalUsername" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d3e58a; color:#d6355b!important;">
        <h5 class="modal-title ">CHANGE USERNAME</h5>
          <button type="button" class="close" data-dismiss="modal">
              &times;
          </button>
      </div>
      <div class="modal-body" style="background-color: #e9f1d0; color:#d6355b!important;" id="modalBodyLogIn">
            <label for="recipient-name" class="col-form-label">New username:</label>
            <input type="text" id="recipient-name"><br>
            <label for="recipient-name" class="col-form-label">Confirm username:</label>
            <input type="text" id="recipient-name">
      </div>
      <div class="modal-footer" style="background-color: #d3e58a;">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"
                  style="background-color:#d6355b!important; border-radius: 25px;border-color:#d6355b!important;">
              SAVE
          </button>
      </div>
    </div>
  </div>
</div>
<!-- And modal-username -->

<!-- Modal-Mail -->
<div class="modal fade" id="myModalMail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d3e58a; color:#d6355b!important;">
        <h5 class="modal-title ">CHANGE MAIL</h5>
          <button type="button" class="close" data-dismiss="modal">
              &times;
          </button>
      </div>
      <div class="modal-body" style="background-color: #e9f1d0; color:#d6355b!important;" id="modalBodyLogIn">
            <label for="recipient-name" class="col-form-label">New mail:</label>
            <input type="text" id="recipient-name">
      </div>
      <div class="modal-footer" style="background-color: #d3e58a;">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"
                  style="background-color:#d6355b!important; border-radius: 25px;border-color:#d6355b!important;">
              SAVE
          </button>
      </div>
    </div>
  </div>
</div>
<!-- And modal-mail -->

<!-- Modal-Height -->
<div class="modal fade" id="myModalHeight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d3e58a; color:#d6355b!important;">
        <h5 class="modal-title ">CHANGE HEIGHT</h5>
          <button type="button" class="close" data-dismiss="modal">
              &times;
          </button>
      </div>
      <form sction="/user/changeHeight" method="POST">
        <div class="modal-body" style="background-color: #e9f1d0; color:#d6355b!important;" id="modalBodyLogIn">
          <label for="recipient-name" class="col-form-label">New height:</label>
          <input type="number" min="50" max="250" class="form-control" value="<?= set_value('newHeight') ?>" id="height" name="height" required/>&nbsp;cm</form>
        </div>
        <div class="modal-footer" style="background-color: #d3e58a;">
          <button type="submit" class="btn btn-secondary"
                  style="background-color:#d6355b!important; border-radius: 25px;border-color:#d6355b!important;" name="btnChangeHeight">
              SAVE
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- And modal-height -->

<!-- Modal-Weight -->
<div class="modal fade" id="myModalWeight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d3e58a; color:#d6355b!important;">
        <h5 class="modal-title ">CHANGE WEIGHT</h5>
          <button type="button" class="close" data-dismiss="modal">
              &times;
          </button>
      </div>
      <div class="modal-body" style="background-color: #e9f1d0; color:#d6355b!important;" id="modalBodyLogIn">
            <label for="recipient-name" class="col-form-label">New Weight:</label>
            <input type="number" min="0" max="250"  id="recipient-name">&nbsp;kg
      </div>
      <div class="modal-footer" style="background-color: #d3e58a;">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"
                  style="background-color:#d6355b!important; border-radius: 25px;border-color:#d6355b!important;">
              SAVE
          </button>
      </div>
    </div>
  </div>
</div>
<!-- And modal-weight -->

<!-- Modal-Training -->
<div class="modal fade" id="myModalTraining" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d3e58a; color:#d6355b!important;">
        <h5 class="modal-title ">CHANGE HOURS OF TRAINING PER WEEK</h5>
          <button type="button" class="close" data-dismiss="modal">
              &times;
          </button>
      </div>
      <div class="modal-body" style="background-color: #e9f1d0; color:#d6355b!important;" id="modalBodyLogIn">
            <label for="recipient-name" class="col-form-label">I want to train &nbsp;</label>
            <input type="number" min="0" max="168"  id="recipient-name">&nbsp;hours per week
      </div>
      <div class="modal-footer" style="background-color: #d3e58a;">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"
                  style="background-color:#d6355b!important; border-radius: 25px;border-color:#d6355b!important;">
              SAVE
          </button>
      </div>
    </div>
  </div>
</div>
<!-- And modal-training -->

<!-- Modal-Password -->
<div class="modal fade" id="myModalPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d3e58a; color:#d6355b!important;">
        <h5 class="modal-title ">CHANGE PASSWORD</h5>
          <button type="button" class="close" data-dismiss="modal">
              &times;
          </button>
      </div>
      <div class="modal-body" style="background-color: #e9f1d0; color:#d6355b!important;" id="modalBodyLogIn">
            <label for="recipient-name" class="col-form-label">New password:</label>
            <input type="text" id="recipient-name"><br>
            <label for="recipient-name" class="col-form-label">Confirm password:</label>
            <input type="text" id="recipient-name">
      </div>
      <div class="modal-footer" style="background-color: #d3e58a;">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"
                  style="background-color:#d6355b!important; border-radius: 25px;border-color:#d6355b!important;">
              SAVE
          </button>
      </div>
    </div>
  </div>
</div>
<!-- And modal-password -->

    <div class="u-custom-color-10 u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-shape u-shape-rectangle u-shape-1"></div>
    <div class="u-container-style u-group u-shape-rectangle u-group-1">
        <div class="u-container-layout u-container-layout-1">
            <div class="u-custom-color-6 u-shape u-shape-circle u-shape-2"></div>
            <img alt=""src="/assets/images/account-icon.jpg"  class="u-align-left u-image u-image-circle u-image-1" data-image-width="1280" data-image-height="839"></img>
            <button class="u-border-4 u-border-custom-color-6 train u-icon u-icon-circle u-text-custom-color-6 u-icon-1">
                <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 60 60" style="" >
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-1695"></use>
                </svg>
                <svg class="u-svg-content" viewBox="0 0 60 60" x="0px" y="0px" id="svg-1695" style="enable-background:new 0 0 60 60;">
                    <g><path d="M30,20.5c-6.617,0-12,5.383-12,12s5.383,12,12,12s12-5.383,12-12S36.617,20.5,30,20.5z"></path>
                    <path d="M55.201,15.5h-8.524l-4-10H17.323l-4,10H12v-5H6v5H4.799C2.152,15.5,0,17.652,0,20.299v29.368 C0,52.332,2.168,54.5,4.833,54.5h50.334c2.665,0,4.833-2.168,4.833-4.833V20.299C60,17.652,57.848,15.5,55.201,15.5z M10,15.5H8v-3 h2V15.5z M30,50.5c-9.925,0-18-8.075-18-18s8.075-18,18-18s18,8.075,18,18S39.925,50.5,30,50.5z M52,27.5c-2.206,0-4-1.794-4-4 s1.794-4,4-4s4,1.794,4,4S54.206,27.5,52,27.5z"></path>
                    </g>
                </svg>
</button>
        </div>
    </div>

    <?php foreach ($regusers as $reguser) : ?>
        <?= view_cell('\App\Libraries\MyAccountUser::myAccountUserItem', $reguser) ?>
    <?php endforeach; ?>
    
</section>
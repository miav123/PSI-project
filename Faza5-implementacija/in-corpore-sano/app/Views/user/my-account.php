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
        <form action="/user/changeUsername" method="POST">
          <div class="modal-body" style="background-color: #e9f1d0; color:#d6355b!important;" id="modalBodyLogIn">
            <?php  if (isset($validation)): ?>
              <div class="alert alert-danger round" role="alert" id="alertreg" >
                <?= $validation->listErrors() ?>
              </div>
            <?php endif; ?>
            <label for="username" class="col-form-label">New username:</label>
            <input type="text" id="username" name="username" required/><br>
          </div>
          <div class="modal-footer" style="background-color: #d3e58a;">
            <button type="submit" class="btn btn-secondary"
                  style="background-color:#d6355b!important; border-radius: 25px;border-color:#d6355b!important;" name="btnChangeUsername">
              SAVE
          </button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- And Modal-Username -->

<!-- Modal-Email -->
  <div class="modal fade" id="myModalMail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #d3e58a; color:#d6355b!important;">
          <h5 class="modal-title ">CHANGE EMAIL</h5>
          <button type="button" class="close" data-dismiss="modal">
              &times;
          </button>
        </div>
        <form action="/user/changeEmail" method="POST">
          <div class="modal-body" style="background-color: #e9f1d0; color:#d6355b!important;" id="modalBodyLogIn">
            <?php  if (isset($validation)): ?>
              <div class="alert alert-danger round" role="alert" id="alertreg" >
                <?= $validation->listErrors() ?>
              </div>
            <?php endif; ?>
            <label for="email" class="col-form-label">New email:</label>
            <input type="email" id="email" name="email" required/>
          </div>
          <div class="modal-footer" style="background-color: #d3e58a;">
            <button type="submit" class="btn btn-secondary" name="btnChangeEmail"
                    style="background-color:#d6355b!important; border-radius: 25px;border-color:#d6355b!important;">
                SAVE
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- And Modal-Email -->

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
        <form action="/user/changeHeight" method="POST">
          <div class="modal-body" style="background-color: #e9f1d0; color:#d6355b!important;" id="modalBodyLogIn">
            <?php  if (isset($validation)): ?>
              <div class="alert alert-danger round" role="alert" id="alertreg" >
                  <?= $validation->listErrors() ?>
              </div>
            <?php endif; ?>
          <label for="height" class="col-form-label">New height:</label>
          <input type="number" min="150" max="250" class="col-form-control" id="height" name="height" required/>&nbsp;cm
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
<!-- And Modal-Height -->

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
        <form action="/user/changeWeight" method="POST">
          <div class="modal-body" style="background-color: #e9f1d0; color:#d6355b!important;" id="modalBodyLogIn">
            <?php  if (isset($validation)): ?>
              <div class="alert alert-danger round" role="alert" id="alertreg" >
                  <?= $validation->listErrors() ?>
              </div>
            <?php endif; ?>
            <label for="weight" class="col-form-label">New Weight:</label>
            <input type="number" min="40" max="600" id="weight" name = "weight" required/>&nbsp;kg
          </div>
          <div class="modal-footer" style="background-color: #d3e58a;">
            <button type="submit" class="btn btn-secondary" name = "btnChangeWeight"
                  style="background-color:#d6355b!important; border-radius: 25px;border-color:#d6355b!important;">
              SAVE
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- And Modal-Weight -->

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
        <form action="/user/changeHours" method="POST">
          <div class="modal-body" style="background-color: #e9f1d0; color:#d6355b!important;" id="modalBodyLogIn">
            <?php  if (isset($validation)): ?>
              <div class="alert alert-danger round" role="alert" id="alertreg" >
                  <?= $validation->listErrors() ?>
              </div>
            <?php endif; ?>
              <label for="hours" class="col-form-label">I want to train &nbsp;</label>
              <input type="number" min="0" max="100"  id="hours" name="hours" required/>&nbsp;hours per week
          </div>
          <div class="modal-footer" style="background-color: #d3e58a;">
            <button type="submit" class="btn btn-secondary" name = "btnChangeHours"
                    style="background-color:#d6355b!important; border-radius: 25px;border-color:#d6355b!important;">
                SAVE
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- And Modal-Training -->

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
        <form action="/user/changePassword" method="POST">
          <div class="modal-body" style="background-color: #e9f1d0; color:#d6355b!important;" id="modalBodyLogIn">
            <?php  if (isset($validation)): ?>
              <div class="alert alert-danger round" role="alert" id="alertreg" >
                  <?= $validation->listErrors() ?>
              </div>
            <?php endif; ?>
            <label for="password" class="col-form-label">New password:</label>
            <input type="password" id="password" name="password" required /><br>
            <label for="password_repeat" class="col-form-label">Confirm password:</label>
            <input type="password" id="password_repeat" name="password_repeat" required/>
          </div>
          <div class="modal-footer" style="background-color: #d3e58a;">
            <button type="submit" class="btn btn-secondary" name="btnChangePassword"
                    style="background-color:#d6355b!important; border-radius: 25px;border-color:#d6355b!important;">
                SAVE
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- And Modal-Password -->

<!-- Modal-Image -->
  <div class="modal fade" id="myModalImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #d3e58a; color:#d6355b!important;">
          <h5 class="modal-title ">CHANGE IMAGE</h5>
          <button type="button" class="close" data-dismiss="modal">
              &times;
          </button>
        </div>
        <form action="/user/changeImage" method="POST" enctype="multipart/from-data">
          <div class="modal-body" style="background-color: #e9f1d0; color:#d6355b!important;" id="modalBodyLogIn">
            
          <!--<label for="image" class="col-form-label">New height:</label>-->
          <input type="file" class="col-form-control" id="image" name="image" required/>&nbsp;
          </div>
          <div class="modal-footer" style="background-color: #d3e58a;">
            <button type="submit" class="btn btn-secondary"
                  style="background-color:#d6355b!important; border-radius: 25px;border-color:#d6355b!important;" name="btnChangeImage">
              SAVE
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- And Modal-Height -->

    <div class="u-custom-color-10 u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-shape u-shape-rectangle u-shape-1"></div>
    <div class="u-container-style u-group u-shape-rectangle u-group-1">
        <div class="u-container-layout u-container-layout-1">
            <div class="u-custom-color-6 u-shape u-shape-circle u-shape-2"></div>
            <img alt=""src="/assets/images/account-icon.jpg"  class="u-align-left u-image u-image-circle u-image-1" data-image-width="1280" data-image-height="839"></img>
            <button data-toggle="modal" data-target="#myModalImage" class="u-border-4 u-border-custom-color-6 train u-icon u-icon-circle u-text-custom-color-6 u-icon-1">
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
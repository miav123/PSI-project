<!-- Tijana Mitrovic 2019/0001 -->

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
          <label for="height" class="col-form-label">New height:</label>
          <input type="number" min="50" max="250" class="col-form-control" id="height" name="height" required/>&nbsp;cm
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
            <label for="weight" class="col-form-label">New Weight:</label>
            <input type="number" min="10" max="250" id="weight" name = "weight" required/>&nbsp;kg
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
              <label for="hours" class="col-form-label">I want to train &nbsp;</label>
              <input type="number" min="0" max="150"  id="hours" name="hours" required/>&nbsp;hours per week
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
        <form action="/user/changeImage" method="POST" enctype="multipart/form-data">
          <div class="modal-body" style="background-color: #e9f1d0; color:#d6355b!important;" id="modalBodyLogIn">
            
          <!--<label for="image" class="col-form-label">New height:</label>-->
          <input type="file" class="col-form-control" name="image" required/>&nbsp;
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

    
    <?php foreach ($regusers as $reguser) : ?>
        <?= view_cell('\App\Libraries\MyAccountUser::myAccountUserItem', $reguser) ?>
    <?php endforeach; ?>
    
</section>
<!-- Tijana Mitrovic 2019/0001 -->

<section class="u-clearfix u-custom-color-10 u-section-1" id="sec-f86b">

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d3e58a; color:#d6355b!important;">
        <h5 class="modal-title ">ERROR</h5>
          <button type="button" class="close" data-dismiss="modal">
              &times;
          </button>
      </div>
      <div class="modal-body" style="background-color: #e9f1d0; color:#d6355b!important;" id="modalBodyLogIn">
        &nbsp;&nbsp;&nbsp;You can only participate in one challenge from the <strong>water</strong>-related and <strong>food</strong>-related  challenges  at the same time.
      </div>
      <div class="modal-footer" style="background-color: #d3e58a;">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"
                  style="background-color:#d6355b!important; border-radius: 25px;border-color:#d6355b!important;">
              OK
          </button>
      </div>
    </div>
  </div>
</div>
<!-- And modal-->

<div class="u-clearfix u-expanded-width-lg u-expanded-width-md u-expanded-width-xl u-expanded-width-xs u-gutter-0 u-layout-wrap u-layout-wrap-1">
  <div class="u-layout" style="">
    <div class="u-layout-row" style="">
      <div class="u-align-left u-container-style u-custom-color-10 u-layout-cell u-right-cell u-size-60 u-size-xs-60 u-layout-cell-2">
        <div class="u-container-layout u-container-layout-2">
          <div class="container">
            <div id="content">
              <div class="list-group">
                <?php foreach ($challenges as $challenge) : ?>
                  <?= view_cell('\App\Libraries\CurrChallenge::currChallengeItem', $challenge) ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- Mia Vucinic 0224/2019 -->
<div class="list-group-item trainer-user" id="user_<?= $id ?>">
    <div class="row align-items-center text-sm-center text-md-left">
        <div class="col-sm-12 col-md-2 text-center">
            <i class="fas fa-user fa-6x"></i>
        </div>
        <div class="col-sm-12 col-md-7 col-lg-8">
            <p class="trainer-name nice-font"><?= $username ?></p>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-2 text-center">
            <h2 class="challenge-points"><?= $points ?></h2>
        </div>
    </div>
    <div class="row text-sm-center text-md-right">
        <div class="col-sm-12 col-md-12">
            <button type="button" class="btn btn-primary btn-floating btn-delete nice-font" name="deletebtn" id="<?= $id ?>">
                <i class="fas fa-trash-alt"></i>
                DELETE
            </button>
        </div>
    </div>
</div>
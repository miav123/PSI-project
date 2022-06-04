<!-- Mia Vucinic 0224/2019 -->
<div class="container">
    <div id="content">
        <div class="list-group">

            <?php foreach ($trainers as $trainer) : ?>
                <?= view_cell('\App\Libraries\Trainer::trainerItem', $trainer) ?>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<script>
    $(".btn-delete").click(function () {
        $.post("/admin/deletetrainer/" + $(this).attr("id"), {
            'deletebtn' : "deletebtn"
        });
        $("#trainer_" + $(this).attr("id")).hide(1000);
    });
</script>
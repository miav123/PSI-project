<!-- Mia Vucinic 0224/2019 -->
<div class="container">
        <div id="content">
            <div class="list-group">

                <?php foreach ($challenges as $challenge) : ?>
                    <?= view_cell('\App\Libraries\Challenge::challengeItem', $challenge) ?>
                <?php endforeach; ?>

            </div>
        </div>
</div>

<script>
    $(".btn-delete").click(function () {
        $.post("/admin/deletechallenge/" + $(this).attr("id"), {
            'deletebtn' : "deletebtn"
        });
        $("#challenge_" + $(this).attr("id")).hide(1000);
    });
</script>

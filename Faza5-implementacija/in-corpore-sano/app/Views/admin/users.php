<!-- Mia Vucinic 0224/2019 -->
<div class="container">
    <div id="content">
        <div class="list-group">

            <?php foreach ($users as $user) : ?>
                <?= view_cell('\App\Libraries\User::userItem', $user) ?>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<script>
    $(".btn-delete").click(function () {
        $.post("/admin/deleteuser/" + $(this).attr("id"), {
            'deletebtn' : "deletebtn"
        });
        $("#user_" + $(this).attr("id")).hide(1000);
    });
</script>
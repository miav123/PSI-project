
<div class="container">
    <div id="content">
        <div class="list-group">

            <?php foreach ($users as $user) : ?>
                <?= view_cell('\App\Libraries\User::userItem', $user) ?>
            <?php endforeach; ?>

        </div>
    </div>
</div>

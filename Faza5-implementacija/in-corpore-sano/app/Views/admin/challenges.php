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



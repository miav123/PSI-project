<section class="u-clearfix u-custom-color-10 u-section-1" id="sec-f86b">
    <div class="u-clearfix u-sheet u-sheet-1">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Place</th>
                    <th scope="col">Username</th>
                    <th scope="col">Score</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($regusers as $reguser) : ?>
                    <?= view_cell('\App\Libraries\Rank::rankItem', $reguser) ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

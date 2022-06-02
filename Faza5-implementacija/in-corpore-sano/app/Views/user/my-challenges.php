<!-- Tijana Mitrovic 2019/0001 -->

<section class="u-clearfix u-custom-color-10 u-section-1" id="sec-f86b">
    <div class="u-clearfix u-expanded-width-lg u-expanded-width-md u-expanded-width-xl u-expanded-width-xs u-gutter-0 u-layout-wrap u-layout-wrap-1">
        <div class="u-layout" style="">
            <div class="u-layout-row" style="">
                <div class="u-align-left u-container-style u-custom-color-10 u-layout-cell u-right-cell u-size-60 u-size-xs-60 u-layout-cell-2">
                    <div class="u-container-layout u-container-layout-2">
                        <div class="container">
                            <div id="content">
                                <div class="list-group">
                                    <?php foreach ($mychallenges as $mychallenge) : ?>
                                        <?= view_cell('\App\Libraries\MyChallenge::myChallengeItem', $mychallenge) ?>
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
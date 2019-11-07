<!-- Team Section -->
<section class="commonSection team">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h4 class="sub_title"><?= $teamsSubTitle; ?></h4>
                <h2 class="sec_title"><?= $teamsMainTitle; ?></h2>
                <p class="sec_desc">
                    <?= $teamsDescription; ?>
                </p>
            </div>
        </div>
    </div>
    <div class="team_slider">
        <?php foreach ($teams as $team): ?>
            <div class="singleTM">
                <div class="tm_img">
                    <img src="<?= bgl_helper::get_image_url(get_field('team_member_image', $team), 'team_image_size', $teamImageSize); ?>"
                         alt="<?= bgl_helper::get_image_alt(get_field('team_member_image', $team)); ?>">
                    <div class="tm_overlay">
                        <!--                                            <div class="team_social">-->
                        <!--                                                <a href="#"><span>Facebook</span></a>-->
                        <!--                                                <a href="#"><span>Twitter</span></a>-->
                        <!--                                                <a href="#"><span>Youtube</span></a>-->
                        <!--                                            </div>-->
                        <!--                                            <a href="#" class="common_btn"><span>learn more</span></a>-->
                    </div>
                </div>
                <div class="detail_TM">
                    <h5><?= get_field('team_member_name', $team) ?></h5>
                    <h6><?= get_field('team_member_position', $team) ?></h6>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<!-- Team Section -->
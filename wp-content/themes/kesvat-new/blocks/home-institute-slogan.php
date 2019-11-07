<!-- About Agency Section -->
<section class="commonSection ab_agency">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 PR_79">
                <h4 class="sub_title"><?= $instituteSloganSubTitle; ?></h4>
                <h2 class="sec_title MB_45"><?= $instituteSloganMainTitle ?></h2>
                <p class="sec_desc">
                    <?= $instituteSloganDescription ?>
                </p>
                <?php if ($instituteSloganHasButton): ?>
                    <a class="common_btn red_bg" href="<?= $instituteSloganButton['url']; ?>"
                       target="<?= $instituteSloganButton['target']; ?>"><span><?= $instituteSloganButton['title']; ?></span></a>
                <?php endif; ?>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6">
                <?php foreach ($instituteSloganImages as $key => $instituteSloganImage): ?>
                    <?php if ($key == 0): ?>
                        <div class="ab_img1">
                            <img src="<?= bgl_helper::get_image_url($instituteSloganImage['image'], 'institute_slogan_image', $instituteSloganImage); ?>"
                                 alt="<?= bgl_helper::get_image_alt($instituteSloganImage); ?>"/>
                        </div>
                    <?php elseif ($key == 1): ?>
                        <div class="ab_img2">
                            <img src="<?= bgl_helper::get_image_url($instituteSloganImage['image'], 'institute_slogan_image', $instituteSloganImage); ?>"
                                 alt="<?= bgl_helper::get_image_alt($instituteSloganImage); ?>"/>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- About Agency Section -->
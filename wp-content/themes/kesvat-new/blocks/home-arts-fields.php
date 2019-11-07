<!-- Portfolio Section -->
<section class="commonSection porfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h4 class="sub_title"><?= $artFieldsSubTitle; ?></h4>
                <h2 class="sec_title"><?= $artFieldsMainTitle; ?></h2>
                <p class="sec_desc">
                    <?= $artFieldsDescription; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($artFields as $artField): ?>
                <a href="<?= get_the_permalink(pll__('artist_overview_id')); ?>">
                    <div class="col-lg-4 col-sm-6 col-md-4">
                        <div class="singlefolio">
                            <img src="<?= bgl_helper::get_image_url(get_field('category_image', $artField), 'art_fields_image_size', $artFieldsImageSize); ?>"
                                 alt="<?= bgl_helper::get_image_alt(get_field('category_image', $artField)); ?>"/>
                            <div class="folioHover">
                                <!--                            <a class="cate" href="#">Graphic</a>-->
                                <a href="<?= get_the_permalink(pll__('artist_overview_id')); ?>">
                                    <h4><?= $artField->name; ?></h4></a>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Portfolio Section -->
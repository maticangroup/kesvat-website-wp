<!-- Portfolio Section -->
<section class="commonSection porfolio what_wedo_2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h4 class="sub_title"><?= $latestVideosSubTitle; ?></h4>
                <h2 class="sec_title"><?= $latestVideosMainTitle; ?></h2>
                <p class="sec_desc">
                    <?= $latestVideosDescription; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($videos as $video): ?>
                <a href="<?= get_the_permalink($video); ?>">
                    <div class="col-lg-4 col-sm-6 col-md-4">
                        <div class="singlefolio">
                            <img src="<?= bgl_helper::get_image_url(get_field('video_thumbnail', $video), 'art_fields_image_size', $artFieldsImageSize); ?>"
                                 alt="<?= bgl_helper::get_image_alt(get_field('video_thumbnail', $video)); ?>"/>
                            <div class="folioHover">
                                <!--                            <a class="cate" href="#">Graphic</a>-->
                                <a class="cate" href="<?= get_the_permalink($video); ?>">
                                    <h4><?= $video->post_title; ?></h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Portfolio Section -->
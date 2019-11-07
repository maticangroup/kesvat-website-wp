<!-- What We Do Section -->
<section class="commonSection what_wedo">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h4 class="sub_title"><?= $introductionVideoSubTitle; ?></h4>
                <h2 class="sec_title"><?= $introductionVideoMainTitle; ?></h2>
                <p class="sec_desc">
                    <?= $introductionVideoDescription; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="videoWrap">
                    <img src="<?= bgl_helper::get_image_url($introductionVideoImage, 'introduction_image_size', $introductionVideoImageSize); ?>"
                         alt="<?= bgl_helper::get_image_alt($introductionVideoImage); ?>">
                    <div class="play_video">
                        <a class="video_popup" href="<?= $introductionVideo; ?>"><i
                                    class="fa fa-play"></i></a>
                        <h2 class="white"><?= $introductionVideoTitle; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-5 col-md-4">
                <h4 class="sub_title"><?= $subscribeSubTitle; ?></h4>
                <h2 class="sec_title"><?= $subscribeMainTitle; ?></h2>
            </div>
            <div class="col-lg-8 col-sm-7 col-md-8">
                <form action="" method="post" class="subscribefrom" id="subscribeForm">
                    <input type="email" placeholder="<?= $subscribePlaceholder; ?>" name="email" class="required">
                    <button class="common_btn red_bg" type="submit" name="submit"><span><?= $subscribeButtonTitle; ?></span></button>
                    <?php wp_nonce_field('subscribe-form', '_token'); ?>
                </form>
            </div>
        </div>
        <div id="fail_message" class="form-message fail"></div>
        <div id="success_message" class="form-message success"></div>
    </div>
</section>
<!-- What We Do Section -->
<!-- Portfolio Detail Section -->
<section class="commonSection porfolioDetail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-7 col-md-8">
                <?php foreach ($artistImages as $artistImage): ?>
                    <div class="portDetailThumb">
                        <img src="<?= bgl_helper::get_image_url($artistImage['artist_image'], 'artist_images_size', $artistImagesSize); ?>"
                             alt="<?= bgl_helper::get_image_alt($artistImage['artist_image']); ?>"/>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-4 col-sm-5 col-md-4">
                <div class="singlePortfoio_content">
                    <h3><?= pll__('about_artist_title'); ?>:</h3>
                    <p>
                        <?= $artistDescription; ?>
                    </p>
                </div>
                <div class="singlePortfoio_content">
                    <h4><?= pll__('name_artist_title'); ?>:</h4>
                    <p><?= $artistName; ?></p>
                </div>
                <div class="singlePortfoio_content">
                    <h4><?= pll__('art_fields_artist_title'); ?>:</h4>
                    <?php $artFieldsCount = count($artistArtFields); ?>
                    <p><?php foreach ($artistArtFields as $key => $artField):
                            if ($key + 1 == $artFieldsCount):
                                echo $artField->name;
                            else:
                                echo $artField->name . " , ";
                            endif;
                        endforeach; ?></p>
                </div>
                <div class="singlePortfoio_content">
                    <h4><?= pll__('birth_date_artist_title'); ?>:</h4>
                    <p><?= $artistBirthDate; ?></p>
                </div>
                <div class="singlePortfoio_content">
                    <h4><?= pll__('social_media_artist_title'); ?>:</h4>
                    <ul>
                        <li><a href="<?= $artistInstagram; ?>"><?= pll__('instagram_artist_title'); ?></a></li>
                        <li><a href="<?= $artistFaceBook; ?>"><?= pll__('facebook_artist_title'); ?></a></li>
                        <li><a href="<?= $artistTwitter; ?>"><?= pll__('twitter_artist_title'); ?></a></li>
                        <li><a href="<?= $artistTelegram; ?>"><?= pll__('telegram_artist_title'); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Detail Section -->
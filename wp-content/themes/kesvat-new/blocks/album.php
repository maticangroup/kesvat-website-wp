<!-- Portfolio Section -->
<section class="commonSection porfolioPage">
    <div class="container">
        <div class="row">
            <?php foreach ($albumImages as $albumImage): ?>
                <div class="col-lg-4 col-sm-6 col-md-4">
                    <div class="singlefolio">
                        <img src="<?= bgl_helper::get_image_url($albumImage['album_image'], 'team_image_size', $teamImageSize); ?>"
                             alt="<?= bgl_helper::get_image_alt($albumImage['album_image']); ?>"/>
                        <div class="folioHover">
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Portfolio Section -->
<!-- Portfolio Section -->
<section class="commonSection porfolioPage">
    <div class="container">
        <div class="row" id="Grid">
            <div class="custom">

                <?php foreach ($videosAlbums as $artist): ?>
                    <a href="<?= get_the_permalink($artist); ?>">
                        <div class="col-lg-4 col-sm-6 col-md-4 mix">
                            <div class="singlefolio">
                                <img src="<?= bgl_helper::get_image_url(get_field('video_thumbnail', $artist), 'art_fields_image_size', $artFieldsImageSize); ?>"
                                     alt="<?= bgl_helper::get_image_alt(get_field('video_thumbnail', $artist)); ?>"/>
                                <div class="folioHover">
                                    <h4><a href="<?= get_the_permalink($artist); ?>"><?= $artist->post_title; ?></a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Section -->
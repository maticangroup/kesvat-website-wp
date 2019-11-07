<!-- Portfolio Section -->
<section class="commonSection porfolioPage">
    <div class="container">
        <?php
        $counter = 1;
        foreach ($videosAlbums as $artist): ?>
            <?php if ($counter % 3 == 0): ?>
                <div class="row">
            <?php endif; ?>
            <a href="<?= get_the_permalink($artist); ?>">
                <div class="col-lg-4 col-sm-6 col-md-4 mix">
                    <div class="singlefolio">
                        <img src="<?= bgl_helper::get_image_url(get_field('album_video_thumbnail', $artist), 'art_fields_image_size', $artFieldsImageSize); ?>"
                             alt="<?= bgl_helper::get_image_alt(get_field('album_video_thumbnail', $artist)); ?>"/>
                        <div class="folioHover">
                            <h4><a href="<?= get_the_permalink($artist); ?>"><?= $artist->post_title; ?></a>
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
            <?php if ($counter % 3 == 0): ?>
                </div>
            <?php endif; ?>
            <?php $counter++; endforeach; ?>
    </div>
</section>
<!-- Portfolio Section -->
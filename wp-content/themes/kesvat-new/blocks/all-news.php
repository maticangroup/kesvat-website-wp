<!-- Blog Section -->
<section class="commonSection blogPage">
    <div class="container">
        <!--        <div class="row">-->
        <?php
        $counter = 1;
        foreach ($allNews as $key => $newsItem): ?>
            <?php if ($counter % 3 == 0): ?>
                <div class="row">
            <?php endif; ?>
            <a href="<?= get_permalink($newsItem); ?>">
                <div class="col-lg-4 col-sm-6 col-md-4">
                    <div class="latestBlogItem">
                        <div class="lbi_thumb">
                            <img src="<?= bgl_helper::get_image_url(get_field('news_thumbnail_image', $newsItem), 'news_thumbnail_image_size', $newsThumbnailImageSize); ?>"
                                 alt="<?= bgl_helper::get_image_alt(get_field('news_thumbnail_image', $newsItem)); ?>">
                        </div>
                        <div class="lbi_details">
                            <?php if (get_field('news_date', $newsItem)): ?>
                                <span class="lbid_date"><?= get_field('news_date', $newsItem); ?></span>
                            <?php endif; ?>
                            <h2><a href="<?= get_permalink($newsItem); ?>"><?= $newsItem->post_title; ?></a></h2>
                            <a class="learnM" href="<?= get_permalink($newsItem); ?>"><?= pll__('see_more'); ?></a>
                        </div>
                    </div>
                </div>
            </a>
            <?php if ($counter % 3 == 0): ?>
                </div>
            <?php endif; ?>
            <?php $counter++; endforeach; ?>
        <!--        </div>-->
    </div>
</section>
<!-- Blog Section -->
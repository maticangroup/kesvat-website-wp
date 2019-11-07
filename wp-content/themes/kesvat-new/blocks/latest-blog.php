<!-- Blog Section -->
<section class="commonSection blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h4 class="sub_title"><?= $blogSubTitle; ?></h4>
                <h2 class="sec_title"><?= $blogMainTitle; ?></h2>
                <p class="sec_desc">
                    <?= $blogDescription; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <?php $blogCount = count($blogs);
            foreach ($blogs as $key => $newsItem): ?>
                <a href="<?= get_permalink($newsItem); ?>">
                    <div class="col-lg-4 col-sm-6 col-md-4">
                        <div class="latestBlogItem">
                            <div class="lbi_thumb">
                                <img src="<?= bgl_helper::get_image_url(get_field('blog_thumbnail', $newsItem), 'news_thumbnail_image_size', $newsThumbnailImageSize); ?>"
                                     alt="<?= bgl_helper::get_image_alt(get_field('blog_thumbnail', $newsItem)); ?>">
                            </div>
                            <div class="lbi_details">
                                <?php if (get_field('blog_date', $newsItem)): ?>
                                    <span class="lbid_date"><?= get_field('blog_date', $newsItem); ?></span>
                                <?php endif; ?>
                                <h2><a href="<?= get_permalink($newsItem); ?>"><?= $newsItem->post_title; ?></a></h2>
                                <a class="learnM" href="<?= get_permalink($newsItem); ?>"><?= pll__('see_more'); ?></a>
                            </div>
                        </div>
                    </div>
                </a>
                <?php if ($key + 1 == $blogCount - 1): ?>
                    <div class="clearfix hidden-lg hidden-md hidden-xs"></div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Blog Section -->
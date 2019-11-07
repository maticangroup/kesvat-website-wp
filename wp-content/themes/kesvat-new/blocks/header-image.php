<!-- Page Banner -->
<section class="pageBanner"
         style="background-image: url('<?= bgl_helper::get_image_url($headerImage, 'header_image_size', $headerImageSize); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner_content text-center">
                    <?php if (is_single()): ?>
                        <?php if (get_queried_object()->post_type == "post"): ?>
                            <h4>
                                <a href="<?= get_the_permalink(pll__('home_id')); ?>"><?= get_the_title(pll__('home_id')); ?></a>
                                -
                                <a href="<?= get_the_permalink(pll__('news_overview_id')); ?>"><?= get_the_title(pll__('news_overview_id')); ?></a>
                                - <?= get_queried_object()->post_title; ?></h4>
                            <h2><?= get_queried_object()->post_title; ?></h2>
                        <?php elseif (get_queried_object()->post_type == "album"): ?>
                            <h4>
                                <a href="<?= get_the_permalink(pll__('home_id')); ?>"><?= get_the_title(pll__('home_id')); ?></a>
                                -
                                <a href="<?= get_the_permalink(pll__('album_overview_id')); ?>"><?= get_the_title(pll__('album_overview_id')); ?></a>
                                - <?= get_queried_object()->post_title; ?></h4>
                            <h2><?= get_queried_object()->post_title; ?></h2>
                        <?php elseif (get_queried_object()->post_type == "video"): ?>
                            <h4>
                                <a href="<?= get_the_permalink(pll__('home_id')); ?>"><?= get_the_title(pll__('home_id')); ?></a>
                                -
                                <a href="<?= get_the_permalink(pll__('video_overview_id')); ?>"><?= get_the_title(pll__('video_overview_id')); ?></a>
                                - <?= get_queried_object()->post_title; ?></h4>
                            <h2><?= get_queried_object()->post_title; ?></h2>
                        <?php elseif (get_queried_object()->post_type == "blog"): ?>
                            <h4>
                                <a href="<?= get_the_permalink(pll__('home_id')); ?>"><?= get_the_title(pll__('home_id')); ?></a>
                                -
                                <a href="<?= get_the_permalink(pll__('blog_overview_id')); ?>"><?= get_the_title(pll__('blog_overview_id')); ?></a>
                                - <?= get_queried_object()->post_title; ?></h4>
                            <h2><?= get_queried_object()->post_title; ?></h2>
                        <?php endif; ?>
                    <?php elseif (is_tax()): ?>
                        <h4>
                            <a href="<?= get_the_permalink(pll__('home_id')); ?>"><?= get_the_title(pll__('home_id')); ?></a>
                            -
                            <a href="<?= get_the_permalink(pll__('artist_overview_id')); ?>"><?= get_the_title(pll__('artist_overview_id')); ?></a>
                            - <?= get_queried_object()->name; ?></h4>
                        <h2><?= get_queried_object()->name; ?></h2>
                    <?php else: ?>
                        <h4>
                            <a href="<?= get_the_permalink(pll__('home_id')); ?>"><?= get_the_title(pll__('home_id')); ?></a>
                            - <?= get_the_title(); ?></h4>
                        <h2><?= get_the_title(); ?></h2>
                        <?php if (get_queried_object()->ID == 269): ?>
                        <h2>(اعضا)</h2>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page Banner -->
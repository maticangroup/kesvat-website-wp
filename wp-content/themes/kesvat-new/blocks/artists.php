<!-- Portfolio Section -->
<section class="commonSection porfolioPage">
    <div class="container">
        <!--        Search-->
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12"></div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <input class="live-search-box input-form required" type="text"
                       placeholder="جستجو هنرمند">
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12"></div>
        </div>
        <!--        Search-->
        <div class="row">
            <div class="col-lg-12">
                <div class="folio_mixing">
                    <ul>
                        <li class="filter active" data-filter="all"><?= pll__('all_filter'); ?></li>
                        <?php foreach ($artFields as $artField): ?>
                            <li class="filter" data-filter="<?= $artField->slug; ?>"><?= $artField->name; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row" id="Grid">
            <div class="custom">

                <?php foreach ($artists as $artist): ?>
                    <a href="<?= get_term_link($artist); ?>" class="artist-search">
                        <div class="col-lg-4 col-sm-6 col-md-4 mix <?php foreach (get_field('art_fields', $artist) as $item): ?> <?= $item->slug; ?> <?php endforeach; ?>">

                            <div class="singlefolio">
                                <img src="<?= bgl_helper::get_image_url(get_field('artist_portrait_image', $artist), 'art_fields_image_size', $artFieldsImageSize); ?>"
                                     alt="<?= bgl_helper::get_image_alt(get_field('artist_portrait_image', $artist)); ?>"/>

                                <div class="folioHover">
                                    <!--                                <a class="cate" href="#">Graphic</a>-->
                                    <h4><?= $artist->name; ?></h4>
                                </div>


                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <!--        <div class="row mt_30">-->
        <!--            <div class="col-lg-12 text-center">-->
        <!--                <a class="common_btn red_bg" href="#"><span>Load More</span></a>-->
        <!--            </div>-->
        <!--        </div>-->
    </div>
</section>
<!-- Portfolio Section -->
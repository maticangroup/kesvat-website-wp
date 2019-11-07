<!-- Testimonial 2 Section -->
<section class="commonSection testimonial_2">
    <div class="container">
        <div class="row">
            <div id="tabs" class="testimoniTab">
                <div class="col-lg-5 col-sm-5">
                    <h4 class="sub_title color_aaa"><?= $testimonialSubTitle; ?></h4>
                    <h2 class="sec_title white"><?= $testimonialMainTitle; ?></h2>
                    <ul class="slider_testimoial">
                        <?php $counterOne = 1;
                        foreach ($testimonials as $key => $testimonial): ?>
                            <li class="<?= ($key == 0) ? "active" : ""; ?> control_item">
                                <a href="#tab_<?= $counterOne; ?>" data-toggle="tab">
                                    <span><img src="<?= bgl_helper::get_image_url(get_field('testimonial_person_image', $testimonial), 'testimonial_image_size', $testimonialImageSize); ?>"
                                               alt="<?= bgl_helper::get_image_alt(get_field('testimonial_person_image', $testimonial)); ?>"/></span>
                                    <div class="author_detail">
                                        <h5><?= get_field('testimonial_person_name', $testimonial); ?></h5>
                                        <h6><?= get_field('testimonial_person_position', $testimonial); ?></h6>
                                    </div>
                                </a>
                            </li>
                        <?php $counterOne++; endforeach; ?>
                    </ul>
                </div>
                <div class="col-lg-7 col-sm-7">
                    <div class="dots_owl"></div>
                    <div class="tab-content clearfix">
                        <?php $counter = 1;
                        foreach ($testimonials as $key => $testimonial): ?>
                            <div class="tab-pane fade in testi_con <?= ($key == 0) ? "active" : ""; ?>"
                                 id="tab_<?= $counter; ?>">
                                <p>
                                    <?= get_field('testimonial_person_description', $testimonial); ?>
                                </p>
                                <span><?= get_field('testimonial_date', $testimonial); ?></span>
                            </div>
                            <?php $counter++; endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial 2 Section -->
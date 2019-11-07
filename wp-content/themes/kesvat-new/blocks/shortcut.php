<section class="service_section_2 commonSection what_wedo_2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                <img class="header-logo" src="<?= bgl_helper::get_image_url($logo, 'institute_logo_image', $instituteLogoImage); ?>"
                     alt="<?= bgl_helper::get_logo_alt($logo); ?>">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="row">
                    <?php foreach ($shortcuts as $shortcut): ?>
                        <div class="col-xs-12 col-lg-3 col-sm-6 col-md-4 mt_15 mb_15">
                            <a href="<?= $shortcut['shortcut_link']['url']; ?>" class="icon_box_1 text-center">
                                <div class="h-100">
                                    <div class="front">
                                        <!--                                        <i class="mei-web-design"></i>-->
                                        <img
                                                src="<?= bgl_helper::get_image_url($shortcut['shortcut_image'], 'short_image_size', $shortcutImageSize); ?>"
                                                alt="<?= bgl_helper::get_logo_alt($shortcut['shortcut_image']); ?>"/>
                                        <h3><?= $shortcut['shortcut_name']; ?></h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
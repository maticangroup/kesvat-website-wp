<!-- Footer Section -->
<footer class="footer_1">
    <div class="container">
        <div class="row">
            <?php $logo = get_field('footer_logo', pll__('home_id')); ?>
            <div class="col-lg-5 col-sm-6 col-md-5">
                <aside class="widget aboutwidget">
                    <a href="<?= get_the_permalink(pll__('home_id')); ?>"><img
                                src="<?= bgl_helper::get_image_url($logo, 'logo_image_size', $logoImageSize); ?>"
                                alt="<?= bgl_helper::get_logo_alt($logo); ?>"></a>
                    <p>
                        <?= get_field('footer_about', pll__('home_id')); ?>
                    </p>
                </aside>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4">
                <aside class="widget contact_widgets">
                    <h3 class="widget_title"><?= pll__('contact_title'); ?></h3>
                    <p>
                        <?= get_field('address', pll__('contact_page_id')); ?>
                    </p>
                    <p><?= pll__('phone_title'); ?>: <a
                                href="<?= bgl_helper::get_phone_link(get_field('phone', pll__('contact_page_id'))); ?>"><?= get_field('phone', pll__('contact_page_id')); ?></a>
                    </p>
                    <p><?= pll__('email_title'); ?>: <a
                                href="<?= bgl_helper::get_email_link(get_field('email', pll__('contact_page_id'))); ?>"><?= get_field('email', pll__('contact_page_id')); ?></a>
                    </p>
                </aside>
            </div>
            <div class="col-lg-3 col-sm-2 col-md-3">
                <aside class="widget social_widget">
                    <h3 class="widget_title"><?= pll__('social_title'); ?></h3>
                    <ul>
                        <!--                        <li><a href="-->
                        <? //= get_field('social_twitter', pll__('contact_page_id')); ?><!--"><i-->
                        <!--                                        class="fa fa-twitter m-l"></i>-->
                        <? //= pll__('twitter_title'); ?><!--</a></li>-->
                        <!--                        <li><a href="-->
                        <? //= get_field('social_facebook', pll__('contact_page_id')); ?><!--"><i-->
                        <!--                                        class="fa fa-facebook-square m-l"></i>-->
                        <? //= pll__('facebook_title'); ?><!--</a></li>-->
                        <!--                        <li><a href="-->
                        <? //= get_field('social_youtube', pll__('contact_page_id')); ?><!--"><i-->
                        <!--                                        class="fa fa-youtube-play m-l"></i>-->
                        <? //= pll__('youtube_title'); ?><!--</a></li>-->
                        <li><a href="<?= get_field('social_instagram', pll__('contact_page_id')); ?>" target="_blank"><i
                                        class="fa fa-instagram m-l"></i><?= pll__('instagram_title'); ?></a></li>
                        <li><a href="<?= get_field('social_whatsapp', pll__('contact_page_id')); ?>" target="_blank"><i
                                        class="fa fa-whatsapp m-l"></i><?= pll__('whatsapp_title'); ?></a></li>
                        <!--                        <li><a href="-->
                        <? //= get_field('social_aparat', pll__('contact_page_id')); ?><!--"><i-->
                        <!--                                        class="fa fa-play m-l"></i>-->
                        <? //= pll__('aparat_title'); ?><!--</a></li>-->
                        <!--                        <li><a href="-->
                        <? //= get_field('social_telegram', pll__('contact_page_id')); ?><!--"><i-->
                        <!--                                        class="fa fa-telegram m-l"></i>-->
                        <? //= pll__('telegram_title'); ?><!--</a></li>-->
                        <li><a href="<?= get_field('social_bale', pll__('contact_page_id')); ?>" target="_blank"><i
                                        class="fa fa-superpowers m-l"></i><?= pll__('bale_title'); ?></a></li>
                        <li><a href="<?= get_field('social_sorosh', pll__('contact_page_id')); ?>" target="_blank"><i
                                        class="fa fa-ravelry m-l"></i><?= pll__('sorosh_title'); ?></a></li>
                    </ul>
                </aside>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="copyright">
                    © <?= pll__('copy_right_title'); ?> <a href="http://maticangroup.com" target="_blank">Matican</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section -->

<!-- Bact To To -->
<a id="backToTop" href="#" class=""><i class="fa fa-angle-double-up"></i></a>
<!-- Bact To To -->

<!-- Include All JS -->
<script src="<?= get_template_directory_uri(); ?>/js/jquery.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>
<!--<script src="--><? //= get_template_directory_uri(); ?><!--/js/gmaps.js"></script>-->
<!--<script src="https://maps.google.com/maps/api/js?key=AIzaSyCgzXsq-wmCWeKy-cm7stIq_-WR91LEm1U"></script>-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="<?= get_template_directory_uri(); ?>/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/jquery.themepunch.tools.min.js"></script>
<!-- Rev slider Add on Start -->
<script src="<?= get_template_directory_uri(); ?>/js/extensions/revolution.extension.actions.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/extensions/revolution.extension.migration.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/extensions/revolution.extension.video.min.js"></script>
<!-- Rev slider Add on End -->
<script src="<?= get_template_directory_uri(); ?>/js/dlmenu.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/jquery.magnific-popup.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/mixer.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/jquery.easing.1.3.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/owl.carousel.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/slick.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/jquery.appear.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/theme.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/form.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/subscribe.js"></script>
<!-- Include All JS -->

<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/map-sdk/js/jquery.env.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/map-sdk/js/s.map.styles.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/map-sdk/js/s.map.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/map-sdk/map.js"></script>

<script>
    jQuery(document).ready(function ($) {

        $('.artist-search').each(function () {
            $(this).attr('data-search-term', $(this).text().toLowerCase());
        });
        $('.live-search-box').on('keyup', function () {
            var searchTerm = $(this).val().toLowerCase();
            $('.artist-search').each(function () {
                if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

        });

        persian = {0: '۰', 1: '۱', 2: '۲', 3: '۳', 4: '۴', 5: '۵', 6: '۶', 7: '۷', 8: '۸', 9: '۹'};

        function traverse(el) {
            if (el.nodeType == 3) {
                var list = el.data.match(/[0-9]/g);
                if (list != null && list.length != 0) {
                    for (var i = 0; i < list.length; i++)
                        el.data = el.data.replace(list[i], persian[list[i]]);
                }
            }
            for (var i = 0; i < el.childNodes.length; i++) {
                traverse(el.childNodes[i]);
            }
        }

        traverse(document.body);

    });
</script>

<?php wp_footer() ?>
</body>
</html>
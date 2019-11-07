<!-- Revolution Slider -->
<section class="rev_slider slider_2">
    <div class="rev_slider_wrapper">
        <div id="rev_slider_2" class="rev_slider" data-version="5.4.5">
            <ul>
                <!-- MINIMUM SLIDE STRUCTURE -->

                <?php foreach ($homeSliders as $homeSlider): ?>
                    <li data-transition="random" data-masterspeed="1000" >
                        <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                        <img src="<?= bgl_helper::get_image_url($homeSlider['image'], 'home_slider', $homeSliderImage); ?>"
                             alt="<?= bgl_helper::get_image_alt($homeSlider['image']); ?>" class="rev-slidebg">
                        <div class="tp-caption tp-resizeme normalWraping layer_1 white"

                             data-frames='[{"delay":1200,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                 {"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-x="<?php if (bgl_helper::get_current_language() == "en_US"): ?>left<?php else: ?>right<?php endif; ?>"
                             data-y="center"
                             data-hoffset="<?php if (bgl_helper::get_current_language() == "en_US"): ?>['0', '100', '120', '0']<?php else: ?>['150', '150', '120', '0']<?php endif; ?>"
                             data-voffset="['-184', '-170', '-140', '-90']"
                             data-width="100%"
                             data-height="['auto]"
                             data-whitesapce="['normal']"
                             data-fontsize="20"
                             data-lineheight="36"
                             data-fontweight="400"
                             data-letterspacing="2"
                             data-color="#000"
                             data-textAlign="<?php if (bgl_helper::get_current_language() == "en_US"): ?>['left', 'left', 'left', 'center']<?php else: ?>['right', 'right', 'right', 'center']<?php endif; ?>"
                        ><?= $homeSlider['sub_title']; ?>
                        </div>
                        <div class="tp-caption tp-resizeme normalWraping layer_2 white"

                             data-frames='[{"delay":1600,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                 {"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-x="<?php if (bgl_helper::get_current_language() == "en_US"): ?>left<?php else: ?>right<?php endif; ?>"
                             data-y="center"
                             data-hoffset="<?php if (bgl_helper::get_current_language() == "en_US"): ?>['0', '100', '120', '0']<?php else: ?>['150', '150', '120', '0']<?php endif; ?>"
                             data-voffset="['8', '0', '0', '0']"
                             data-width="100%"
                             data-height="['auto]"
                             data-whitesapce="['normal']"
                             data-word-wrap="['normal']"
                             data-white-break="['break-all']"
                             data-fontsize="['90', '70', '60', '30']"
                             data-lineheight="['112', '90', '80', '44']"
                             data-fontweight="700"
                             data-letterspacing="['4.4', '4.4', '4.4', '2']"
                             data-color="#000"
                             data-textAlign="<?php if (bgl_helper::get_current_language() == "en_US"): ?>['left', 'left', 'left', 'center']<?php else: ?>['right', 'right', 'right', 'center']<?php endif; ?>"
                        ><?= $homeSlider['main_title']; ?>
                        </div>
                        <div class="tp-caption tp-resizeme normalWraping layer_3 white"

                             data-frames='[{"delay":2000,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                 {"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-x="<?php if (bgl_helper::get_current_language() == "en_US"): ?>left<?php else: ?>right<?php endif; ?>"
                             data-y="center"
                             data-hoffset="<?php if (bgl_helper::get_current_language() == "en_US"): ?>['0', '100', '120', '0']<?php else: ?>['150', '150', '120', '0']<?php endif; ?>"
                             data-voffset="['273', '220', '190', '140']"
                             data-width="100%"
                             data-height="['auto]"
                             data-whitesapce="['normal']"
                             data-fontsize="16"
                             data-lineheight=""
                             data-fontweight="400"
                             data-textAlign="<?php if (bgl_helper::get_current_language() == "en_US"): ?>['left', 'left', 'left', 'center']<?php else: ?>['right', 'right', 'right', 'center']<?php endif; ?>">
                            <?php if ($homeSlider['has_button']): ?>
                                <a href="<?= $homeSlider['button']['url']; ?>" class="common_btn red_bg"
                                   target="<?= $homeSlider['button']['target']; ?>"><span><?= $homeSlider['button']['title']; ?></span></a>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul><!-- END SLIDES LIST -->
        </div>
    </div>
</section>
<!-- Revolution Slider -->
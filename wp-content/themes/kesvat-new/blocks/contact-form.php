<!-- Contact Section -->
<section class="commonSection ContactPage">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h4 class="sub_title"><?= $contactFormSubTitle; ?></h4>
                <h2 class="sec_title"><?= $contactFormMainTitle; ?></h2>
                <p class="sec_desc">
                    <?= $contactFormDescription; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-sm-12 col-md-10 col-md-offset-1">
                <form action="#" method="post" class="contactFrom" id="contactForm">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <input class="input-form required" type="text" name="f_name" id="f_name"
                                   placeholder="<?= $contactFormFirstNamePlaceholder; ?>">
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <input class="input-form required" type="text" name="l_name" id="l_name"
                                   placeholder="<?= $contactFormLastNamePlaceholder; ?>">
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <input class="input-form required" type="email" name="email" id="email"
                                   placeholder="<?= $contactFormEmailPlaceholder; ?>">
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <input class="input-form required" type="text" name="phone" id="phone"
                                   placeholder="<?= $contactFormPhonePlaceholder; ?>">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <textarea class="input-form required" name="message" id="con_message"
                                      placeholder="<?= $contactFormMessagePlaceholder; ?>"></textarea>
                        </div>
                    </div>
                    <button
                            class="form-submit-btn g-recaptcha common_btn red_bg"
                            id="con_submit"
                            data-sitekey="<?= get_field('recaptcha_site_key', 'options'); ?>"
                            data-callback="ContactForm"
                            type="submit">
                        <span><?= $contactFormButtonTitle; ?></span>
                    </button>
                    <?php wp_nonce_field('contact-form', '_token'); ?>
                </form>
            </div>
        </div>
        <div id="fail_message" class="form-message fail"></div>
        <div id="success_message" class="form-message success"></div>
    </div>
</section>
<!-- Contact Section -->
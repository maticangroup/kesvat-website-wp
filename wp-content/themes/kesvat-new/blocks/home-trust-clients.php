<!-- Trust Clients Section -->
<section class="commonSection trustClient">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="CL_content">
                    <img src="<?= bgl_helper::get_image_url($trustClientsImage, 'trust_client_image_size', $trustClientImageSize); ?>"
                         alt="<?= bgl_helper::get_image_alt($trustClientsImage); ?>">
                    <div class="abc_inner">
                        <div class="row">
                            <div class="col-lg-5 col-sm-5 col-md-5">
                            </div>
                            <div class="col-lg-7 col-sm-7 col-md-7">
                                <div class="abci_content">
                                    <h2><?= $trustClientsTitle; ?></h2>
                                    <p>
                                        <?= $trustClientsDescription; ?>
                                    </p>
                                    <?php if ($trustClientsHasButton): ?>
                                        <a class="common_btn red_bg" href="<?= $trustClientsButton['url']; ?>"
                                           target="<?= $trustClientsButton['target']; ?>"><span><?= $trustClientsButton['title']; ?></span></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trust Clients Section -->
<!-- Why Choose Section -->
<section class="commonSection chooseUs">
    <div class="container">
        <?php foreach ($rows as $row): ?>
            <div class="row">
                <?php $columnsCount = count($row['columns']);
                $bootstrap = 12 / $columnsCount; ?>
                <?php foreach ($row['columns'] as $column): ?>
                    <div class="col-lg-<?= $bootstrap; ?> col-sm-12 col-md-<?= $bootstrap; ?>">
                        <?php if ($column['acf_fc_layout'] == "text"): ?>
                            <div class="wh_choose">
                                <h4 class="sub_title"><?= $column['sub_title']; ?></h4>
                                <h2 class="sec_title"><?= $column['main_title']; ?></h2>
                                <p>
                                    <?= $column['description']; ?>
                                </p>
                            </div>
                        <?php endif; ?>

                        <?php if ($column['acf_fc_layout'] == "image"): ?>
                            <?php foreach ($column['images'] as $image): ?>
                                <div class="chose_img">
                                    <img src="<?= bgl_helper::get_image_url($image['image'], 'flexible_content_image_' . $bootstrap, ${"flexible_content_image_" . $bootstrap}) ?>"
                                         alt="<?= bgl_helper::get_image_alt($image['image']); ?>"/>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if ($column['acf_fc_layout'] == "video"): ?>
                            <?php if ($column['video_type']['value'] == "aparat"): ?>
                                <?php $aparatRandomID = rand(1111111111111, 999999999999999999);
                                $aparatLink = $column['aparat_link'];
                                $aparatExplodeLink = explode("/v/", $aparatLink);
                                ?>
                                <div id="<?= $aparatRandomID ?>" class="wh_choose">
                                    <script type="text/JavaScript"
                                            src="https://www.aparat.com/embed/<?= $aparatExplodeLink[1]; ?>?data[rnddiv]=<?= $aparatRandomID ?>&data[responsive]=yes"></script>
                                </div>
                            <?php endif; ?>

                            <?php if ($column['video_type']['value'] == "local"): ?>
                                <video class="chose_img" controls>
                                    <source src="<?= $column['local_video']['url']; ?>" type="video/mp4">
                                    <source src="<?= $column['local_video']['url']; ?>" type="video/ogg">
                                </video>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<!-- Why Choose Section -->
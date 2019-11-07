<section class="commonSection chooseUs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <?php $aparatRandomID = rand(1111111111111, 999999999999999999);
                $aparatExplodeLink = explode("/v/", $aparatVideo); ?>
                <div id="<?= $aparatRandomID ?>" class="wh_choose">
                    <script type="text/JavaScript"
                            src="https://www.aparat.com/embed/<?= $aparatExplodeLink[1]; ?>?data[rnddiv]=<?= $aparatRandomID ?>&data[responsive]=yes"></script>
                </div>
            </div>
        </div>
    </div>
</section>
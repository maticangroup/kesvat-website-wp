<!-- FunFact Section -->
<section class="commonSection funfact">
    <div class="container">
        <div class="row">
            <?php $counterCount = count($counters);
            $bootstrap = 12 / $counterCount;
            foreach ($counters as $key => $counter): ?>
                <div class="col-lg-<?= $bootstrap; ?> col-sm-6 col-md-<?= $bootstrap; ?> noPadding <?= ($key + 1 == $counterCount) ? "" : "BR"; ?>">
                    <div class="singlefunfact text-center">
                        <h1 data-counter="<?= $counter['counter_number']; ?>"
                            class="timer"><?= $counter['counter_number']; ?></h1>
                        <h3><?= $counter['counter_title']; ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- FunFact Section -->
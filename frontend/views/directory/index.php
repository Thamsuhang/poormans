<?php ?>
<section class = "margin-horiz-90">
    <div class = "container">
        <div class = "row">
            <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12 pricing-section">
                <div class = "title_sec">
                    <h1>Directory Listing</h1>

                    <h2>Alphabetical Listing</h2>
                </div>
                <div class = "alphabet-listing">
                    <ul class = "alphabets">
                        <?php foreach (range('A', 'Z') as $alphabet) : ?>
                            <a class = "" href = "<?php echo Yii::$app->request->baseUrl; ?>/categories/<?php echo $alphabet; ?>">
                                <li class = "alphabet"><?php echo $alphabet; ?></li>
                            </a>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

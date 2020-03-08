<!-- start Featured Section -->
<section class="featured_business margin-horiz-90 margin-bottom-0 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="title_sec">
                    <h1>Featured Business</h1>
                    <h2>List your business here</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="all-business">
                <?php foreach ($datacenter['featured'] as $business): ?>
                    <div class="single-business">
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/business/<?php echo Misc::RUrl() . $business['id']; ?>">
                            <img class="" src="<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/<?php echo (isset( $business['logo']) && $business['logo']!='')? $business['logo']:'no-image.png' ?>" alt=""/>

                            <h6><?php echo ucwords($business['name']) ; ?></h6>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="clearfix"></div>
        </div>
</section>
<!-- End Featured Business Section -->
<!-- start contact us Section -->
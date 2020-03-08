<?php
    use common\components\Misc as MISC;
?>
<!--    <pre>--><?php //print_r($data); ?><!--</pre>-->
<section class = "padding-top-40">
    <div class = "container">
        <?php if (isset($data) && !empty($data)) { ?>
            <div class = "alert alert-success">
                <span>
                    <i class = "fa fa-exclamation-circle margin-right-8"></i> <?php echo count($data); ?> Business(s) Found</span>
            </div>
        <?php }
        else { ?>
            <div class = "alert alert-warning ">
                <span>
                    <i class = "fa fa-exclamation-circle margin-right-10"></i>
                    Sorry, No Business found in this category.</span>
            </div>
            <div class = "actions text-center m-b-30">
                <a href = "<?php echo Yii::$app->request->baseUrl; ?>/categories" class = "btn btn-lg btn-primary">View Other Categories</a>
            </div>
        <?php } ?>
    </div>
</section>
<?php if (isset($data) && !empty($data)) { ?>
    <section class = "display-rack">
        <div class = "container">
            <div class = "business-list row">
                <?php foreach ($data as $business) : $package = strtolower($business['package']); ?>
                    <div class = "col-lg-6 col-md-6 col-sm-12 col-xs-12 business">
                        <div class = "business-details">
                            <div class = "business-head">
                                <h5 class = "business-title d-inline-block clearfix">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/business/<?php echo MISC::RUrl() . $business['directory_id'] ?>" class = "business-title d-inline-block">
                                        <i class = "fa fa-chevron-right"></i>
                                        <?php
                                            if (in_array('name', Yii::$app->params['packages'][$package]['fields'])) :
                                                echo $business['name'];
                                            endif;
                                        ?>
                                    </a>
                                </h5>
                                <a class = "pull-right" href = "<?php echo Yii::$app->request->baseUrl; ?>/business/<?php echo MISC::RUrl() . $business['directory_id'] ?>">View details</a>

                            </div>
                            <div class = "business-description">
                                <div class = "business-detail">
                                    <h6>
                                        <i class = "fa fa-cogs"></i>
                                        Category :
                                    </h6>
                                    <?= (isset($business['parent']) && $business['parent'] != '') ? $business['parent'] : '' ?> > <?= ucwords($business['type']); ?>                                </div>

                                <?php if (in_array('address', Yii::$app->params['packages'][$package]['fields']) && !empty($business['address'])) : ?>
                                    <div class = "business-detail">
                                        <h6>
                                            <i class = "fa fa-map-marker"></i>
                                            Address :
                                        </h6>
                                        <?php echo $business['address'] . ', ' . $business['city'] . ', ' . $business['state'] . '.'; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (in_array('phone', Yii::$app->params['packages'][$package]['fields']) && !empty($business['phone'])) : ?>
                                    <div class = "business-detail">
                                        <h6>
                                            <i class = "fa fa-phone"></i>
                                            Phone :
                                        </h6>
                                        <span><?php echo $business['phone']; ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (in_array('fax', Yii::$app->params['packages'][$package]['fields']) && !empty($business['fax'])) : ?>
                                    <div class = "business-detail">
                                        <h6>
                                            <i class = "fa fa-fax"></i>
                                            Fax :
                                        </h6>
                                        <span><?php echo $business['fax']; ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (in_array('email', Yii::$app->params['packages'][$package]['fields']) && !empty($business['email'])) : ?>
                                    <div class = "business-detail">
                                        <h6>
                                            <i class = "fa fa-envelope-o"></i>
                                            Email :
                                        </h6>
                                        <span><?php echo $business['email']; ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (in_array('url', Yii::$app->params['packages'][$package]['fields']) && !empty($business['url'])) : ?>
                                    <div class = "business-detail">
                                        <h6>
                                            <i class = "fa fa-link"></i>
                                            Phone :
                                        </h6>
                                        <span><?php echo $business['url']; ?></span>
                                    </div>
                                <?php endif; ?>

                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php } ?>




<?php
    use common\components\Misc as MISC;

?>
    <!-- <div class = "fake-height"></div> --><!--    <pre>--><?php //print_r($data); ?><!--</pre>-->
    <section class = "padding-02">
        <div class = "container">
            <?php if (isset($data) && !empty($data)) { ?>
                <div class = "alert alert-success">
                    <span><i class = "fa fa-exclamation-circle margin-right-10"></i> <?php echo count($data); ?> Business(s) Found</span>
                </div>
            <?php }
            else { ?>
                <div class = "alert alert-warning ">
                    <span><i class = "fa fa-exclamation-circle margin-right-10"></i>Sorry, No Business found in this category.</span>
                </div>
            <?php } ?>
        </div>
    </section>

<?php if (isset($data) && !empty($data)) { ?>
    <section class = "display-rack">
        <div class = "container">
            <div class = "business-list row">
                <?php foreach ($data as $business) : ?>
                    <div class = "col-lg-3 col-md-3 col-sm-4 col-xs-12 business">
                        <div class = "business-detail" data-plugin = "matchHeight">

                            <div class = "business-card">
                                <a href = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/<?php echo (isset($business['card']) && $business['card'] != '') ? $business['card'] : 'no-image.png'; ?>" rel = "lightbox">
                                    <img class = "business-card-image margin-bottom-10" alt = "<?php echo ucwords($business['name']); ?>" src = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/<?php echo (isset($business['card']) && $business['card'] != '') ? $business['card'] : 'no-image.png'; ?>" alt = "">
                                </a>
                            </div>
                            <div class = "business-footer">
                                <a target = "_blank" href = "<?php echo Yii::$app->request->baseUrl; ?>/business/<?php echo MISC::RUrl() . $business['directory_id'] ?>" class = "business-title">
                                    <?php
                                        if (in_array('name', Yii::$app->params['packages'][$business['package']]['objects'])) :
                                            echo $business['name'];
                                        endif;
                                    ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php } ?>
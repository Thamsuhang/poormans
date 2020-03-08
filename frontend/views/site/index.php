<?php use common\components\Misc as Misc; ?>
<div class = "home">
    <div class = "fake-height"></div>
    <!--</pre>--><!-- start slider Section -->
    <?php if (isset($datacenter['slider_image']['image'])) : ?>
        <section id = "slider_sec" data-parallax = "<?php echo $datacenter['slider_image']['image']; ?>" data-text-color = "#d9534f">
            <div class = "container">
                <div class = "row">
                    <?php if (isset($datacenter['slider']) && \common\components\Misc::exists($datacenter['slider'])) : ?>
                        <div class = "slider">
                            <div id = "carousel-example-generic" class = "carousel slide" data-ride = "carousel">
                                <!-- Wrapper for slides -->
                                <div class = "carousel-inner" role = "listbox">
                                    <?php

                                        $counter = 0;
                                        foreach ($datacenter['slider'] as $item):
                                            ?>
                                            <div class = "item <?php echo ($counter == 0) ? 'active' : '' ?>">
                                                <div class = "wrap_caption">
                                                    <div class = "caption_carousel">
                                                        <h1><?php echo $item['title']; ?></h1>

                                                        <p><?php echo $item['subtitle']; ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php $counter++;
                                        endforeach;

                                    ?>

                                </div>
                                <!-- Controls -->
                              <!--   <a class = "left left_crousel_btn" href = "#carousel-example-generic" role = "button" data-slide = "prev">
                                    <i class = "fa fa-angle-left"></i>
                                    <span class = "sr-only">Previous</span></a>
                                <a class = "right right_crousel_btn" href = "#carousel-example-generic" role = "button" data-slide = "next">
                                    <i class = "fa fa-angle-right"></i>
                                    <span class = "sr-only">Next</span>
                                </a> -->
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- start Featured Section -->
    <?php if (isset($datacenter['featured']) && !empty($datacenter['featured']) && count($datacenter['featured']) > 0): ?>
        <section class = "featured_business  margin-bottom-0 ">
            <div class = "container">
                <div class = "row">
                    <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class = "title_sec">
                            <h1>Featured Businesses</h1>
                        </div>
                    </div>
                </div>
                <div class = "photos">
                    <?php $item_count = 1;
                        foreach ($datacenter['featured'] as $business): ?>
                            <div class = "col-sm-3" data-plugin = "matchHeight">
                                <div class="visiting-card" >
                                <a href = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/<?php echo (isset($business['card']) && $business['card'] != '') ? $business['card'] : 'no-image.png' ?>" class= "visiting-img"  rel = "lightbox" title = "<?php echo ucwords($business['name']); ?>">
                                    <img class = "img-responsive" src = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/<?php echo (isset($business['card']) && $business['card'] != '') ? $business['card'] : 'no-image.png' ?>" alt = ""/>
                                </a>
                                 </div>
                                <a href = "<?php echo Yii::$app->request->baseUrl; ?>/business/<?php echo Misc::RUrl() . $business['directory_id']; ?>">
                                    <h6><?php echo ucwords($business['name']); ?></h6>
                                </a>
                               
                            </div>
                        <?php endforeach; ?>
                    <div class = "clearfix"></div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- End Featured Business Section -->
</div>
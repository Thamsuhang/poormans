<?php
    $package = strtolower($business['package']);

?>
<section class = "margin-top-60 margin-bottom-30">
    <div class = "container">
        <div class = "title_sec">
            <h1 class = "text-left">
                <?php
                    if (in_array('name', Yii::$app->params['packages'][$package]['fields'])) :
                        echo $business['name'];
                    endif;
                ?>
            </h1>
            <h6 class="text-left">
<!--                --><?php //if ($business['parent'] != ''):
//                    echo $business['parent'] . ' > ';
//                endif; ?>
<!--                <a href = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/categories/item/--><?//= $business['child'] ?><!--">--><?//= $business['type'] ?><!--</a>-->

            </h6>
        </div>

        <div class = "row">
            <div class = "col-lg-8 col-md-8 col-sm-12 ">
                <?php if (in_array('description', Yii::$app->params['packages'][$package]['fields']) && $business['description'] != '') : ?>
                    <div class = "sngl_blg clearfix">
                        <div class = "post_info">
                            <div class = "post_intro">
                                <h2>
                                    <i class = "fa fa-file-text-o icon-left"></i>
                                    Business Description
                                </h2>
                            </div>

                        </div>
                        <div class = "post_content">
                            <?php echo ($business['description'] != '') ? $business['description'] : 'Content Not Available.'; ?>
                        </div>

                    </div>
                <?php endif; ?>
                <div class = "row">
                    <?php if (in_array('phone', Yii::$app->params['packages'][$package]['fields']) && is_array($business['phone']) && count($business['phone']) > 0) : ?>
                        <div class = "col-lg-6 col-md-6 col-sm-12">
                            <div class = "sngl_blg clearfix">
                                <div class = "post_info">
                                    <div class = "post_intro">
                                        <h2>
                                            <i class = "fa fa-phone icon-left"></i>
                                            Phone
                                        </h2>
                                    </div>

                                </div>
                                <div class = "post_content">
                                    <ul>
                                        <?php foreach ($business['phone'] as $x): ?>
                                            <li><?php echo $x; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (in_array('state', Yii::$app->params['packages'][$package]['fields']) && is_array($business['phone']) && count($business['phone']) > 0) : ?>
                       <div class = "col-lg-6 col-md-6 col-sm-12">
                          <div class = "sngl_blg clearfix">
                             <div class = "post_info">
                                <div class = "post_intro">
                                   <h2>
                                      <i class = "fa fa-phone icon-left"></i>
                                      State
                                   </h2>
                                </div>

                             </div>
                             <div class = "post_content">
                                <ul>
                                   <li><?php echo $business['state']; ?></li>
                                </ul>
                             </div>

                          </div>
                       </div>
                    <?php endif; ?>
                    <?php if (in_array('city', Yii::$app->params['packages'][$package]['fields']) && is_array($business['phone']) && count($business['phone']) > 0) : ?>
                       <div class = "col-lg-6 col-md-6 col-sm-12">
                          <div class = "sngl_blg clearfix">
                             <div class = "post_info">
                                <div class = "post_intro">
                                   <h2>
                                      <i class = "fa fa-phone icon-left"></i>
                                      City
                                   </h2>
                                </div>

                             </div>
                             <div class = "post_content">
                                <ul>
                                   <li><?php echo $business['city']; ?></li>
                                </ul>
                             </div>

                          </div>
                       </div>
                    <?php endif; ?>
                    <?php if (in_array('address', Yii::$app->params['packages'][$package]['fields']) && is_array($business['phone']) && count($business['phone']) > 0) : ?>
                      <div class = "col-lg-6 col-md-6 col-sm-12">
                         <div class = "sngl_blg clearfix">
                            <div class = "post_info">
                               <div class = "post_intro">
                                  <h2>
                                     <i class = "fa fa-phone icon-left"></i>
                                     Address
                                  </h2>
                               </div>

                            </div>
                            <div class = "post_content">
                               <ul>
                                      <li><?php echo $business['address']; ?></li>
                               </ul>
                            </div>

                         </div>
                      </div>
                    <?php endif; ?>
                    <?php if (in_array('fax', Yii::$app->params['packages'][$package]['fields']) && is_array($business['fax']) && count($business['fax']) > 0) : ?>
                        <div class = "col-lg-6 col-md-6 col-sm-12">
                            <div class = "sngl_blg clearfix">
                                <div class = "post_info">
                                    <div class = "post_intro">
                                        <h2>
                                            <i class = "fa fa-fax icon-left"></i>
                                            Fax
                                        </h2>
                                    </div>
                                </div>
                                <div class = "post_content">
                                    <ul>
                                        <?php foreach ($business['fax'] as $x): ?>
                                            <li><?php echo $x; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (in_array('email', Yii::$app->params['packages'][$package]['fields']) && is_array($business['email']) && count($business['email']) > 0) : ?>
                        <div class = "col-lg-6 col-md-6 col-sm-12">
                            <div class = "sngl_blg clearfix">
                                <div class = "post_info">
                                    <div class = "post_intro">
                                        <h2>
                                            <i class = "fa fa-envelope-o icon-left"></i>
                                            Email
                                        </h2>
                                    </div>
                                </div>
                                <div class = "post_content">
                                    <ul>
                                        <?php foreach ($business['email'] as $x): ?>
                                            <li><?php echo $x; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (in_array('url', Yii::$app->params['packages'][$package]['fields']) && is_array($business['url']) && count($business['url']) > 0) : ?>
                        <div class = "col-lg-6 col-md-6 col-sm-12">
                            <div class = "sngl_blg clearfix">
                                <div class = "post_info">
                                    <div class = "post_intro">
                                        <h2>
                                            <i class = "fa fa-internet-explorer icon-left"></i>
                                            URL
                                        </h2>
                                    </div>

                                </div>
                                <div class = "post_content">
                                    <ul>
                                        <?php foreach ($business['url'] as $x): ?>
                                            <li>
                                                <a href = "<?php echo $x; ?>" target = "_blank"><?php echo $x; ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <div class = "col-lg-4 col-md-4 col-sm-4">
                <div class = "sidebar">

                    <?php if ($business['type'] != '') : ?>
                        <div class = "sngl_blg clearfix">
                            <div class = "post_info">
                                <div class = "post_intro">
                                    <h2>
                                        <i class = "fa fa-cogs icon-left"></i>
                                        Category
                                    </h2>
                                </div>

                            </div>
                            <div class = "post_content">
<!--                               --><?php //if($business['category']=='') {
//                                  foreach ($business['category'] as $categories){
//                                     echo $categories['parent'].'>'.$categories[''];
//                                  }
//                               } ?>
                               <?php
                               if($business['category']!='') {
                                   foreach ($business['category'] as $k => $c){
                                       foreach ($c as $a){  echo '<b>'.$a['parent_name'] . ' > </  b>';?>
                                          <a href = "<?php echo Yii::$app->request->baseUrl; ?>/categories/item/<?= $a['child_id'] ?>"><?= $a['child_name'] ?></a>
                                           <br>

                                       <?php }
                                   }
                               }
                               ?>
                            </div>

                        </div>
                    <?php endif; ?>
                    <?php if (in_array('business_card', Yii::$app->params['packages'][$package]['fields']) && isset($business['card']) && $business['card'] != '') : ?>
                        <div class = "sngl_blg clearfix">
                            <div class = "post_info">
                                <div class = "post_intro">
                                    <h2>
                                        <i class = "fa fa-camera icon-left"></i>
                                        Business Card
                                    </h2>
                                </div>

                            </div>
                            <div class = "post_content business-card-wrapper">
                                <a href = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/<?php echo (isset($business['card']) && $business['card'] != '') ? $business['card'] : 'no-image.png'; ?>" rel = "lightbox">
                                    <img class = "img-responsive" src = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/<?php echo (isset($business['card']) && $business['card'] != '') ? $business['card'] : 'no-image.png'; ?>" alt = "">
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (in_array('display_link', Yii::$app->params['packages'][$package]['fields']) && isset($business['disp_add']) && $business['disp_add'] != '') : ?>
                        <div class = "sngl_blg clearfix">
                            <div class = "post_info">
                                <div class = "post_intro">
                                    <h2>
                                        <i class = "fa fa-camera icon-left"></i>
                                        Advertisement
                                    </h2>
                                </div>
                            </div>
                            <div class = "post_content business-card-wrapper">
                                <a href = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/<?php echo (isset($business['disp_add']) && $business['disp_add'] != '') ? $business['disp_add'] : 'no-image.png'; ?>" rel = "lightbox">
                                    <img class = "img-responsive" src = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/<?php echo (isset($business['disp_add']) && $business['disp_add'] != '') ? $business['disp_add'] : 'no-image.png'; ?>" alt = "">
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (in_array('coupon_link', Yii::$app->params['packages'][$package]['fields']) && isset($business['coupon']) && $business['coupon'] != '') : ?>
                        <div class = "sngl_blg clearfix">
                            <div class = "post_info">
                                <div class = "post_intro">
                                    <h2>
                                        <i class = "fa fa-camera icon-left"></i>
                                        Coupon
                                    </h2>
                                </div>

                            </div>
                            <div class = "post_content business-card-wrapper">
                                <a href = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/<?php echo (isset($business['coupon']) && $business['coupon'] != '') ? $business['coupon'] : 'no-image.png'; ?>" rel = "lightbox">
                                    <img class = "img-responsive" src = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/<?php echo (isset($business['coupon']) && $business['coupon'] != '') ? $business['coupon'] : 'no-image.png'; ?>" alt = "">
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<!--<pre>-->
<!--            --><?php //print_r($business); ?>
<!--        </pre>-->
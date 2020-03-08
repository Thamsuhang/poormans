<?php use common\components\Misc as Misc; ?>
<div class="fake-height"></div>
<!-- start slider Section -->
<?php if (isset($datacenter['slider_image']['image'])) : ?>
    <section id="slider_sec" data-parallax="<?php echo $datacenter['slider_image']['image']; ?>" data-text-color="#d9534f">
        <div class="container">
            <div class="row">
                <?php if (isset($datacenter['slider']) && \common\components\Misc::exists($datacenter['slider'])) : ?>
                    <div class="slider">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <?php

                                    $counter = 0;
                                    foreach ($datacenter['slider'] as $item):
                                        ?>
                                        <div class="item <?php echo ($counter == 0) ? 'active' : '' ?>">
                                            <div class="wrap_caption">
                                                <div class="caption_carousel">
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
                            <a class="left left_crousel_btn" href="#carousel-example-generic" role="button" data-slide="prev">
                                <i class="fa fa-angle-left"></i> <span class="sr-only">Previous</span> </a> <a
                                class="right right_crousel_btn" href="#carousel-example-generic" role="button"
                                data-slide="next"> <i class="fa fa-angle-right"></i> <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- End slider Section -->
<!-- start search Section -->
<section id="search_sec" class="search-bar reset-search">
    <div class="container">
        <div class="title_sec">
            <h1>Find A Business</h1>
        </div>
        <form class="form-inline clearfix" method="get" action="<?php echo Yii::$app->request->baseUrl; ?>/search">
            <div class="search-form">
                <div class="form-field">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-tag"></i></div>
                            <input type="text" name="keyword" class="form-control" placeholder="What are you looking for?">
                        </div>
                    </div>
                </div>
                <div class="form-field ">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-globe"></i></div>
                            <input type="text" name="address" class="form-control" placeholder="Where are you looking it?">
                        </div>
                    </div>
                </div>
                <div class="form-field ">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-sitemap"></i></div>
                            <select name="category" class="form-control">
                                <option value="">Select Category</option>
                                <?php foreach ($datacenter['used_categories'] as $category) : ?>
                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['category']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-submit">
                    <button type="submit" class="btn btn-danger">Search</button>
                </div>
            </div>
        </form>

    </div>
</section>
<!-- End Search Section -->

<!-- start Featured Section -->
<section class="featured_business margin-bottom-0 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                <div class="title_sec">
                    <h1>Featured Business Cards</h1>
                </div>
                <div class="photos">
                    <?php $item_count = 1;
                        foreach ($datacenter['featured'] as $business): ?>
                            <div class="col-sm-3" data-plugin="matchHeight">
                                <a href="<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/<?php echo (isset($business['logo']) && $business['logo'] != '') ? $business['logo'] : 'no-image.png' ?>" rel="lightbox" title="<?php echo ucwords($business['name']); ?>">
                                    <img class="" src="<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/<?php echo (isset($business['logo']) && $business['logo'] != '') ? $business['logo'] : 'no-image.png' ?>" alt=""/>
                                </a>
                                <a href="<?php echo Yii::$app->request->baseUrl; ?>/business/<?php echo Misc::RUrl() . $business['id']; ?>">
                                    <h6><?php echo ucwords($business['name']); ?></h6>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 categories-section">
                <div class="title_sec">
                    <h1>View By Categories</h1>

                </div>
                <div class="categories">
                    <ul>
                        <?php
                            $i = 1;
                            foreach ($datacenter['parent_categories'] as $category) :?>
                                <a class="" href="<?php echo Yii::$app->request->baseUrl; ?>/search?category=<?php echo $category['id']; ?>">
                                    <li class="category col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <i class="fa <?php echo $category['icon']; ?>"></i><?php echo ucwords($category['type']); ?>
                                    </li>
                                </a>
                                <?php
                                $i++;
                            endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>


    </div>
</section>
<!-- End Featured Business Section -->

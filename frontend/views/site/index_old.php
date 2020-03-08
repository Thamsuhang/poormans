<?php use common\components\Misc as Misc;
    use common\components\HelperDirectoryCategories as HDcategoriescategor;

?>
<div class="fake-height"></div>
<!--<pre>-->
<!--    --><?php //print_r($datacenter); ?>
<!--</pre>-->
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
<section id="search_sec" class="search-bar">
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
<!-- start about Section -->
<section id="abt_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="title_sec">
                    <h1><?php echo $datacenter['general-content']['about-section']['title']; ?></h1>

                    <h2><?php echo $datacenter['general-content']['about-section']['subtitle']; ?></h2>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="abt">
                    <div class="description">
                        <?php echo substr($datacenter['general-content']['about-section']['description'], 0, 400); ?>
                        ...
                    </div>
                    <div class="row margin-top-60">
                        <a class="btn btn-danger " href="<?php echo Yii::$app->request->baseUrl; ?>/about">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End About Section -->
<!-- start Counting section-->
<section id="counting_sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <div class="counting_sl">
                    <i class="fa <?php echo $datacenter['general-content']['counter-icon-one']['icon']; ?>"></i>

                    <h2 class="counter"><?php echo $datacenter['general-content']['counter-icon-one']['description']; ?></h2>
                    <h4 class="title"><?php echo $datacenter['general-content']['counter-icon-one']['title']; ?>
                        <span>
                        <?php echo $datacenter['general-content']['counter-icon-one']['subtitle']; ?>
                    </span>
                    </h4>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="counting_sl">
                    <i class="fa <?php echo $datacenter['general-content']['counter-icon-two']['icon']; ?>"></i>

                    <h2 class="counter"><?php echo $datacenter['general-content']['counter-icon-two']['description']; ?></h2>
                    <h4 class="title"><?php echo $datacenter['general-content']['counter-icon-two']['title']; ?>
                        <span>
                        <?php echo $datacenter['general-content']['counter-icon-two']['subtitle']; ?>
                    </span>
                    </h4>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="counting_sl">
                    <i class="fa <?php echo $datacenter['general-content']['counter-icon-three']['icon']; ?>"></i>

                    <h2 class="counter"><?php echo $datacenter['general-content']['counter-icon-three']['description']; ?></h2>
                    <h4 class="title"><?php echo $datacenter['general-content']['counter-icon-three']['title']; ?>
                        <span>
                        <?php echo $datacenter['general-content']['counter-icon-three']['subtitle']; ?>
                    </span>
                    </h4>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- start pricing Section -->
<section id="pricing_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pricing-section">
                <div class="title_sec">
                    <h1>Our Pricing Plan</h1>

                    <h2>List your business with us </h2>
                </div>
                <div class="pricing-plan">
                    <table class="table packages">
                        <thead>
                        <tr>
                            <td class="no-border"></td>
                            <td>Basic<span>$5 / Month</span></td>
                            <td>Premium<span>$10 / Month</span></td>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-sm btn-success" data-toggle="modal" data-target="#sign-up">Sign Up</a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#sign-up">Sign Up</a>
                            </td>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr>
                            <td>Logo</td>
                            <td><i class="fa fa-check iconok"></i></td>
                            <td><i class="fa fa-check iconok"></i></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><i class="fa fa-check iconok"></i></td>
                            <td><i class="fa fa-check iconok"></i></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><i class="fa fa-check iconok"></i></td>
                            <td><i class="fa fa-check iconok"></i></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><i class="fa fa-check iconok"></i></td>
                            <td><i class="fa fa-check iconok"></i></td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td><i class="fa fa-check iconok"></i></td>
                            <td><i class="fa fa-check iconok"></i></td>
                        </tr>
                        <tr>
                            <td> Phone</td>
                            <td><i class="fa fa-check iconok"></i></td>
                            <td><i class="fa fa-check iconok"></i></td>
                        </tr>
                        <tr>
                            <td> Fax</td>
                            <td><i class="fa fa-lock iconno"></i></td>
                            <td><i class="fa fa-check iconok"></i></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><i class="fa fa-lock iconno"></i></td>
                            <td><i class="fa fa-check iconok"></i></td>
                        </tr>
                        <tr>
                            <td>Website URL</td>
                            <td><i class="fa fa-lock iconno"></i></td>
                            <td><i class="fa fa-check iconok"></i></td>
                        </tr>
                        <tr>
                            <td>Display Link</td>
                            <td><i class="fa fa-lock iconno"></i></td>
                            <td><i class="fa fa-check iconok"></i></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="other-pricing">
                    <h3>Other Pricing Plan</h3>
                    <table class="table">
                        <tr>
                            <th>Featured Business</th>
                            <td>$75.00 / year</td>
                        </tr>
                        <tr>
                            <th>Adv. Full Page</th>
                            <td>$--.00 / year</td>
                        </tr>
                        <tr>
                            <th>Adv. Half Page</th>
                            <td>$--.00 / year</td>
                        </tr>
                        <tr>
                            <th>Adv. Quarter Page</th>
                            <td>$--.00 / year</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 categories-section">
                <div class="title_sec">
                    <h1>Categories</h1>

                    <h2>Browse businesses by category </h2>
                </div>
                <div class="categories nice-scroll get-height">
                    <ul>
                        <?php
                            $i = 1;
                            foreach ($categories as $category) :?>
                                <a href="<?php echo Yii::$app->request->baseUrl; ?>/search?category=<?php echo $category['id']; ?>">
                                    <li class="category col-lg-6 col-md-6 col-sm-3 col-xs-6">
                                        <i class="fa <?php echo $category['icon']; ?>"></i><?php echo ucwords($category['type']); ?>
                                    </li>
                                </a>
                                <?php
                                $i++;
                            endforeach;
                        ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End pricing Section -->
<!-- start our teastimonial Section -->

<?php if (isset($datacenter['testimonials']) && \common\components\Misc::exists($datacenter['testimonials'])) : ?>
    <section id="tstm_sec">
        <div class="container-large">
            <div class="row">
                <div class="col-lg-12">
                    <div class="all_tstm">
                        <?php foreach ($datacenter['testimonials'] as $item) : ?>
                            <div class="clnt_tstm">
                                <div class="sngl_tstm">
                                    <i class="fa fa-quote-right"></i>

                                    <h3>what <?php echo $item['client']; ?> says ?</h3>

                                    <div class="description">
                                        <?php echo $item['quote']; ?>
                                    </div>
                                    <h6>- <?php echo $item['position']; ?> / <?php echo $item['company']; ?></h6>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- End our teastimonial Section -->
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
                            <img class="" src="<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/<?php echo (isset($business['logo']) && $business['logo'] != '') ? $business['logo'] : 'no-image.png' ?>" alt=""/>
                            <h6><?php echo ucwords($business['name']); ?></h6>
                        </a>
                    </div>
                <?php endforeach; ?>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
</section>
<!-- End Featured Business Section -->
<!-- start contact us Section -->
<section id="ltd_map_sec">
    <div class="map">
        <div class="map_area">
            <div id="map" style="width: 100%; height: 300px;" data-latitude="<?php echo $datacenter['contact']['latitude']; ?>" data-longitude="<?php echo $datacenter['contact']['longitude']; ?>"></div>
        </div>
    </div>
</section>


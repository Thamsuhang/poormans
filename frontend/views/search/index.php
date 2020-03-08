<?php
    use common\components\Misc;

?>
<!-- start search Section -->
<!-- <section id = "search_sec" class = "search-bar reset-search">
    <div class = "container">
        <div class = "title_sec">
            <h1>Find A Business</h1>
        </div>
        <form class = "form-inline clearfix" method = "get" action = "<?php echo Yii::$app->request->baseUrl; ?>/search">
            <div class = "search-form">
                <div class = "form-field">
                    <div class = "form-group">
                        <div class = "input-group">
                            <div class = "input-group-addon"><i class = "fa fa-tag"></i></div>
                            <input type = "text" name = "keyword" class = "form-control" placeholder = "What are you looking for?" value = "<?php echo (isset($search['keyword']) && $search['keyword'] != '') ? $search['keyword'] : ''; ?>">
                        </div>
                    </div>
                </div>
                <div class = "form-field ">
                    <div class = "form-group">
                        <div class = "input-group">
                            <div class = "input-group-addon"><i class = "fa fa-globe"></i></div>
                            <input type = "text" name = "address" class = "form-control" placeholder = "Where are you looking it?" value = "<?php echo (isset($search['address']) && $search['address'] != '') ? $search['address'] : ''; ?>">
                        </div>
                    </div>
                </div>
                <div class = "form-submit">
                    <button type = "submit" class = "btn btn-danger">Search</button>
                </div>
            </div>
        </form>
    </div>
</section> -->
<section class = "section-search-results margin-top-30">
    <div class = "container">
        <div class = "row">
            <div class = "alert dark alert-icon alert-info alert-dismissible" role = "alert">
                <i class = "fa fa-search" aria-hidden = "true"></i> <?php echo (isset($businesses) && $businesses != '') ? 'Your search returned ' . count($businesses) . ' entries' : 'No such business found'; ?> .
            </div>
        </div>
    </div>
</section>
<section class = "margin-top-30 margin-bottom-60">
    <div class = "container">
        <div class = "search-result">
            <?php if (isset($businesses) && $businesses != '') {
                foreach ($businesses as $business): ?>
                    <div class = "row search-result-item">
                        <div class = "col-md-4 imageholder">
                            <a class = "no-css" href = "<?php echo Yii::$app->request->baseUrl; ?>/business/<?php echo Misc::RUrl() . $business['directory_id']; ?>">
                                <img src = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/<?php echo (isset($business['card']) && $business['card'] != '') ? $business['card'] : 'no-image.png' ?>" class = "img-responsive full-width search-image"/>
                            </a>
                        </div>
                        <div class = "col-md-8">
                            <h2 class = "business-title">
                                <a class = "no-css" href = "<?php echo Yii::$app->request->baseUrl; ?>/business/<?php echo Misc::RUrl() . $business['directory_id']; ?>">
                                    <div class = "business-name"><?php echo $business['name']; ?> </div>
                                </a>
                                <div class = "business-category">
                                    <?php echo ($business['parent'] != '') ? '<a href = "http://localhost/poormans/search?category=' . $business['parent'] . '" target="_blank">' . $business['parent'] . '</a>' . ' <i class="fa fa-angle-right"></i> ' . '<a href = "http://localhost/poormans/search?category=' . $business['type'] . '" target="_blank">' . $business['type'] . '</a>' : '<a href = "http://localhost/poormans/search?category=' . $business['type'] . '" target="_blank">' . $business['type'] . '</a>'; ?>
                                </div>
                            </h2>


                            <ul class = "business-address">
                                <li><i class = "fa fa-phone"></i><strong>Phone :</strong>
                                    <?php
                                        if (isset($business['phone']) && !empty($business['phone'])) {
                                            foreach ($business['phone'] as $x) : ?>
                                                <span><?php echo $x ?></span>
                                            <?php endforeach;
                                        }
                                    ?>

                                </li>
                                <li>
                                    <i class = "fa fa-map-marker"></i> <strong>Address :</strong> <?php echo $business['address']; ?>
                                </li>
                                <li>
                                    <i class = "fa fa-external-link"></i> <strong>URL :</strong>

                                    <?php
                                        if (isset($business['url']) && !empty($business['url'])) {
                                            foreach ($business['url'] as $x) : ?>
                                                <span><?php echo $x ?></span>
                                            <?php endforeach;
                                        }
                                    ?>

                                </li>

                            </ul>
                            <div class = "business-tags">
                                <?php
                                    if (isset($business['tags']) && !empty($business['tags'])) { ?>
                                        <span>TAGS : </span>
                                        <?php
                                        foreach ($business['tags'] as $x) : ?>
                                            <a target="_blank" href = "http://localhost/poormans/search?keyword=<?php echo ucwords($x); ?>"><?php echo ucwords($x) ?></a>
                                        <?php endforeach;
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            } ?>

        </div>
    </div>
</section>




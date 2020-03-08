<?php ?>
<!-- <div class = "fake-height"></div> --><!-- start slider Section -->

<section id = "search_sec" class = "search-bar reset-search">
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
                            <input type = "text" name = "keyword" class = "form-control" placeholder = "What are you looking for?">
                        </div>
                    </div>
                </div>
                <div class = "form-field ">
                    <div class = "form-group">
                        <div class = "input-group">
                            <div class = "input-group-addon"><i class = "fa fa-globe"></i></div>
                            <input type = "text" name = "address" class = "form-control" placeholder = "Where are you looking it?">
                        </div>
                    </div>
                </div>

                <div class = "form-submit">
                    <button type = "submit" class = "btn btn-danger">Search</button>
                </div>
            </div>
        </form>
    </div>
</section><!-- End Search Section -->
<section class = "grey padding-top-30 padding-bottom-90">
    <div class = "container">

        <div class = "list-accordion">
            <?php if (isset($data) && !empty($data)) { ?>
                <h4 class = "margin-bottom-30 padding-left-30 padding-right-30"><?php echo count($data); ?> Categories Listed / <?php echo ($id != '') ? $id : 'All'; ?></h4>

                <div class = "categories-list panel-group" id = "cat-acor-list" aria-multiselectable = "true" role = "tablist">
                    <?php
                        $list_count = 1;
                        foreach ($data as $parent):
                            if (isset($parent['child']) && count($parent['child']) > 0) {
                                ?>
                                <li class = "panel col-sm-3">
                                    <div class = "panel-heading" id = "HeadingDefault-<?php echo $list_count; ?>" role = "tab">
                                        <a class = "panel-title" data-toggle = "collapse" href = "#CollapseDefault-<?php echo $list_count; ?>" data-parent = "#cat-acor-list" aria-expanded = "true" aria-controls = "CollapseDefault-<?php echo $list_count; ?>">
                                            <?php echo $parent['type']; ?>
                                            <span class="lo"><i class="fa fa-plus"></i></span>
                                        </a>
                                    </div>
                                    <div class = "panel-collapse collapse" id = "CollapseDefault-<?php echo $list_count; ?>" aria-labelledby = "HeadingDefault-<?php echo $list_count; ?>" role = "tabpanel">
                                        <ul class = "panel-body">
                                            <?php foreach ($parent['child'] as $child): ?>
                                                <li>
                                                    <a href = "javascript:void(0);" class = "view-category" data-id = "<?php echo $child['id']; ?>">
                                                        <i class = "fa fa-chevron-right"></i>
                                                        <?php echo $child['type']; ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php }
                            else { ?>
                                <li class = "panel col-sm-3">
                                    <div class = "panel-heading">
                                        <a class = "panel-title view-category" href = "javascript:void(0);" data-id = "<?php echo $parent['id']; ?>"> <?php echo $parent['type']; ?> </a>
                                    </div>
                                </li>

                            <?php }
                            ?>

                            <?php
                            $list_count++;
                        endforeach;
                    ?>

                </div>
            <?php }
            else { ?>
                <h4 class = "margin-bottom-30 margin-top-60">Sorry! No categories found.</h4>
                <a href="<?php echo Yii::$app->request->baseUrl; ?>/categories" class="btn btn-primary margin-top-30"><i class="fa fa-angle-left margin-right-10"></i>Back to Categories</a>
            <?php } ?>
        </div>

    </div>
</section>

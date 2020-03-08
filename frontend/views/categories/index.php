<!-- <div class = "fake-height"></div> -->
<section class = "padding-top-30 padding-bottom-90">
    <div class = "container">

        <div class = "list-accordion">
            <?php if (isset($data) && !empty($data)) { ?>
                <h4 class = "margin-bottom-30 padding-left-0 padding-right-0"><?php echo count($data); ?> Categories Listed under  <?php echo ($id != '') ? $id : 'All'; ?></h4>
                <div class = "categories-list panel-group" id = "cat-acor-list" aria-multiselectable = "true" role = "tablist">
                    <?php
                        $list_count = 1;
                        foreach ($data as $parent):
                            if (isset($parent['child']) && count($parent['child']) > 0) {
                                ?>
                                <li class = "panel col-sm-3">
                                    <div class = "panel-heading" id = "HeadingDefault-<?php echo $list_count; ?>" role = "tab">
                                        <a class = "panel-title collapsed" data-toggle = "collapse" href = "#CollapseDefault-<?php echo $list_count; ?>" data-parent = "#cat-acor-list" aria-expanded = "true" aria-controls = "CollapseDefault-<?php echo $list_count; ?>">
                                            <?php echo ucwords($parent['type']); ?>
                                            <span class = "lo"><i class = "fa fa-plus"></i></span>
                                        </a>
                                    </div>
                                    <div class = "panel-collapse collapse" id = "CollapseDefault-<?php echo $list_count; ?>" aria-labelledby = "HeadingDefault-<?php echo $list_count; ?>" role = "tabpanel">
                                        <ul class = "panel-body">
                                            <?php foreach ($parent['child'] as $child): ?>
                                                <li>
                                                    <a href = "<?php echo Yii::$app->request->baseUrl . '/categories/item/' . $child['id']; ?>">
                                                        <i class = "fa fa-chevron-right"></i>
                                                        <?php echo ucwords($child['type']); ?>
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
                                        <a class = "panel-title collapsed" href = "<?php echo Yii::$app->request->baseUrl . '/categories/item/' . $parent['id']; ?>"> <?php echo $parent['type']; ?> </a>
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
                <a href = "<?php echo Yii::$app->request->baseUrl; ?>/categories" class = "btn btn-primary margin-top-30"><i class = "fa fa-angle-left margin-right-10"></i>Back to Categories</a>
            <?php } ?>
        </div>

    </div>
</section>

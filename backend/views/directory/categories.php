<?php
    /* @var $this yii\web\View */
    use common\components\HelperDirectoryCategories as HCategories;

    $this->registerCssFile(Yii::$app->request->baseUrl . '/assets/examples/css/uikit/modals.min081a.css?v2.0.0');

    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/directory.js');

    /* Required for Switches */
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/vendor/switchery/switchery.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/switchery.min.js');
    $this->title = Yii::$app->params['system_name'] . ' | Business Categories';
    if (Yii::$app->session[Yii::$app->params['user_session']]->role != Yii::$app->params['user_role']['admin']) {
        Misc::forceLogout();
    }
?>

<div class = "page animsition">
    <div class = "page-header  padding-bottom-0">
        <h1 class = "page-title">Categories Manager</h1>

        <div class = "page-header-actions">
            <button type = "button" class = "btn btn-sm btn-icon btn-primary  btn-round reload-page" data-toggle = "tooltip" data-original-title = "Refresh" data-placement = "bottom">
                <i class = "icon wb-refresh" aria-hidden = "true"></i>
            </button>
            <!--           
            <button type="button" class="btn btn-sm btn-icon btn-primary btn-outline btn-round" data-toggle="tooltip" data-original-title="Save" data-placement="bottom">
                <i class="icon fa-save" aria-hidden="true"></i>
            </button>
            -->
        </div>
    </div>
    <div class = "page-content padding-30 container-fluid testimonials-page">
        <div class = "row">

            <div class = "col-xlg-4 col-lg-4 col-md-6 col-sm-6">
                <div class = "panel">
                    <div class = "panel-heading">
                        <h3 class = "panel-title">Add a new category</h3>
                    </div>
                    <div class = "panel-body container-fluid">
                        <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/directory/add-category">
                            <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>

                            <div class = "form-group">
                                <label class = "control-label">Category</label> <input type = "text" class = "form-control required check_category" name = "category[category]" placeholder = "Category" autocomplete = "off">
                            </div>
                            <div class = "form-group">
                                <label class = "control-label">Parent Category</label> <select class = "form-control required-select" data-plugin = "select2" name = "category[parent]">
                                    <option value = "">Select a Category</option>
                                    <option value = "0">No Parent</option>
                                    <?php foreach ($parent_cat as $cat) : ?>
                                        <option value = "<?php echo strtolower($cat['id']); ?>"><?php echo ucwords($cat['type']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class = "clearfix"></div>
                            <div class = "form-group">
                                <button type = "submit" class = "btn btn-primary">
                                    <i class = "fa fa-save"></i>Save Options
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class = "col-xlg-8 col-lg-8 col-md-6 col-sm-6">
                <div class = "panel">
                    <div class = "panel-body container-fluid">
                        <div class = "dd" list-type = "nested">
                            <?php print_r(HCategories::buildCategoryTree(0, $categories)); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class = "clearfix"></div>
    </div>
</div>

<!-- Modal -->
<div class = "modal fade modal-primary" id = "cat_modal" aria-hidden = "true" role = "dialog" tabindex = "-1">
    <div class = "modal-dialog">
        <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/directory/edit-cat">
            <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>

            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                        <span aria-hidden = "true">×</span>
                    </button>
                    <h4 class = "modal-title">Edit Category <span id = "modal-title"></span></h4>
                </div>
                <div class = "modal-body">
                    <input id = "cat_id" type = "hidden" name = "id" value = "">

                    <div class = "form-group">
                        <label class = "control-label">Category</label> <input type = "text" id = "cat_type" class = "form-control required check_category" name = "category" placeholder = "Category" autocomplete = "off">
                    </div>
                    <div class = "form-group">
                        <label class = "control-label">Parent Category</label> <select id = "cat_parent" class = "form-control required-select" name = "parent">
                            <option value = "">Select a Category</option>
                            <option value = "0">No Parent</option>
                            <?php foreach ($parent_cat as $cat) : ?>
                                <option value = "<?php echo strtolower($cat['id']); ?>"><?php echo ucwords($cat['type']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class = "modal-footer">
                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>
                    <button type = "submit" class = "btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div><!-- End Modal -->
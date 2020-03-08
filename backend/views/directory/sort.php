<?php
    /* @var $this yii\web\View */
    use common\components\Misc as Misc;

    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/directory.js');

    /* Required for Switches */
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/vendor/switchery/switchery.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/switchery.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/custom/testimonial.js');


    $this->title = Yii::$app->params['system_name'] . ' | Sort Featured Items';

    if (Yii::$app->session[Yii::$app->params['user_session']]->role != Yii::$app->params['user_role']['admin']) {
        Misc::forceLogout();
    }

?>
<div class = "page animsition">
    <div class = "page-header  padding-bottom-0">
        <h1 class = "page-title">Sort Featured Business Cards</h1>
        <div class = "page-header-actions">
            <a href = "javascript:void(0)" class = "btn btn-sm btn-icon btn-warning btn-round reload-page" data-toggle = "tooltip" data-original-title = "Go Back" data-placement = "bottom">
                <i class = "icon wb-refresh" aria-hidden = "true"></i></a>
        </div>
    </div>
    <div class = "page-content padding-30 container-fluid testimonials-page">
        <div class = "panel">
            <div class = "container-fluid">
                <div class = "panel-body">
                    <ul class = "featured-sortable row">
                        <?php foreach ($datacenter['f_items'] as $item) : ?>
                            <li class = "col-sm-3 list-group-item" data-index = "<?php echo $item['featured_index']; ?>" data-id = "<?php echo $item['directory_id']; ?>" data-plugin = "matchHeight">
                                <div class = "sort-wrap">
                                    <div class = "image-wrapper">
                                        <img class = "img-responsive" src = "<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/images/uploads/<?php echo (isset($item['card']) && $item['card'] != '') ? $item['card'] : 'no-image.png' ?>">
                                    </div>
                                    <h4 class = "text-center"><?php echo ucwords($item['name']); ?></h4>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>



<?php
    use common\components\Misc;

    /* @var $this yii\web\View */

    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/plugins/responsive-tabs.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/plugins/closeable-tabs.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/tabs.min.js');

    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/datatables.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/users.min.js');

    /* Required for Switches */
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/vendor/switchery/switchery.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/switchery.min.js');


    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/x-editable/js/bootstrap-editable.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/custom/settings.js');
    $this->title = Yii::$app->params['system_name'] . ' | Settings';
    if (Yii::$app->session[Yii::$app->params['user_session']]->role != Yii::$app->params['user_role']['admin']) {
        Misc::forceLogout();
    }
?>
<!-- Page -->
<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title">General Options</h1>
    </div>
    <div class="page-content container-fluid">
        <!-- Panel Tabs -->
        <div class="panel">
            <div class="panel-body container-fluid padding-0">
                <div class="row row-lg">
                    <div class="col-lg-12">
                        <div class="nav-tabs-horizontal">
                            <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
                                <li class="active" role="presentation">
                                    <a data-toggle="tab" href="#social" aria-controls="social"
                                       role="tab">Social Media</a></li>
                            </ul>
                            <div class="tab-content padding-20">
                                <div class="tab-pane active" id="social" role="tabpanel">
                                    <div class="settings-form">
                                        <form autocomplete="off" method="post" action="<?php echo Yii::$app->request->baseUrl; ?>/websettings/setsocial/">
                                            <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>

                                            <div class="form-title">
                                                <a class="add-social btn btn-default btn-outline margin-top-30 margin-bottom-20  inline-block" href="javascript:void(0)"><i class="fa fa-plus"></i> Click to add More</a>
                                                <h5 class="margin-bottom-60">
                                                    Note:
                                                    <a href="http://fontawesome.io/cheatsheet/" target="new">Click Here </a>to find a value for the desired icon. Example : "fa-facebook"
                                                </h5>

                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="social-container">

                                                <?php if (isset($social) && !empty($social)) {
                                                    $counter = 0;
                                                    foreach ($social as $item) : ?>

                                                        <div class="row item">
                                                            <input type="hidden" name="social[<?php echo $counter ?>][id]" value="<?php echo $item['id'] ?>">

                                                            <div class="form-group col-sm-3">
                                                                <label class="control-label">Icon</label>

                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="fa <?php echo $item['icon'] ?>"></i></span>
                                                                    <input class="icon-container form-control" type="text" name="social[<?php echo $counter ?>][icon]" autocomplete="off" class="form-control" placeholder="example : fa-facebook" value="<?php echo $item['icon'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label class="control-label">Type</label>
                                                                <input type="text" class="form-control" name="social[<?php echo $counter ?>][type]" placeholder="Type" autocomplete="off" value="<?php echo $item['type'] ?>">
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label class="control-label">URL</label>
                                                                <input type="text" class="form-control" name="social[<?php echo $counter ?>][url]" placeholder="URL" autocomplete="off" value="<?php echo $item['url'] ?>">
                                                            </div>
                                                            <div class="form-group col-sm-1">
                                                                <label class="control-label">&nbsp;</label>
                                                                <a class="btn btn-sm block "><i class="fa fa-times"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                        <?php $counter++;
                                                    endforeach;
                                                }
                                                else { ?>
                                                    <div class="row item">
                                                        <div class="form-group col-sm-3">
                                                            <label class="control-label">Icon</label>
                                                            <input type="text" name="social[0][icon]" autocomplete="off" class="form-control" placeholder="example : fa-facebook">
                                                        </div>
                                                        <div class="form-group col-sm-4">
                                                            <label class="control-label">Type</label>
                                                            <input type="text" class="form-control" name="social[0][type]" placeholder="Type" autocomplete="off">
                                                        </div>
                                                        <div class="form-group col-sm-4">
                                                            <label class="control-label">URL</label>
                                                            <input type="text" class="form-control" name="social[0][url]" placeholder="URL" autocomplete="off">
                                                        </div>
                                                        <div class="form-group col-sm-1">
                                                            <label class="control-label">&nbsp;</label>
                                                            <a class="btn btn-sm block "><i class="fa fa-times"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-save"></i>Save Options
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Panel Tabs -->
    </div>
</div>
<!-- End Page -->

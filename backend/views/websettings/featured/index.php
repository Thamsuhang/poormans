<?php
    use common\components\Misc as Misc;
    if (Yii::$app->session[Yii::$app->params['user_session']]->role != Yii::$app->params['user_role']['admin']) {
        Misc::forceLogout();
    }
    /* @var $this yii\web\View */

    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/plugins/responsive-tabs.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/plugins/closeable-tabs.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/tabs.min.js');

    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/datatables.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/users.min.js');

    /* Required for Switches */
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/vendor/switchery/switchery.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/switchery.min.js');

    /*
    $this->registerJsFile('http://maps.google.com/maps/api/js?key=AIzaSyC4x2SbqhVqS2mM74yaIdAFpi2eKUBaAm0&sensor=false');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/vendor/gmaps/gmaps.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/gmaps.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/examples/js/advanced/maps-google.min.js');
    */

    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/x-editable/js/bootstrap-editable.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/custom/settings.js');
    $this->title = Yii::$app->params['system_name'] . ' | Settings';

?>

<script>
    var $page_id = <?php echo $page_id; ?>;
</script>
<!-- Page -->
<div class="page animsition">
    <div class="page-header">
        <ol class="breadcrumb">
            <li>General Settings</li>

        </ol>
        <h2 class="page-title">Featured Configuration</h2>

    </div>

    <div class="page-content container-fluid">
        <!-- Panel Tabs -->
        <div class="panel">
            <div class="panel-body container-fluid padding-0">
                <div class="row row-lg">
                    <div class="col-lg-12">
                        <div class="nav-tabs-horizontal page-tabs">
                            <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
                                <li class="active" role="presentation">
                                    <a data-toggle="tab" href="#sliders" aria-controls="sliders"
                                       role="tab">Slider Settings</a></li>
                            </ul>
                            <div class="tab-content padding-20">
                                <div class="tab-pane active" id="sliders" role="tabpanel">
                                    <div class="settings-form">
                                        <form enctype="multipart/form-data" autocomplete="off" method="post" action="<?php echo Yii::$app->request->baseUrl; ?>/websettings/slider">
                                            <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
                                            <input type="hidden" name="page-details[page-id]" value="<?php echo $page_id; ?>">

                                            <div class="form-group">
                                                <label class="control-label">Parallax Background Image</label>

                                                <div class="slider-image-showcase">
                                                    <?php if (isset($datacenter['slider_image']['image']) && Misc::exists($datacenter['slider_image']['image'])) : ?>
                                                        <img class="img-responsive" src="<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/images/uploads/<?php echo $datacenter['slider_image']['image']; ?>"/>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Upload New Image Image</label>
                                                <input type="file" class="form-control" name="image"/>

                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-save"></i>Upload File
                                                </button>
                                            </div>
                                        </form>
                                        <hr/>
                                        <form autocomplete="off" method="post" action="<?php echo Yii::$app->request->baseUrl; ?>/websettings/slider">
                                            <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
                                            <input type="hidden" name="page-details[page-id]" value="<?php echo $page_id; ?>">

                                            <div class="content-slider-container">
                                                <div class="form-group margin-bottom-0">
                                                    <h4 class="form-title inline-block">Slider Content </h4>
                                                    <a class="  btn add-content-slider-item" href="javascript:void(0);"><i
                                                            class="icon fa-plus icon-right"></i>Add More</a>

                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="content-slider">

                                                    <?php
                                                        if (isset($datacenter['slider']) && Misc::exists($datacenter['slider'])) {

                                                            $counter = 0;
                                                            foreach ($datacenter['slider'] as $slider) : ?>
                                                                <div class="row content-slider-item">
                                                                    <input type="hidden" value="<?php echo $slider['id']; ?>" name="contentSlider[<?php echo $counter; ?>][id]">
                                                                    <input type="hidden" value="<?php echo $page_id; ?>" name="contentSlider[<?php echo $counter; ?>][page-id]">

                                                                    <div class="form-group col-sm-5">
                                                                        <label class="control-label">Title</label>
                                                                        <input type="text" value="<?php echo $slider['title']; ?>" class="form-control" name="contentSlider[<?php echo $counter; ?>][title]" placeholder="Title" autocomplete="off">
                                                                    </div>
                                                                    <div class="form-group col-sm-5">
                                                                        <label class="control-label">Subtitle</label>
                                                                        <input type="text" value="<?php echo $slider['subtitle']; ?>" class="form-control" name="contentSlider[<?php echo $counter; ?>][subtitle]" placeholder="Subtitle" autocomplete="off">
                                                                    </div>
                                                                    <div class="form-group col-sm-2">
                                                                        <label class="control-label">&nbsp;</label>
                                                                        <a href="javascript:void(0);" class="btn btn-sm form-control delete-content-slider-item"><i class="icon fa-trash icon-left"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                $counter++;
                                                            endforeach;
                                                        }
                                                        else { ?>
                                                            <div class="row content-slider-item">
                                                                <input type="hidden" value="" name="contentSlider[0][id]">
                                                                <input type="hidden" value="1" name="contentSlider[0][page-id]">

                                                                <div class="form-group col-sm-5">
                                                                    <label class="control-label">Title</label>
                                                                    <input type="text" value="" class="form-control" name="contentSlider[0][title]" placeholder="Title" autocomplete="off">
                                                                </div>
                                                                <div class="form-group col-sm-5">
                                                                    <label class="control-label">Subtitle</label>
                                                                    <input type="text" value="" class="form-control" name="contentSlider[0][subtitle]" placeholder="Subtitle" autocomplete="off">
                                                                </div>
                                                                <div class="form-group col-sm-2">
                                                                    <label class="control-label">&nbsp;</label>
                                                                    <a href="javascript:void(0);" class="btn btn-sm form-control delete-content-slider-item"><i class="icon fa-trash icon-left"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        <?php } ?>


                                                </div>
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



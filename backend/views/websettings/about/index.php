<?php
    use common\components\Misc;
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
        <h2 class="page-title">About Us</h2>
    </div>
    <div class="page-content container-fluid">
        <!-- Panel Tabs -->
        <div class="panel">
            <div class="panel-body container-fluid padding-0">
                <div class="row row-lg">
                    <div class="col-lg-12">
                        <div class="nav-tabs-horizontal page-tabs">
                            <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
<!--                                -->
<!--                                <li class="active" role="presentation">-->
<!--                                    <a data-toggle="tab" href="#sliders" aria-controls="sliders"-->
<!--                                       role="tab">Slider Settings</a></li>-->
<!--                                -->
                                <li role="presentation">
                                    <a data-toggle="tab" href="#about-tab" aria-controls="about-tab"
                                       role="tab">About</a></li>
                                <li role="presentation">
                                    <a data-toggle="tab" href="#who-we-are" aria-controls="who-we-are"
                                       role="tab">Who We Are ?</a></li>
                                <li role="presentation">
                                    <a data-toggle="tab" href="#what-we-do" aria-controls="what-we-do"
                                       role="tab">What We Do ?</a></li>
                                <li role="presentation">
                                    <a data-toggle="tab" href="#about-icons" aria-controls="about-icons"
                                       role="tab">Icons</a></li>
                                <li class="dropdown" role="presentation">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <span class="caret"></span>Menu </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="active" role="presentation">
                                            <a data-toggle="tab" href="#sliders" aria-controls="sliders"
                                               role="tab">Slider Settings</a></li>
                                        <li role="presentation">
                                            <a data-toggle="tab" href="#about-tab" aria-controls="about-tab"
                                               role="tab">About</a></li>
                                        <li role="presentation">
                                            <a data-toggle="tab" href="#who-we-are" aria-controls="who-we-are"
                                               role="tab">Who We Are ?</a></li>
                                        <li role="presentation">
                                            <a data-toggle="tab" href="#what-we-do" aria-controls="what-we-do"
                                               role="tab">What We Do ?</a></li>
                                        <li role="presentation">
                                            <a data-toggle="tab" href="#about-icons" aria-controls="about-icons"
                                               role="tab">Icons</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="tab-content padding-20">
<!--                                <div class="tab-pane active" id="sliders" role="tabpanel">-->
<!--                                    <div class="settings-form">-->
<!--                                        <form enctype="multipart/form-data" autocomplete="off" method="post" action="--><?php //echo Yii::$app->request->baseUrl; ?><!--/websettings/slider">-->
<!--                                            <input type="hidden" name="--><?php //echo Yii::$app->request->csrfParam; ?><!--" value="--><?php //echo Yii::$app->request->csrfToken; ?><!--"/>-->
<!--                                            <input type="hidden" name="page-details[page-id]" value="--><?php //echo $page_id; ?><!--">-->
<!--                                            <div class="form-group">-->
<!--                                                <label class="control-label">Parallax Background Image</label>-->
<!---->
<!--                                                <div class="slider-image-showcase">-->
<!--                                                    --><?php //if (isset($datacenter['slider_image']['image']) && Misc::exists($datacenter['slider_image']['image'])) : ?>
<!--                                                        <img class="img-responsive" src="--><?php //echo Yii::$app->request->baseUrl; ?><!--/../common/assets/images/uploads/--><?php //echo $datacenter['slider_image']['image']; ?><!--"/>-->
<!--                                                    --><?php //endif; ?>
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="form-group">-->
<!--                                                <label class="control-label">Upload New Image Image</label>-->
<!--                                               <input type="file" class="form-control" name="image" />-->
<!---->
<!--                                            </div>-->
<!--                                            <div class="form-group">-->
<!--                                                <button type="submit" class="btn btn-primary">-->
<!--                                                    <i class="fa fa-save"></i>Upload File-->
<!--                                                </button>-->
<!--                                            </div>-->
<!--                                        </form>-->
<!--                                        <hr/>-->
<!--                                        <form autocomplete="off" method="post" action="--><?php //echo Yii::$app->request->baseUrl; ?><!--/websettings/slider">-->
<!--                                            <input type="hidden" name="--><?php //echo Yii::$app->request->csrfParam; ?><!--" value="--><?php //echo Yii::$app->request->csrfToken; ?><!--"/>-->
<!--                                            <input type="hidden" name="page-details[page-id]" value="--><?php //echo $page_id; ?><!--">-->
<!---->
<!--                                            <div class="content-slider-container">-->
<!--                                                <div class="form-group margin-bottom-0">-->
<!--                                                    <h4 class="form-title inline-block">Slider Content </h4>-->
<!--                                                    <a class="  btn add-content-slider-item" href="javascript:void(0);"><i-->
<!--                                                            class="icon fa-plus icon-right"></i>Add More</a>-->
<!---->
<!--                                                    <div class="clearfix"></div>-->
<!--                                                </div>-->
<!--                                                <div class="content-slider">-->
<!---->
<!--                                                    --><?php
//                                                        if (isset($datacenter['slider']) && Misc::exists($datacenter['slider'])) :
//                                                            $counter = 0;
//                                                            foreach ($datacenter['slider'] as $slider) : ?>
<!--                                                                <div class="row content-slider-item">-->
<!--                                                                    <input type="hidden" value="--><?php //echo $slider['id']; ?><!--" name="contentSlider[--><?php //echo $counter; ?><!--][id]">-->
<!--                                                                    <input type="hidden" value="--><?php //echo $page_id; ?><!--" name="contentSlider[--><?php //echo $counter; ?><!--][page-id]">-->
<!---->
<!--                                                                    <div class="form-group col-sm-5">-->
<!--                                                                        <label class="control-label">Title</label>-->
<!--                                                                        <input type="text" value="--><?php //echo $slider['title']; ?><!--" class="form-control" name="contentSlider[--><?php //echo $counter; ?><!--][title]" placeholder="Title" autocomplete="off">-->
<!--                                                                    </div>-->
<!--                                                                    <div class="form-group col-sm-5">-->
<!--                                                                        <label class="control-label">Subtitle</label>-->
<!--                                                                        <input type="text" value="--><?php //echo $slider['subtitle']; ?><!--" class="form-control" name="contentSlider[--><?php //echo $counter; ?><!--][subtitle]" placeholder="Subtitle" autocomplete="off">-->
<!--                                                                    </div>-->
<!--                                                                    <div class="form-group col-sm-2">-->
<!--                                                                        <label class="control-label">&nbsp;</label>-->
<!--                                                                        <a href="javascript:void(0);" class="btn btn-sm form-control delete-content-slider-item"><i class="icon fa-trash icon-left"></i> Delete</a>-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                                --><?php
//                                                                $counter++;
//                                                            endforeach;
//                                                        endif;
//                                                    ?>
<!---->
<!---->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="form-group">-->
<!--                                                <button type="submit" class="btn btn-primary">-->
<!--                                                    <i class="fa fa-save"></i>Save Options-->
<!--                                                </button>-->
<!--                                            </div>-->
<!--                                        </form>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="tab-pane active" id="about-tab" role="tabpanel">
                                    <div class="settings-form">

                                        <form autocomplete="off" method="post" action="<?php echo Yii::$app->request->baseUrl ?>/websettings/editabout/">
                                            <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
                                            <input type="hidden" name="postdata[id]" value="<?php echo $datacenter['general-content']['about-section']['id']; ?>">
                                            <input type="hidden" name="postdata[page-id]" value="<?php echo $datacenter['general-content']['about-section']['page_id']; ?>">
                                            <input type="hidden" name="postdata[slug]" value="<?php echo $datacenter['general-content']['about-section']['slug']; ?>">

                                            <div class="form-group">
                                                <h4 class="form-title">About the Company</h4>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label" ">Title</label>
                                                    <input type="text" class="form-control" name="postdata[title]" placeholder="Company Name" autocomplete="off" value="<?php echo $datacenter['general-content']['about-section']['title']; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label">Subtitle</label>
                                                    <input type="text" class="form-control" name="postdata[subtitle]" placeholder="Company Subtitle" autocomplete="off" value="<?php echo $datacenter['general-content']['about-section']['subtitle']; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label">Article</label>
                                                    <textarea class="ckeditor form-control" name="postdata[description]" id="postdata[companyArticle]" placeholder="Company Article" autocomplete="off"><?php echo $datacenter['general-content']['about-section']['description']; ?></textarea>
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
                                <div class="tab-pane" id="who-we-are" role="tabpanel">
                                    <div class="settings-form">
                                        <form autocomplete="off" method="post" action="<?php echo Yii::$app->request->baseUrl ?>/websettings/editabout/">
                                            <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
                                            <input type="hidden" name="postdata[id]" value="<?php echo $datacenter['page-content']['who-we-are']['id']; ?>">
                                            <input type="hidden" name="postdata[page-id]" value="<?php echo $page_id; ?>">
                                            <input type="hidden" name="postdata[slug]" value="<?php echo $datacenter['page-content']['who-we-are']['slug']; ?>">

                                            <div class="form-group">
                                                <h4 class="form-title">About the Company</h4>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label" ">Title</label>
                                                    <input type="text" class="form-control" name="postdata[title]" placeholder="Company Name" autocomplete="off" value="<?php echo $datacenter['page-content']['who-we-are']['title']; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label">Subtitle</label>
                                                    <input type="text" class="form-control" name="postdata[subtitle]" placeholder="Company Subtitle" autocomplete="off" value="<?php echo $datacenter['page-content']['who-we-are']['subtitle']; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label">Article</label>
                                                    <textarea class="ckeditor form-control" name="postdata[description]" id="postdata[companyArticle]" placeholder="Company Article" autocomplete="off"><?php echo $datacenter['page-content']['who-we-are']['description']; ?></textarea>
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
                                <div class="tab-pane" id="what-we-do" role="tabpanel">
                                    <div class="settings-form">
                                        <form autocomplete="off" method="post" action="<?php echo Yii::$app->request->baseUrl ?>/websettings/editabout/">
                                            <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
                                            <input type="hidden" name="postdata[id]" value="<?php echo $datacenter['page-content']['what-we-do']['id']; ?>">
                                            <input type="hidden" name="postdata[page-id]" value="<?php echo $page_id; ?>">
                                            <input type="hidden" name="postdata[slug]" value="<?php echo $datacenter['page-content']['what-we-do']['slug']; ?>">

                                            <div class="form-group">
                                                <h4 class="form-title">About the Company</h4>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label" ">Title</label>
                                                    <input type="text" class="form-control" name="postdata[title]" placeholder="Company Name" autocomplete="off" value="<?php echo $datacenter['page-content']['what-we-do']['title']; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label">Subtitle</label>
                                                    <input type="text" class="form-control" name="postdata[subtitle]" placeholder="Company Subtitle" autocomplete="off" value="<?php echo $datacenter['page-content']['what-we-do']['subtitle']; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label">Article</label>
                                                    <textarea class="ckeditor form-control" name="postdata[description]" placeholder="Company Article" autocomplete="off"><?php echo $datacenter['page-content']['what-we-do']['description']; ?></textarea>
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
                                <div class="tab-pane" id="about-icons" role="tabpanel">
                                    <div class="settings-form">
                                        <form autocomplete="off" method="post" action="<?php echo Yii::$app->request->baseUrl ?>/websettings/editabout/">
                                            <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>

                                            <div class="form-group ">
                                                <h4 class="form-title">Icons</h4>
                                            </div>

                                            <div class="row row-lg">
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <input type="hidden" name="icon[0][id]" value="<?php echo $datacenter['page-content']['about-icon-one']['id']; ?>">
                                                        <input type="hidden" name="icon[0][page-id]" value="<?php echo $page_id; ?>">
                                                        <input type="hidden" name="icon[0][slug]" value="about-icon-one">

                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label" for="icon[about-icon]">Icon</label>
                                                            <select data-plugin="selectpicker" name="icon[0][icon]">
                                                                <option value="<?php echo $datacenter['page-content']['about-icon-one']['icon']; ?>" data-icon="<?php echo $datacenter['page-content']['about-icon-one']['icon']; ?>"><?php echo $datacenter['page-content']['about-icon-one']['icon']; ?></option>
                                                                <?php foreach (Yii::$app->params['fa-icons'] as $icon) : ?>
                                                                    <option value="<?php echo $icon; ?>" data-icon="<?php echo $icon; ?>"><?php echo $icon; ?></option>
                                                                <?php endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label">Title</label>
                                                            <input type="text" class="form-control" name="icon[0][title]" placeholder="Icon Title" autocomplete="off" value="<?php echo $datacenter['page-content']['about-icon-one']['title']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label">Subtitle</label>
                                                            <input type="text" class="form-control" name="icon[0][subtitle]" placeholder="Icon Title" autocomplete="off" value="<?php echo $datacenter['page-content']['about-icon-one']['subtitle']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label">Description</label>
                                                            <textarea class="ckeditor form-control" name="icon[0][description]" autocomplete="off"><?php echo $datacenter['page-content']['about-icon-one']['description']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <input type="hidden" name="icon[1][id]" value="<?php echo $datacenter['page-content']['about-icon-two']['id']; ?>">
                                                        <input type="hidden" name="icon[1][page-id]" value="<?php echo $page_id; ?>">
                                                        <input type="hidden" name="icon[1][slug]" value="about-icon-two">

                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label" for="icon[about-icon]">Icon</label>
                                                            <select data-plugin="selectpicker" name="icon[1][icon]">
                                                                <option value="<?php echo $datacenter['page-content']['about-icon-two']['icon']; ?>" data-icon="<?php echo $datacenter['page-content']['about-icon-two']['icon']; ?>"><?php echo $datacenter['page-content']['about-icon-two']['icon']; ?></option>
                                                                <?php foreach (Yii::$app->params['fa-icons'] as $icon) : ?>
                                                                    <option value="<?php echo $icon; ?>" data-icon="<?php echo $icon; ?>"><?php echo $icon; ?></option>
                                                                <?php endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label">Title</label>
                                                            <input type="text" class="form-control" name="icon[1][title]" placeholder="Icon Title" autocomplete="off" value="<?php echo $datacenter['page-content']['about-icon-two']['title']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label">Subtitle</label>
                                                            <input type="text" class="form-control" name="icon[1][subtitle]" placeholder="Icon Title" autocomplete="off" value="<?php echo $datacenter['page-content']['about-icon-two']['subtitle']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label">Description</label>
                                                            <textarea class="ckeditor form-control" name="icon[1][description]" autocomplete="off"><?php echo $datacenter['page-content']['about-icon-two']['description']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <input type="hidden" name="icon[2][id]" value="<?php echo $datacenter['page-content']['about-icon-three']['id']; ?>">
                                                        <input type="hidden" name="icon[2][page-id]" value="<?php echo $page_id; ?>">
                                                        <input type="hidden" name="icon[2][slug]" value="about-icon-three">

                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label" for="icon[about-icon]">Icon</label>
                                                            <select data-plugin="selectpicker" name="icon[2][icon]">
                                                                <option value="<?php echo $datacenter['page-content']['about-icon-three']['icon']; ?>" data-icon="<?php echo $datacenter['page-content']['about-icon-three']['icon']; ?>"><?php echo $datacenter['page-content']['about-icon-three']['icon']; ?></option>
                                                                <?php foreach (Yii::$app->params['fa-icons'] as $icon) : ?>
                                                                    <option value="<?php echo $icon; ?>" data-icon="<?php echo $icon; ?>"><?php echo $icon; ?></option>
                                                                <?php endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label">Title</label>
                                                            <input type="text" class="form-control" name="icon[2][title]" placeholder="Icon Title" autocomplete="off" value="<?php echo $datacenter['page-content']['about-icon-three']['title']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label">Subtitle</label>
                                                            <input type="text" class="form-control" name="icon[2][subtitle]" placeholder="Icon Title" autocomplete="off" value="<?php echo $datacenter['page-content']['about-icon-three']['subtitle']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            <label class="control-label">Description</label>
                                                            <textarea class="ckeditor form-control" name="icon[2][description]" autocomplete="off"><?php echo $datacenter['page-content']['about-icon-three']['description']; ?></textarea>
                                                        </div>
                                                    </div>
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


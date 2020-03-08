<?php
    /* @var $this yii\web\View */
    use common\components\Misc;
    if (Yii::$app->session[Yii::$app->params['user_session']]->role != Yii::$app->params['user_role']['admin']) {
        Misc::forceLogout();
    }
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/datatables.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/users.min.js');

    /* Required for Switches */
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/vendor/switchery/switchery.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/switchery.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/custom/testimonial.js');
    $this->title = Yii::$app->params['system_name'] . ' | Testimonials';

?>
<div class="page animsition">
    <form action="<?php echo Yii::$app->request->baseUrl; ?>/testimonials/edit-testimonial" name="editTestimonial" data-tablename="testimonial" data-action="edit" method="post" class="form-horizontal testimonial">
        <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
        <input type="hidden" name="id" value="<?php echo isset($testimonial['id']) ? $testimonial['id'] : 0; ?>" id="edit-id"/>

        <div class="page-header  padding-bottom-0">
            <h1 class="page-title">Testimonial</h1>

            <div class="page-header-actions">

                <a href="javascript:history.go(-1)" class="btn btn-sm btn-icon btn-warning btn-round" data-toggle="tooltip" data-original-title="Go Back" data-placement="bottom">
                    <i class="icon fa-arrow-left" aria-hidden="true"></i> </a>

                <button type="submit" class="btn btn-sm btn-icon btn-primary btn-round" data-toggle="tooltip" data-original-title="Save" data-placement="bottom">
                    <i class="icon fa-save" aria-hidden="true"></i>
                </button>

            </div>
        </div>
        <div class="page-content padding-30 container-fluid testimonials-page">
            <div class="row">
                <div class=" col-sm-12 col-xlg-4 col-lg-4 col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Testimonial</h3>
                        </div>
                        <div class="panel-body container-fluid">
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <h5>Authors's Name</h5>
                                        <input name="client" type="text" class="form-control " id="inputPlaceholder" placeholder="Enter Authors's Name" value="<?php echo isset($testimonial['client']) ? $testimonial['client'] : ''; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <h5>Authors's Position</h5>
                                        <input name="position" type="text" class="form-control " id="inputPlaceholder" placeholder="Enter Authors's Position" value="<?php echo isset($testimonial['position']) ? $testimonial['position'] : ''; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <label for="" class="">Active</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="checkbox" class="" name="is_active" data-plugin="switchery" data-color="#62a8ea" value="1" <?php echo isset($testimonial['is_active']) && $testimonial['is_active'] == 1 ? 'checked' : ''; ?> />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xlg-8 col-lg-8 col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Quote</h3>
                        </div>
                        <div class="panel-body container-fluid">
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea class="ckeditor" name="quote"><?php echo isset($testimonial['quote']) ? $testimonial['quote'] : ''; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <div class="clearfix"></div>
</div>
</div>

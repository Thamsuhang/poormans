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
    $this->title = Yii::$app->params['system_name'] . ' | Testimonial Manager';

?>
<div class="page animsition">
    <div class="page-header  padding-bottom-0">
        <h1 class="page-title">Testimonial Manager</h1>

        <div class="page-header-actions">
            <button type="button" class="btn btn-sm btn-icon btn-primary  btn-round reload-page" data-toggle="tooltip" data-original-title="Refresh" data-placement="bottom">
                <i class="icon wb-refresh" aria-hidden="true"></i>
            </button>
            <!--           
            <button type="button" class="btn btn-sm btn-icon btn-primary btn-outline btn-round" data-toggle="tooltip" data-original-title="Save" data-placement="bottom">
                <i class="icon fa-save" aria-hidden="true"></i>
            </button>
            -->
        </div>
    </div>
    <div class="page-content padding-30 container-fluid testimonials-page">
        <div class="row">
            <div class=" col-sm-12 col-xlg-4 col-lg-4 col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add New Testimonial</h3>
                    </div>
                    <form action="<?php echo Yii::$app->request->baseUrl; ?>/testimonials/add-testimonial" name="newTestimonial" data-tablename="testimonial" data-action="add" method="post" class="form-horizontal testimonial">
                        <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
                        <input type="hidden" name="id" value="0" id="edit-id"/>

                        <div class="panel-body container-fluid">
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <h5>Authors's Name</h5>
                                        <input name="client" type="text" class="form-control " id="inputPlaceholder" placeholder="Enter Writer's Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <h5>Authors's Position</h5>
                                        <input name="position" type="text" class="form-control " id="inputPlaceholder" placeholder="Enter Writer's Position">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <h5>Quote</h5>
                                        <textarea class="ckeditor" name="quote"></textarea>
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
                                            <input type="checkbox" class="" name="is_active" data-plugin="switchery" data-color="#62a8ea" value="1" checked/>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-sm btn-primary btn-icon  margin-bottom-20 margin-top-20 pull-right">
                                <i class="icon fa-save"></i> Add Testimonial
                            </button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-xlg-8 col-lg-8 col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Testimonials</h3>
                    </div>
                    <div class="panel-body container-fluid">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <table class="table table-hover dataTable table-striped width-full with-export dtr-inline testimonial-table">
                                    <thead>
                                    <tr>
                                        <th width="12">#</th>

                                        <th width="100">Author</th>
                                        <th width="40">Position</th>
                                        <th width="200">Quote</th>
                                        <th width="30"></th>
                                    </tr>
                                    Author
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th width="12">#</th>
                                        <th width="100">Author</th>
                                        <th width="40">Position</th>
                                        <th width="200">Quote</th>
                                        <th width="30"></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php if ($testimonial != null) : $i = 0; ?>
                                        <?php foreach ($testimonial as $tes) : ?>
                                            <tr data-id="<?php echo $tes['id']; ?>">
                                                <td><?php echo ++$i; ?></td>
                                                <td><?php echo $tes['client']; ?></td>
                                                <td><?php echo $tes['position']; ?></td>
                                                <td><?php echo $tes['quote']; ?></td>
                                                <td>
                                                    <div class="table-row-controls">
                                                        <a href="<?php echo Yii::$app->request->baseUrl . '/testimonials/edit/' . $tes['id']; ?>" class="edit-testimonial block">
                                                            <i class="icon ti-pencil"></i> </a>
                                                        <a href="#" class="delete-testimonial block">
                                                            <i class="icon ti-close"></i> </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
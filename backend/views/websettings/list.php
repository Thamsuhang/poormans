<?php
    /* @var $this yii\web\View */

    use common\components\Misc;

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
<div class="page animsition">
    <div class="page-header  padding-bottom-0">
        <h1 class="page-title">Settings</h1>

        <div class="page-header-actions">
            <button type="button" class="btn btn-sm btn-icon btn-primary btn-outline btn-round reload-page" data-toggle="tooltip" data-original-title="Refresh" data-placement="bottom">
                <i class="icon wb-refresh" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <div class="page-content padding-30 container-fluid setting-page">
        <div class="row">
            <div class=" col-sm-12 col-xlg-4 col-lg-4 col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add New Settings</h3>
                    </div>

                    <form action="<?php echo Yii::$app->request->baseUrl; ?>/settings/add-setting" name="newSetting" data-tablename="settings" data-action="add" method="post" class="form-horizontal settings">
                        <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
                        <input type="hidden" name="id" value="0" id="edit-id"/>

                        <div class="panel-body container-fluid">
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <h5>Field Name</h5>
                                        <input name="field_name" type="text" class="form-control input-title" id="inputPlaceholder" placeholder="Enter Field Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <h5>Value</h5>
                                        <textarea name="value" class="form-control input-title" id="inputPlaceholder" placeholder="Enter Value"></textarea>
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
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <label for="" class="">Permanent</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="checkbox" class="" name="is_permanent" data-plugin="switchery" data-color="#62a8ea" value="1" checked/>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-sm btn-primary btn-icon margin-bottom-20 margin-top-20 pull-right">
                                <i class="icon fa-save"></i> Add Setting
                            </button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-xlg-8 col-lg-8 col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Settings</h3>
                    </div>
                    <div class="panel-body container-fluid">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <table class="table table-hover table-striped width-full no-pagination-table dtr-inline setting-table">
                                    <thead>
                                    <tr>
                                        <th width="27">#</th>
                                        <th width="100">Field Name</th>
                                        <th width="150">Value</th>
                                        <th width="60">Status</th>
                                        <th width="30"></th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th width="27">#</th>
                                        <th width="100">Field Name</th>
                                        <th width="150">Value</th>
                                        <th width="60">Status</th>
                                        <th width="30"></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php if ($settings != null) : $i = 0; ?>
                                        <?php foreach ($settings as $setting) : ?>
                                            <tr data-id="<?php echo $setting['id']; ?>">
                                                <td><?php echo ++$i; ?></td>
                                                <td>
                                                    <span class="editable-text-not" data-type="text"
                                                          data-params="{old_value : '<?php echo $setting['field_name']; ?>'}"
                                                          data-name="field_name" data-pk="<?php echo $setting['id']; ?>"
                                                          data-url="<?php echo Yii::$app->request->baseUrl; ?>/settings/editable-setting" data-placement="top" data-placeholder="Required"
                                                          data-original-title="Enter Field name">
                                                        <?php echo $setting['field_name']; ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="editable-textarea" data-type="textarea"
                                                          data-params="{old_value : '<?php echo $setting['value']; ?>'}"
                                                          data-name="value" data-pk="<?php echo $setting['id']; ?>"
                                                          data-url="<?php echo Yii::$app->request->baseUrl; ?>/settings/editable-setting" data-placement="top" data-placeholder="Required"
                                                          data-original-title="Enter Value"><?php echo trim($setting['value']); ?></span>
                                                </td>
                                                <td>
                                                    <span class="editable-select-active" data-type="select" data-value="<?php echo $setting['is_active']; ?>"
                                                          data-params="{old_value : '<?php echo $setting['is_active']; ?>'}"
                                                          data-name="is_active" data-pk="<?php echo $setting['id']; ?>"
                                                          data-url="<?php echo Yii::$app->request->baseUrl; ?>/settings/editable-setting" data-placement="top" data-placeholder="Required"
                                                          data-original-title="Select Status" data-source="[{value: 1, text: 'Active'},{value: 0, text: 'Inactive'}]">
                                                    </span>
                                                </td>
                                                <!--
                                                <td>
                                                    <span class="editable-select-permanent" data-type="select" data-value="<?php echo $setting['is_permanent']; ?>"
                                                        data-params="{old_value : '<?php echo $setting['is_permanent']; ?>'}"
                                                        data-name="is_permanent" data-pk="<?php echo $setting['id']; ?>"
                                                        data-url="<?php echo Yii::$app->request->baseUrl; ?>/settings/editable-setting" data-placement="top" data-placeholder="Required" 
                                                        data-original-title="Select Nature" data-source="[{value: 1, text: 'Permanent'},{value: 0, text: 'Temporary'}]">
                                                    </span>
                                                </td>
                                                -->
                                                <td>
                                                    <?php if ($setting['is_permanent'] == 0) : ?>
                                                        <div class="table-row-controls">
                                                            <a href="#" class="delete-setting block">
                                                                <i class="icon ti-close"></i> </a>
                                                        </div>
                                                    <?php endif; ?>
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
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


    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/x-editable/js/bootstrap-editable.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/custom/settings.js');
    $this->title = Yii::$app->params['system_name'] . ' | Settings';

?>
<!-- Page -->
<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title">General Options</h1>
    </div>
    <div class="page-content container-fluid">
        <!-- Panel Tabs -->
        <!--        <pre>-->
        <!--            --><?php //print_r($smtp); ?>
        <!--        </pre>-->

        <div class="panel">
            <div class="panel-body container-fluid padding-0">
                <div class="row row-lg">
                    <div class="col-lg-12">
                        <div class="nav-tabs-horizontal">
                            <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
                                <li class="active" role="presentation">
                                    <a data-toggle="tab" href="#email" aria-controls="email"
                                       role="tab">SMTP Settings</a></li>
                            </ul>
                            <div class="tab-content padding-20">
                                <div class="tab-pane active" id="email" role="tabpanel">
                                    <div class="settings-form">
                                        <form autocomplete="off" method="post" action="<?php echo Yii::$app->request->baseUrl; ?>/websettings/setemail/">
                                            <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
                                            <input type="hidden" name="smtp[id]" value="<?php echo (isset($smtp['id'])) ? $smtp['id'] : '' ?>">

                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" class="form-control" name="smtp[email]" placeholder="Email" autocomplete="off" value="<?php echo (isset($smtp['email'])) ? $smtp['email'] : '' ?>">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">Host</label>
                                                    <input type="text" class="form-control" name="smtp[host]" autocomplete="off" value="<?php echo (isset($smtp['host'])) ? $smtp['host'] : '' ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label class="control-label">Mailer</label>
                                                    <input type="text" class="form-control" name="smtp[mailer]" value="SMTP" readonly="readonly">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="control-label">Authentication</label>
                                                    <select class="form-control" name="smtp['authentication']" readonly="readonly">
                                                        <option selected value="1">Always</option>
                                                        <option value="0">Never</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="control-label">Port</label>
                                                    <input type="text" class="form-control" name="smtp[port]" placeholder="Port" autocomplete="off" value="<?php echo (isset($smtp['port'])) ? $smtp['port'] : '' ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">Username</label>
                                                    <input type="text" class="form-control" name="smtp[username]" placeholder="Username" autocomplete="off" value="<?php echo (isset($smtp['username'])) ? $smtp['username'] : '' ?>">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label" for="smtp[password]">Password</label>
                                                    <input type="password" class="form-control" id="smtp[password]" name="smtp[password]" placeholder="Password" autocomplete="off" value="">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label">Signature</label>
                                                    <textarea class="ckeditor form-control" name="smtp[signature]"><?php echo (isset($smtp['signature'])) ? $smtp['signature'] : '' ?></textarea>
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

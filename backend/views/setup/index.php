<?php
    /* @var $this yii\web\View */
    use common\components\Misc;

    if (Yii::$app->session[Yii::$app->params['user_session']]->role != Yii::$app->params['user_role']['admin']) {
        Misc::forceLogout();
    }
    $this->registerCssFile(Yii::$app->request->baseUrl . '/global/vendor/jquery-wizard/jquery-wizard.min081a.css?v2.0.0');
    $this->registerCssFile(Yii::$app->request->baseUrl . '/global/vendor/formvalidation/formValidation.min081a.css?v2.0.0');

    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/vendor/formvalidation/formValidation.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/vendor/formvalidation/framework/bootstrap.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/vendor/matchheight/jquery.matchHeight-min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/vendor/jquery-wizard/jquery-wizard.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/jquery-wizard.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/matchheight.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/wizard.js');


    $this->title = Yii::$app->params['system_name'] . ' | User Setup';

?>
<div class="page animsition">
    <div class="page-header  padding-bottom-0">
        <h1 class="page-title">User Setup</h1>
        <!--
        <div class="page-header-actions">
            <a href="javascript:history.go(-1)" class="btn btn-sm btn-icon btn-warning btn-round" data-toggle="tooltip" data-original-title="Go Back" data-placement="bottom">
                <i class="icon fa-arrow-left" aria-hidden="true"></i> </a>
        </div>
        -->
    </div>

    <div class="page-content padding-30 container-fluid page-page">
        <div class="row">
            <div class="col-sm-12 col-xlg-6 col-lg-6 col-md-12">
                <div class="panel">
                    <div class="panel-body container-fluid">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <div class="panel" id="WizardForm">
                                    <div class="panel-body">
                                        <!-- Steps -->
                                        <div class="steps steps-sm row" data-plugin="matchHeight" data-by-row="true" role="tablist">
                                            <div class="step col-md-4 current" data-target="#Account" role="tab">
                                                <span class="step-number">1</span>

                                                <div class="step-desc">
                                                    <span class="step-title">User</span>

                                                    <p>Setup user login .</p>
                                                </div>
                                            </div>

                                            <div class="step col-md-4" data-target="#Directory" role="tab">
                                                <span class="step-number">2</span>

                                                <div class="step-desc">
                                                    <span class="step-title">Directory</span>

                                                    <p>Setup business details.</p>
                                                </div>
                                            </div>

                                            <div class="step col-md-4" data-target="#Getting" role="tab">
                                                <span class="step-number">3</span>

                                                <div class="step-desc">
                                                    <span class="step-title">Confirmation</span>

                                                    <p>Confirm the details.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Steps -->

                                        <!-- Wizard Content -->
                                        <div class="wizard-content">
                                            <div class="wizard-pane active" id="Account" role="tabpanel">
                                                <form id="AccountForm" autocomplete="off">
                                                    <?php if (isset($client) && !empty($client) && $client != '') { ?>
                                                        <div class="form-group">
                                                            <label class="control-label" for="inputClientName">Client's name</label>
                                                            <input type="text" class="form-control" id="inputClientName" name="clientname" autocomplete="off" value="<?php echo ucwords($client['name']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" for="inputUserName">Username</label>
                                                            <input type="text" class="form-control" id="inputUserName" name="username" required="required" autocomplete="off" value="<?php echo $client['username']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" for="inputEmail">Email</label>
                                                            <input type="text" class="form-control" id="inputEmail" name="email" required="required" autocomplete="off" value="<?php echo $client['email']; ?>">
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-sm-12">
                                                                <label class="control-label" for="inputPassword">Password</label>
                                                                <input type="password" class="form-control" id="inputPassword" name="password" required="required" autocomplete="off" value="<?php echo $client['password']; ?>">
                                                            </div>
                                                            <div class="form-group col-md-6 col-sm-12">
                                                                <label class="control-label" for="inputRePassword">Confirm Password</label>
                                                                <input type="password" class="form-control" id="inputRePassword" name="repassword" required="required" autocomplete="off" value="<?php echo $client['password']; ?>">
                                                            </div>
                                                        </div>

                                                    <?php }
                                                    else { ?>
                                                        <div class="form-group">
                                                            <label class="control-label" for="inputClientName">Client's name</label>
                                                            <input type="text" class="form-control" id="inputClientName" name="clientname" autocomplete="off">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" for="inputUserName">Username</label>
                                                            <input type="text" class="form-control" id="inputUserName" name="username" required="required" autocomplete="off">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" for="inputEmail">Email</label>
                                                            <input type="text" class="form-control" id="inputEmail" name="email" required="required" autocomplete="off">
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-sm-12">
                                                                <label class="control-label" for="inputPassword">Password</label>
                                                                <input type="password" class="form-control" id="inputPassword" name="password" required="required" autocomplete="off">
                                                            </div>
                                                            <div class="form-group col-md-6 col-sm-12">
                                                                <label class="control-label" for="inputRePassword">Confirm Password</label>
                                                                <input type="password" class="form-control" id="inputRePassword" name="repassword" required="required" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </form>
                                            </div>
                                            <div class="wizard-pane" id="Directory" role="tabpanel">
                                                <form id="DirectoryForm">
                                                    <div class="form-group">
                                                        <label class="control-label">Business Name</label>
                                                        <input type="text" class="form-control" name="businessname" placeholder="Business Name" value="<?php echo (isset($client['business_name'])) ? $client['business_name'] : '' ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Package</label>
                                                        <select class="form-control" name="package" data-plugin="select2">
                                                            <option value="">Select a package.</option>
                                                            <option value="1" <?php echo (isset($client['package']) && $client['package'] == '1') ? 'selected="selected"' : ''; ?>>Basic</option>
                                                            <option value="2" <?php echo (isset($client['package']) && $client['package'] == '2') ? 'selected="selected"' : ''; ?>>Premium</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Status</label>
                                                        <select class="form-control" name="status" data-plugin="select2">
                                                            <option value="">Select status.</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="wizard-pane green-800" id="Getting" role="tabpanel">
                                                <div class="text-center margin-vertical-20">
                                                    <div class="wizard-confirm">
                                                        <div class="confirm-icon">
                                                            <i class="icon wb-check" aria-hidden="true"></i>
                                                        </div>
                                                        <h4>Please confirm the all the entered details.</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Wizard Content -->

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
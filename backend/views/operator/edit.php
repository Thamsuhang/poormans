<?php
/* @var $this yii\web\View */

$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/users.min.js');

$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/fileinput/fileinput.js');
$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/js/fileinput/fileinput.css');

$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/js/magnific-popup/magnific-popup.min081a.css?v2.0.0');
$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/js/lightbox/lightbox.min081a.css?v2.0.0');

$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/magnific-popup/jquery.magnific-popup.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/lightbox/lightbox.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/lightbox/magnific-popup.min.js');

$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/custom/operator.js');

$this->title = Yii::$app->params['system_name'] . ' | Edit Your Profile';
?>
<div class="page animsition">
    <form action="<?php echo Yii::$app->request->baseUrl;?>/user/edit-operator" name="editOperator" data-tablename="operator" data-action="edit" method="post" class="form-horizontal operator users">
        <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />
        <input type="hidden" name="id" value="<?php echo !empty($user['id']) ? $user['id'] : 0; ?>" id="edit-id" />
        <div class="page-header  padding-bottom-0">
            <h1 class="page-title">Edit Your Profile</h1>
            <div class="page-header-actions">

                <a href="javascript:history.go(-1)" class="btn btn-sm btn-icon btn-warning btn-round" data-toggle="tooltip" data-original-title="Go Back" data-placement="bottom">
                    <i class="icon fa-arrow-left" aria-hidden="true"></i>
                </a>

                <button type="submit" class="btn btn-sm btn-icon btn-primary btn-round" data-toggle="tooltip" data-original-title="Save" data-placement="bottom">
                    <i class="icon fa-save" aria-hidden="true"></i>
                </button>

            </div>
        </div>
        <div class="page-content padding-30 container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-6 col-md-6">
                    <div class="panel">
                        <div class="panel-body container-fluid">
                            <div class="form-group">
                                <label class="label-control">Username</label>
                                <input type="text" name="username" class="form-control input-title"  placeholder="Enter Username" value="<?php echo !empty($user['username']) ? $user['username'] : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6">
                    <div class="panel">
                        <div class="panel-body container-fluid">
                            <div class="form-group">
                                <label class="label-control">Name</label>
                                <input type="text" name="name" class="form-control input-title"  placeholder="Enter Name" value="<?php echo !empty($user['name']) ? $user['name'] : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6">
                    <div class="panel">
                        <div class="panel-body container-fluid">
                            <div class="form-group">
                                <label class="label-control">Email</label>
                                <input name="email" type="text" class="form-control input-title"  placeholder="Enter Email" value="<?php echo !empty($user['email']) ? $user['email'] : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6">
                    <div class="panel">
                        <div class="panel-body container-fluid">
                            <div class="form-group">
                                <h5>Telephone</h5>
                                <input name="phone" type="number" class="form-control input-number"  placeholder="Enter Phone" value="<?php echo !empty($user['phone']) ? $user['phone'] : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6">
                    <div class="panel">
                        <div class="panel-body container-fluid">
                            <div class="form-group">
                                <h5>Mobile</h5>
                                <input name="mobile" type="number" class="form-control input-number"  placeholder="Enter Mobile" value="<?php echo !empty($user['mobile']) ? $user['mobile'] : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-xlg-6 col-lg-6 col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Billing Address</h3>
                        </div>
                        <div class="panel-body container-fluid">
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12 col-md-12">
                                    <textarea name="billing_address" class="ckeditor"><?php echo !empty($user['billing_address']) ? $user['billing_address'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xlg-6 col-lg-6 col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Shipping Address</h3>
                        </div>
                        <div class="panel-body container-fluid">
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12 col-md-12">
                                    <textarea name="shipping_address" class="ckeditor"><?php echo !empty($user['shipping_address']) ? $user['shipping_address'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
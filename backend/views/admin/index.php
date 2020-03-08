<?php
    use common\components\Misc;
 /* @var Rsthis yii\web\View All */
    $this->title = Yii::$app->params['system_name'] . " | Welcome " . ucwords(Yii::$app->session[Yii::$app->params['user_session']]->name);

    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/dashboard/sitescript.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/dashboard/sitescript_admin_dashboard.js');

    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/custom/admin.js');
?>
<script>
    $('body').addClass('dashboard');
</script>
<div class = "page animsition admin-page" data-page = "admin" data-page-name = "index">
    <div class = "default_notify clearfix"></div>
    <div class = "page-content container-fluid">
        <div class = "row" data-plugin = "matchHeight" data-by-row = "true">
            <div class = " col-xlg-4 col-lg-4 col-md-12 col-sm-12 ">
                <div class = "widget">
                    <div class = "widget-content text-center bg-white padding-40 user-description">
                        <div class = "widget-logo">
                            <img class = "img-responsive" src = "<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/images/logo.png" alt = "<?php echo $user['name']; ?>">
                        </div>
                        <p class = "font-size-20 blue-grey-700 margin-top-50 margin-bottom-40">Welcome <?php echo !empty($user['name']) ? ucwords($user['name']) : ''; ?></p>
                        <a href = "<?php echo Yii::$app->request->baseUrl; ?>/message/">
                            <div class = "messages-label  bg-orange-800 white label-large">
                                <i class = "icon fa-envelope-o margin-right-15" aria-hidden = "true"></i>
                                <?php echo count($datacenter['messages']); ?> new Messages. <span style = ""> List Messages</span>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
            <div class = "col-xlg-8 col-lg-8 col-md-12 col-sm-12 ">
                <div class = "panel panel-bordered dashboard-buttons">
                    <div class = "panel-heading">
                        <h3 class = "panel-title">Website Settings</h3>
                    </div>
                    <div class = "panel-body">
                        <div class = "row height-full">
                            <div class = "col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class = "widget widget-bordered">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/admin/profile">
                                        <div class = "widget-content dash-item">
                                            <p class = "fontbig"><i class = "icon fa-user" aria-hidden = "true"></i></p> <span>User Profile</span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class = "col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class = "widget widget-bordered">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/websettings/home/">
                                        <div class = "widget-content dash-item">
                                            <p class = "fontbig"><i class = "icon fa-home" aria-hidden = "true"></i></p> <span>Homepage</span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class = "col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class = "widget widget-bordered">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/websettings/about">
                                        <div class = "widget-content dash-item">
                                            <p class = "fontbig"><i class = "icon fa-book" aria-hidden = "true"></i></p> <span>About us</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class = "col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class = "widget widget-bordered">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/testimonials">
                                        <div class = "widget-content dash-item">
                                            <p class = "fontbig"><i class = "icon fa-comments" aria-hidden = "true"></i></p> <span>Testimonials</span>

                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class = "col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class = "widget widget-bordered ">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/websettings/contact">
                                        <div class = "widget-content dash-item">
                                            <p class = "fontbig"><i class = "icon fa-map-signs" aria-hidden = "true"></i></p> <span>Contact</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class = "col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class = "widget widget-bordered ">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/websettings/social">
                                        <div class = "widget-content dash-item">
                                            <p class = "fontbig"><i class = "icon fa-users" aria-hidden = "true"></i></p> <span>Social Media</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class = "row" data-plugin = "matchHeight" data-by-row = "true">

            <div class = "col-xlg-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class = "panel panel-bordered dashboard-buttons">
                    <div class = "panel-heading">
                        <h3 class = "panel-title">Basic Listing</h3>
                    </div>
                    <div class = "panel-body">
                        <div class = "row height-full">
                            <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class = "widget widget-bordered">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/list/basic">
                                        <div class = "widget-content dash-item">
                                            <p class = "fontbig"><i class = "icon fa-th-list" aria-hidden = "true"></i></p> <span> List Basic Listing</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class = "widget widget-bordered">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/add/basic">
                                        <div class = "widget-content dash-item">
                                            <p class = "fontbig"><i class = "icon fa-plus-circle" aria-hidden = "true"></i></p> <span>Add to Basic Listing</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "col-xlg-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class = "panel panel-bordered dashboard-buttons">
                    <div class = "panel-heading">
                        <h3 class = "panel-title">Premium Listing</h3>
                    </div>
                    <div class = "panel-body">
                        <div class = "row height-full">
                            <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class = "widget widget-bordered">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/list/premium">
                                        <div class = "widget-content dash-item">
                                            <p class = "fontbig"><i class = "icon fa-th-list" aria-hidden = "true"></i></p> <span> List Premium Listing</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class = "widget widget-bordered">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/add/premium">
                                        <div class = "widget-content dash-item">
                                            <p class = "fontbig"><i class = "icon fa-plus-circle" aria-hidden = "true"></i></p> <span>Add to Premium Listing</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class = "col-xlg-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class = "panel panel-bordered dashboard-buttons">
                    <div class = "panel-heading">
                        <h3 class = "panel-title">Business Card Listing</h3>
                    </div>
                    <div class = "panel-body">
                        <div class = "row height-full">
                            <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class = "widget widget-bordered">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/list/card">
                                        <div class = "widget-content dash-item">
                                            <p class = "fontbig"><i class = "icon fa-th-list" aria-hidden = "true"></i></p> <span> List Business Cards</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class = "widget widget-bordered">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/add/card">
                                        <div class = "widget-content dash-item">
                                            <p class = "fontbig"><i class = "icon fa-plus-circle" aria-hidden = "true"></i></p> <span>Add Business Card</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "col-xlg-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class = "panel panel-bordered dashboard-buttons">
                    <div class = "panel-heading">
                        <h3 class = "panel-title">Featured Listing</h3>
                    </div>
                    <div class = "panel-body">
                        <div class = "row height-full">
                            <div class = "col-lg-4 col-md-6 col-sm-3 col-xs-12">
                                <div class = "widget widget-bordered">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/list/featured">
                                        <div class = "widget-content dash-item">
                                            <p class = "fontbig"><i class = "icon fa-th-list" aria-hidden = "true"></i></p> <span> List Featured Businesses</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class = "col-lg-4 col-md-6 col-sm-3 col-xs-12">
                                <div class = "widget widget-bordered">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/add/featured">
                                        <div class = "widget-content dash-item">
                                            <p class = "fontbig"><i class = "icon fa-plus-circle" aria-hidden = "true"></i></p> <span>Add Featured Business</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class = "col-lg-4 col-md-6 col-sm-3 col-xs-12">
                                <div class = "widget widget-bordered">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/sort/">
                                        <div class = "widget-content dash-item">
                                            <p class = "fontbig"><i class = "icon fa-retweet" aria-hidden = "true"></i></p> <span>Sort Featured Businesses</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "col-xlg-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class = "panel panel-bordered dashboard-buttons">
                    <div class = "panel-heading">
                        <h3 class = "panel-title">Directory Tools</h3>
                    </div>
                    <div class = "panel-body">
                        <div class = "row height-full">
                            <div class = "col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                <div class = "widget widget-bordered">
                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/categories/">
                                        <div class = "widget-content dash-item">
                                            <p class = "fontbig"><i class = "icon fa-columns" aria-hidden = "true"></i></p> <span>Manage Categories</span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

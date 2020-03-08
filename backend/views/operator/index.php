<?php
    /* @var Rsthis yii\web\View */
    use common\components\Misc as Misc;

    $this->title = Yii::$app->params['system_name'] . " | Welcome " . ucwords(Yii::$app->session[Yii::$app->params['user_session']]->name);

    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/dashboard/sitescript.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/dashboard/sitescript_admin_dashboard.js');

    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/custom/operator.js');
    $this->registerCssFile(Yii::$app->request->baseUrl . '/assets/css/operator-overides.css');
?>
<script>
    $('body').addClass('dashboard');
    $('body').addClass('operator');
</script>


<div class="page animsition operator-page" data-page="operator" data-page-name="index">
    <div class="page-header  padding-bottom-0">
        <h1 class="page-title">Dashboard</h1>

        <div class="page-header-actions">
            <a href="<?php echo Yii::$app->request->baseUrl; ?>/site/logout" type="button" class="btn btn-sm btn-icon btn-primary btn-round" data-toggle="tooltip" data-original-title="Edit" data-placement="left">
                <i class="icon fa-sign-out" aria-hidden="true"></i> </a>
        </div>
    </div>
    <div class="page-content  container-fluid">

        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class=" col-sm-12 col-xlg-4 col-lg-4 col-md-6">
                <div class="widget">
                    <div class="widget-content text-center bg-white padding-40 user-description">
                        <div class="avatar avatar-100 margin-bottom-20">
                            <img class="img-responsive" src="<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/images/user-profile-pic.jpg" alt="<?php echo $user['name']; ?>">

                        </div>
                        <p class="font-size-20 blue-grey-700"><?php echo !empty($user['name']) ? ucwords($user['name']) : ''; ?></p>

                        <p class="font-size-20">
                            <?php if (!empty($user['status']) && $user['status'] == 10): ?>
                                <span class="label label-success">Active</span>
                            <?php else: ?>
                                <span class="label label-danger">Inactive</span>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xlg-8 col-lg-8 col-md-6">
                <div class="panel panel-bordered user-address">
                    <div class="panel-heading">
                        <div class="panel-actions">
                            <div class="buttons">
                                <a href="/poormans/official/user/update-operator/<?php echo $user['username']; ?>" type="button" class="btn btn-sm btn-icon  btn-round" data-toggle="tooltip" data-original-title="Edit" data-placement="left">
                                    <i class="icon ti-pencil" aria-hidden="true"></i> </a>
                            </div>
                        </div>
                        <h3 class="panel-title">Personal Information</h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>
                                <i class="icon fa-phone"></i><strong>Phone :</strong>
                                <?php echo !empty($user['phone']) ? $user['phone'] : ''; ?>
                            </li>
                            <li>
                                <i class="icon fa-fax"></i> <strong>Fax :</strong>
                                <?php echo !empty($user['mobile']) ? $user['mobile'] : ''; ?>
                            </li>
                            <li>
                                <i class="icon fa-envelope-o"></i> <strong>Email :</strong>
                                <a class="inline-block" href="mailto:<?php echo !empty($user['email']) ? $user['email'] : ''; ?>">
                                    <?php echo !empty($user['email']) ? $user['email'] : ''; ?>
                                </a>
                                <?php if ($user['email_verified'] == 0) { ?>
                                    <span class="inline-block label label-danger label-outline margin-left-10">Not Verified</span>
                                <?php }
                                else { ?>
                                    <span class="inline-block label label-success label-outline margin-left-10">Verified</span>

                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php if (isset($datacenter['businesses']) && !empty($datacenter['businesses'])) : ?>
            <div class="panel-group panel-rack" id="businessAccordion" aria-multiselectable="true" role="tablist">
                <?php $b_counter = 1;
                    foreach ($datacenter['businesses'] as $business): ?>
                        <div class="panel <?php echo ($business['dstatus'] == 1) ? 'active' : 'inactive' ?>">
                            <div class="panel-heading" id="businessHeading-<?php echo $b_counter; ?>" role="tab">
                                <div class=" business-heading">
                                    <div class="business-logo">
                                        <img class="img-responsive" src="<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/images/uploads/<?php echo (isset($business['logo']) && !empty($business['logo'])) ? $business['logo'] : 'no-image.png'; ?>">
                                    </div>

                                    <div class="business-details">
                                        <!--                                    <a href="--><?php //echo ($business['dstatus'] == 1) ? Yii::$app->request->baseUrl . '/directory/edit/' . Misc::RUrl() . $business['directory_id'] . Misc::RUrl() : 'javascript:void(0);'; ?><!--">-->
                                        <!--                                        <h4 class="business-title">--><?php //echo ucwords($business['dname']); ?><!--</h4>-->
                                        <!--                                    </a>-->
                                        <a class="" data-toggle="collapse" href="#businessCollapse-<?php echo $b_counter; ?>"
                                           data-parent="#businessAccordion" aria-expanded="true"
                                           aria-controls="businessCollapse-<?php echo $b_counter; ?>">
                                            <h4 class="business-title"><?php echo ucwords($business['dname']); ?></h4>
                                        </a>

                                        <p class="business-address"><?php echo ucfirst($business['address']); ?></p>
                                    </div>
                                    <?php if ($business['dstatus'] == 1) : ?>
                                        <div class="business-actions">
                                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/directory/edit/<?php echo Misc::RUrl() . $business['directory_id'] . Misc::RUrl(); ?>">
                                                <i class="icon fa-edit"></i> </a>
                                        </div>
                                    <?php endif; ?>
                                    <a class="panel-title" data-toggle="collapse" href="#businessCollapse-<?php echo $b_counter; ?>"
                                       data-parent="#businessAccordion" aria-expanded="true"
                                       aria-controls="businessCollapse-<?php echo $b_counter; ?>"> </a>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                            <div class="panel-collapse collapse" id="businessCollapse-<?php echo $b_counter; ?>" aria-labelledby="businessHeading-<?php echo $b_counter; ?>"
                                 role="tabpanel">
                                <div class="panel-body">
                                    <?php
                                        $date['current'] = date("y-m-d", strtotime(date('y-m-d')));
                                        $date['created'] = date("y-m-d", strtotime($business['created_on']));
                                        $date['expiry'] = date('y-m-d', strtotime('+1 year', strtotime($business['created_on'])));
                                    ?>
                                    <div class="row">
                                        <div class="col-md-4 col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-4 col-xs-12">
                                                    <div class="business-items text-center">
                                                        <label class="control-label">Status</label>
                                                        <?php echo ($business['dstatus'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>' ?>
                                                        <?php echo ($business['is_featured'] == 1) ? '<span class="label label-success">Featured</span>' : '' ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-xs-12">
                                                    <div class="business-items text-center">
                                                        <label class="control-label">Package</label>
                                                        <?php echo ($date['current'] < $date['expiry']) ? Yii::$app->params['package'][$business['package_id']] : '&dash;' ?>

                                                    </div>
                                                </div>

                                                <div class="col-sm-4 col-xs-12">
                                                    <div class="business-items text-center">
                                                        <label class="control-label">Expiry</label>
                                                        <span class="label label-<?php echo ($date['current'] > $date['expiry']) ? 'danger' : 'success' ?>"><?php echo date("D, d M Y", strtotime($date['expiry'])); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="business-items">
                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-12">
                                                        <label class="control-label">City</label>

                                                        <div class="business-description">
                                                            <?php echo ucwords($business['city']); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-12">
                                                        <label class="control-label">State</label>

                                                        <div class="business-description">
                                                            <?php echo ucwords($business['state']); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ($business['package_id'] > 1): ?>
                                                <div class="business-items">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-12">

                                                            <label class="control-label">Longitude</label>

                                                            <div class="business-description"> <?php echo ucwords($business['longitude']); ?> </div>

                                                        </div>
                                                        <div class="col-sm-6 col-xs-12">

                                                            <label class="control-label">Latitude</label>

                                                            <div class="business-description"> <?php echo ucwords($business['latitude']); ?> </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-8 col-xs-12">
                                            <div class="business-items">
                                                <label class="control-label">Business Description</label>

                                                <div class="business-description">
                                                    <?php echo ucwords($business['description']); ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <?php if (count($business['phone']) > 0) : ?>
                                                        <div class="business-items">
                                                            <label class="control-label">Phone : </label>
                                                            <ol class="business-multiples">
                                                                <?php
                                                                    $counter = 1;
                                                                    foreach ($business['phone'] as $x) : ?>
                                                                        <li>
                                                                            <span class="count"><?php echo $counter; ?></span>
                                                                            <span class="value"><?php echo $x['description']; ?></span>
                                                                            <span class="type">(<?php echo $x['type']; ?>)</span>
                                                                        </li>
                                                                    <?php endforeach; ?>
                                                            </ol>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if ($business['package_id'] > 1) : ?>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?php if (count($business['fax']) > 0) : ?>
                                                            <div class="business-items">
                                                                <label class="control-label">fax : </label>
                                                                <ol class="business-multiples">
                                                                    <?php
                                                                        $counter = 1;
                                                                        foreach ($business['fax'] as $x) : ?>
                                                                            <li>
                                                                                <span class="count"><?php echo $counter; ?></span>
                                                                                <span class="value"><?php echo $x['description']; ?></span>
                                                                                <span class="type">(<?php echo $x['type']; ?>)</span>
                                                                            </li>
                                                                        <?php endforeach; ?>
                                                                </ol>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?php if (count($business['email']) > 0) : ?>
                                                            <div class="business-items">
                                                                <label class="control-label">email : </label>
                                                                <ol class="business-multiples">
                                                                    <?php
                                                                        $counter = 1;
                                                                        foreach ($business['email'] as $x) : ?>
                                                                            <li>
                                                                                <span class="count"><?php echo $counter; ?></span>
                                                                                <span class="value"><?php echo $x['description']; ?></span>
                                                                                <span class="type">(<?php echo $x['type']; ?>)</span>
                                                                            </li>
                                                                        <?php endforeach; ?>
                                                                </ol>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?php if (count($business['url']) > 0) : ?>
                                                            <div class="business-items">
                                                                <label class="control-label">url : </label>
                                                                <ol class="business-multiples">
                                                                    <?php
                                                                        $counter = 1;
                                                                        foreach ($business['url'] as $x) : ?>
                                                                            <li>
                                                                                <span class="count"><?php echo $counter; ?></span>
                                                                                <span class="value"><?php echo $x['description']; ?></span>
                                                                                <span class="type">(<?php echo $x['type']; ?>)</span>
                                                                            </li>
                                                                        <?php endforeach; ?>
                                                                </ol>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php $b_counter++;
                    endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

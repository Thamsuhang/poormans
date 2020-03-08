<?php
    use common\components\Misc;

    if (Yii::$app->session[Yii::$app->params['user_session']]->role != Yii::$app->params['user_role']['admin']) {
        Misc::forceLogout();
    }
    use common\components\HelperUser as HUsers;


    /* @var $this yii\web\View */
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/datatables.min.js');


    $this->title = Yii::$app->params['system_name'] . ' | New Client Requests';
?>
<div class="page animsition">
    <div class="page-header  padding-bottom-0">
        <h1 class="page-title">Client Requests</h1>

        <div class="page-header-actions">
            <a href="javascript:history.go(-1)" class="btn btn-sm btn-icon btn-warning btn-round" data-toggle="tooltip" data-original-title="Go Back" data-placement="bottom">
                <i class="icon fa-arrow-left" aria-hidden="true"></i> </a>
            <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-primary btn-round reload-page" data-toggle="tooltip" data-original-title="Go Back" data-placement="bottom">
                <i class="icon wb-refresh" aria-hidden="true"></i> </a>
        </div>
    </div>
    <div class="page-content padding-30 container-fluid page-page">
        <div class="row">
            <div class="col-sm-12 col-xlg-12 col-lg-12 col-md-12">

                <div class="panel">
                    <div class="panel-body container-fluid">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <table class="table table-hover dataTable table-striped width-full with-export page-table">
                                    <thead>
                                    <tr>
                                        <th width="27">#</th>
                                        <th width="">New</th>
                                        <th width="">Name</th>
                                        <th width="">Email</th>
                                        <th width="">Package</th>
                                        <th width="">Date</th>
                                        <th width=""></th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th width="27">#</th>
                                        <th width="">New</th>
                                        <th width="">Name</th>
                                        <th width="">Email</th>
                                        <th width="">Package</th>
                                        <th width="">Date</th>
                                        <th width=""></th>
                                    </tr>
                                    </tfoot>
                                    <?php if (isset($datacenter['signUp']) && count($datacenter['signUp']) > 0) : $counter = 1; ?>
                                        <tbody>
                                        <?php foreach ($datacenter['signUp'] as $appointment) : ?>
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo ($appointment['is_viewed'] == 0) ? '<span  class="label label-outline label-danger">New</span>' : '<span class="label label-outline label-dark">Viewed</span>'; ?></td>
                                                <td><?php echo ucfirst($appointment['name']); ?></td>
                                                <td>
                                                    <span class="inline-block margin-right-10"> <?php echo $appointment['email']; ?> </span><?php echo ($appointment['email_verified'] == 0) ? '<span  class="label label-outline label-danger">Not Verified</span>' : '<span class="label label-outline label-dark">Verified</span>'; ?>
                                                </td>
                                                <td><?php echo Yii::$app->params['package'][$appointment['package']]; ?></td>
                                                <td><?php echo date("D, d M, Y | g:i a", strtotime($appointment['created_on'])); ?></td>
                                                <td class="text-right">
                                                    <?php echo ($appointment['is_viewed'] == 0) ? '<a href="javascript:void(0);" class="label label-outline label-primary mark-viewed"data-user="' . $appointment['id'] . '"><i class="icon fa-eye margin-right-10"></i>Mark as viewed</a>' : '' ?>

                                                    <?php if ($appointment['email_verified'] != 0) : ?>
                                                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/setup?user=<?php echo Misc::RUrl() . $appointment['id'] . Misc::RUrl(); ?>" class="label label-outline label-success approve-user"><i class="icon fa-check margin-right-10"></i>Approve</a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                        <?php $counter++; endif; ?>

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
<div class="modal fade modal-fade-in-scale-up" id="read-message" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title"><i class="icon fa-envelope-o icon-left"></i> Message</h4>
            </div>
            <div class="modal-body">
                <table class="read-message-table">
                    <tr>
                        <td>Date :</td>
                        <td>
                            <div class="message-date"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Name :</td>
                        <td>
                            <div class="message-name"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td>
                            <div class="message-email"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Subject :</td>
                        <td>
                            <div class="message-subject"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><u>Message</u> :</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="message-content"></div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php
    use common\components\Misc;

    if (Yii::$app->session[Yii::$app->params['user_session']]->role != Yii::$app->params['user_role']['admin']) {
        Misc::forceLogout();
    }
    /* @var $this yii\web\View */
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/datatables.min.js');

    $this->title = Yii::$app->params['system_name'] . ' | Message List';

?>
<div class = "page animsition">
    <div class = "page-header  padding-bottom-0">
        <h1 class = "page-title">Messages</h1>

        <div class = "page-header-actions">
            <a href = "javascript:history.go(-1)" class = "btn btn-sm btn-icon btn-warning btn-round" data-toggle = "tooltip" data-original-title = "Go Back" data-placement = "bottom">
                <i class = "icon fa-arrow-left" aria-hidden = "true"></i></a>

        </div>
    </div>

    <div class = "page-content padding-30 container-fluid page-page">
        <div class = "row">
            <div class = "col-sm-12 col-xlg-12 col-lg-12 col-md-12">
                <div class = "panel">
                    <div class = "panel-body container-fluid">
                        <div class = "row row-lg">
                            <div class = "col-sm-12 col-lg-12 col-md-12">
                                <table class = "table table-hover dataTable table-striped width-full with-export page-table">
                                    <thead>
                                    <tr>
                                        <th width = "27">#</th>
                                        <th width = "27">New</th>
                                        <th width = "50">Name</th>
                                        <th width = "50">Email</th>
                                        <th width = "50">Subject</th>
                                        <th width = "200">Message</th>
                                        <th width = "50">Sent On</th>
                                        <th width = "30"></th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th width = "27">#</th>
                                        <th width = "27">New</th>
                                        <th width = "50">Name</th>
                                        <th width = "50">Email</th>
                                        <th width = "50">Subject</th>
                                        <th width = "200">Message</th>
                                        <th width = "50">Sent On</th>
                                        <th width = "30"></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php if ($appointments != NULL) : $i = 0; ?><?php foreach ($appointments as $appointment) : ?>
                                        <tr>
                                            <td><?php echo ++$i; ?></td>
                                            <td><?php echo ($appointment['is_read'] == 0) ? '<span  class="label label-outline label-danger">New</span>' : '<span class="label label-outline label-dark">Read</span>'; ?></td>
                                            <td><?php echo ucfirst($appointment['name']); ?></td>
                                            <td><?php echo $appointment['email']; ?></td>
                                            <td><?php echo (strlen($appointment['subject']) > 20) ? substr($appointment['subject'], 0, 20) . ' ... ' : $appointment['subject']; ?>
                                                <div class = "hidden-data"><?php echo $appointment['subject']; ?></div>
                                            </td>
                                            <td><a class = "read-message" data-message = "<?php echo $appointment['id']; ?>" href="javascript:void(0);"><?php echo (strlen($appointment['message']) > 80) ? substr($appointment['message'], 0, 80) . ' ... ' : $appointment['message']; ?>
                                                <div class = "hidden-data"><?php echo $appointment['message']; ?></div>
                                            </td>
                                            <td><?php echo date("D, d M, Y | g:i a", strtotime($appointment['created_on'])); ?></td>
                                            <td><a href="javascript:void(0);" class="delete-message" data-id = "<?php echo $appointment['id']; ?>"><i class = "icon fa-trash red"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?><?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "clearfix"></div>
    </div>
</div>
<div class = "modal fade modal-fade-in-scale-up" id = "read-message" aria-hidden = "true" aria-labelledby = "exampleModalTitle" role = "dialog" tabindex = "-1">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                    <span aria-hidden = "true">×</span>
                </button>
                <h4 class = "modal-title"><i class = "icon fa-envelope-o icon-left"></i> Message</h4>
            </div>
            <div class = "modal-body">
                <table class = "read-message-table">
                    <tr>
                        <td>Date :</td>
                        <td>
                            <div class = "message-date"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Name :</td>
                        <td>
                            <div class = "message-name"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td>
                            <div class = "message-email"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Subject :</td>
                        <td>
                            <div class = "message-subject"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "2"><u>Message</u> :</td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <div class = "message-content"></div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-default margin-0" data-dismiss = "modal">Close</button>
            </div>
        </div>
    </div>
</div>
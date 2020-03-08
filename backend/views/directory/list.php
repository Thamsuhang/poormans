<?php
    /* @var $this yii\web\View */
    use common\components\Misc as Misc;

    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/directory.js');

    /* Required for Switches */
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/vendor/switchery/switchery.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/switchery.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/custom/testimonial.js');


    $this->title = Yii::$app->params['system_name'] . ' | Directory Manager';

    if (Yii::$app->session[Yii::$app->params['user_session']]->role != Yii::$app->params['user_role']['admin']) {
        Misc::forceLogout();
    }
    $count = count($directories);

?>
<div class = "page animsition">
    <div class = "page-header  padding-bottom-0">
        <h1 class = "page-title"><?php echo Yii::$app->params['packages'][$type]['name']; ?> Directory</h1>

        <div class = "page-header-actions">
            <a href = "javascript:void(0)" class = "btn btn-sm btn-icon btn-warning btn-round reload-page" data-toggle = "tooltip" data-original-title = "Go Back" data-placement = "bottom">
                <i class = "icon wb-refresh" aria-hidden = "true"></i>
            </a>
            <?php if ($type == 'featured') { ?>
                <a href = "<?php echo ($count <= 40) ? Yii::$app->request->baseUrl . '/directory/add/' . $type : 'javascript:void(0);' ?>" class = "btn btn-sm btn-icon btn-primary btn-round <?php echo ($count <= 40) ? '' : 'disabled' ?>" data-toggle = "tooltip" data-original-title = "Go Back" data-placement = "bottom">
                    <i class = "icon wb-plus" aria-hidden = "true"></i>
                </a>
            <?php }
            else { ?>
                <a href = "<?php echo Yii::$app->request->baseUrl . '/directory/add/' . $type ?>" class = "btn btn-sm btn-icon btn-primary btn-round">
                    <i class = "icon wb-plus" aria-hidden = "true"></i>
                </a>
            <?php } ?>
        </div>
    </div>
    <div class = "page-content padding-30 container-fluid testimonials-page">

        <div class = "row">
            <div class = "col-sm-12 col-xlg-12 col-lg-12 col-md-12">
                <div class = "panel">

                    <div class = "panel-body container-fluid">
                        <div class = "row row-lg">
                            <div class = "col-sm-12 col-lg-12 col-md-12">

                                <table class = "table table-hover dataTable table-striped width-full with-export dtr-inline testimonial-table">
                                    <thead>
                                        <tr>
                                            <th width = "30">#</th>
                                            <?php if (in_array('business_card', Yii::$app->params['packages'][$type]['objects'])) : ?>
                                                <th width = "">Business Card</th>
                                            <?php endif; ?>
                                            <?php if (in_array('display_link', Yii::$app->params['packages'][$type]['objects'])) : ?>
                                                <th width = "">Display Add</th>
                                            <?php endif; ?>
                                            <?php if (in_array('coupon_link', Yii::$app->params['packages'][$type]['objects'])) : ?>
                                                <th width = "">Coupon</th>
                                            <?php endif; ?>
                                            <th width = "">Name</th>
                                            <th width = "">Address</th>
<!--                                            <th width = "">Phone</th>-->
                                            <th width = "">Owner</th>
<!--                                            <th width = "">Category</th>-->
                                            <th width = "">Expiry</th>
                                            <th width = "">Status</th>
                                            <th width = "30"></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width = "30">#</th>
                                            <?php if (in_array('business_card', Yii::$app->params['packages'][$type]['objects'])) : ?>
                                                <th width = "">Business Card</th>
                                            <?php endif; ?>
                                            <?php if (in_array('display_link', Yii::$app->params['packages'][$type]['objects'])) : ?>
                                                <th width = "">Display Add</th>
                                            <?php endif; ?>
                                            <?php if (in_array('coupon_link', Yii::$app->params['packages'][$type]['objects'])) : ?>
                                                <th width = "">Coupon</th>
                                            <?php endif; ?>
                                            <th width = "">Name</th>
                                            <th width = "">Address</th>
<!--                                            <th width = "">Phone</th>-->
                                            <th width = "">Owner</th>
<!--                                            <th width = "">Category</th>-->
                                            <th width = "">Expiry</th>
                                            <th width = "">Status</th>
                                            <th width = "30"></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php

                                            $counter = 0;
                                            foreach ($directories as $directory) : ?>
                                                <tr data-id = "<?php echo $directory['directory_id']; ?>">
                                                    <td><?php echo $counter + 1; ?></td> <!-- Count -->
                                                    <?php if (in_array('business_card', Yii::$app->params['packages'][$type]['objects'])) : ?>
                                                        <td>
                                                            <img src = "<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/images/uploads/<?php echo (isset($directory['card']) && !empty($directory['card'])) ? $directory['card'] : 'no-image.png' ?>" class = "directory-logo">
                                                        </td><!-- Card -->
                                                    <?php endif; ?>
                                                    <?php if (in_array('display_link', Yii::$app->params['packages'][$type]['objects'])) : ?>
                                                        <td>
                                                            <img src = "<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/images/uploads/<?php echo (isset($directory['disp_add']) && !empty($directory['disp_add'])) ? $directory['disp_add'] : 'no-image.png' ?>" class = "directory-logo">
                                                        </td><!-- Display Add -->
                                                    <?php endif; ?>
                                                    <?php if (in_array('coupon_link', Yii::$app->params['packages'][$type]['objects'])) : ?>
                                                        <td>
                                                            <img src = "<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/images/uploads/<?php echo (isset($directory['coupon']) && !empty($directory['coupon'])) ? $directory['coupon'] : 'no-image.png' ?>" class = "directory-logo">
                                                        </td><!-- Display Add -->
                                                    <?php endif; ?>
                                                    <td>
                                                        <a href = "<?php echo Yii::$app->request->baseUrl . '/directory/edit/' . Misc::RUrl() . $directory['directory_id'] . Misc::RUrl() ?>"><strong><?php echo $directory['name']; ?></strong></a>
                                                    </td><!-- Name -->
                                                    <td>
                                                        <?php echo ($directory['address'] != '') ? ucfirst($directory['address']) : ''; ?>

                                                        <?php echo ($directory['address'] != '' && $directory['state'] != '') ? ', ' : ''; ?>

                                                        <?php echo ($directory['state'] != '') ? ucwords($directory['state']) : ''; ?>
                                                    </td><!-- Address -->
<!--                                                    <td>-->
<!--                                                        <ul>-->
<!--                                                            --><?php //if (!empty($directory['phone']) && is_array($directory['phone'])) {
//                                                                 print_r($directory['phone']);
//                                                                foreach($directory['phone'] as $item) :?>
<!--                                                                    <li>-->
<!--                                                                        <i class = "icon wb-chevron-right f_small_r"></i>--><?php //echo $item; ?>
<!--                                                                    </li>-->
<!--                                                                --><?php //endforeach;
//
//                                                            } ?>
<!--                                                        </ul>-->
<!--                                                    </td>-->
                                                   <!-- Phone -->

                                                    <td>
                                                        <ul>
                                                            <?php echo ($directory['owner_name'] != '') ? ' <li><strong>Name</strong> : ' . ucwords($directory['owner_name']) . '</li>' : ''; ?>

                                                            <?php echo ($directory['owner_num'] != '') ? ' <li><strong>Phone</strong> : ' . $directory['owner_num'] . '</li>' : ''; ?>

                                                            <?php echo ($directory['owner_email'] != '') ? ' <li><strong>Email</strong> : ' . $directory['owner_email'] . '</li>' : ''; ?>
                                                        </ul>

                                                    </td><!-- Username -->
<!--                                                    <td>-->
<!--                                                        --><?php //echo ($directory['parent'] != '') ? $directory['parent'] . '<i class = "icon wb-chevron-right f_small_r f_small_l"></i>' : '';
//                                                            echo $directory['type']; ?>
<!--                                                    </td>-->
                                                   <!-- Cat -->

                                                    <td class = "directory-date">
                                                        <?php
                                                            $date['current'] = date("y-m-d", strtotime(date('y-m-d')));
                                                            $date['expiry'] = date("y-m-d", strtotime($directory['extended_till']));
                                                            if ($date['current'] > $date['expiry']) {
                                                                echo '<span class="red">';
                                                                echo date("D, d M Y", strtotime($date['expiry'])) . '<br/>';
                                                                echo (new DateTime($date['current']))->diff(new DateTime($date['expiry']))->format('%a') . ' days passed';
                                                            }
                                                            else {
                                                                echo '<span>';
                                                                echo date("D, d M Y", strtotime($date['expiry'])) . '<br/>';
                                                                echo (new DateTime($date['current']))->diff(new DateTime($date['expiry']))->format('%a') . ' days Left';
                                                            } ?>
                                                        </span>

                                                    </td><!-- Date -->
                                                    <td>
                                                        <input type = "checkbox" class = "directory-status" <?= ($directory['is_active'] == 1 && $directory['extended_till'] >= date('Y-m-d H:i:s')) ? 'checked = "checked"' : '' ?> <?= ($directory['extended_till'] < date('Y-m-d H:i:s')) ? 'disabled = "disabled"' : '' ?> data-plugin = "switchery" data-size = "small" data-color = "#3fcb3c" data-secondary-color = "rgb(197, 26, 26)"/>
                                                    </td><!-- Status -->

                                                    <td>
                                                        <a href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/listing/<?= $directory['package'] ?>/<?= Misc::encodeUrl($directory['directory_id']) ?>" class = "">
                                                            <i class = "fa fa-edit"></i>
                                                        </a>
                                                        <a href = "javascript:void(0);" class = "delete-directory-item" data-id = "<?php echo $directory['directory_id'] ?>">
                                                            <i class = "fa fa-trash red"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $counter++;
                                            endforeach; ?>
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



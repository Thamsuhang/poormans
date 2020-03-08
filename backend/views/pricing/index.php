<?php
    use common\components\Misc;

    /* @var $this yii\web\View */

    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/datatables.min.js');
    $this->title = Yii::$app->params['system_name'] . ' | Pricing Table';
?>
<div class="page animsition">
    <div class="page-header  padding-bottom-0">
        <h1 class="page-title">Pricing Plans</h1>
    </div>

    <pre>
        <?php
            print_r($datacenter['pricing']);
      //  die;
        ?>
    </pre>
    <div class="page-content padding-30 container-fluid page-page">
        <div class="row">
            <div class="col-xlg-4 col-lg-4 col-md-6 col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pricing Plan</h3>
                        <!--
                        <div class="panel-actions">
                            <a class="panel-action icon wb-times"></a>
                        </div>
                        -->
                    </div>
                    <div class="panel-body container-fluid">
                        <div class="row row-lg">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <table class="table table-hover  table-striped width-full pricing-plan">
                                    <thead>
                                    <tr>
                                        <td class="no-border"></td>
                                        <td>
                                            <input type="text" class="form-control" value="Basic" placeholder="Plan Title"/>
                                            <span><input type="text" class="form-control" value="$5 / Month" placeholder="Plan Price"/></span>
                                        </td>
                                        <td>Premium<span>$10 / Month</span></td>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>Logo</td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]" checked/>
                                                <label></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]" checked/>
                                                <label></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]" checked/>
                                                <label></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]" checked/>
                                                <label></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]" checked/>
                                                <label></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]" checked/>
                                                <label></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]" checked/>
                                                <label></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]" checked/>
                                                <label></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]" checked/>
                                                <label></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]" checked/>
                                                <label></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Phone</td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]" checked/>
                                                <label></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]" checked/>
                                                <label></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Fax</td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]"/> <label></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]" checked/>
                                                <label></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]"/> <label></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]" checked/>
                                                <label></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Website URL</td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]"/> <label></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]" checked/>
                                                <label></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Display Link</td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]"/> <label></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox-custom checkbox-success">
                                                <input type="checkbox" name="pricingPlan[][name]" checked/>
                                                <label></label>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i>Update Plans
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xlg-8 col-lg-8 col-md-6 col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pricing Plan</h3>

                        <div class="panel-actions">
                            <a class="panel-action" data-target="#add-plan" data-toggle="modal"><i class="icon icon-left fa-plus"></i>Add Package</a>
                        </div>
                    </div>
                    <div class="panel-body container-fluid">
                        <div class="row row-lg">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                

                                <table class="table table-hover  table-striped width-full with-tr-actions">
                                    <thead>
                                    <tr>
                                        <th width="10">#</th>
                                        <th width="30">Title</th>
                                        <th width="50">Price</th>
                                        <th width="50">Description</th>
                                        <th width="30"></th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th width="10">#</th>
                                        <th width="30">Title</th>
                                        <th width="50">Price</th>
                                        <th width="50">Description</th>
                                        <th width="30"></th>

                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                        if (Misc::exists($datacenter['pricing']['others'])) :
                                            foreach ($datacenter['pricing']['others'] as $item) : ?>
                                                <tr data-row="">
                                                    <td width="10">#</td>
                                                    <td width="30"><?php echo $item['title']; ?></td>
                                                    <td width="50"><?php echo $item['price']; ?></td>
                                                    <td width="50"><?php echo $item['description']; ?></td>
                                                    <td width="30">
                                                        <a class="btn btn-sm" href="javascript:void(0);" data-target="#edit-plan" data-toggle="modal"><i class="icon icon-left fa-edit"></i>Edit</a>
                                                        <a class="btn btn-sm" href="javascript:void(0);"><i class="icon icon-left fa-trash"></i>Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach;
                                        endif;
                                    ?>

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


<!-- Modal -->
<div class="modal fade" id="add-plan" aria-hidden="false" aria-labelledby="additional-packages-label"
     role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="additional-packages-label">Set The Messages</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4 form-group">
                        <input type="text" class="form-control" name="firstName" placeholder="First Name">
                    </div>
                    <div class="col-lg-4 form-group">
                        <input type="email" class="form-control" name="lastName" placeholder="Last Name">
                    </div>
                    <div class="col-lg-4 form-group">
                        <input type="email" class="form-control" name="email" placeholder="Your Email">
                    </div>
                    <div class="col-lg-12 form-group">
                        <textarea class="form-control" rows="5" placeholder="Type your message"></textarea>
                    </div>
                    <div class="col-sm-12 pull-right">
                        <button class="btn btn-primary btn-outline" data-dismiss="modal" type="button">Add Comment</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="edit-plan" aria-hidden="false" aria-labelledby="additional-packages-label"
     role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="additional-packages-label">Set The Messages</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4 form-group">
                        <input type="text" class="form-control" name="firstName" placeholder="First Name">
                    </div>
                    <div class="col-lg-4 form-group">
                        <input type="email" class="form-control" name="lastName" placeholder="Last Name">
                    </div>
                    <div class="col-lg-4 form-group">
                        <input type="email" class="form-control" name="email" placeholder="Your Email">
                    </div>
                    <div class="col-lg-12 form-group">
                        <textarea class="form-control" rows="5" placeholder="Type your message"></textarea>
                    </div>
                    <div class="col-sm-12 pull-right">
                        <button class="btn btn-primary btn-outline" data-dismiss="modal" type="button">Add Comment</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Modal -->
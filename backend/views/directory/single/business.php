<?php
    /* @var $this yii\web\View */

    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/datatables.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/users.min.js');

    /* Required for Switches */
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/vendor/switchery/switchery.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/switchery.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/custom/testimonial.js');
    $this->title = Yii::$app->params['system_name'] . ' | Business';
?>
<div class="page animsition">
    <div class="page-header  padding-bottom-0">
        <h1 class="page-title"><?php echo $business['name']; ?></h1>

        <div class="page-header-actions">
            <button type="button" class="btn btn-sm btn-icon btn-primary btn-outline btn-round reload-page" data-toggle="tooltip" data-original-title="Refresh" data-placement="bottom">
                <i class="icon wb-refresh" aria-hidden="true"></i>
            </button>
            <!--           
            <button type="button" class="btn btn-sm btn-icon btn-primary btn-outline btn-round" data-toggle="tooltip" data-original-title="Save" data-placement="bottom">
                <i class="icon fa-save" aria-hidden="true"></i>
            </button>
            -->
        </div>
    </div>
    <div class="page-content  padding-30 container-fluid single-item-page">
        <div class="row">
            <div class="col-xlg-4 col-lg-4 col-md-12 col-sm-12">
                <div class="panel">
                    <div class="panel-body container-fluid">
                        <div class="form-group">
                            <div class="col-sm-12 col-lg-12">
                                <h5>Address</h5>

                                <p><?php echo $business['address']; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 col-lg-12">
                                <h5>City</h5>

                                <p><?php echo $business['city']; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 col-lg-12">
                                <h5>State</h5>

                                <p><?php echo $business['state']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="  col-xlg-4 col-lg-4 col-md-12 col-sm-12 ">
                <div class="panel">
                    <div class="panel-body container-fluid">
                        <div class="form-group">
                            <div class="col-sm-12 col-lg-12">
                                <h5> Assign User</h5>
                                <select class="form-control" name="directory[user_id]">
                                    <option value="">Select User</option>
                                </select>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <div class="col-sm-12 col-lg-12">
                                <h5> Username</h5>
                                <input name="directory[name]" type="text" class="form-control " placeholder="Business Name" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 col-lg-12">
                                <h5> Password</h5>
                                <input name="directory[name]" type="text" class="form-control " placeholder="Business Name" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 col-lg-12">
                                <h5> Retype Password</h5>
                                <input name="directory[name]" type="text" class="form-control " placeholder="Business Name" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="  col-xlg-4 col-lg-4 col-md-12 col-sm-12 ">
                <div class="panel">
                    <div class="panel-body container-fluid">
                        <div class="form-group">
                            <div class="col-sm-12 col-lg-12">
                                <h5> Business Name</h5>
                                <input name="client" type="text" class="form-control " id="inputPlaceholder" placeholder="Enter Authors's Name" value="<?php echo isset($testimonial['client']) ? $testimonial['client'] : ''; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 col-lg-12">
                                <h5>Address</h5>
                                <input name="position" type="text" class="form-control " id="inputPlaceholder" placeholder="Enter Authors's Position" value="<?php echo isset($testimonial['position']) ? $testimonial['position'] : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="  col-xlg-4 col-lg-4 col-md-12 col-sm-12 ">
                <div class="panel">
                    <div class="panel-body container-fluid">
                        <div class="form-group">
                            <div class="col-sm-12 col-lg-12">
                                <h5>Geo-Location</h5>
                                <span class="geolocation-error"></span>

                                <div class="form-group">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <h5> Longitude </h5>
                                        <input name="directory[longitude]" id="map-longitude" type="text" class="form-control " id="inputPlaceholder" placeholder="Enter Authors's Name" value="">
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <h5> Latitude</h5>
                                        <input name="directory[latitude]" id="map-latitude" type="text" class="form-control " id="inputPlaceholder" placeholder="Enter Authors's Name" value="">
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <h5>&nbsp;</h5>
                                        <a onclick="getLocation();" class="btn btn-danger" href="javascript:void(0);"><i class="icon fa-location-arrow" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Company Description</h3>
            </div>
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <textarea class="ckeditor" name="quote"><?php echo isset($testimonial['quote']) ? $testimonial['quote'] : ''; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-xlg-12 col-lg-12 col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Business List</h3>
                    </div>
                    <div class="panel-body container-fluid">
                        <pre>
                            <?php print_r($business); ?>

                        </pre>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
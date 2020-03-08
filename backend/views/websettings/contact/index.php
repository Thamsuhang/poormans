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
        <h1 class="page-title">Contact Configuration</h1>
    </div>
    <div class="page-content container-fluid">
        <!-- Panel Tabs -->

        <div class="panel">
            <div class="panel-body container-fluid padding-0">
                <div class="row row-lg">
                    <div class="col-lg-12">
                        <div class="nav-tabs-horizontal page-tabs">
                            <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
                                <li class="active" role="presentation">
                                    <a data-toggle="tab" href="#location" aria-controls="location"
                                       role="tab">Contact Info</a></li>
                            </ul>
                            <div class="tab-content padding-20">
                                <div class="tab-pane active" id="location" role="tabpanel">
                                    <div class="settings-form">
                                        <form autocomplete="off" method="post" action="<?php echo Yii::$app->request->baseUrl ?>/websettings/editcontact/">
                                            <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
                                            <input type="hidden" name="contact[id]" value="<?php echo $datacenter['contact']['id']; ?>">
                                            <input type="hidden" name="contact[page-id]" value="<?php echo $page_id; ?>">

                                            <h4 class="form-title">General</h4>

                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label">Title</label>
                                                    <input type="text" class="form-control" name="contact[title]" placeholder="Title" autocomplete="off" value="<?php echo $datacenter['contact']['title']; ?>">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label">Subtitle</label>
                                                    <input type="text" class="form-control" name="contact[subtitle]" placeholder="Subtitle" autocomplete="off" value="<?php echo $datacenter['contact']['subtitle']; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label">Description</label>
                                                    <textarea class="ckeditor form-control" name="contact[description]"><?php echo $datacenter['contact']['description']; ?></textarea>
                                                </div>
                                            </div>
                                            <h4 class="form-title">Location</h4>

                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label">Address</label>
                                                    <input type="text" class="form-control" name="contact[address]" placeholder="Address" autocomplete="off" value="<?php echo $datacenter['contact']['address']; ?>">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">City</label>
                                                    <input type="text" class="form-control" name="contact[city]" placeholder="City" autocomplete="off" value="<?php echo $datacenter['contact']['city']; ?>">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">State</label>
                                                    <input type="text" class="form-control" name="contact[state]" placeholder="State" autocomplete="off" value="<?php echo $datacenter['contact']['state']; ?>">
                                                </div>
                                            </div>
                                            <h4 class="form-title">Contact</h4>

                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">Phone</label>
                                                    <input type="text" class="form-control" name="contact[phone]" placeholder="Phone" autocomplete="off" value="<?php echo $datacenter['contact']['phone']; ?>">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">Fax</label>
                                                    <input type="text" class="form-control" name="contact[fax]" placeholder="Fax" autocomplete="off" value="<?php echo $datacenter['contact']['fax']; ?>">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" class="form-control" name="contact[email]" placeholder="Email" autocomplete="off" value="<?php echo $datacenter['contact']['email']; ?>">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">Zip Code</label>
                                                    <input type="text" class="form-control" name="contact[url]" placeholder="URL" autocomplete="off" value="<?php echo $datacenter['contact']['url']; ?>">
                                                </div>

                                            </div>
                                            <h4 class="form-title">Map</h4>

                                            <div class="row">
                                                <div id="geolocation"></div>
                                                <div class="form-group col-sm-4">
                                                    <label class="control-label">Latitude</label>
                                                    <input id="map-latitude" type="text" class="form-control" name="contact[latitude]" placeholder="Latitude" autocomplete="off" value="<?php echo $datacenter['contact']['latitude']; ?>">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="control-label" ">Longitude</label>
                                                    <input id="map-longitude" type="text" class="form-control" name="contact[longitude]" placeholder="Longitude" autocomplete="off" value="<?php echo $datacenter['contact']['longitude']; ?>">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="control-label">&nbsp;</label>
                                                    <a class="btn btn-primary block " href="javascript:void(0)" onclick="getLocation()">Get Coordinates</a>
                                                </div>
                                                <?php if (isset($datacenter['contact']['latitude']) && $datacenter['contact']['latitude'] != '' && isset($datacenter['contact']['longitude']) && $datacenter['contact']['longitude'] != '') { ?>
                                                    <div class="form-group col-sm-12">
                                                        <div class="height-300" id="map"></div>
                                                    </div>
                                                <?php } ?>
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
<?php if (isset($datacenter['contact']['latitude']) && $datacenter['contact']['latitude'] != '' && isset($datacenter['contact']['longitude']) && $datacenter['contact']['longitude'] != '') { ?>
    <script>

        var marker;
        var latitude = <?php echo $datacenter['contact']['latitude']; ?>;
        var longitude = <?php echo $datacenter['contact']['longitude']; ?>;
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: {lat: latitude, lng: longitude}
            });

            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: {lat: latitude, lng: longitude}
            });
            marker.addListener('click', toggleBounce);
        }

        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4x2SbqhVqS2mM74yaIdAFpi2eKUBaAm0&callback=initMap" type="text/javascript"></script>
<?php } ?>


<?php
    //$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/users.min.js');
?>

<!-- start slider Section -->

<!-- End slider Section -->
<!-- start contact us Section -->
<?php if (isset($datacenter['contact']['latitude']) && $datacenter['contact']['latitude'] != '') : ?>
    <section id="ltd_map_sec">
        <div class="map">
            <div class="map_area">
                <div id="map" style="width: 100%; height: 300px;" data-latitude="<?php echo $datacenter['contact']['latitude']; ?>" data-longitude="<?php echo $datacenter['contact']['longitude']; ?>"></div>
            </div>
        </div>
    </section>
<?php endif; ?>

<section id="ctn_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="title_sec">
                    <h1><?php echo $datacenter['contact']['title']; ?></h1>

                    <h2><?php echo $datacenter['contact']['description']; ?> </h2>
                    <span id="contact-error" class="error"></span>
                </div>
            </div>
            <div class="col-sm-6" data-plugin="matchHeight">
                <div id="cnt_form">
                    <form id="contact-form" class="contact" name="contact-form">
                        <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>

                        <div class="form-group">
                            <input type="text" name="name" class="form-control name-field" required="required" placeholder="Your Name">

                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control mail-field" required="required" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-primary send-message" class="btn btn-primary">Send</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6"  data-plugin="matchHeight">
                <div class="cnt_info">
                    <ul>
                            <li><i class="fa fa-map-marker"></i>
                                <p> <?php echo $datacenter['contact']['city']; ?> , <?php echo $datacenter['contact']['state']; ?>, <?php echo $datacenter['contact']['url']; ?>.

                                </p>
                            </li>

                        <?php if (isset($datacenter['contact']['email']) && $datacenter['contact']['email'] != '') : ?>
                            <li><i class="fa fa-envelope"></i>

                                <p><?php echo $datacenter['contact']['email']; ?></p>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($datacenter['contact']['phone']) && $datacenter['contact']['phone'] != '') : ?>
                            <li><i class="fa fa-phone"></i>

                                <p><?php echo $datacenter['contact']['phone']; ?></p>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($datacenter['contact']['fax']) && $datacenter['contact']['fax'] != '') : ?>
                            <li><i class="fa fa-fax"></i>

                                <p><?php echo $datacenter['contact']['fax']; ?></p>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!-- End contact us  Section -->


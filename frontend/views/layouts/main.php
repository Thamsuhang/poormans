<?php

use backend\assets\AppAsset;
use common\components\HelperContact as HContact;
use common\components\HelperWebsettings as HWebsettings;
use yii\helpers\Html;

AppAsset::register($this);
$social = HWebsettings::getSocial();
$datacenter['contact'] = HContact::getContact();
$this->beginPage();

?>
   <!doctype html>
   <html class = "no-js" lang = "">
   <head>

       <?php $this->head(); ?>
       <?= Html::csrfMetaTags() ?>
      <meta charset = "utf-8">
      <meta http-equiv = "x-ua-compatible" content = "ie=edge">
      <title><?php echo Yii::$app->params['system_name']; ?></title>
      <meta name = "description" content = "">
      <meta name = "viewport" content = "width=devicedevice-width, initial-scale=1">
      <link rel = "apple-touch-icon" href = "apple-touch-icon.png">
      <link href = "https://fonts.googleapis.com/css?family=Poppins:400,600" rel = "stylesheet">
       <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
      <!--        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">-->
   


      <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/font-awesome.min.css">

      <link rel = "icon" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/fav.ico" type = "image/x-icon"/>
      <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/normalize.css">
      <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/main.css">
      <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/bootstrap.min.css">
      <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/animate.css">


     <!--  <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/owl.carousel.css"> -->
      <!-- select2 -->
      <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/select2/select2.min.css">
     

      <!-- datepicker -->
      <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/datepicker/datepicker.css">
      <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/ckeditor/ckeditor.js"></script>
      <!-- gallery -->
      <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/vendor/gallery/css/jquery.lightbox-0.5.css">
      <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/vendor/gallery/css/jquery.lightbox-0.5.css">
      <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/vendor/sweetalert2/sweetalert2.min.css">

      <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/responsive.css">
      <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/style.css">
      <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/css/general.css">
      <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/css/margins-paddings.css">
      <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/overides.css">
   </head>
   <body>
   <?php $this->beginBody(); ?>
   <script>
      var $baseUrl = '<?php echo Yii::$app->request->baseUrl; ?>';
      var sign_alert = <?php echo (Yii::$app->session->hasFlash('alert')) ? Yii::$app->session->getFlash('alert') : 'false' ?>;

   </script>

<!--   <script type="text/javascript" src="--><?php //echo Yii::$app->request->baseUrl; ?><!--/assets/js/jquery-3.4.0.min.js"></script>-->
   <script src = "https://code.jquery.com/jquery-3.2.1.min.js" integrity = "sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin = "anonymous"></script>
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/bootstrap.min.js"></script>
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/vendor/gallery/js/jquery.lightbox-0.5.min.js"></script>
   <!-- start preloader -->
   <div id = "loader-wrapper" style = "display: none;">
      <div class = "logo"></div>
      <div id = "loader"></div>
   </div>
   <!-- end preloader --><!--[if lt IE 8]>
   <p class = "browserupgrade">You are using an <strong>outdated</strong> browser. Please
      <a href = "http://browsehappy.com/">upgrade your browser</a>
      to improve your experience.
   </p><![endif]-->
   <header class = "main_menu_sec navbar navbar-default navbar-fixed-top">
      <nav class = "navbar navbar-default">
         <div class = "container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class = "navbar-header animated fadeInLeftBig">

               <a href = "<?php echo Yii::$app->request->baseUrl; ?>">
                  <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/logo.png" alt = "Poorman's Online Directory" class = "navbar-brand"/>
               </a>

               <button type = "button" class = "navbar-toggle collapsed" data-toggle = "collapse" data-target = "#bs-example-navbar-collapse-1" aria-expanded = "false">
                  <span class = "sr-only">Toggle navigation</span> <span class = "icon-bar"></span> <span class = "icon-bar"></span> <span class = "icon-bar"></span>
               </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class = "collapse navbar-collapse" id = "bs-example-navbar-collapse-1">

               <ul class = "nav navbar-nav navbar-right ">
                  <li class = "<?php echo (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id = 'index') ? 'active' : '' ?>">
                     <a href = "<?php echo Yii::$app->request->baseUrl; ?>/">Home</a>
                  </li>
                  <li class = "<?php echo (Yii::$app->controller->id == 'about' && Yii::$app->controller->action->id = 'index') ? 'active' : '' ?>">
                     <a class = "page-scroll" href = "<?php echo Yii::$app->request->baseUrl; ?>/about">About</a>
                  </li>
                  <li class = "<?php echo (Yii::$app->controller->id == 'pricing' && Yii::$app->controller->action->id = 'index') ? 'active' : '' ?>">
                     <a class = "" href = "<?php echo Yii::$app->request->baseUrl; ?>/pricing">Advertise</a>
                  </li>
                  <li class = "<?php echo (Yii::$app->controller->id == 'directory' && Yii::$app->controller->action->id = 'index') ? 'active' : '' ?>">
                     <a class = "" href = "<?php echo Yii::$app->request->baseUrl; ?>/directory">Directory</a>
                  </li>
                  <li class = "<?php echo (isset($url_array) && (in_array('cards', $url_array))) ? 'active' : '' ?>">
                     <a class = "page-scroll" href = "<?php echo Yii::$app->request->baseUrl; ?>/cards">Business Card Directory</a>
                  </li>
                  <li class = "<?php echo (isset($url_array) && (in_array('contact', $url_array))) ? 'active' : '' ?>">
                     <a class = "page-scroll" href = "<?php echo Yii::$app->request->baseUrl; ?>/contact">Contact Us</a>
                  </li>

               </ul>

            </div><!-- /.navbar-collapse -->
         </div><!-- /.container-fluid -->
      </nav>
   </header>

   <?php if (Yii::$app->controller->id != 'site'): ?>
      <div class = "fake-height"></div>
   <?php endif; ?>
   <?php if (Yii::$app->controller->id != 'site' && Yii::$app->controller->id != 'contact' && Yii::$app->controller->id != 'pricing' && Yii::$app->controller->id != 'about') {
       echo $this->render('../_snippets/search');
   } ?>
   <div class = "page-content-wrapper">
       <?php echo $content; ?>
   </div>
   <footer id = "ft_sec">
      <div class = "container">
         <div class = "row">
            <div class = "col-lg-12">

                <?php if (Yii::$app->params['boolean']['social'] == true) : ?>
                   <div class = "ft">
                       <?php if (isset($social) && !empty($social)) : ?>
                          <ul class = "social-icons">
                              <?php foreach ($social as $item) : ?>
                                 <li>
                                    <a href = "<?php echo $item['url']; ?>">
                                       <i class = "fa <?php echo $item['icon']; ?>"></i>
                                    </a>
                                 </li>
                              <?php endforeach; ?>
                          </ul>
                       <?php endif; ?>
                   </div>
                <?php endif; ?>
               <ul class = "copy_right">
                  <li>&copy; Poorman's Online Directory.</li>
                  <li>All Rights Reserved.</li>
               </ul>
            </div>
         </div>
      </div>
   </footer>
  
   <script>
      $.ajaxSetup({
         data: {
            _csrf: $('meta[name=csrf-token]').prop('content')
         }
      });
   </script>

   
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>     
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/isotope.pkgd.min.js"></script>
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/appear.js"></script>
   <!--    <script src = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/assets/js/jquery.counterup.min.js"></script>-->
<!--   <script src = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/assets/js/waypoints.min.js"></script>-->
   
   <!--    <script src = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/assets/js/showHide.js"></script>-->
   <!--    <script src = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/assets/js/jquery.nicescroll.min.js"></script>-->
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/jquery.easing.min.js"></script>
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/scrolling-nav.js"></script>
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/plugins.js"></script>
<!--   <script src = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/assets/js/main.js"></script>-->
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/slider-menu.jquery.js"></script>

   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/showHide.js" type = "text/javascript"></script>
   <!-- Select 2 -->
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/select2/js/select2.full.min.js"></script>

   <!-- datepicker -->
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/datepicker/datepicker.js"></script>

   <!-- Match Height -->
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/vendor/jquery-match-height/jquery.matchHeight-min.js" type = "text/javascript"></script>

   <!-- Sweet Alert 2 -->
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/vendor/sweetalert2/sweetalert2.min.js" type = "text/javascript"></script>

   <!-- File Upload custom button JS -->
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/upload-button.js" type = "text/javascript"></script>

   <script src = "https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
   <!-- Jquery Validation -->
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/vendor/validate/jquery.validate.min.js" type = "text/javascript"></script>
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/form-validation-rules.js" type = "text/javascript"></script>


   <!-- Google Maps -->
   <!--
<script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyD0SDQGUt4upI4c1vgvBObuThybfH7ws8I&callback=initMap" async defer></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/map-component.js" type = "text/javascript"></script>
-->
   <?php $this->endBody(); ?>
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/custom.js" type = "text/javascript"></script>

   <script type = "text/javascript">
      $(document).ready(function () {
         $('.show_hide').showHide({
            speed: 1000, // speed you want the toggle to happen
            easing: '', // the animation effect you want. Remove this line if you dont want an effect and if you haven't included jQuery UI
            changeText: 1, // if you dont want the button text to change, set this to 0
            showText: 'View', // the button text to show when a div is closed
            hideText: 'Close' // the button text to show when a div is open

         });


      });


   </script>
   </body>
   </html>
<?php $this->endPage(); ?>
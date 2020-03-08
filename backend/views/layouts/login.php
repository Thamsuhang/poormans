<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Poormans Online Directory | Admin Pannel">
  <meta name="author" content="">

  <title>Login | <?php echo strtoupper(Yii::$app->params['system_name']); ?> </title>

  <link rel="apple-touch-icon" href="<?php echo Yii::$app->request->baseUrl?>/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl?>/assets/images/fav.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl?>/global/css/bootstrap.min081a.css?v2.0.0">
  <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl?>/global/css/bootstrap-extend.min081a.css?v2.0.0">
  <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl?>/assets/css/site.min081a.css?v2.0.0">

  <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl?>/assets/css/login-v2.min081a.css?v2.0.0">

  <!-- Fonts -->
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
  <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl?>/assets/fonts/web-icons/web-icons.min081a.css?v2.0.0">
  <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl?>/assets/fonts/glyphicons/glyphicons.min081a.css">
  <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl?>/assets/fonts/font-awesome/font-awesome.min081a.css"  type="text/css"/>
  <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl?>/assets/fonts/themify/themify.min081a.css" rel="stylesheet" type="text/css"/>

  <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl?>/assets/css/override.css">


  <!--[if lt IE 9]>
    <script src="type="text/javascript" src="<?php echo Yii::$app->request->baseUrl?>/global/vendor//html5shiv/html5shiv.min.js"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl?>/global/vendor/media-match/media.match.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl?>/global/vendor/respond/respond.min.js"></script>
    <![endif]-->

  <!-- Scripts -->
  <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl?>/global/vendor/modernizr/modernizr.min.js"></script>
  <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl?>/global/vendor/breakpoints/breakpoints.min.js"></script>
  <script>
    Breakpoints();
  </script>
</head>
<body class="page-login-v2 layout-full page-dark">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

  <div class="page animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content">
      <div class="page-brand-info">
        <div class="brand">
          <h2 class="brand-text font-size-40 margin-left-10"><?php echo Yii::$app->params['system_name']; ?></h2>
        </div>
        <p class="font-size-20 margin-left-10">Website - Admin Panel</p>
      </div>

      <div class="page-login-main">
        
        <?= $content ?>

        <footer class="page-copyright" style="width: 300px;">
          <p><?php echo strtoupper(Yii::$app->params['system_name']); ?>.</p>
          <p>&copy; <?php echo date('Y'); ?>. All RIGHT RESERVED.</p>

          <div class="clearfix"></div>
        </footer>
      </div>

    </div>
  </div>
  
  <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl?>/assets/js/jquery-2.1.0.js"></script>
  <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl?>/global/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
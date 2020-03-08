<?php
    /* @var $this \yii\web\View */
    /* @var $content string */

    use backend\assets\AppAsset;
    use yii\helpers\Html;

    AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang = "<?= Yii::$app->language ?>">
<head>
    <meta charset = "<?= Yii::$app->charset ?>">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?= Html::csrfMetaTags() ?>

    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link rel = "shortcut icon" href = "<?php echo Yii::$app->request->baseUrl ?>/assets/images/fav.ico">
    <!-- Stylesheets -->
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/css/bootstrap.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/css/bootstrap-extend.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/site.min081a.css?v2.0.0">

    <!-- Jquery UI -->
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/menu-master/theme/ui.all.css">

    <!-- Plugins -->
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/animsition/animsition.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/asscrollable/asScrollable.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/switchery/switchery.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/intro-js/introjs.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/slidepanel/slidePanel.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/jquery-mmenu/jquery-mmenu.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/flag-icon-css/flag-icon.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/summernote/summernote.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/slick-carousel/slick.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/tagsinput/bootstrap-tagsinput.css">
    <!-- DataTables -->
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/datatables-bootstrap/dataTables.bootstrap.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/datatables-fixedheader/dataTables.fixedHeader.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/datatables-responsive/dataTables.responsive.min081a.css?v2.0.0">

    <!-- Sliding Menu -->
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/menu-master/fg.menu.css">

    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/owl-carousel/owl.carousel.min081a.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/bootstrap-select/bootstrap-select.min081a.css?v2.0.0" rel = "stylesheet" type = "text/css"/>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo Yii::$app->request->baseUrl ?>/global/vendor/bootstrap-datepicker/bootstrap-datepicker.min081a.css">
    <!-- Page -->
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/examples/css/pages/profile.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/examples/css/dashboard/v1.min081a.css?v2.0.0">
    <!-- Fonts -->

    <link rel = 'stylesheet' href = 'http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/fonts/web-icons/web-icons.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/fonts/brand-icons/brand-icons.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/fonts/weather-icons/weather-icons.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/fonts/font-awesome/font-awesome.min081a.css" type = "text/css"/>
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/fonts/glyphicons/glyphicons.min081a.css" type = "text/css"/>
    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/global/fonts/themify/themify.min081a.css" rel = "stylesheet" type = "text/css"/>
    <!-- Nestables  -->
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/nestable/nestable.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/html5sortable/sortable.min081a.css?v2.0.0">
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/tasklist/tasklist.min081a.css?v2.0.0">

    <!-- Select 2 -->
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/select2/select2.min081a.css?v2.0.0">
    <!-- KS Icons -->
    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/sweetalert/sweet-alert.css" rel = "stylesheet" type = "text/css"/>
    <link rel = "stylesheet" href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/x-editable/css/bootstrap-editable.css">
    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/aside-modal.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/overides.css" rel = "stylesheet" type = "text/css"/>
    <!--[if lt IE 9]>
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/html5shiv/html5shiv.min.js"></script><![endif]--><!--[if lt IE 10]>
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/media-match/media.match.min.js"></script>
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/respond/respond.min.js"></script><![endif]-->
    <!-- Scripts -->
    <!--    <script src="--><?php //echo Yii::$app->request->baseUrl; ?><!--/global/vendor/modernizr/modernizr.min.js"></script>-->
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/breakpoints/breakpoints.min.js"></script>
    <script>
        Breakpoints();
    </script>

<!--   <script src = "https://code.jquery.com/jquery-3.2.1.min.js" integrity = "sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin = "anonymous"></script>-->
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/jquery/jquery.min.js"></script>
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/bootstrap/bootstrap.min.js"></script>
   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/tagsinput/bootstrap-tagsinput.min.js"></script>
    <script>
        var baseUrl = "<?php echo Yii::$app->request->baseUrl; ?>";
        var upload_load_path = "<?php echo Yii::$app->params['upload_load_path']['image'];?>";
    </script>
</head>
<body class = "site-navbar-small">
<?php $this->beginBody() ?>
<!--[if lt IE 8]><p class = "browserupgrade">You are using an <strong>outdated</strong> browser. Please
    <a href = "http://browsehappy.com/">upgrade your browser</a>
    to improve your experience.</p><![endif]-->
<?php $color_array = array('blue', 'brown', 'orange', 'yellow', 'red', 'pink', 'purple', 'teal', 'green', ''); ?>
<?php if (Yii::$app->session[Yii::$app->params['user_session']]->role == Yii::$app->params['user_role']['superadmin'] || Yii::$app->session[Yii::$app->params['user_session']]->role == Yii::$app->params['user_role']['admin']) {
    $user_type = 'admin';
}
else if (Yii::$app->session[Yii::$app->params['user_session']]->role == Yii::$app->params['user_role']['operator']) {
    $user_type = 'operator';
}
else {
    $user_type = 'operator';
}
?>
<nav class = "site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role = "navigation">
    <div class = "navbar-header">

        <button type = "button" class = "navbar-toggle collapsed" data-target = "#site-navbar-collapse" data-toggle = "collapse">
            <i class = "icon fa-bars" aria-hidden = "true"></i>
        </button>

        <div class = "navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle = "gridmenu" style = "padding: 16px 16px 12px 6px;">
            <a href = "<?php echo Yii::$app->request->baseUrl; ?>">
                <img class = "navbar-brand-logo" src = "<?php echo Yii::$app->request->baseUrl ?>/assets/images/small_icon.png">
            </a>
        </div>

    </div>
    <div class = "navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class = "collapse navbar-collapse navbar-collapse-toolbar" id = "site-navbar-collapse">

            <!-- Navbar Toolbar Right -->
            <ul class = "nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class = "dropdown">

                    <a class = "pull-right" style = "width:130px;" href = "<?php echo Yii::$app->request->baseUrl; ?>/site/logout" role = "menuitem">
                        <div class = "media">
                            <div class = "media-left padding-right-10">
                                <i class = "icon wb-power bg-red-600 white icon-circle" aria-hidden = "true"></i>
                            </div>
                            <div class = "media-body">
                                <h6 class = "media-heading" style = "line-height: 28px; margin: 0;">Log Out</h6>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
        <!-- Site Navbar Seach -->
        <div class = "collapse navbar-search-overlap" id = "site-navbar-search">
            <form role = "search">
                <div class = "form-group">
                    <div class = "input-search">
                        <i class = "input-search-icon wb-search" aria-hidden = "true"></i> <input type = "text" class = "form-control" name = "site-search" placeholder = "Search...">
                        <button type = "button" class = "input-search-close icon wb-close" data-target = "#site-navbar-search" data-toggle = "collapse" aria-label = "Close"></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Site Navbar Seach -->
    </div>
</nav>

<?php if (Yii::$app->session[Yii::$app->params['user_session']]->role == Yii::$app->params['user_role']['superadmin'] || Yii::$app->session[Yii::$app->params['user_session']]->role == Yii::$app->params['user_role']['admin']) : ?>
    <div class = "site-menubar">
        <ul class = "site-menu">
            <li class = "site-menu-item">
                <a class = "animsition-link" href = "<?php echo Yii::$app->request->baseUrl; ?>">
                    <i class = "site-menu-icon  fa-home" aria-hidden = "true"></i> <span class = "site-menu-title">Dashboard</span></a>
            </li>

            <li class = "site-menu-item">
                <a class = "animsition-link" href = "javascript:void(0);">
                    <i class = "site-menu-icon  fa-book" aria-hidden = "true"></i> <span class = "site-menu-title">Directory</span><span class = "site-menu-arrow"></span>
                </a>
                <ul class = "site-menu">
                    <li class = "site-menu-item">
                        <a class = "animsition-link" href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/categories">
                            <i class = "site-menu-icon  fa-columns" aria-hidden = "true"></i> <span class = "site-menu-title">Categories</span></a>
                    </li>
                    <li class = "site-menu-item border-top-dark">
                        <a class = "animsition-link" href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/list/basic">
                            <i class = "site-menu-icon  fa-list" aria-hidden = "true"></i> <span class = "site-menu-title">List Basic Businesses</span></a>
                    </li>
                    <li class = "site-menu-item  ">
                        <a class = "animsition-link" href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/add/basic">
                            <i class = "site-menu-icon  fa-plus" aria-hidden = "true"></i> <span class = "site-menu-title">Add Basic Business </span></a>
                    </li>
                    <li class = "site-menu-item border-top-dark">
                        <a class = "animsition-link" href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/list/premium">
                            <i class = "site-menu-icon  fa-list" aria-hidden = "true"></i> <span class = "site-menu-title">List Premium Businesses</span></a>
                    </li>
                    <li class = "site-menu-item ">
                        <a class = "animsition-link" href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/add/premium">
                            <i class = "site-menu-icon  fa-plus" aria-hidden = "true"></i> <span class = "site-menu-title">Add Premium Business </span></a>
                    </li>
                    <li class = "site-menu-item border-top-dark">
                        <a class = "animsition-link" href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/list/card">
                            <i class = "site-menu-icon  fa-list" aria-hidden = "true"></i> <span class = "site-menu-title">List Business Cards</span></a>
                    </li>
                    <li class = "site-menu-item ">
                        <a class = "animsition-link" href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/add/card">
                            <i class = "site-menu-icon  fa-plus" aria-hidden = "true"></i> <span class = "site-menu-title">Add Business Card</span></a>
                    </li>
                    <li class = "site-menu-item border-top-dark">
                        <a class = "animsition-link" href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/list/featured">
                            <i class = "site-menu-icon  fa-list" aria-hidden = "true"></i> <span class = "site-menu-title">List Featured Businesses</span></a>
                    </li>
                    <li class = "site-menu-item border-bottom-dark">
                        <a class = "animsition-link" href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/add/featured">
                            <i class = "site-menu-icon  fa-plus" aria-hidden = "true"></i> <span class = "site-menu-title">Add Featured Business</span></a>
                    </li>
                    <li class = "site-menu-item">
                        <a class = "animsition-link" href = "<?php echo Yii::$app->request->baseUrl; ?>/directory/sort/">
                            <i class = "site-menu-icon  fa-retweet" aria-hidden = "true"></i> <span class = "site-menu-title">Sort Featured Businesses</span></a>
                    </li>
                </ul>
            </li>
            <li class = "site-menu-item">
                <a class = "animsition-link" href = "javascript:void(0);">
                    <i class = "site-menu-icon  fa-file-powerpoint-o" aria-hidden = "true"></i> <span class = "site-menu-title">Pages</span><span class = "site-menu-arrow"></span>
                </a>
                <ul class = "site-menu">
                    <li class = "site-menu-item">
                        <a class = "animsition-link" href = "<?php echo Yii::$app->request->baseUrl; ?>/websettings/home/">
                            <i class = "site-menu-icon  fa-laptop" aria-hidden = "true"></i> <span class = "site-menu-title">Homepage</span></a>
                    </li>
                    <li class = "site-menu-item">
                        <a class = "animsition-link" href = "javascript:void(0);">
                            <i class = "site-menu-icon  fa-user" aria-hidden = "true"></i> <span class = "site-menu-title">About</span><span class = "site-menu-arrow"></span>
                        </a>
                        <ul class = "site-menu">
                            <li class = "site-menu-item">
                                <a class = "animsition-link" href = "<?php echo Yii::$app->request->baseUrl; ?>/websettings/about/">
                                    <i class = "site-menu-icon  fa-adn" aria-hidden = "true"></i> <span class = "site-menu-title">About Page</span></a>
                            </li>
                            <li class = "site-menu-item">
                                <a class = "animsition-link" href = "<?php echo Yii::$app->request->baseUrl; ?>/testimonials/">
                                    <i class = "site-menu-icon fa-comments-o" aria-hidden = "true"></i> <span class = "site-menu-title">Testimonials</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class = "site-menu-item">
                <a class = "animsition-link" href = "javascript:void(0);">
                    <i class = "site-menu-icon  fa-cog" aria-hidden = "true"></i> <span class = "site-menu-title">Settings</span><span class = "site-menu-arrow"></span>
                </a>
                <ul class = "site-menu">
                    <li class = "site-menu-item">
                        <a class = "animsition-link" href = "<?php echo Yii::$app->request->baseUrl; ?>/websettings/contact/">
                            <i class = "site-menu-icon  fa-map-marker" aria-hidden = "true"></i> <span class = "site-menu-title">Contact</span></a>
                    </li>
                    <li class = "site-menu-item">
                        <a class = "animsition-link" href = "<?php echo Yii::$app->request->baseUrl; ?>/websettings/social/">
                            <i class = "site-menu-icon fa-cog" aria-hidden = "true"></i> <span class = "site-menu-title">Social Media</span></a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
<?php endif; ?>

<!-- Page -->
<?= $content ?>
<!-- End Page -->
<!-- Footer -->
<footer class = "site-footer">
    <div class = "site-footer-legal">&copy; <?php echo date('Y'); ?>
        <a href = "<?php Yii::$app->request->baseUrl; ?>/../">Poorman's Online Directory</a>
    </div>
</footer>

<!-- CSRF TOKEN -->
<script>
    $.ajaxSetup({
        data: {
            _csrf: $('meta[name=csrf-token]').prop('content')
        }
    });

    var media = "<?php echo Yii::$app->request->baseUrl;?>/media";

    var url = document.URL;
    <?php $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $url = explode('?', $url);
        $url = explode('#', $url[0]);
        $uri = explode('/', $url[0]);
        $contr = ''; $action = '';
    ?>

    <?php if (isset($uri[4]) && $uri[4] != NULL) : ?>
    var contr = "<?php echo $uri[4];?>";
    <?php else : ?>
    var contr = '';
    <?php endif; ?>

    <?php if (isset($uri[5]) && $uri[5] != NULL) : ?>
    var action = "<?php echo $uri[5];?>";
    <?php else : ?>
    var action = '';
    <?php endif; ?>
</script>
<!-- Core  -->
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/animsition/animsition.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/asscroll/jquery-asScroll.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/mousewheel/jquery.mousewheel.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/asscrollable/jquery.asScrollable.all.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/ashoverscroll/jquery-asHoverScroll.min.js"></script>

<!-- Plugins -->
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/moment/moment.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/jquery-mmenu/jquery.mmenu.min.all.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/screenfull/screenfull.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/slidepanel/jquery-slidePanel.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/isotope/isotope.pkgd.min.js" type = "text/javascript"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/matchheight/jquery.matchHeight-min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/owl-carousel/owl.carousel.min.js" type = "text/javascript"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/slick-carousel/slick.min.js" type = "text/javascript"></script>
<!-- DataTables -->
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/datatables/jquery.dataTables.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/datatables-fixedheader/dataTables.fixedHeader.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/datatables-bootstrap/dataTables.bootstrap.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/datatables-tabletools/dataTables.tableTools.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/asrange/jquery-asRange.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/bootbox/bootbox.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/jquery-ui/jquery-ui.min.js" type = "text/javascript"></script>

<!-- Sortables and nestables  -->
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/html5sortable/html.sortable.min.js"></script>

<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/nestable/jquery.nestable.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/menu-master/fg.menu.js"></script>

<!-- Main Scripts -->
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/js/core.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/site.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/sections/menu.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/sections/menubar.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/sections/gridmenu.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/sections/sidebar.min.js"></script>
<!-- Misc Components -->
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/js/components/filterable.min.js" type = "text/javascript"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/js/components/asscrollable.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/js/components/animsition.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/js/components/slidepanel.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/js/components/matchheight.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/js/components/datatables.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/ckeditor/ckeditor.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/ckeditor/texteditor.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/ckeditor/adapters/jquery.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/bootstrap-select/bootstrap-select.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/js/components/bootstrap-select.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/switchery/switchery.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/js/components/switchery.min.js"></script>

<!-- Select 2 -->
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/select2/select2.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/js/components/select2.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/js/components/nestable.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/js/components/tasklist.min.js"></script>

<!-- Jquery Validation-->
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/jquery validation/jquery.validate.min.js" type = "text/javascript"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/global/vendor/jquery validation/additional-methods.min.js" type = "text/javascript"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/form-validation-rules.js" type = "text/javascript"></script>

<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/slider-menu.jquery.js"></script>
<!-- Common Components -->
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/common.js" type = "text/javascript"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/sweetalert/sweet-alert.min.js" type = "text/javascript"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/functions.js" type = "text/javascript"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/custom.js" type = "text/javascript"></script>

<?php $this->endBody(); ?>

</body>
</html>
<?php $this->endPage(); ?>

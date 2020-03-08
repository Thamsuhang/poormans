<?php
    use common\components\Misc;

    /* @var $this yii\web\View */

    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/plugins/responsive-tabs.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/plugins/closeable-tabs.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/tabs.min.js');

    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/datatables.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/users.min.js');

    /* Required for Switches */
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/vendor/switchery/switchery.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/switchery.min.js');
    if (Yii::$app->session[Yii::$app->params['user_session']]->role != Yii::$app->params['user_role']['admin']) {
        Misc::forceLogout();
    }

    /*
    $this->registerJsFile('http://maps.google.com/maps/api/js?key=AIzaSyC4x2SbqhVqS2mM74yaIdAFpi2eKUBaAm0&sensor=false');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/vendor/gmaps/gmaps.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/gmaps.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/examples/js/advanced/maps-google.min.js');
    */

    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/x-editable/js/bootstrap-editable.min.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/custom/settings.js');
    $this->title = Yii::$app->params['system_name'] . ' | Settings';

?>
<!-- Page -->


<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title">General Options</h1>
    </div>
    <div class="page-content container-fluid">
        <!-- Panel Tabs -->
        <div class="panel">
            <div class="panel-body container-fluid padding-0">
                <div class="row row-lg">
                    <div class="col-lg-12">
                        <div class="nav-tabs-horizontal">
                            <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
                                <li class="active" role="presentation">
                                    <a data-toggle="tab" href="#home" aria-controls="home"
                                       role="tab">Homepage</a></li>
                                <li class="active" role="presentation">
                                    <a data-toggle="tab" href="#about" aria-controls="about"
                                       role="tab">About</a></li>
                                <li role="presentation">
                                    <a data-toggle="tab" href="#contact" aria-controls="contact"
                                       role="tab">Contact</a></li>
                                <li role="presentation">
                                    <a data-toggle="tab" href="#social" aria-controls="social"
                                       role="tab">Social</a></li>
                                <li role="presentation">
                                    <a data-toggle="tab" href="#email" aria-controls="email"
                                       role="tab">Email</a></li>
                                <li role="presentation">
                                    <a data-toggle="tab" href="#miscellaneous" aria-controls="miscellaneous"
                                       role="tab">Miscellaneous</a></li>
                                <li class="dropdown" role="presentation">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <span class="caret" style="margin-right:8px;"></span>Menu </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="active" role="presentation">
                                            <a data-toggle="tab" href="#home" aria-controls="home"
                                               role="tab">Homepage</a></li>
                                        <li role="presentation">
                                            <a data-toggle="tab" href="#about" aria-controls="about"
                                               role="tab">About</a></li>
                                        <li role="presentation">
                                            <a data-toggle="tab" href="#contact" aria-controls="contact"
                                               role="tab">Contact</a></li>
                                        <li role="presentation">
                                            <a data-toggle="tab" href="#social" aria-controls="social"
                                               role="tab">Social</a></li>
                                        <li role="presentation">
                                            <a data-toggle="tab" href="#email" aria-controls="email"
                                               role="tab">Email</a></li>
                                        <li role="presentation">
                                            <a data-toggle="tab" href="#miscellaneous" aria-controls="miscellaneous"
                                               role="tab">Miscellaneous</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="tab-content padding-20">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="settings-form">
                                        <form autocomplete="off">
                                            <h4 class="form-title">Homepage Settings</h4>

                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label class="control-label" for="contact[street]">Street</label>
                                                    <input type="text" class="form-control" id="contact[street]" name="contact[street]" placeholder="Street" autocomplete="off">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="control-label" for="contact[city]">City</label>
                                                    <input type="text" class="form-control" id="contact[city]" name="contact[city]" placeholder="Last Name" autocomplete="off">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="control-label" for="contact[state]">State</label>
                                                    <input type="text" class="form-control" id="contact[state]" name="contact[state]" placeholder="Last Name" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label" for="contact[latitude]">Latitude</label>
                                                    <input type="text" class="form-control" id="contact[latitude]" name="contact[latitude]" placeholder="Latitude" autocomplete="off">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label" for="contact[longitude]">Longitude</label>
                                                    <input type="text" class="form-control" id="contact[longitude]" name="contact[longitude]" placeholder="Longitude" autocomplete="off">
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <div class="height-300" id="map"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label">Contact Article</label>
                                                    <textarea class="ckeditor form-control" name="contact[article]" id="about[article]" autocomplete="off"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-save"></i>Save Options
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="about" role="tabpanel">
                                    <!-- Sub Tabs -->
                                    <div class="sub-tabs">
                                        <div class="nav-tabs-horizontal">
                                            <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
                                                <li class="active" role="presentation">
                                                    <a data-toggle="tab" href="#about-tab" aria-controls="about-tab"
                                                       role="tab">About</a></li>
                                                <li role="presentation">
                                                    <a data-toggle="tab" href="#who-we-are" aria-controls="who-we-are"
                                                       role="tab">Who We Are ?</a></li>
                                                <li role="presentation">
                                                    <a data-toggle="tab" href="#what-we-do" aria-controls="what-we-do"
                                                       role="tab">What We Do ?</a></li>
                                                <li role="presentation">
                                                    <a data-toggle="tab" href="#about-icons" aria-controls="about-icons"
                                                       role="tab">Icons</a></li>
                                                <li class="dropdown" role="presentation">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                                        <span class="caret"></span>Menu </a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li class="active" role="presentation">
                                                            <a data-toggle="tab" href="#about-tab" aria-controls="about-tab"
                                                               role="tab">About</a></li>
                                                        <li role="presentation">
                                                            <a data-toggle="tab" href="#who-we-are" aria-controls="who-we-are"
                                                               role="tab">Who We Are ?</a></li>
                                                        <li role="presentation">
                                                            <a data-toggle="tab" href="#what-we-do" aria-controls="what-we-do"
                                                               role="tab">What We Do ?</a></li>
                                                        <li role="presentation">
                                                            <a data-toggle="tab" href="#about-icons" aria-controls="about-icons"
                                                               role="tab">Icons</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <div class="tab-content padding-top-20">
                                                <div class="tab-pane active" id="about-tab" role="tabpanel">
                                                    <div class="settings-form">
                                                        <form autocomplete="off">
                                                            <h4 class="form-title">About the Company</h4>

                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <label class="control-label" for="about[companyName]">Name</label>
                                                                    <input type="text" class="form-control" id="about[companyName]" name="about[companyName]" placeholder="Company Name" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <label class="control-label" for="about[companySubtitle]">Subtitle</label>
                                                                    <input type="text" class="form-control" id="about[companySubtitle]" name="about[companySubtitle]" placeholder="Company Subtitle" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <label class="control-label">Article</label>
                                                                    <textarea class="ckeditor form-control" name="about[companyArticle]" id="about[companyArticle]" placeholder="Company Article" autocomplete="off"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fa fa-save"></i>Save Options
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="who-we-are" role="tabpanel">
                                                    <div class="settings-form">
                                                        <form autocomplete="off">
                                                            <h4 class="form-title">Who We are ?</h4>

                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <label class="control-label">Article</label>
                                                                    <textarea class="ckeditor form-control" name="about[companyArticle]" id="about[companyArticle]" placeholder="Company Article" autocomplete="off"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fa fa-save"></i>Save Options
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="what-we-do" role="tabpanel">
                                                    <div class="settings-form">
                                                        <form autocomplete="off">
                                                            <h4 class="form-title">What We Do ?</h4>

                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <label class="control-label">Article</label>
                                                                    <textarea class="ckeditor form-control" name="about[companyArticle]" id="about[companyArticle]" placeholder="Company Article" autocomplete="off"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fa fa-save"></i>Save Options
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="about-icons" role="tabpanel">
                                                    <div class="row row-lg">
                                                        <div class="col-md-4">
                                                            <h4 class="form-title">Icon One</h4>

                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <label class="control-label" for="icon[about-icon]">Icon</label>
                                                                    <select data-plugin="selectpicker">
                                                                        <?php foreach (Yii::$app->params['fa-icons'] as $icon) : ?>
                                                                            <option value="<?php echo $icon; ?>" data-icon="<?php echo $icon; ?>"><?php echo $icon; ?></option>
                                                                        <?php endforeach;
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <label class="control-label" for="icon[title]">Title</label>
                                                                    <input type="text" class="form-control" id="icon[title]" name="icon[title]" placeholder="Icon Title" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <label class="control-label">Description</label>
                                                                    <textarea class="ckeditor form-control" name="about[companyArticle]" id="about[companyArticle]" placeholder="Company Article" autocomplete="off"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h4 class="form-title">Icon One</h4>

                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <label class="control-label" for="icon[about-icon]">Icon</label>
                                                                    <select data-plugin="selectpicker">
                                                                        <?php foreach (Yii::$app->params['fa-icons'] as $icon) : ?>
                                                                            <option value="<?php echo $icon; ?>" data-icon="<?php echo $icon; ?>"><?php echo $icon; ?></option>
                                                                        <?php endforeach;
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <label class="control-label" for="icon[title]">Title</label>
                                                                    <input type="text" class="form-control" id="icon[title]" name="icon[title]" placeholder="Icon Title" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <label class="control-label">Description</label>
                                                                    <textarea class="ckeditor form-control" name="about[companyArticle]" id="about[companyArticle]" placeholder="Company Article" autocomplete="off"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h4 class="form-title">Icon One</h4>

                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <label class="control-label" for="icon[about-icon]">Icon</label>
                                                                    <select data-plugin="selectpicker">
                                                                        <?php foreach (Yii::$app->params['fa-icons'] as $icon) : ?>
                                                                            <option value="<?php echo $icon; ?>" data-icon="<?php echo $icon; ?>"><?php echo $icon; ?></option>
                                                                        <?php endforeach;
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <label class="control-label" for="icon[title]">Title</label>
                                                                    <input type="text" class="form-control" id="icon[title]" name="icon[title]" placeholder="Icon Title" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <label class="control-label">Description</label>
                                                                    <textarea class="ckeditor form-control" name="about[companyArticle]" id="about[companyArticle]" placeholder="Company Article" autocomplete="off"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Example Tabs -->
                                </div>
                                <div class="tab-pane" id="contact" role="tabpanel">
                                    <div class="settings-form">
                                        <form autocomplete="off">
                                            <h4 class="form-title">Address</h4>

                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label class="control-label" for="contact[street]">Street</label>
                                                    <input type="text" class="form-control" id="contact[street]" name="contact[street]" placeholder="Street" autocomplete="off">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="control-label" for="contact[city]">City</label>
                                                    <input type="text" class="form-control" id="contact[city]" name="contact[city]" placeholder="Last Name" autocomplete="off">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="control-label" for="contact[state]">State</label>
                                                    <input type="text" class="form-control" id="contact[state]" name="contact[state]" placeholder="Last Name" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label">Contact Article</label>
                                                    <textarea class="ckeditor form-control" name="contact[article]" id="about[article]" autocomplete="off"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-save"></i>Save Options
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="social" role="tabpanel">
                                    <div class="settings-form">
                                        <form autocomplete="off">
                                            <div class="form-title">
                                                <h4 class="form-title pull-left">Social Media</h4>

                                                <div class="actions pull-right">
                                                    <a class="btn btn-primary btn-sm btn-round"><i class="fa fa-plus"></i> Add More</a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label class="control-label" for="contact[icon]">Icon</label>
                                                    <select data-plugin="selectpicker" name="contact[icon]">
                                                        <?php foreach (Yii::$app->params['fa-icons'] as $icon) : ?>
                                                            <option value="<?php echo $icon; ?>" data-icon="<?php echo $icon; ?>"><?php echo $icon; ?></option>
                                                        <?php endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="control-label" for="social[url]">URL</label>
                                                    <input type="text" class="form-control" id="social[url]" name="social[url]" placeholder="Last Name" autocomplete="off">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <a class="btn "><i class="fa fa-times"></i> Delete</a>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-save"></i>Save Options
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="email" role="tabpanel">
                                    <div class="settings-form">
                                        <form autocomplete="off">
                                            <h4 class="form-title">E-Mail - SMTP Settings</h4>

                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label" for="smtp[from]">Email</label>
                                                    <input type="text" class="form-control" id="smtp[from]" name="smtp[from]" placeholder="Email" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label" for="smtp[host]">Host</label>
                                                    <input type="text" class="form-control" id="smtp[host]" name="smtp[host]" placeholder="Host" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label" for="smtp[username]">Username</label>
                                                    <input type="text" class="form-control" id="smtp[username]" name="smtp[username]" placeholder="Username" autocomplete="off">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label" for="smtp[password]">Password</label>
                                                    <input type="password" class="form-control" id="smtp[password]" name="smtp[password]" placeholder="Password" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-save"></i>Save Options
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="miscellaneous" role="tabpanel">
                                    <h5 class="">About Poormans</h5>

                                    <form autocomplete="off">
                                        <div class="form-group form-material floating">
                                            <input type="text" class="form-control empty" name="inputFloatingText">
                                            <label class="floating-label">Subtitle</label>
                                        </div>
                                        <div class="form-group form-material floating">
                                            <input type="email" class="form-control empty" name="inputFloatingEmail">
                                            <label class="floating-label">Email</label>
                                        </div>
                                        <div class="form-group form-material floating">
                                            <input type="password" class="form-control empty" name="inputFloatingPassword">
                                            <label class="floating-label">Password</label>
                                        </div>
                                        <div class="form-group form-material floating form-material-file">
                                            <input type="text" class="form-control empty" readonly="">
                                            <input type="file" name="inputFloatingFile" multiple="">
                                            <label class="floating-label">Browse..</label>
                                        </div>
                                        <div class="form-group form-material floating">
                                            <textarea class="form-control empty" rows="3" name="textareaFloating"></textarea>
                                            <label class="floating-label">Textarea</label>
                                        </div>
                                        <div class="form-group form-material floating">
                                            <select class="form-control empty">
                                                <option>&nbsp;</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select> <label class="floating-label">Select</label>
                                        </div>
                                        <div class="form-group form-material floating">
                                            <label class="floating-label floating-label-static">Multi Select</label>
                                            <select class="form-control empty" multiple="">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group form-material floating">
                                            <input type="text" class="form-control empty" disabled="">
                                            <label class="floating-label">Input Disabled</label>
                                        </div>
                                        <div class="form-group form-material floating">
                                            <input type="text" class="form-control focus empty">
                                            <label class="floating-label">Input Focus</label>
                                        </div>
                                        <div class="form-group form-material floating has-warning">
                                            <input type="text" class="form-control empty">
                                            <label class="floating-label">Input Warning</label>
                                        </div>
                                        <div class="form-group form-material floating has-error">
                                            <input type="text" class="form-control empty">
                                            <label class="floating-label">Input Error</label>
                                        </div>
                                        <div class="form-group form-material floating has-success">
                                            <input type="text" class="form-control empty">
                                            <label class="floating-label">Input Success</label>
                                        </div>
                                        <div class="form-group form-material floating has-info">
                                            <input type="text" class="form-control empty">
                                            <label class="floating-label">Input Info</label>
                                        </div>
                                        <div class="form-group form-material floating">
                                            <input type="text" class="form-control input-sm empty" name="inputFloatingSmall">
                                            <label class="floating-label">Small Input</label>
                                        </div>
                                        <div class="form-group form-material floating">
                                            <input type="text" class="form-control empty" name="inputFloatingSmall">
                                            <label class="floating-label">Default Input</label>
                                        </div>
                                        <div class="form-group form-material floating">
                                            <input type="text" class="form-control input-lg empty" name="inputFloatingLarge">
                                            <label class="floating-label">Large Input</label>
                                        </div>
                                        <div class="form-group form-material floating">
                                            <input type="text" class="form-control empty" name="inputFloatingHint" data-hint="Write here something cool">

                                            <div class="hint">Write here something cool</div>
                                            <label class="floating-label">Input Hint</label>
                                        </div>
                                        <div class="form-group form-material floating">
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>

                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control empty">
                                                    <label class="floating-label">Input addons</label>
                                                </div>
                    <span class="input-group-btn">
                      <button class="btn btn-info waves-effect waves-light" type="button">Button</button>
                    </span>
                                            </div>
                                        </div>
                                        <div class="form-group form-material floating row">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control empty" name="inputFloatingGrid1">
                                                <label class="floating-label">Input Grid</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control empty" name="inputFloatingGrid2">
                                                <label class="floating-label">Input Grid</label>
                                            </div>
                                        </div>
                                    </form>
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
<script>
    // The following example creates a marker in Stockholm, Sweden using a DROP
    // animation. Clicking on the marker will toggle the animation between a BOUNCE
    // animation and no animation.

    var marker;

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: {lat: 27.718459, lng: 85.317446}
        });

        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: {lat: 27.718459, lng: 85.317446}
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
<?php $this->registerJsFile('https://maps.googleapis.com/maps/api/js?key=AIzaSyC4x2SbqhVqS2mM74yaIdAFpi2eKUBaAm0&callback=initMap'); ?>


<?php

use common\components\HelperDirectoryCategories as HCategories;
use common\components\Misc;


/* @var $this yii\web\View */
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/directory.js');

/* Required for Token field */
$this->registerCssFile(Yii::$app->request->baseUrl . '/global/vendor/bootstrap-tokenfield/bootstrap-tokenfield.min081a.css?v2.0.0');
$this->registerJsFile(Yii::$app->request->baseUrl . '/global/vendor/bootstrap-tokenfield/bootstrap-tokenfield.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/bootstrap-tokenfield.min.js');


$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/css/slider-menu.jquery.css');
$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/css/slider-menu.theme.jquery.css');
/* Required for file upload */
$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/css/file-upload.css');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/upload-button.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/bootstrap.drilldown.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/jquery.cookie.js');
$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/css/bootstrap.drilldown.css');


$this->title = Yii::$app->params['system_name'] . ' | Add ' . ucwords($type);

if (Yii::$app->session[Yii::$app->params['user_session']]->role != Yii::$app->params['user_role']['admin']) {
    Misc::forceLogout();
}

?>

<div class = "page animsition">
   <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/directory/add-new" enctype = "multipart/form-data">
      <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
      <input type = "hidden" name = "business[id]" value = ""/>
      <button type = "submit" type = "button" class = "btn btn-sm btn-icon btn-success btn-round floating-button btn-lg">
         <i class = "icon fa-save"></i>
      </button>
      <div class = "page-header  padding-bottom-0">
         <div class = "row">
            <div class = "col-xlg-8 col-lg-8 col-md-6 col-sm-12">
               <div class = "page-title">Add Business
                  <div class = "label label-default margin-left-10">
                      <?php echo trim(ucwords(Yii::$app->params['packages'][$type]['name'])); ?>
                  </div>
                  <input type = "hidden" name = "business[package]" value = "<?php echo $type ?>"/>
                  <div class = "label label-default margin-left-10">
                     <span class = "inline-block margin-left-10">Status</span><span class = "inline-block margin-left-10"><input type = "checkbox" class = "" name = "business[status]" data-plugin = "switchery" data-color = "#3fcb3c" data-secondary-color = "rgb(197, 26, 26)" checked = "checked"/></span>
                  </div>
               </div>
            </div>
            <div class = "col-xlg-4 col-lg-4 col-md-6 col-sm-12">
               <div class = "page-header-actions"></div>
            </div>
         </div>
      </div>
      <div class = "page-content padding-30 container-fluid">
         <div class = "row">
             <?php if (in_array('general', Yii::$app->params['packages'][$type]['fields'])) : ?>
                <div class = "col-xlg-8 col-lg-8 col-md-6 col-sm-12">
                   <div class = "panel panel-bordered">
                      <div class = "panel-heading">
                         <h3 class = "panel-title">General Information
                         </h3>
                      </div>
                      <div class = "panel-body container-fluid">
                          <?php if (in_array('name', Yii::$app->params['packages'][$type]['fields'])) : ?>
                             <div class = "form-group">
                                <label class = "control-label">Business Name</label> <input type = "text" class = "form-control required" placeholder = "Business Name" name = "business[name]" value = ""/>
                             </div>
                          <?php endif; ?>
                          <?php if (in_array('address', Yii::$app->params['packages'][$type]['fields'])) : ?>
                             <div class = "form-group">
                                <label class = "control-label">Address</label> <textarea class = "form-control required" placeholder = "Address" name = "business[address]"></textarea>
                             </div>
                          <?php endif; ?>
                         <div class = "row">
                             <?php if (in_array('city', Yii::$app->params['packages'][$type]['fields'])) : ?>
                                <div class = "form-group col-md-6 col-sm-12">
                                   <label class = "control-label">City</label> <input type = "text" class = "form-control required" placeholder = "City" name = "business[city]" value = ""/>
                                </div>
                             <?php endif; ?>
                             <?php if (in_array('state', Yii::$app->params['packages'][$type]['fields'])) : ?>
                                <div class = "form-group col-md-6 col-sm-12">
                                   <label class = "control-label">State</label> <select class = "form-control required-select" data-plugin = "select2" name = "business[state]">
                                      <option value = "">Select State</option>
                                        <?php foreach (Yii::$app->params['states'] as $state) : ?>
                                           <option value = "<?php echo strtolower($state); ?>"><?php echo ucwords($state); ?></option>
                                        <?php endforeach; ?>
                                   </select>
                                </div>
                             <?php endif; ?>
                             <?php if (in_array('zip', Yii::$app->params['packages'][$type]['fields'])) : ?>
                                <div class = "form-group col-md-4 col-sm-12">
                                   <label class = "control-label">Zip</label> <input type = "text" class = "form-control required" name = "business[zip]" value = ""/>
                                </div>
                             <?php endif; ?>
                         </div>
                          <?php if (in_array('tags', Yii::$app->params['packages'][$type]['fields'])) : ?>
                             <div class = "form-group col-md-4 col-sm-12">
                                <label class = "control-label">Tags</label> <input type = "text" class = "form-control" data-role = "tagsinput" value = "" name = "business[tags]"/>
                             </div>
                          <?php endif; ?>
                          <?php if (in_array('phone', Yii::$app->params['packages'][$type]['fields'])) : ?>
                             <div class = "form-group">
                                <label class = "control-label">Phone</label><input type = "text " class = "form-control " name = "business[phone]" data-role = "tagsinput" placeholder = "Enter Phone number"/>
                             </div>
                          <?php endif; ?>
                          <?php if (in_array('email', Yii::$app->params['packages'][$type]['fields'])) : ?>
                             <div class = "form-group">
                                <label class = "control-label">Email</label><input type = "email " class = "form-control " name = "business[email]" data-role = "tagsinput" placeholder = "Enter Email"/>
                             </div>
                          <?php endif; ?>
                          <?php if (in_array('fax', Yii::$app->params['packages'][$type]['fields'])) : ?>
                             <div class = "form-group">
                                <label class = "control-label">Fax</label><input type = "text " class = "form-control " data-role = "tagsinput" name = "business[fax]" placeholder = "Enter Fax"/>
                             </div>
                          <?php endif; ?>
                          <?php if (in_array('url', Yii::$app->params['packages'][$type]['fields'])) : ?>
                             <div class = "form-group">
                                <label class = "control-label">URL</label> <input type = "text " class = "form-control url" data-role = "tagsinput" name = "business[url]" placeholder = "Enter URL"/>
                             </div>
                          <?php endif; ?>
                          <?php if (in_array('description', Yii::$app->params['packages'][$type]['fields'])) : ?>
                             <div class = "form-group">
                                <label class = "control-label">Description</label> <textarea class = "ckeditor form-control" name = "business[description]" placeholder = "Company Article"></textarea>
                             </div>
                          <?php endif; ?>


                      </div>
                   </div>
                </div>
             <?php endif; ?>
            <div class = "col-xlg-4 col-lg-4 col-md-6 col-sm-12 ">
               <div class = "panel panel-bordered">
                  <div class = "panel-heading">
                     <h3 class = "panel-title">Owner Information</h3>
                  </div>
                  <div class = "panel-body container-fluid">
                      <?php if (in_array('owner_name', Yii::$app->params['packages'][$type]['fields'])) : ?>
                         <div class = "form-group">
                            <label class = "control-label">Owner Name</label> <input type = "text" class = "form-control required" name = "business[owner_name]" value = ""/>
                         </div>
                      <?php endif; ?>
                      <?php if (in_array('owner_phone', Yii::$app->params['packages'][$type]['fields'])) : ?>
                         <div class = "form-group">
                            <label class = "control-label">Owner Number</label> <input type = "text" class = "form-control required" name = "business[owner_number]" value = ""/>
                         </div>
                      <?php endif; ?>
                      <?php if (in_array('owner_email', Yii::$app->params['packages'][$type]['fields'])) : ?>
                         <div class = "form-group">
                            <label class = "control-label">Owner Email</label> <input type = "text" class = "form-control required" name = "business[owner_email]" value = ""/>
                         </div>
                      <?php endif; ?>
                      <?php if (in_array('owner_zip', Yii::$app->params['packages'][$type]['fields'])) : ?>
                         <div class = "form-group">
                            <label class = "control-label">Owner Zip Code</label> <input type = "text" class = "form-control required" name = "business[owner_zip]" value = ""/>
                         </div>
                      <?php endif; ?>
                  </div>
               </div>
            </div>
             <?php if (in_array('category', Yii::$app->params['packages'][$type]['fields'])) { ?>
                <div class = "col-md-12 col-sm-12 ">
                   <div class = "panel panel-bordered">
                      <div class = "panel-heading">
                         <h3 class = "panel-title">Category</h3>
                      </div>
                      <div class = "panel-body container-fluid">
                         <div class = "categories">
                            <div class = "row">
                               <div class = "col-sm-12 text-right">
                                  <a href = "javascript:void(0);" class = "more-categories">+ Add More</a>
                               </div>
                            </div>
                            <div class = "row category-wrapper">
                               <div class = "check ">
                                  <div class = "category-select col-md-4 col-sm-12 category-01">
                                     <input class = "selected_cat" type = "hidden" data-id = "0" name = "business[category_id][]" value = "">
                                     <div class = "category-select-scroll">
                                        <ul>
                                           <li>
                                              <a class = "has-child text-white" href = "javascript:void(0);">Select a Category</a>
                                               <?php echo HCategories::buildCategoryList(0, $categories) ?>
                                           </li>
                                        </ul>
                                     </div>
                                  </div>
                               </div>
                         </div>
                      </div>
                   </div>
                </div>
             <?php } ?>
             <?php if (in_array('card', Yii::$app->params['packages'][$type]['fields'])) : ?>
                <div class = "col-xlg-4 col-lg-4 col-md-6 col-sm-12 ">
                   <div class = "panel panel-bordered">
                      <div class = "panel-heading">
                         <h3 class = "panel-title">Upload Business Card</h3>
                      </div>
                      <div class = "panel-body container-fluid">
                         <div class = "form-group">
                            <div class = "file-upload">
                               <label class = "btn-file"> <input type = "text" readonly class = "text-box fw_light" placeholder = "Upload Business Card"/> <span class = "btn"><i class = "icon-upload"></i> Upload</span> <input type = "file" name = "card" class = "required-file"> </label>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             <?php endif; ?>
             <?php if (in_array('display_link', Yii::$app->params['packages'][$type]['fields'])) : ?>
                <div class = "col-md-12 col-sm-12 ">
                   <div class = "panel panel-bordered">
                      <div class = "panel-heading col-md-12">
                            <h3 class = "panel-title">Upload Display Add</h3>
                      </div>
                      <div class="cust-pad">
                         <a href = "javascript:void(0);" class = "more-disp">+ Add More</a>
                      </div>
                      <div class = "panel-body container-fluid disp-wrapper">
                          <div class="disp">
                             <div class = "form-group">
                                <div class = "file-upload">
                                   <label class = "btn-file">
                                      <input type = "text" readonly class = "text-box fw_light" placeholder = "Upload display link"/>
                                       <span class = "btn"><i class = "icon-upload"></i> Upload</span>
                                       <input type = "file" name = "disp_add[]" class = "required-file"/>
                                   </label>
                                </div>
                             </div>
                          </div>
                      </div>

                   </div>
                </div>
             <?php endif; ?>
             <?php if (in_array('coupon_link', Yii::$app->params['packages'][$type]['fields'])) : ?>
                <div class = "col-md-12 col-sm-12 ">
                   <div class = "panel panel-bordered">
                      <div class = "panel-heading col-md-12">
                         <h3 class = "panel-title">Upload Coupon</h3>
                      </div>
                       <div class="cust-pad">
                           <a href = "javascript:void(0);" class = "more-coupon">+ Add More</a>
                       </div>
                      <div class = "panel-body container-fluid coupon-wrapper">
                          <div class="coupon">
                              <div class = "form-group">
                                  <div class = "file-upload">
                                      <label class = "btn-file">
                                          <input type = "text" readonly class = "text-box fw_light" placeholder = "Upload Coupon link"/>
                                          <span class = "btn"><i class = "icon-upload"></i> Upload</span>
                                          <input type = "file" name = "coupon[]" class = "required-file"/>
                                      </label>
                                  </div>
                              </div>
                          </div>
                      </div>

                   </div>
                </div>
             <?php endif; ?>
         </div>


         <div class = "clearfix"></div>
      </div>
   </form>
</div>

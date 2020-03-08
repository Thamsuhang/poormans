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

$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/upload-button.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/bootstrap.drilldown.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/jquery.cookie.js');
$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/css/bootstrap.drilldown.css');


$this->title = Yii::$app->params['system_name'] . ' | Edit ' . ucwords($business['name']);

if (Yii::$app->session[Yii::$app->params['user_session']]->role != Yii::$app->params['user_role']['admin']) {
    Misc::forceLogout();
}

?>

<div class = "page animsition">
   <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/directory/update" enctype = "multipart/form-data">
      <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
      <button type = "submit" type = "button" class = "btn btn-sm btn-icon btn-success btn-round floating-button btn-lg">
         <i class = "icon fa-save"></i>
      </button>
      <div class = "page-header  padding-bottom-0">
         <div class = "row">
            <div class = "col-xlg-8 col-lg-8 col-md-6 col-sm-12">
               <div class = "page-title"><?php echo 'Edit - <strong>' . ucwords($business['name']) . '</strong>'; ?>
                  <div class = "label label-default margin-left-10">
                      <?php echo trim(Yii::$app->params['packages'][$business['package']]['name']); ?>
                  </div>
                  <input type = "hidden" name = "business[id]" value = "<?php echo $business['directory_id']; ?>"/>
                  <input type = "hidden" name = "business[package]" value = "<?php echo $business['package']; ?>"/>
                  <div class = "label label-default margin-left-10">

                     <span class = "inline-block margin-left-10">Status</span>
                     <input type = "checkbox" class = "" name = "business[status]" data-plugin = "switchery" data-color = "#3fcb3c" data-secondary-color = "rgb(197, 26, 26)" <?= ($business['is_active'] == 1 && $business['extended_till'] >= date('Y-m-d H:i:s')) ? 'checked = "checked"' : '' ?> <?= ($business['extended_till'] < date('Y-m-d H:i:s')) ? 'disabled = "disabled"' : '' ?>/>
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
             <?php if (in_array('general', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
                <div class = "col-xlg-8 col-lg-8 col-md-6 col-sm-12 ">
                   <div class = "panel panel-bordered">
                      <div class = "panel-heading">
                         <h3 class = "panel-title">General Information
                         </h3>
                      </div>
                      <div class = "panel-body container-fluid">
                          <?php if (in_array('name', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
                             <div class = "form-group">
                                <label class = "control-label">Business Name</label>
                                <input type = "text" class = "form-control required" name = "business[name]" value = "<?php echo $business['name']; ?>"/>
                             </div>
                          <?php endif; ?>
                          <?php if (in_array('address', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
                             <div class = "form-group">
                                <label class = "control-label">Address</label>
                                <textarea class = "form-control required" name = "business[address]"><?php echo $business['address']; ?></textarea>
                             </div>
                          <?php endif; ?>
                         <div class = "form-group">
                            <div class = "row">
                                <?php if (in_array('city', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
                                   <div class = "form-group col-md-6 col-sm-12">
                                      <label class = "control-label">City</label>
                                      <input type = "text" class = "form-control required" name = "business[city]" value = "<?php echo $business['city']; ?>"/>
                                   </div>
                                <?php endif; ?>
                                <?php if (in_array('state', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
                                   <div class = "form-group col-md-6 col-sm-12">
                                      <label class = "control-label">State</label>
                                      <select class = "form-control required-select" data-plugin = "select2" name = "business[state]">
                                         <option value = "">Select State</option>
                                          <?php foreach (Yii::$app->params['states'] as $state) : ?>
                                             <option <?php echo (strtolower($business['state']) == strtolower($state)) ? 'selected' : ''; ?> value = "<?php echo strtolower($state); ?>"><?php echo ucwords($state); ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                   </div>
                                <?php endif; ?>
                                <?php if (in_array('phone', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
                                   <div class = "form-group col-md-12 col-sm-12">
                                      <label class = "control-label">Phone</label>
                                      <input type = "text " class = "form-control " name = "business[phone]" data-role = "tagsinput" placeholder = "Enter Phone number" value = "<?php if ($business['phone'] != '') {
                                          foreach ($business['phone'] as $key) {
                                              echo $key . ',';
                                          }
                                      } ?>"/>
                                   </div>
                                <?php endif; ?>
                                <?php if (in_array('email', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
                                   <div class = "form-group col-md-12 col-sm-12">
                                      <label class = "control-label">Email</label><input type = "email " class = "form-control " name = "business[email]" data-role = "tagsinput" placeholder = "Enter Email" value = "<?php if ($business['email'] != '') {
                                           foreach ($business['email'] as $key) {
                                               echo $key . ',';
                                           }
                                       } ?>"/>
                                   </div>
                                <?php endif; ?>
                                <?php if (in_array('fax', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
                                   <div class = "form-group col-md-12 col-sm-12">
                                      <label class = "control-label">Fax</label><input type = "text " class = "form-control " data-role = "tagsinput" name = "business[fax]" placeholder = "Enter Fax" value = "<?php if ($business['fax'] != '') {
                                           foreach ($business['fax'] as $key) {
                                               echo $key . ',';
                                           }
                                       } ?>"/>
                                   </div>
                                <?php endif; ?>
                                <?php if (in_array('url', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
                                   <div class = "form-group col-md-12 col-sm-12">
                                      <label class = "control-label">URL</label> <input type = "text " class = "form-control url" data-role = "tagsinput" name = "business[url]" placeholder = "Enter URL" value = "<?php if ($business['url'] != '') {
                                           foreach ($business['url'] as $key) {
                                               echo $key . ',';
                                           }
                                       } ?>"/>
                                   </div>
                                <?php endif; ?>

                            </div>
                         </div>
                          <?php if (in_array('description', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
                             <div class = "form-group">
                                <label class = "control-label">Details</label>
                                <textarea class = "ckeditor form-control" name = "business[description]" placeholder = "Company Article">
                                <?php echo $business['description']; ?>
                                </textarea>
                             </div>
                          <?php endif; ?>
                      </div>
                   </div>
                </div>
             <?php endif; ?>
            <div class = "col-xlg-4 col-lg-4 col-md-6 col-sm-12 ">
               <div class = "panel panel-bordered">
                  <div class = "panel-heading">
                     <h3 class = "panel-title">Status <span class = "pull-right">
                             <?php if ($business['extended_till'] < date('Y-m-d H:i:s')): ?>
                                <span class = "red">Expired</span>
                             <?php endif; ?>
                        </span>
                     </h3>
                  </div>
                  <div class = "panel-body bg-red container-fluid">
                     <div class = "row">
                        <div class = "col-sm-6 col-xs-12">
                           <div class = "form-group <?php echo ($business['extended_till'] < date('Y-m-d H:i:s')) ? 'expired red' : '' ?>">
                              <label class = "control-label"><?php echo ($business['extended_till'] < date('Y-m-d H:i:s')) ? 'Expired On' : 'Expiring On' ?></label>
                              <div class = "exp-lbl"><?php echo Misc::DdmY($business['extended_till']); ?></div>
                           </div>
                        </div>
                        <div class = "col-sm-6 col-xs-12">
                           <div class = "form-group">
                              <label class = "control-label">Extend Till</label>
                              <input type = "hidden" name = "business[date]" value = "<?php echo $business['extended_till']; ?>">
                              <input autocomplete = "off" type = "text" class = "form-control date-picker" name = "business[extended_till]"/>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
            <div class = "col-xlg-4 col-lg-4 col-md-6 col-sm-12 ">
               <div class = "panel panel-bordered">
                  <div class = "panel-heading">
                     <h3 class = "panel-title">Owner Information</h3>
                  </div>
                  <div class = "panel-body container-fluid">
                      <?php if (in_array('owner_name', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
                         <div class = "form-group">
                            <label class = "control-label">Owner Name</label>
                            <input type = "text" class = "form-control required" name = "business[owner_name]" value = "<?php echo $business['owner_name']; ?>"/>
                         </div>
                      <?php endif; ?>
                      <?php if (in_array('owner_phone', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
                         <div class = "form-group">
                            <label class = "control-label">Owner Number</label>
                            <input type = "text" class = "form-control required" name = "business[owner_number]" value = "<?php echo $business['owner_num']; ?>"/>
                         </div>
                      <?php endif; ?>
                      <?php if (in_array('owner_email', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
                         <div class = "form-group">
                            <label class = "control-label">Owner Email</label>
                            <input type = "text" class = "form-control required" name = "business[owner_email]" value = "<?php echo $business['owner_email']; ?>"/>
                         </div>
                      <?php endif; ?>
                      <?php if (in_array('owner_zip', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
                         <div class = "form-group">
                            <label class = "control-label">Owner Zip Code</label>
                            <input type = "text" class = "form-control required" name = "business[owner_zip]" value = "<?php echo $business['owner_zip']; ?>"/>
                         </div>
                      <?php endif; ?>
                  </div>
               </div>
            </div>

             <?php if (in_array('category', Yii::$app->params['packages'][$business['package']]['fields'])) { ?>
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
                                <?php if ($business['category'] != '') {
                                    $counter = 0;
                                    foreach ($business['category'] as $k => $c) :
                                        foreach ($c as $a) : ?>
                                           <div data-id = "1" class = "check col-md-4 col-sm-12">
                                              <p class = "selected">Selected Category : <span id = "menuSelection">
                                                <?php echo(isset($a['parent_name']) ? $a['parent_name'] . ' <i class="icon fa-chevron-right margin-left-4 margin-right-4 font-size-10"></i> ' : '');
                                                echo(isset($a['child_name']) ? $a['child_name'] : '') ?>
                                            </span>
                                              </p>
                                              <div class = "category-select col-sm-12">
                                                 <input class = "inserted_directory_id" type = "hidden" name = "business[category][<?= $counter ?>][inserted_directory_id]" value = "<?php echo $a['inserted_directory_category_id'] ?>">
                                                 <input class = "selected_cat" type = "hidden" name = "business[category][<?= $counter ?>][inserted_directory_category_id]" value = "<?php echo $a['child_id'] ?>">

                                                 <div class = "category-select-scroll">
                                                    <ul>
                                                       <li>
                                                          <a class = "has-child" href = "javascript:void(0);">Select a Category</a>
                                                           <?php echo HCategories::buildCategoryList(0, $categories) ?>
                                                       </li>
                                                    </ul>
                                                 </div>
                                              </div>
                                           </div>
                                            <?php
                                            $counter++;
                                        endforeach;
                                    endforeach;
                                }
                                else { ?>
                                   <div data-id = "0" class = "check col-md-4 col-sm-12">
                                      <div class = "category-select col-sm-12">

                                         <input class = "selected_cat" type = "hidden" data-id = "0" name = "business[category_id][]" value = "">

                                         <div class = "category-select-scroll">
                                            <ul>
                                               <li>
                                                  <a class = "has-child" href = "javascript:void(0);">Select a Category</a>
                                                   <?php echo HCategories::buildCategoryList(0, $categories) ?>
                                               </li>
                                            </ul>
                                         </div>
                                      </div>
                                   </div>

                                    <?php
                                }
                                ?>

                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             <?php } ?>

             <?php if (in_array('business_card', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
                <div class = "col-xlg-4 col-lg-4 col-md-6 col-sm-12 ">
                   <div class = "panel panel-bordered">
                      <div class = "panel-heading">
                         <h3 class = "panel-title">Upload Business Card</h3>
                      </div>
                      <div class = "panel-body container-fluid">
                          <?php if (isset($business['card']) && $business['card'] != '') { ?>
                             <div class = "form-group ">
                                <img class = "img-responsive full-width" src = "<?php echo Yii::$app->params['upload_load_path']['image'] . $business['card']; ?>"/>
                             </div>
                          <?php } ?>
                         <div class = "form-group">
                            <div class = "file-upload">
                               <label class = "btn-file">
                                  <input type = "text" readonly class = "text-box fw_light" placeholder = "Upload Business Card" value = "<?php echo $business['card']; ?>"/>
                                  <span class = "btn">
                                                <i class = "icon-upload"></i>
                                                Upload</span>
                                  <input type = "file" name = "card" class = "required-file">
                               </label>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             <?php endif; ?>
             <?php if (in_array('display_link', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
                <div class = "col-md-12 col-sm-12 ">
                   <div class = "panel panel-bordered col-md-12">
                      <div class = "panel-heading">
                         <h3 class = "panel-title">Upload Display Add</h3>
                      </div>
                       <?php if (isset($business['disp_add']) && $business['disp_add'] != '') {
                           $single_disp = explode(',', $business['disp_add']);
                           foreach ($single_disp as $disp) {
                               ?>
                              <div class = "panel-body container-fluid col-md-3">
                                 <div class = "form-group ">
                                    <input type = "hidden" name = "old_disp[]" value = "<?php echo $disp; ?>">
                                    <img class = "img-responsive full-width fix-height" src = "<?php echo Yii::$app->params['upload_load_path']['image'] . $disp; ?>"/>
                                 </div>
                              </div>
                           <?php }
                       } ?>
                      <div class = "clearfix"></div>
                      <div class = "cust-pad">
                         <a href = "javascript:void(0);" class = "more-disp">+ Add More</a>
                      </div>

                      <div class = "panel-body container-fluid disp-wrapper">
                         <div class = "disp">
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
             <?php if (in_array('coupon_link', Yii::$app->params['packages'][$business['package']]['fields'])) : ?>
            <div class = "col-md-12 col-sm-12 ">
               <div class = "panel panel-bordered col-md-12">
                  <div class = "panel-heading">
                     <h3 class = "panel-title">Upload Coupon</h3>
                  </div>
                   <?php if (isset($business['coupon']) && $business['coupon'] != '') {
                       $single_coupon = explode(',', $business['coupon']);
                       foreach ($single_coupon as $coup) {
                           ?>
                          <div class = "panel-body container-fluid col-md-3">
                             <div class = "form-group">
                                <input type = "hidden" name = "old_coupon[]" value = "<?php echo $coup; ?>">
                                <img class = "img-responsive full-width fix-height" src = "<?php echo Yii::$app->params['upload_load_path']['image'] . $coup; ?>"/>
                             </div>
                          </div>
                       <?php }
                   } ?>
                  <div class = "clearfix"></div>
                  <div class = "cust-pad">
                     <a href = "javascript:void(0);" class = "more-coupon">+ Add More</a>
                  </div>
                  <div class = "panel-body container-fluid coupon-wrapper">
                     <div class = "coupon">
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

<?php

use common\components\HelperDirectoryCategories as HCategories;
use common\components\Misc;

/* @var $this yii\web\View */
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/directory.js');

/* Required for Token field */
$this->registerCssFile(Yii::$app->request->baseUrl . '/global/vendor/bootstrap-tokenfield/bootstrap-tokenfield.min081a.css?v2.0.0');
$this->registerJsFile(Yii::$app->request->baseUrl . '/global/vendor/bootstrap-tokenfield/bootstrap-tokenfield.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/global/js/components/bootstrap-tokenfield.min.js');


/* Required for file upload */
$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/css/file-upload.css');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/upload-button.js');

$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/upload-button.js');

$new = (isset($business['directory_id'])) ? FALSE : TRUE;
$this->title = Yii::$app->params['system_name'] . ' | ' . ($new) ? 'New Business' : 'Edit ' . ucwords($business['name']);


?>

<div class="page animsition">
   <form method="post" action="<?php echo Yii::$app->request->baseUrl; ?>/directory/update"
         enctype="multipart/form-data">
      <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>"
             value="<?php echo Yii::$app->request->csrfToken; ?>"/>
      <button type="submit" class="btn btn-sm btn-icon btn-success btn-round floating-button btn-lg">
         <i class="icon fa-save"></i>
      </button>
      <div class="page-header  padding-bottom-0">
         <div class="row">
            <div class="col-xlg-8 col-lg-8 col-md-6 col-sm-12">
               <div class="page-title">
                        <pre>
                            <?php print_r($business) ?><?php echo isset($business['directory_id']); ?></pre>

                  <?php if ($new): ?>
                     New Business
                  <?php else: ?>
                     Edit - <strong><?= ucwords($business['name']) ?></strong>
                  <?php endif; ?>
                  <div class="label label-default margin-left-10"><?php echo trim(ucwords(Yii::$app->params['packages'][$type]['name'])); ?></div>
                  <input type="hidden" name="business[id]"
                         value="<?php (isset($business['directory_id'])) ? $business['directory_id'] : '' ?>"/>
                  <input type="hidden" name="business[package]" value="<?php echo $type; ?>"/>
               </div>
            </div>
            <div class="col-xlg-4 col-lg-4 col-md-6 col-sm-12">
               <div class="page-header-actions"></div>
            </div>
         </div>

      </div>
      <div class="page-content padding-30 container-fluid">
         <div class="row">
            <div class="col-xlg-8 col-lg-8 col-md-6 col-sm-12 ">
               <div class="panel panel-bordered">
                  <div class="panel-heading">
                     <h3 class="panel-title">General Information <span class="pull-right"> <span
                                 class="inline-block margin-left-10">Status</span> <span
                                 class="inline-block margin-left-10">
                                        <?php if ($new): ?>
                                           <input type="checkbox" class="" name="business[status]"
                                                  data-plugin="switchery" data-color="#3fcb3c"
                                                  data-secondary-color="rgb(197, 26, 26)" checked="checked"/>
                                        <?php else: ?>
                                           <input type="checkbox" class="" name="business[status]"
                                                  data-plugin="switchery" data-color="#3fcb3c"
                                                  data-secondary-color="rgb(197, 26, 26)" <?= (isset($business['is_active']) && isset($business['extended_till']) && $business['is_active'] == 1 && $business['extended_till'] >= date('Y-m-d H:i:s')) ? 'checked = "checked"' : '' ?> <?= (isset($business['extended_till']) && $business['extended_till'] < date('Y-m-d H:i:s')) ? 'disabled = "disabled"' : '' ?>/>
                                        <?php endif; ?>
                                    </span> </span>
                     </h3>
                  </div>
                  <div class="panel-body container-fluid">
                     <?php if (in_array('name', Yii::$app->params['packages'][$type]['objects'])) : ?>
                        <div class="form-group">
                           <label class="control-label">Business Name</label>
                           <input type="text" class="form-control required" name="business[name]"
                                  value="<?= (isset($business['name'])) ? $business['name'] : '' ?>"/>
                        </div>
                     <?php endif; ?>
                     <?php if (in_array('address', Yii::$app->params['packages'][$type]['objects'])) : ?>
                        <div class="form-group">
                           <label class="control-label">Address</label>
                           <textarea class="form-control required"
                                     name="business[address]"><?= (isset($business['address'])) ? $business['address'] : '' ?></textarea>
                        </div>
                     <?php endif; ?>
                     <div class="form-group">
                        <div class="row">
                           <?php if (in_array('city', Yii::$app->params['packages'][$type]['objects'])) : ?>
                              <div class="form-group col-md-4 col-sm-12">
                                 <label class="control-label">City</label>
                                 <input type="text" class="form-control required" name="business[city]"
                                        value="<?= (isset($business['city'])) ? $business['city'] : '' ?>"/>
                              </div>
                           <?php endif; ?>
                           <?php if (in_array('state', Yii::$app->params['packages'][$type]['objects'])) : ?>
                              <div class="form-group col-md-4 col-sm-12">
                                 <label class="control-label">State</label>
                                 <select class="form-control required-select" data-plugin="select2"
                                         name="business[state]">

                                    <option value="">Select State</option>
                                    <?php foreach (Yii::$app->params['states'] as $state) : ?>
                                       <option <?= (isset($business['state']) && strtolower($business['state']) != $state) ? 'selected="selected"' : '' ?>
                                             value="<?php echo strtolower($state); ?>"><?php echo ucwords($state); ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           <?php endif; ?>
                           <?php if (in_array('zip', Yii::$app->params['packages'][$type]['objects'])) : ?>
                              <div class="form-group col-md-4 col-sm-12">
                                 <label class="control-label">Zip</label>
                                 <input type="text" class="form-control required" name="business[zip]"
                                        value="<?= (isset($business['zip'])) ? $business['zip'] : '' ?>"/>
                              </div>
                           <?php endif; ?>
                        </div>
                        <?php if (in_array('tags', Yii::$app->params['packages'][$type]['objects'])) : ?>
                           <div class="form-group">
                              <label class="control-label">Tags</label>
                              <input type="text" class="form-control" data-plugin="tokenfield"
                                     value="<?= (isset($business['tags'])) ? $business['tags'] : '' ?>"
                                     name="business[tags]"/>
                           </div>
                        <?php endif; ?>
                     </div>
                     <div class="form-group">
                        <label class="control-label">Details</label>
                        <textarea class="ckeditor form-control" name="business[description]"
                                  placeholder="Company Article">
                                <?= (isset($business['description'])) ? $business['description'] : '' ?>
                                </textarea>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xlg-4 col-lg-4 col-md-6 col-sm-12">
               <div class="panel panel-bordered">
                  <div class="panel-heading">
                     <h3 class="panel-title">Status
                        <?php if (isset($business['extended_till']) && $business['extended_till'] < date('Y-m-d H:i:s')): ?>
                           <span class="pull-right red">Expired</span>
                        <?php endif; ?>
                     </h3>
                  </div>
                  <div class="panel-body bg-red container-fluid">
                     <div class="row">
                        <div class="col-sm-6 col-xs-12">
                           <div class="form-group <?php echo (isset($business['extended_till']) && $business['extended_till'] < date('Y-m-d H:i:s')) ? 'expired red' : '' ?>">
                              <label
                                    class="control-label"><?php echo (isset($business['extended_till']) && $business['extended_till'] < date('Y-m-d H:i:s')) ? 'Expired On' : 'Expiring On' ?></label>
                              <div class="exp-lbl"><?php echo (isset($business['extended_till'])) ? Misc::DdmY($business['extended_till']) : ''; ?></div>
                           </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                           <div class="form-group">
                              <label class="control-label">Extend Till</label>
                              <input autocomplete="off" type="text" class="form-control date-picker"
                                     name="business[extended_till]"/>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
               <div class="panel panel-bordered">
                  <div class="panel-heading">
                     <h3 class="panel-title">Category</h3>
                  </div>
                  <div class="panel-body container-fluid">
                     <?php if (in_array('category', Yii::$app->params['packages'][$type]['objects'])) : ?>
                        <div class="">
                           <div class="categories-selector">
                              <p id="menuLog">Selected Category : 
                                <span id="menuSelection">
                                  <?php echo(isset($business['parent']) ? $business['parent'] . ' <i class="icon fa-chevron-right margin-left-4 margin-right-4 font-size-10"></i> ' : '');
                                  echo(isset($business['type']) ? $business['type'] : '') ?>
                                </span>
                                 <input id="menuSelectedId" type="hidden"
                                        class="required-select v_hidden height-0 width-0"
                                        value="<?= (isset($business['category_id'])) ? $business['category_id'] : '' ?>"
                                        name=business[category_id]/>
                              </p>

                              <a tabindex="0" href="#category-item"
                                 class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all"
                                 id="hierarchy"><span class="ui-icon ui-icon-triangle-1-s"></span>Please Select a
                                 Category</a>

                              <div id="category-item" class="hidden">
                                 <?php echo HCategories::buildCategoryList(0, $categories) ?>
                              </div>

                           </div>
                        </div>
                     <?php endif; ?>

                  </div>
               </div>
            </div>
            <div class="col-xlg-4 col-lg-4 col-md-6 col-sm-12 ">
               <div class="panel panel-bordered">
                  <div class="panel-heading">
                     <h3 class="panel-title">Owner Information</h3>
                  </div>
                  <div class="panel-body container-fluid">
                     <?php if (in_array('owner_name', Yii::$app->params['packages'][$type]['objects'])) : ?>
                        <div class="form-group">
                           <label class="control-label">Owner Name</label>
                           <input type="text" class="form-control required" name="business[owner_name]"
                                  value="<?= (isset($business['owner_name'])) ? $business['owner_name'] : '' ?>"/>
                        </div>
                     <?php endif; ?>
                     <?php if (in_array('owner_phone', Yii::$app->params['packages'][$type]['objects'])) : ?>
                        <div class="form-group">
                           <label class="control-label">Owner Number</label>
                           <input type="text" class="form-control required" name="business[owner_number]"
                                  value="<?= (isset($business['owner_num'])) ? $business['owner_num'] : '' ?>"/>
                        </div>
                     <?php endif; ?>
                     <?php if (in_array('owner_email', Yii::$app->params['packages'][$type]['objects'])) : ?>
                        <div class="form-group">
                           <label class="control-label">Owner Email</label>
                           <input type="text" class="form-control required" name="business[owner_email]"
                                  value="<?= (isset($business['owner_email'])) ? $business['owner_email'] : '' ?>"/>
                        </div>
                     <?php endif; ?>
                     <?php if (in_array('owner_zip', Yii::$app->params['packages'][$type]['objects'])) : ?>
                        <div class="form-group">
                           <label class="control-label">Owner Zip Code</label>
                           <input type="text" class="form-control required" name="business[owner_zip]"
                                  value="<?= (isset($business['owner_zip'])) ? $business['owner_zip'] : '' ?>"/>
                        </div>
                     <?php endif; ?>
                  </div>
               </div>
            </div>

            <?php if (in_array('business_card', Yii::$app->params['packages'][$type]['objects'])) : ?>
               <div class="col-xlg-4 col-lg-4 col-md-6 col-sm-12 ">
                  <div class="panel panel-bordered">
                     <div class="panel-heading">
                        <h3 class="panel-title">Upload Business Card</h3>
                     </div>
                     <div class="panel-body container-fluid">
                        <?php if (isset($business['card']) && $business['card'] != '') { ?>
                           <div class="form-group ">
                              <img class="img-responsive full-width"
                                   src="<?php echo Yii::$app->params['upload_load_path']['image'] . $business['card']; ?>"/>
                           </div>
                        <?php } ?>
                        <div class="form-group">
                           <div class="file-upload">
                              <label class="btn-file">
                                 <input type="text" readonly class="text-box fw_light"
                                        placeholder="Upload Business Card" value="<?php echo $business['card']; ?>"/>
                                 <span class="btn">
                                                <i class="icon-upload"></i>
                                                Upload</span>
                                 <input type="file" name="card" class="required-file">
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            <?php endif; ?>
            <?php if (in_array('display_link', Yii::$app->params['packages'][$type]['objects'])) : ?>
               <div class="col-xlg-4 col-lg-4 col-md-6 col-sm-12 ">
                  <div class="panel panel-bordered">
                     <div class="panel-heading">
                        <h3 class="panel-title">Upload Display Add</h3>
                     </div>

                     <div class="panel-body container-fluid">
                        <?php if (isset($business['disp_add']) && $business['disp_add'] != '') { ?>
                           <div class="form-group ">
                              <img class="img-responsive full-width"
                                   src="<?php echo Yii::$app->params['upload_load_path']['image'] . $business['disp_add']; ?>"/>
                           </div>
                        <?php } ?>
                        <div class="form-group">
                           <div class="file-upload">
                              <label class="btn-file">
                                 <input type="text" readonly class="text-box fw_light" placeholder="Upload Display Add"
                                        value="<?php echo $business['disp_add']; ?>"/>
                                 <span class="btn">
                                                <i class="icon-upload"></i>
                                                Upload</span>
                                 <input type="file" name="disp_add" class="required-file">
                              </label>

                           </div>
                        </div>
                     </div>

                  </div>
               </div>
            <?php endif; ?>
            <?php if (in_array('coupon_link', Yii::$app->params['packages'][$type]['objects'])) : ?>
               <div class="col-xlg-4 col-lg-4 col-md-6 col-sm-12 ">
                  <div class="panel panel-bordered">
                     <div class="panel-heading">
                        <h3 class="panel-title">Upload Coupon</h3>
                     </div>

                     <div class="panel-body container-fluid">
                        <?php if (isset($business['coupon']) && $business['coupon'] != '') { ?>
                           <div class="form-group ">
                              <img class="img-responsive full-width"
                                   src="<?php echo Yii::$app->params['upload_load_path']['image'] . $business['coupon']; ?>"/>
                           </div>
                        <?php } ?>
                        <div class="form-group">
                           <div class="file-upload">
                              <label class="btn-file">
                                 <input type="text" readonly class="text-box fw_light" placeholder="Upload Coupon"
                                        value="<?php echo $business['coupon']; ?>"/>
                                 <span class="btn">
                                                <i class="icon-upload"></i>
                                                Upload</span>
                                 <input type="file" name="coupon" class="">
                              </label>
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
            <?php endif; ?>
         </div>
         <div class="row">
            <?php if (in_array('phone', Yii::$app->params['packages'][$type]['objects'])) : ?>
               <div class="col-xlg-6 col-lg-6 col-md-6 col-sm-12 ">
                  <div class="panel panel-bordered">

                     <div class="panel-heading">
                        <h3 class="panel-title">Phone</h3>

                        <div class="panel-actions">
                           <a class="panel-action icon wb-plus add-more"></a>
                        </div>
                     </div>
                     <div class="panel-body margin-0 padding-left-15 padding-right-15 ">

                        <ul class="list-type-none" data-item="phone">
                           <?php if (isset($business['phone']) && is_array($business['phone']) && count($business['phone']) > 0) :
                              foreach ($business['phone'] as $key => $number) : ?>
                                 <li>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-xs-11">
                                             <input type="text" class="form-control "
                                                    name="phone[<?php echo $key; ?>][value]"
                                                    placeholder="Enter Phone number" value="<?php echo $number; ?>"/>
                                          </div>
                                          <div class="col-xs-1">
                                             <a class="pull-right delete-item" href="javascript:void(0);">
                                                <i class="icon fa-trash red padding-top-10"></i>
                                             </a>
                                          </div>
                                       </div>

                                    </div>
                                 </li>
                              <?php endforeach; endif; ?>
                        </ul>
                     </div>
                  </div>
               </div>
            <?php endif; ?>
            <?php if (in_array('fax', Yii::$app->params['packages'][$type]['objects'])) : ?>
               <div class="col-xlg-6 col-lg-6 col-md-6 col-sm-12 ">
                  <div class="panel panel-bordered">

                     <div class="panel-heading">
                        <h3 class="panel-title">Fax</h3>

                        <div class="panel-actions">
                           <a class="panel-action icon wb-plus add-more"></a>
                        </div>
                     </div>
                     <div class="panel-body margin-0 padding-left-15 padding-right-15">
                        <ul class="list-type-none">

                           <?php if (is_array($business['fax']) && count($business['fax']) > 0) {
                              foreach ($business['fax'] as $key => $number) : ?>
                                 <li>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-xs-11">
                                             <input type="text " class="form-control "
                                                    name="fax[<?php echo $key; ?>][value]"
                                                    placeholder="Enter Fax number" value="<?php echo $number; ?>"/>
                                          </div>
                                          <div class="col-xs-1">
                                             <a class="pull-right delete-item" href="javascript:void(0);"
                                                data-type="fax" data-id="<?php echo $business['directory_id'] ?>"
                                                data-position="<?php echo $key; ?>">
                                                <i class="icon fa-trash red padding-top-10"></i>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              <?php endforeach; ?><?php } else { ?>
                              <li>
                                 <div class="form-group">
                                    <div class="row">
                                       <div class="col-xs-11">
                                          <input type="text " class="form-control " name="fax[0][value]"
                                                 placeholder="Enter Fax number" value=""/>
                                       </div>
                                       <div class="col-xs-1">
                                          <a class="pull-right delete-item" href="javascript:void(0);">
                                             <i class="icon fa-trash red padding-top-10"></i>
                                          </a>
                                       </div>
                                    </div>

                                 </div>
                              </li>
                           <?php } ?>

                        </ul>
                     </div>

                  </div>
               </div>
            <?php endif; ?>
            <?php if (in_array('email', Yii::$app->params['packages'][$type]['objects'])) : ?>
               <div class="col-xlg-6 col-lg-6 col-md-6 col-sm-12 ">
                  <div class="panel panel-bordered">

                     <div class="panel-heading">
                        <h3 class="panel-title">Email</h3>

                        <div class="panel-actions">
                           <a class="panel-action icon wb-plus add-more"></a>

                        </div>
                     </div>
                     <div class="panel-body margin-0 padding-left-15 padding-right-15">
                        <ul class="list-type-none">

                           <?php if (is_array($business['email']) && count($business['email']) > 0) {
                              foreach ($business['email'] as $key => $number) : ?>
                                 <li>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-xs-11">
                                             <input type="text " class="form-control "
                                                    name="email[<?php echo $key; ?>][value]" placeholder="Enter Email"
                                                    value="<?php echo $number; ?>"/>
                                          </div>
                                          <div class="col-xs-1">
                                             <a class="pull-right delete-item" href="javascript:void(0);"
                                                data-type="email" data-id="<?php echo $business['directory_id'] ?>"
                                                data-position="<?php echo $key; ?>">
                                                <i class="icon fa-trash red padding-top-10"></i>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              <?php endforeach; ?><?php } else { ?>
                              <li>
                                 <div class="form-group">
                                    <div class="row">
                                       <div class="col-xs-11">
                                          <input type="text " class="form-control " name="email[0][value]"
                                                 placeholder="Enter Email address" value=""/>
                                       </div>
                                       <div class="col-xs-1">
                                          <a class="pull-right delete-item" href="javascript:void(0);">
                                             <i class="icon fa-trash red padding-top-10"></i>
                                          </a>
                                       </div>
                                    </div>

                                 </div>
                              </li>
                           <?php } ?>

                        </ul>
                     </div>

                  </div>
               </div>
            <?php endif; ?>
            <?php if (in_array('url', Yii::$app->params['packages'][$type]['objects'])) : ?>
               <div class="col-xlg-6 col-lg-6 col-md-6 col-sm-12 ">
                  <div class="panel panel-bordered">

                     <div class="panel-heading">
                        <h3 class="panel-title">URL</h3>

                        <div class="panel-actions">
                           <a class="panel-action icon wb-plus add-more"></a>

                        </div>
                     </div>
                     <div class="panel-body margin-0 padding-left-15 padding-right-15">
                        <ul class="list-type-none">
                           <?php if (is_array($business['url']) && count($business['url']) > 0) {
                              foreach ($business['url'] as $key => $number) : ?>
                                 <li>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-xs-11">
                                             <input type="text " class="form-control "
                                                    name="url[<?php echo $key; ?>][value]"
                                                    placeholder="Enter URL including 'http://'"
                                                    value="<?php echo $number; ?>"/>
                                          </div>
                                          <div class="col-xs-1">
                                             <a class="pull-right delete-item" href="javascript:void(0);"
                                                data-type="url" data-id="<?php echo $business['directory_id'] ?>"
                                                data-position="<?php echo $key; ?>">
                                                <i class="icon fa-trash red padding-top-10"></i>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              <?php endforeach; ?><?php } else { ?>
                              <li>
                                 <div class="form-group">
                                    <div class="row">
                                       <div class="col-xs-11">
                                          <input type="text " class="form-control " name="url[0][value]"
                                                 placeholder="Enter URL including 'http://'" value=""/>
                                       </div>
                                       <div class="col-xs-1">
                                          <a class="pull-right delete-item" href="javascript:void(0);">
                                             <i class="icon fa-trash red padding-top-10"></i>
                                          </a>
                                       </div>
                                    </div>

                                 </div>
                              </li>
                           <?php } ?>
                        </ul>
                     </div>

                  </div>
               </div>
            <?php endif; ?>
         </div>
         <div class="clearfix"></div>
      </div>
   </form>
</div>

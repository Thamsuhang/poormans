<?php

use common\components\HelperDirectoryCategories as HCategories;
use common\components\Misc;

$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/tagsinput/bootstrap-tagsinput.css');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/tagsinput/bootstrap-tagsinput.min.js');
$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/css/slider-menu.jquery.css');
$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/css/slider-menu.theme.jquery.css');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/jquery.cookie.js');
//$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/menu-master/fg.menu.css');
//$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/menu-master/theme/ui.theme.css');
//$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/menu-master/fg.menu.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/directory.js');

?>
<script>
   var packages =<?php echo json_encode(Yii::$app->params['packages']) ?>
</script>
<div class = "fake-height"></div>
<form class = "signup-form" name = "business" action = "<?php echo Yii::$app->request->baseUrl; ?>/signup/update" enctype = "multipart/form-data" method = "post">
   <section class = "margin-bottom-90 signup-form">
      <div class = "container">
         <div class = "grey">
            <div class = "title_sec">
               <h1><?php if ($type == 'card') {
                       echo "Business Card";
                   }
                   else {
                       echo $type;
                   } ?> Sign Up</h1>
               <hr/>
            </div>
         </div>
         <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
         <input type = "hidden" name = "business[package]" value = "<?php echo $type; ?>"/>
         <h2>Business Details</h2>
         <div class = "row">
             <?php if (in_array('name', Yii::$app->params['packages'][$type]['fields'])): ?>
                <div class = "col-md-6 col-sm-6 col-xs-12">
                   <div class = "form-group">
                      <label class = "control-label">Name</label> <input type = "text" class = "form-control required" name = "business[name]" placeholder = "Name" autocomplete = "off">
                   </div>
                </div>
             <?php endif; ?>
             <?php if (in_array('address', Yii::$app->params['packages'][$type]['fields'])): ?>
                <div class = "col-md-6 col-sm-6 col-xs-12">
                   <div class = "form-group">
                      <label class = "control-label">Address</label> <input type = "text" class = "form-control required" name = "business[address]" placeholder = "Address" autocomplete = "off">
                   </div>
                </div>
             <?php endif; ?>
             <?php if (in_array('city', Yii::$app->params['packages'][$type]['fields'])): ?>
                <div class = "col-md-6 col-sm-6 col-xs-12">
                   <div class = "form-group">
                      <label class = "control-label">City</label> <input type = "text" class = "form-control required" name = "business[city]" placeholder = "City" autocomplete = "off">
                   </div>
                </div>
             <?php endif; ?>
             <?php if (in_array('state', Yii::$app->params['packages'][$type]['fields'])): ?>
                <div class = "col-md-6 col-sm-6 col-xs-12">
                   <div class = "form-group">
                      <label class = "control-label">State</label> <select class = "form-control required" name = "business[state]" data-plugin = "select2">
                         <option value>Select a state</option>
                           <?php foreach (Yii::$app->params['states'] as $state): ?>
                              <option value = "<?php echo strtolower($state); ?>"><?php echo $state; ?></option>
                           <?php endforeach; ?>
                      </select>
                   </div>
                </div>
             <?php endif; ?>
             <?php if (in_array('phone', Yii::$app->params['packages'][$type]['fields'])): ?>
                <div class = "col-md-6 col-sm-6 col-xs-12">
                   <div class = "form-group">
                      <label class = "control-label">Phone Number</label> <input type = "text" class = "form-control required" data-role = "tagsinput" name = "business[phone]" placeholder = "Phone Number" autocomplete = "off">
                   </div>
                </div>
             <?php endif; ?>
             <?php if (in_array('url', Yii::$app->params['packages'][$type]['fields'])): ?>
                <div class = "col-md-6 col-sm-6 col-xs-12">
                   <div class = "form-group">
                      <label class = "control-label">URL</label> <input type = "url" class = "form-control required" data-role = "tagsinput" name = "business[url]" placeholder = "URL" autocomplete = "off">
                   </div>
                </div>
             <?php endif; ?>
             <?php if (in_array('fax', Yii::$app->params['packages'][$type]['fields'])): ?>
                <div class = "col-md-6 col-sm-6 col-xs-12">
                   <div class = "form-group">
                      <label class = "control-label">Fax</label> <input type = "text" class = "form-control required" name = "business[fax]" placeholder = "Fax" autocomplete = "off">
                   </div>
                </div>
             <?php endif; ?>
             <?php if (in_array('email', Yii::$app->params['packages'][$type]['fields'])): ?>
                <div class = "col-md-6 col-sm-6 col-xs-12">
                   <div class = "form-group">
                      <label class = "control-label">Email</label> <input type = "email" class = "form-control required" data-role = "tagsinput" name = "business[email]" placeholder = "Email Number" autocomplete = "off">
                   </div>
                </div>
             <?php endif; ?>
             <?php if (in_array('category', Yii::$app->params['packages'][$type]['fields'])): ?>
                <div class = "col-md-12 col-sm-12 col-xs-12">
                   <div class = "categories">
                      <div class = "row">
                         <div class = "col-sm-12">
                            <div class = "text-left">
                               <a href = "javascript:void(0);" class = "more-categories">+ Add More</a>
                            </div>
                         </div>
                      </div>
                      <div class = "row category-wrapper">
                         <div class = "category-select category-01 col-sm-4">
                            <div class = "category-select-scroll ">
                               <input type = "hidden" name = "business[category_id][]" value = "" class = "selected_cat">
                               <ul id="cat-03" >
                                  <li>
                                     <a  class = "has-child text-white" href = "javascript:void(0);">Select a Category</a>
                                      <?php echo HCategories::buildCategoryList(0, $categories) ?>
                                  </li>
                               </ul>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             <?php endif; ?>

             <?php if (in_array('description', Yii::$app->params['packages'][$type]['fields'])): ?>
                <div class = "col-md-12 col-sm-12 col-xs-12">
                   <div class = "form-group">
                      <label class = "control-label">Company Description</label>
                      <textarea class = "form-control required ckeditor" name = "business[description]" placeholder = "Company Description" id = "" cols = "30" rows = "10"></textarea>
                   </div>
                </div>
             <?php endif; ?>
             <?php if (in_array('coupon_link', Yii::$app->params['packages'][$type]['fields'])): echo 'yes';?>

                <div class = "col-sm-12">
                   <div class = "text-right">
                      <a href = "javascript:void(0);" class = "more-coupon">+ Add More</a>
                   </div>
                </div>
                <div class = "col-md-12 col-sm-12 coupon-wrapper">
                   <div class = "coupon">
                      <div class = "form-group">
                         <label class = "control-label">Upload Coupon</label>
                         <div class = "file-upload">
                            <label class = "btn-file"> <input type = "text" readonly class = "text-box fw_light" placeholder = "Upload coupon"/> <span class = "btn"><i class = "icon-upload"></i> Upload</span> <input type = "file" name = "coupon[]" class = "required-file"/> </label>
                         </div>
                      </div>
                   </div>
                </div>

             <?php endif; ?>
             <?php if (in_array('display_link', Yii::$app->params['packages'][$type]['fields'])): ?>
                <div class = "col-sm-12">
                   <div class = "text-right">
                      <a href = "javascript:void(0);" class = "more-disp">+ Add More</a>
                   </div>
                </div>
                <div class = "col-md-12 col-sm-12 disp-wrapper">
                   <div class = "disp">
                      <div class = "form-group">
                         <label class = "control-label">Upload Display Link</label>
                         <div class = "file-upload">
                            <label class = "btn-file"> <input type = "text" readonly class = "text-box fw_light" placeholder = "Upload display link"/> <span class = "btn"><i class = "icon-upload"></i> Upload</span> <input type = "file" name = "disp_add[]" class = "required-file"/> </label>
                         </div>
                      </div>
                   </div>
                </div>
             <?php endif; ?>
             <?php if (in_array('card', Yii::$app->params['packages'][$type]['fields'])): ?>
                <div class = "col-md-12 col-sm-12 col-xs-12">
                   <div class = "form-group">
                      <label class = "control-label">Upload business card</label>
                      <div class = "file-upload">
                         <label class = "btn-file"> <input type = "text" readonly class = "text-box fw_light" placeholder = "Upload Business Card"/> <span class = "btn"><i class = "icon-upload"></i> Upload</span> <input type = "file" name = "card" class = "required-file"/> </label>
                      </div>
                   </div>
                </div>
             <?php endif; ?>
            <div class = "clearfix"></div>
            <div class="container" >
              
           
            <h2>Billing Details</h2>
            <div class = "row">
               <div class = "col-md-6 col-sm-6 col-xs-12">
                  <div class = "form-group">
                     <label class = "control-label">Name</label> <input type = "text" class = "form-control required" name = "business[owner_name]" placeholder = "Name" autocomplete = "off">
                  </div>
               </div>
               <div class = "col-md-6 col-sm-6 col-xs-12">
                  <div class = "form-group">
                     <label class = "control-label">Email</label> <input type = "text" class = "form-control required-email" name = "business[owner_email]" placeholder = "Email" autocomplete = "off">
                  </div>
               </div>
               <div class = "col-md-6 col-sm-6 col-xs-12">
                  <div class = "form-group">
                     <label class = "control-label">Phone Number</label> <input type = "text" class = "form-control required" name = "business[owner_phone]" placeholder = "Phone Number" autocomplete = "off">
                  </div>
               </div>
               <div class = "col-md-6 col-sm-6 col-xs-12">
                  <div class = "form-group">
                     <label class = "control-label">Zip</label> <input type = "text" class = "form-control required" name = "business[owner_zip]" placeholder = "Zip" autocomplete = "off">
                  </div>
               </div>
            </div>
           </div>

         </div>
         <div class = "text-center margin-top-30">
            <a id = "signup_button" class = "btn btn-danger btn-lg">Submit</a>
            <!--            <button name = "signup" class = "signup_button btn btn-primary btn-lg form-submit">Submit</button>-->
         </div>
      </div>
      <div class = "modal fade" id = "exampleModal" tabindex = "-1" role = "dialog" aria-labelledby = "exampleModalLabel" aria-hidden = "true">
         <div class = "modal-dialog " role = "document">
            <div class = "modal-content">
               <div class = "modal-header">
                  <h5 class = "modal-title" id = "exampleModalLabel">Checkout Form</h5>
                  <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                     <span aria-hidden = "true">&times;</span>
                  </button>
               </div>
               <div class = "modal-body">
                  <form class = "signup-form" name = "business" enctype = "multipart/form-data" action = "<?php echo Yii::$app->request->baseUrl; ?>/signup/update" method = "post">
                     <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                     <input type = "hidden" name = "business[package]" value = "<?php echo $type; ?>"/>
                      <div class = "container-fluid">
                     <div class = "row">
                       
                           <div class = "col-lg-12 col-md-12 col-sm-12 margin-bottom-20 shopping-cart-wrapper">
                              <h2 class = "margin-0 padding-0 float-left">Invoice</h2>
                              <p class = "float-right text-right p01 ">
                                 <strong>Clinton</strong> <br/>Maryland, 20735.
                              </p>
                              <div class = "clearfix"></div>
                              <div class = "shopping-cart">
                                 <div class = "column-labels">
                                    <label class = "product-column-lg text-left pad-0">Feature</label>
                                  
                                    <label class = "product-column-sm text-center">Free</label>
                                    <label class = "product-column-sm text-center">Qty</label>
                                    <label class = "product-column-sm text-center">Rate</label>
                                    <label class = "product-column-sm text-right padding-right-0">Price</label>
                                 </div>
                                 <div class = "product" data-id = "">
                                    <div class = "product-column-lg text-left pad-0">
                                       <div class = "product-title text-bold"></div>
                                       <p class = "product-description"><?php echo ucwords($type); ?> Package</p>
                                    </div>
                                    <div class = "product-column-sm text-center">N/A</div>
                                    <div class = "product-column-sm text-center">1</div>
                                    <div class = "product-column-sm text-center"><span id = "package_rate"></span></div>
                                    <div class = "product-column-sm text-center"><span id = "package_price"></span></div>
                                 </div>
                                 <div class = "clearfix"></div>
                                 <div class = "product category_tab hidden" data-id = "">
                                    <div class = "product-column-lg text-left pad-0">
                                       <div class = "product-title text-bold"></div>
                                       <p class = "product-description">Category</p>
                                    </div>
                                    <div class = "product-column-sm text-center"><span id = "free_categories"></span></div>
                                    <div class = "product-column-sm text-center"><span id = "count_categories"></span></div>
                                    <div class = "product-column-sm text-center"><span id = "rate_categories"></span></div>
                                    <div class = "product-column-sm text-center"><span id = "price_categories"></span></div>
                                 </div>
                                 <div class = "clearfix"></div>
                                 <div class = "product coupon_tab hidden" data-id = "">
                                    <div class = "product-column-lg text-left pad-0">
                                       <div class = "product-title text-bold"></div>
                                       <p class = "product-description">Coupon</p>
                                    </div>
                                    <div class = "product-column-sm text-center"><span id = "free_coupon"></span></div>
                                    <div class = "product-column-sm text-center"><span id = "count_coupon"></span></div>
                                    <div class = "product-column-sm text-center"><span id = "rate_coupon"></span></div>
                                    <div class = "product-column-sm text-center"><span id = "price_coupon"></span></div>
                                 </div>
                                 <div class = "clearfix"></div>
                                 <div class = "product disp_tab hidden" data-id = "">
                                    <div class = "product-column-lg text-left pad-0">
                                       <div class = "product-title text-bold"></div>
                                       <p class = "product-description">Display Ad</p>
                                    </div>
                                    <div class = "product-column-sm text-center"><span id = "free_disp"></span></div>
                                    <div class = "product-column-sm text-center"><span id = "count_disp"></span></div>
                                    <div class = "product-column-sm text-center"><span id = "rate_disp"></span></div>
                                    <div class = "product-column-sm text-center"><span id = "price_disp"></span></div>
                                 </div>
                                 <div class = "clearfix"></div>
                                 <div class = "totals">
                                    <div class = "totals-item totals-item-total">
                                       <label>Grand Total</label>
                                       <div class = "totals-value"><span id = "total"></span></div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                        </div>
                     </div>

                  </form>

               </div>
               <div class = "modal-footer">
                  <button type = "button" class = "btn btn-secondary" data-dismiss = "modal">Close</button>
                  <button type = "submit" class = "btn btn-primary">Checkout</button>
               </div>
            </div>
         </div>
      </div>
   </section>
</form>


<script>
   $('#signup_button').click(function (e) {
      e.preventDefault();
      var form = $(this).parents('form');
      var validator = form.validate();
      var valid = form.valid();
      if (form.valid()) {
         //Package
         var selected_package = form.find('input[name="business[package]"]').val();
         var package_price = packages[selected_package].price;
         $('#package_rate').html('$' + package_price);
         $('#package_price').html('$' + package_price);
         //Category
         var count_categories = $('.category-select').length;
         // var c = $('.category-select');
         // $.each(c,function () {
         //
         //    if (c.find('[type=hidden]').val !=''){
         //       console.log(c.find('[type=hidden]').val());
         //    }
         // });
         var rate_categories = packages[selected_package].objects.category.price;
         var free_category = packages[selected_package].objects.category.free;

         var price_categories = 0;
         if (count_categories > free_category) {
            $('.category_tab').removeClass('hidden');
            var extra_categories = count_categories - free_category;
            price_categories = extra_categories * rate_categories;
            $('#free_categories').html(free_category);
            $('#count_categories').html(count_categories);
            $('#rate_categories').html('$' + rate_categories);
            $('#price_categories').html('$' + price_categories);
         }

         //coupon
         var count_coupon = $('.coupon').length;
         if (count_coupon!=0){
            var rate_coupon = packages[selected_package].objects.coupon.price;
            var free_coupon = packages[selected_package].objects.coupon.free;

            var price_coupon = 0;
            if (count_coupon > free_coupon) {
               $('.coupon_tab').removeClass('hidden');
               var extra_coupon = count_coupon - free_coupon;
               price_coupon = extra_coupon * rate_coupon;
               $('#free_coupon').html(free_coupon);
               $('#count_coupon').html(count_coupon);
               $('#rate_coupon').html('$' + rate_coupon);
               $('#price_coupon').html('$' + price_coupon);
            }

         }else{ var price_coupon = 0;}
         //display_ad
         var count_disp = $('.disp').length;
         if(count_disp!=0){
            var rate_disp = packages[selected_package].objects.disp_add.price;
            var free_disp = packages[selected_package].objects.disp_add.free;

            var price_disp = 0;
            if (count_disp > free_disp) {
               $('.disp_tab').removeClass('hidden');
               var extra_disp = count_disp - free_disp;
               price_disp = extra_disp * rate_disp;
               $('#free_disp').html(free_disp);
               $('#count_disp').html(count_disp);
               $('#rate_disp').html('$' + rate_disp);
               $('#price_disp').html('$' + price_disp);
            }

         }else{ var price_disp = 0;}

         var grand_total = package_price + price_categories + price_disp + price_coupon;
         $('#total').html('$' + grand_total);
         $('#exampleModal').modal('show');

      } else {
         validator.focusInvalid();
      }
   });
</script>
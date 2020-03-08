<?php

use common\components\HelperDirectoryCategories as HCategories;
use common\components\Misc;

$packages = Yii::$app->params['packages'][$package];

?>
<script src = "https://www.paypalobjects.com/api/checkout.js"></script>
<div class = "fake-height"></div>

<section class = "margin-bottom-90 signup-form">
   <div class = "container">
      <div class = "grey">
         <div class = "title_sec">
            <h1>Check Out for <?php echo ucwords($package); ?> Package</h1>
            <hr/>
         </div>
      </div>
      <form class = "signup-form" name = "business" enctype = "multipart/form-data" action = "<?php echo Yii::$app->request->baseUrl; ?>/signup/place-order" method = "post">
         <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
         <input type = "hidden" name = "business[package]" value = "<?php echo $package; ?>"/>
         <div class = "row">
            <div class = "container margin-bottom-90">
               <div class = "row">
                  <div class = "col-lg-6 col-md-6 col-sm-12 margin-bottom-20 shopping-cart-wrapper">
                     <h2 class = "margin-0 padding-0 float-left">Invoice</h2>
                     <p class = "float-right text-right">
                        <strong>Clinton</strong> <br/>Maryland, 20735.
                     </p>
                     <div class = "clearfix"></div>
                     <div class = "shopping-cart">
                        <div class = "column-labels">
                           <label class = "product-column-xsm text-center">Feature</label>
                           <label style="width:40%" class = "product-column-lg text-left">&nbsp;</label>
                           <label class = "product-column-sm text-center">Free</label>
                           <label class = "product-column-sm text-center">Qty</label>
                           <label class = "product-column-sm text-center">Rate</label>
                           <label class = "product-column-sm text-right padding-right-0">Price</label>
                        </div>
                        <div class = "product" data-id = "">
                           <div class = "product-column-lg text-left pad-0">
                              <div class = "product-title text-bold"></div>
                              <p class = "product-description"><?php echo ucwords($package); ?> Package</p>
                           </div>
                           <div class = "product-column-sm text-center">0</div>
                           <div class = "product-column-sm text-center">1</div>
                           <div class = "product-column-sm text-center"><?php echo '$' . $packages['price']; ?></div>
                           <div class = "product-column-sm text-center"><?php echo '$' . $packages['price']; ?></div>
                        </div>
                        <div class = "clearfix"></div>
                         <?php if ($totals['category'] > 0) : ?>
                            <div class = "product" data-id = "">
                               <div class = "product-column-lg text-left pad-0">
                                  <div class = "product-title text-bold"></div>
                                  <p class = "product-description">Category</p>
                               </div>
                               <div class = "product-column-sm text-center"><?php echo Yii::$app->params['packages'][$package]['objects']['category']['free'] ?></div>
                               <div class = "product-column-sm text-center"><?php echo $category; ?></div>
                               <div class = "product-column-sm text-center"><?php echo '$' . $packages['objects']['category']['price'] ?></div>
                               <div class = "product-column-sm text-center"><?php echo '$' . $add_info['category']*$packages['objects']['category']['price'] ?></div>
                            </div>
                            <div class = "clearfix"></div>
                         <?php endif; ?>
                        <div class = "clearfix"></div>
                         <?php if ($add_info['coupon'] > 0) : ?>
                            <div class = "product" data-id = "">
                               <div class = "product-column-lg text-left pad-0">
                                  <div class = "product-title text-bold"></div>
                                  <p class = "product-description">Coupon</p>
                               </div>
                               <div class = "product-column-sm text-center">&nbsp;</div>
                               <div class = "product-column-sm text-center">&nbsp;</div>
                               <div class = "product-column-sm text-center">&nbsp;</div>
                               <div class = "product-column-sm text-center"><?php echo '$' . $packages['objects']['coupon']['price'] ?></div>
                            </div>
                            <div class = "clearfix"></div>
                         <?php endif; ?>
                         <?php if ($add_info['card'] > 0) : ?>
                            <div class = "product" data-id = "">
                               <div class = "product-column-lg text-left pad-0">
                                  <div class = "product-title text-bold"></div>
                                  <p class = "product-description">Card</p>
                               </div>
                               <div class = "product-column-sm text-center">&nbsp;</div>
                               <div class = "product-column-sm text-center">&nbsp;</div>
                               <div class = "product-column-sm text-center">&nbsp;</div>
                               <div class = "product-column-sm text-center"><?php echo '$' . $packages['objects']['card']['price'] ?></div>
                            </div>
                            <div class = "clearfix"></div>
                         <?php endif; ?>
                         <?php if ($add_info['disp_add'] > 0) : ?>
                            <div class = "product" data-id = "">
                               <div class = "product-column-lg text-left pad-0">
                                  <div class = "product-title text-bold"></div>
                                  <p class = "product-description">Display Link</p>
                               </div>
                               <div class = "product-column-sm text-center">&nbsp;</div>
                               <div class = "product-column-sm text-center">&nbsp;</div>
                               <div class = "product-column-sm text-center">&nbsp;</div>
                               <div class = "product-column-sm text-center"><?php echo '$' . $packages['objects']['disp_add']['price'] ?></div>
                            </div>
                            <div class = "clearfix"></div>
                         <?php endif; ?>

                        <div class = "totals">
                           <div class = "totals-item totals-item-total">
                              <label>Grand Total</label>
                              <div class = "totals-value"><?php echo '$' . $totals['grand-total']; ?></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class = "col-lg-6 col-md-6 col-sm-12">
                     <div class = "place-order">
                        <h2>Please fill the form</h2>
                        <form id = "checkout-form" action = "<?php echo Yii::$app->request->baseUrl; ?>/signup/place-order" method = "post">
                           <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                              <input type = "hidden" name="business[name]" value="<?php echo (isset($user_info['name']) && $user_info['name'] != '') ? $user_info['name'] : ''; ?>">
                              <input type = "hidden" name="business[description]" value="<?php echo (isset($user_info['description']) && $user_info['description'] != '') ? $user_info['description'] : ''; ?>">
                              <input type = "hidden" name="business[address]" value="<?php echo (isset($user_info['address']) && $user_info['address'] != '') ? $user_info['address'] : ''; ?>">
                              <input type = "hidden" name="business[city]" value="<?php echo (isset($user_info['city']) && $user_info['city'] != '') ? $user_info['city'] : ''; ?>">
                              <input type = "hidden" name="business[state]" value="<?php echo (isset($user_info['state']) && $user_info['state'] != '') ? $user_info['state'] : ''; ?>">
                              <input type = "hidden" name="business[phone]" value="<?php echo (isset($user_info['phone']) && $user_info['phone'] != '') ? $user_info['phone'] : ''; ?>">
                              <input type = "hidden" name="business[owner_name]" value="<?php echo (isset($user_info['owner_name']) && $user_info['owner_name'] != '') ? $user_info['owner_name'] : ''; ?>">
                              <input type = "hidden" name="business[owner_email]" value="<?php echo (isset($user_info['owner_email']) && $user_info['owner_email'] != '') ? $user_info['owner_email'] : ''; ?>">
                              <input type = "hidden" name="business[owner_phone]" value="<?php echo (isset($user_info['owner_phone']) && $user_info['owner_phone'] != '') ? $user_info['owner_phone'] : ''; ?>">
                              <input type = "hidden" name="business[owner_zip]" value="<?php echo (isset($user_info['owner_zip']) && $user_info['owner_zip'] != '') ? $user_info['owner_zip'] : ''; ?>">
                              <input type = "hidden" name="business[coupon]" value="<?php print_r((isset($coupon) && $coupon != '') ? $coupon : ''); ?>">
                              <input type = "hidden" name="business[card]" value="<?php print_r((isset($card) && $card != '') ? $card : ''); ?>">
                              <input type = "hidden" name="business[disp_add]" value="<?php print_r((isset($disp_add) && $disp_add != '') ? $disp_add : ''); ?>">
                              <input type = "hidden" name="business[grand-total]" value="<?php echo $totals['grand-total']; ?>">

<!--                           <input type = "hidden" id = "paymentToken" name = "payment[paymentToken]">-->
<!--                           <input type = "hidden" id = "orderID" name = "payment[orderID]">-->
<!--                           <input type = "hidden" id = "payerID" name = "payment[payerID]">-->
<!--                           <input type = "hidden" id = "paymentID" name = "payment[paymentID]">-->
<!--                           <div class = "row">-->
<!--                              <div class = "col-sm-6 col-xs-12">-->
<!--                                 <div class = "form-group margin-bottom-7px">-->
<!--                                    <input type = "text" class = "form-control required" placeholder = "City" name = "order[city]"/>-->
<!--                                 </div>-->
<!--                              </div>-->
<!--                              <div class = "col-sm-6 col-xs-12">-->
<!--                                 <div class = "form-group margin-bottom-7px">-->
<!--                                    <input type = "text" class = "form-control required" placeholder = "State" name = "order[state]"/>-->
<!--                                 </div>-->
<!--                              </div>-->
<!--                           </div>-->
                           <div class = "form-group margin-bottom-7px">
                              <textarea class = "form-control required" placeholder = "Delivery address" name = "business[del_address]"></textarea>
                           </div>
                           <div class = "form-group margin-bottom-7px text-right margin-top-60">
                              <button style="float: left;" type="submit" class="btn btn-success">Submit</button>
                              <div id = "paypal-button"></div>
                              <!--<a href = "<?php /*echo Yii::$app->request->baseUrl; */ ?>/inventory" class = "btn btn-lg btn-primary">
                                        <i class = "fa fa-shopping-cart margin-right-10"></i>
                                        Continue Shopping
                                    </a>-->

                              <!--  <button type = "submit" class = "btn btn-lg btn-success">
                                    <i class = "fa fa-credit-card margin-right-10"></i>
                                    Checkout
                                </button>-->
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </form>

   </div>
   <script>
      paypal.Button.render({
//        env: 'production',
         env: 'sandbox',
         commit: true,
         client: {
            sandbox: '<?php echo Yii::$app->params["paypal"]["client_id"] ?>',
            production: '<?php echo Yii::$app->params["paypal"]["client_id"] ?>'
         },
         locale: 'en_US',
         validate: function (actions) {
            actions.disable();
            //  validate(actions);

            $('#checkout-form input').change(function () {
               validate(actions);
            });
         },

         onClick: function () {
            $('#checkout-form').valid();

         },

         payment: function (data, actions) {
            return actions.payment.create({
               payment: {
                  transactions: [
                     {
                        amount: {
                           total: '<?php echo $totals['grand-total']; ?>',
                           currency: '<?php echo Yii::$app->params["paypal"]["currency"] ?>'
                        }
                     }
                  ]
               }
            });
         },

         onAuthorize: function (data, actions) {
            return actions.payment.execute().then(function () {
               $('#intent').val(data.intent);
               $('#paymentToken').val(data.paymentToken);
               $('#orderID').val(data.orderID);
               $('#payerID').val(data.payerID);
               $('#paymentID').val(data.paymentID);
               var form = $('#checkout-form');
               if (form.valid()) {
                  form.submit();
               } else {
                  validator.focusInvalid();
               }
            });
         }
      }, '#paypal-button');
   </script>
</section>









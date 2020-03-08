$.fn.outerHTML = function () {
   return $('<clone>').append(this.eq(0).clone()).html();
};
$(document).ready(function () {

   /*----------------------------------------------------*/
   /*  Fake Height
    /*----------------------------------------------------*/
   $(function () {
      var fakeHeight = $('header.main_menu_sec ').outerHeight();
      $('.fake-height').css('height', fakeHeight);
   });


   /*----------------------------------------------------*/
   /*  Parallax
    /*----------------------------------------------------*/
   $(function () {
      $('section').each(function () {
         //console.log($(this).data('parallax'));
         if ($(this).data('parallax') !== '' && $(this).data('parallax') !== undefined && $(this).data('parallax') !== null) {
            $(this).css('background-image', 'url("' + $baseUrl + '/common/assets/images/uploads/' + $(this).data('parallax') + '")');
            $(this).css('background-attachment', 'fixed');
            $(this).css('background-position', '50% 50%');
            $(this).css('background-repeat', 'no-repeat');
            $(this).css('background-size', 'cover');
         }
         if ($(this).data('text-color') !== '' && $(this).data('text-color') !== undefined && $(this).data('text-color') !== null) {
            $(this).css('color', $(this).data("text-color"));
         }

      });
   });


   /*----------------------------------------------------*/
   /*  Service Overlay Width
    /*----------------------------------------------------*/
   $(function () {
      var serviceWidth = $('.service').outerWidth();
      $('.service').mouseenter(function () {
         //alert('ok');
         $(this).children('.service_hoverly').css('width', serviceWidth);
      });
   });


   /*----------------------------------------------------*/
   /*  Catergories Scroll Set Height
    /*----------------------------------------------------*/
   $(function () {
      // $('.categories-section').find('.nice-scroll.get-height').css('height', $('.pricing-section').outerHeight() - 250);
      // $('.nice-scroll').niceScroll({cursorcolor: "#00aff0"});
   });


   /*----------------------------------------------------*/
   /*  Send Message
    /*----------------------------------------------------*/
   $(function () {
      function isemail(x) {
         var atpos = x.indexOf("@");
         var dotpos = x.lastIndexOf(".");
         if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {

            return false;
         }
         return true;
      }

      $('.send-message').click(function () {
         formValid = false;
         var form = $(this).parents('form');
         if (isemail(form.find('input[name=email]').val()) && form.find('input[name=name]').val() !== '' && form.find('textarea[name=message]').val() !== '') {
            formValid = true;
         }


         // alert('sending Message');
         if (formValid == true) {
            $.ajax({
               url: $baseUrl + "/contact/message",
               type: 'post',
               data: $('#contact-form').serialize(),
               success: function (data) {
                  // alert(data);
                  if (data == 'false') {
                     $('#contact-error').html('Sorry! Your message couldn`t be sent.');
                  } else {
                     $('#contact-error').html('Your Message has been sent.');

                  }
               }
            });
         } else {
            $('#contact-error').html('Sorry! Please fill the form with appropriate data.');
         }
      });
   });

   // Sign up

   $(function () {
      $('.signup').click(function (e) {
         e.preventDefault();
         var form = $(this).parents('form');
         var validator = form.validate();
         var valid = form.valid();
         if (form.valid()) {
            $.ajax({
               url: $baseUrl + "/site/signup",
               type: 'post',
               data: form.serialize(),
               success: function (data) {
                  if (data == 'false') {
                     alert('Sign up un-successful. Please Try again later.');
                  } else {
                     alert('You have successfully signed up. Please wait for our email. ');
                  }

                  $('#sign-up').modal('hide');


               }
            });
         } else {
            validator.focusInvalid();
         }
         //alert('ok');
      });
   });

   // Form Validation

   $(function () {
      $('.form-submit').click(function (e) {
         e.preventDefault();
         var form = $(this).parents('form');
         var validator = form.validate();
         var valid = form.valid();
         if (form.valid()) {
            form.submit();
         } else {
            validator.focusInvalid();
         }
         //alert('ok');
      });
   });

   // $('.scrolable').niceScroll({cursorcolor: "#00aff0"});


   // Match height
   $(function () {
      matchHeightOptions = {
         byRow: true,
         property: 'height',
         target: null,
         remove: false
      };
      $('[data-plugin="matchHeight"]').matchHeight(matchHeightOptions);
   });

   //lightbox
   $(function () {
      $('a[rel=lightbox]').lightBox({
         containerResizeSpeed: 250,
         fixedNavigation: true,
         maxHeight: 600,
         maxWidth: 600
      });
   });

   $(function () {
      $("#sign-up").on("hidden.bs.modal", function () {
         $('input').each(function () {
            $(this).val('');
         });
         $('select').each(function () {
            $(this).prop('selectedIndex', 0);
         })
      });
   })
   // list accrodion
   $(function () {
      $('.list-accordion').on('click', '.view-category', function () {
         //alert($(this).data('id'));
         window.location = $baseUrl + '/categories/item/' + $(this).data('id');
      });
   }());
   // select2
   $(function () {
      $('[data-plugin="select2"]').select2();
   }());
   //Month Picker
   $(function () {
      $('[data-plugin="monthPicker"]').datepicker({
         format: "M-yyyy",
         viewMode: "months",
         minViewMode: "months",
         autoclose: true
      });
   }());

   //function show alert
   $(function () {
      if (sign_alert) {
         swal(sign_alert.title, sign_alert.text, sign_alert.type)
      }
   }());

   $("#testimonial-slider").owlCarousel({
      items: 2,
      itemsDesktop: [1000, 2],
      itemsDesktopSmall: [980, 1],
      itemsTablet: [768, 1],
      pagination: true,
      navigation: false,
      navigationText: ['<i class = "fa fa-chevron-left"></i>', '<i class = "fa fa-chevron-right"></i>'],
      autoPlay: true
   });

   $(function (){
      // $('#signup_button').click(function(){
      //    event.preventDefault();
      //    var a = $('.signup-form').serialize();
      //    var name = $(this).find('[name=name]').val();
      //    console.log(name);
      //    console.log('working');
      //    $('#exampleModal').modal('show');
      // });
   });


   $(function () {
      function initcat(x) {
         x.find('.category-select-scroll').slimScroll({
            height: '250'
         });
         x.find('.category-select-scroll> ul').sliderMenu();
         x.find('a:not(".has-child"):not(".slider-menu__back")').on('click', function () {
            x.find('.checked').remove();
            $(this).append('<span class="checked"></span>');
            x.find('.selected_cat').val($(this).data('id'));
         });
      }
      $(function () {
         var c = $('.category-select').outerHTML();
         $('.category-select').each(function(){
            initcat($(this));
         });
         $('.more-categories').click(function (e) {
            e.preventDefault();
            cs = $(c);
            if (cs != '') {
               initcat(cs);
               $('.category-wrapper').append(cs);
            }
            cs = '';
         });
      });
      function a(x){
         function sweetalert(title, text, type) {
            swal({
               title: title,
               text: text,
               type: type,
               showCloseButton: true,
               animation: false,
               customClass: 'animated tada'
            });
         }
         x.find('.file-upload [type=text]').click(function () {
            var t = $(this);
            var f = $(this).parent().find('[type=file]');
            f.trigger('click');
            t.val('');
         });
         x.find('.file-upload [type=file]').on('change', function () {
            t = $(this).parent().find('[type=text]');
            var f = $(this);
            var k = f.val();
            var e = k.split('.');
            var ext = e[e.length - 1];
            if (ext == 'jpg' || ext == 'jpeg' || ext == 'png') {
               var fi = k.split('\\');
               t.val(fi[fi.length - 1]);
            } else {
               f.replaceWith(f.val('').clone(true));
               sweetalert('Oops', 'Only .jpg, .jpeg and .png files are supported.', 'info');
            }

         });
      }
      $(function () {
         var c = $('.coupon').outerHTML();
         // console.log(c);

         $('.more-coupon').click(function (e) {
            e.preventDefault();
            var count = $('.coupon').length;
            cs = $(c);
            if (cs != '') {
               // cs.find('input[type="file"]').attr('name','coupon[]');

               a(cs);
               $('.coupon-wrapper').append(cs);
            }
            count++;
            cs = '';
         });
      });
      $(function () {
         var c = $('.disp').outerHTML();
         // console.log(c);

         $('.more-disp').click(function (e) {
            e.preventDefault();

            cs = $(c);
            if (cs != '') {
               a(cs);
               $('.disp-wrapper').append(cs);
            }
            cs = '';
         });
      });
   });
});





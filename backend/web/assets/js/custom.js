$.fn.outerHTML = function () {
   return $('<clone>').append(this.eq(0).clone()).html();
};
// Geo Location
var geoLocation = document.getElementById("geolocation");

function getLocation() {
   if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition, showError);
   } else {
      geoLocation.innerHTML = "Geolocation is not supported by this browser.";
   }
}

function showPosition(position) {
   document.getElementById("map-latitude").value = position.coords.latitude;
   document.getElementById("map-longitude").value = position.coords.longitude;
}

function showError(error) {
   switch (error.code) {
      case error.PERMISSION_DENIED:
         geoLocation.innerHTML = "User denied the request for Geolocation."
         break;
      case error.POSITION_UNAVAILABLE:
         geoLocation.innerHTML = "Location information is unavailable."
         break;
      case error.TIMEOUT:
         geoLocation.innerHTML = "The request to get user location timed out."
         break;
      case error.UNKNOWN_ERROR:
         geoLocation.innerHTML = "An unknown error occurred."
         break;
   }
}

$(document).ready(function () {


   // Delete Message

   $(document).on('click', '.delete-message', function () {
      var id = $(this).data('id');
      swal({
         title: "Delete Message ?",
         text: "You will not be able to recover the data!",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: '#DD6B55',
         confirmButtonText: 'Yes, I am sure!',
         cancelButtonText: "No, cancel it!",
         closeOnConfirm: true,
         closeOnCancel: true
      }, function (isConfirm) {
         if (isConfirm) {
            if (id > 0) {
               $.ajax({
                  url: baseUrl + "/message/delete",
                  type: 'post',
                  data: {
                     id: id,
                  },
                  success: function (data) {
                     if (data == 'true') {
                        typeAlert('Success', 'Business Deleted form listing. Reloading Page...', 'success');
                        window.setTimeout(function () {
                           location.reload();
                        }, 1000);
                     } else {
                        typeAlert('Error', 'Sorry, Could not delete selected business.', 'error');
                     }
                  },
                  error: function () {
                     typeAlert('Error', 'Sorry, Server error has occurred. ', 'error');
                  }
               });
            }
         }
      });


   });

   // Read Message
   $(function () {
      $('.read-message').click(function (event) {
         event.preventDefault();
         var result = 0;
         var message = {
            'id': $(this).data('message'),
            'name': $(this).parents('tr').find('td').eq(2).html(),
            'email': $(this).parents('tr').find('td').eq(3).html(),
            'subject': $(this).parents('tr').find('td').eq(4).find('.hidden-data').html(),
            'message': $(this).parents('tr').find('td').eq(5).find('.hidden-data').html(),
            'date': $(this).parents('tr').find('td').eq(6).html()
         };


         $('#read-message').modal('show');
         $('#read-message').on('shown.bs.modal', function () {
            //Populate message to modal
            $(this).find('.message-date').html(message.date);
            $(this).find('.message-name').html(message.name);
            $(this).find('.message-email').html(message.email);
            $(this).find('.message-subject').html(message.subject);
            $(this).find('.message-content').html(message.message);

            // Ajax Function for marking message as read.
            if (message.id > 0) {
               $.ajax({
                  url: baseUrl + '/message/readmsg',
                  type: 'POST',
                  data: {id: message.id},
                  success: function (response) {
                     result = $.parseJSON(response);
                  }
               });
            }
         });

         $('#read-message').on('hide.bs.modal', function () {
            if (result == 1) {
               location.reload();
            }
         });

      });
   });


   // Content Slider
   $(function () {

      //    Add More Rows
      $('.add-content-slider-item').click(function () {
         var $sliderContainer = $(this).parents('.content-slider-container');
         var $slider = $sliderContainer.find('.content-slider');
         var counter = $slider.find('.content-slider-item').length;
         var $sliderContent = '<div class="row content-slider-item">' +
               '<input type="hidden" value="" name="contentSlider[' + counter + '][id]">' +
               '<input type="hidden" value="' + $page_id + '" name="contentSlider[' + counter + '][page-id]">' +
               '<div class="form-group col-sm-5">' +
               '<label class="control-label">Title</label>' +
               '<input type="text" value="" class="form-control" name="contentSlider[' + counter + '][title]" placeholder="Title" autocomplete="off">' +
               '</div>' +
               '<div class="form-group col-sm-5">' +
               '<label class="control-label">Subtitle</label>' +
               '<input type="text" value = "" class="form-control" name="contentSlider[' + counter + '][subtitle]" placeholder="Subtitle" autocomplete="off">' +
               '</div>' +
               '<div class="form-group col-sm-2">' +
               '<label class="control-label">&nbsp;</label>' +
               '<a href="javascript:void(0);" class="btn btn-sm form-control delete-content-slider-item"><i class="icon fa-trash icon-left"></i> Delete</a>' +
               '</div>' +
               '</div>';

         $slider.prepend($sliderContent);


      });

      //  Delete Rows
      $(document).on('click', '.delete-content-slider-item', function (e) {
         //e.preventDefault();
         // alert('here');
         id = $(this).data('id');
         $.ajax({
            url: baseUrl + "/websettings/delete-slider-content",
            type: 'post',
            data: {
               id: id,
            },
            success: function (data) {
               if (data == 'true') {
                  typeAlert('Success', 'Data has been saved.', 'success');
               } else {
                  typeAlert('Error', 'Sorry, Data could not be saved.', 'error');
               }
            },
            error: function () {
               typeAlert('Error', 'Sorry, Server error has occurred. ', 'error');
            }
         });
         window.setTimeout(function () {
            location.reload();
         }, 1000);
      });
   });

   //Social Add more
   $('.add-social').click(function () {
      var socialCounter = $('.social-container').find('.item').length;

      var socialHTML = '<div class="row item">' +
            '<div class="form-group col-sm-3">' +
            '<label class="control-label">Icon</label>' +
            '<div class="input-group">' +
            '<span class="input-group-addon"><i class="fa"></i></span>' +
            '<input class="icon-container form-control" type="text" name="social[' + socialCounter + '][icon]" autocomplete="off" class="form-control" placeholder="example : fa-facebook" value="">' +
            '</div>' +
            '</div>' +
            '<div class="form-group col-sm-4">' +
            '<label class="control-label">Type</label>' +
            '<input type="text" class="form-control" name="social[' + socialCounter + '][type]" placeholder="Type" autocomplete="off">' +
            '</div>' +
            '<div class="form-group col-sm-4">' +
            '<label class="control-label">URL</label>' +
            '<input type="text" class="form-control" name="social[' + socialCounter + '][url]" placeholder="URL" autocomplete="off">' +
            '</div>' +
            '<div class="form-group col-sm-1">' +
            '<label class="control-label">&nbsp;</label>' +
            '<a class="btn btn-sm block "><i class="fa fa-times"></i> Delete</a>' +
            '</div>' +
            '</div>';
      $('.social-container').prepend(socialHTML);
      iconchange();
   });

   //social icon-container change
   iconchange();

   function iconchange() {
      $('.icon-container').change(function () {
         var icon = $(this).parents('.input-group').find('span.input-group-addon i');
         icon.removeClass();
         icon.addClass('fa ' + $(this).val());

      });
   }


   // Mark sign-up as viewed
   $(function () {
      $('.mark-viewed').click(function () {
         var id = $(this).data('user');
         $.ajax({
            url: baseUrl + "/client-request/view",
            type: 'post',
            data: {
               id: id,
            },
            success: function (data) {
               console.log(data);
               if (data == 'true') {
                  typeAlert('Success', 'Status set to viewed', 'success');
               } else {
                  typeAlert('Error', 'Sorry, Data could not be saved.', 'error');
               }
            },
            error: function () {
               typeAlert('Error', 'Sorry, Server error has occurred. ', 'error');
            }
         });

      });
   });

   //category
   $(function () {
      function initcat(x) {
         x.find('.category-select-scroll').slimScroll({
            height: '250'
         });
         x.find('.category-select-scroll> ul').sliderMenu();
         x.find('a:not(".has-child"):not(".slider-menu__back")').on('click', function () {
            x.find('.checked').remove();
            $(this).append('<span class="checked"></span>');
            x.children('.selected_cat').val($(this).data('id'));
         });

      }

      $(function () {
         var c = $('.category-select').outerHTML();
         // console.log(c);
         $('.category-select').each(function () {
            initcat($(this));
         });
         $('.more-categories').click(function (e) {

            // $a = $(this).find('.inserted_directory_id');
            // if($a!=''){
            //     $a.val('');
            // }
            e.preventDefault();
            var check = $('.check').data('id');
            console.log(check);
            var l = $('.category-select').length + 1;
            cs = $(c);
            if(check>0){
               cs.find('.inserted_directory_id').val('');
               cs.find('.inserted_directory_id').attr('name', 'business[category][' + l + '][inserted_directory_id]');
               cs.find('.selected_cat').attr('name', 'business[category][' + l + '][inserted_directory_category_id]');
            }

            // cs.find('.inserted_directory_id').attr('name');
            if (cs != '') {
               initcat(cs);
               $('.category-wrapper').append(cs);
            }
            cs = '';
         });
      });
   });


   // Match height
   $(function () {
      matchHeightOptions = {
         byRow: true,
         property: 'height',
         target: null,
         remove: false
      }
      $('[data-plugin="matchHeight"]').matchHeight(matchHeightOptions);
   });


//    Datepicker
   $('.date-picker').datepicker({
      autoclose: true,
      format: "dd-mm-yyyy",
      todayHighlight: true,
      orientation: "bottom"
   });

});

function delRow() {
   $('.del-row').click(function () {
      $(this).parents('.panel-body').find('.row').remove();
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
   var c = $('.disp').outerHTML();
   console.log(c);

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
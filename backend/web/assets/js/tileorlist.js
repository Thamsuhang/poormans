/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//.blocks-xlg-4 blocks-md-3 blocks-sm-2
$(document).ready(function () {
    $(function () {
        function removetilelist(object) {
            var objectUL = object.find('ul.blocks');
            object.removeClass('show-list');
            object.removeClass('show-tile');
            objectUL.removeClass('blocks-xlg-4 blocks-md-3 blocks-sm-2');
            objectUL.removeClass('blocks-xlg-12 blocks-md-12 blocks-sm-12');
        }
//        function getPositionList(object) {
//            object.find('ul.blocks li').each(function () {
//                $(this).attr('data-style', $(this).attr('style'));
//            });
//        }
//        function setPositionList(object) {
//            object.find('ul.blocks li').each(function () {
//                $(this).attr('style', $(this).data('style'));
//            });
//        }

        $(document).on('click', '#show-tile', function (e) {
            e.preventDefault();
            $(this).css('background-color', 'rgba(118,131,143,.1)');
            $('#show-list').css('background-color', '#ffffff');
            var object = $('.tile-list');
           // setPositionList(object);
            removetilelist(object);
            object.find('ul.blocks').addClass('blocks-xlg-4 blocks-md-3 blocks-sm-2');
            object.addClass('show-tile');
            setTimeout(function () {
                $('#tilelist-all').trigger('click');
            }, 300);
        });
        $(document).on('click', '#show-list', function (e) {
            e.preventDefault();
            $(this).css('background-color', 'rgba(118,131,143,.1)');
            $('#show-tile').css('background-color', '#ffffff');
            var object = $('.tile-list');
          //  getPositionList(object);
            removetilelist(object);
            object.find('ul.blocks').addClass('blocks-xlg-12 blocks-md-12 blocks-sm-12');
            object.addClass('show-list');
            setTimeout(function () {
                $('#tilelist-all').trigger('click');
            }, 300);
        });
    });
});



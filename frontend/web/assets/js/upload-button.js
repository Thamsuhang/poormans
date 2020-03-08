$(document).ready(function () {
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
    $('.file-upload [type=text]').click(function () {
        var t = $(this);
        var f = $(this).parent().find('[type=file]');
        f.trigger('click');
        t.val('');
    });
    $('.file-upload [type=file]').on('change', function () {
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

}());
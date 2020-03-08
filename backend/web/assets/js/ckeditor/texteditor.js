/** creates optimized editor with  ckfinder 
 * @param attrib the attibute which is to be replaced by editor
 * @param ckf_url url for ckfinder
 **/
function createCKeditor(attrib,ckf_url){
    var editor = CKEDITOR.replace(attrib,{
        toolbar: [
                { name: 'document', groups: [ 'mode' ], items: [ 'Source']},			// Displays document group with its two subgroups.
                { name: 'basicstyles',groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline'] },
                { name: 'clipboard',groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },			
                { name: 'paragraph',groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
                { name: 'tools', items: [ 'Maximize' ] },
                '/',
                { name: 'styles', items: [ 'Styles', 'Format', 'FontSize' ] },
                { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar'] },
                { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                { name: 'colors', items: [ 'TextColor', 'BGColor' ] }
        ]
    });
    if(typeof ckf_url !== 'undefined'){
        CKFinder.setupCKEditor( editor, ckf_url );
    }
}

/** creates less optimized editor with ckfinder 
 * @param attrib the attibute which is to be replaced by editor
 * @param ckf_url url for ckfinder
 **/
function createSimpleCKeditor(attrib,ckf_url){
    var editor = CKEDITOR.replace(attrib,{
        toolbar: [
                { name: 'document', groups: [ 'mode' ], items: [ 'Source']},			// Displays document group with its two subgroups.
                { name: 'basicstyles',groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline'] },		
                { name: 'paragraph',groups: [ 'list', 'blocks' ], items: [ 'NumberedList', 'BulletedList', '-', 'Blockquote'] },
                { name: 'tools', items: [ 'Maximize' ] },
                '/',
                { name: 'styles', items: [ 'Styles', 'Format', 'FontSize' ] },
                { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar'] },
                { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                { name: 'colors', items: [ 'TextColor', 'BGColor' ] }
        ]
    });
    if(typeof ckf_url !== 'undefined'){
        CKFinder.setupCKEditor( editor, ckf_url );
    }
}

/** creates basic editor without ckfinder 
 * @param attrib the attibute which is to be replaced by editor
 **/
function createBasicCKeditor(attrib,source,enablePara){
    var autoPara = true;
    var toolbars = [
                [ 'Bold', 'Italic' ] ,
		[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ]
	];
    if(typeof source !== 'undefined'){
        toolbars.splice(0,0,['Source']);
    }
    if(typeof enablePara !== 'undefined'){
        autoPara = enablePara;
    }
    CKEDITOR.replace(attrib,{
        height:100,
        autoParagraph:autoPara,
        toolbar: toolbars
     });
}

function check_editor(editor,attrib){
    var editorcontent= editor.getData().replace(/<[^>]*>/gi,'');
    if (editorcontent.length>0){
        $('#ck_error').html("");
        $('#ck_error').hide();
        error=false;
    }
    else{
        $('#ck_error').html(attrib+" cannot be blank.");
        $('#ck_error').show();
        error=true;
    }
}

function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}

function CKdelete(attrib){
    var value = CKEDITOR.instances[attrib];
    if (value) {
        value.destroy();
    }
}
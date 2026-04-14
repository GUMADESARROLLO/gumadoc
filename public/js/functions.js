function isValue(value, def, is_return) {
    if ( $.type(value) == 'null'
        || $.type(value) == 'undefined'
        || $.trim(value) == '(en blanco)'
        || $.trim(value) == ''
        || ($.type(value) == 'number' && !$.isNumeric(value))
        || ($.type(value) == 'array' && value.length == 0)
        || ($.type(value) == 'object' && $.isEmptyObject(value)) ) {
        return ($.type(def) != 'undefined') ? def : false;
    } else {
        return ($.type(is_return) == 'boolean' && is_return === true ? value : true);
    }
}
tinymce.remove('.tinymce_gmDocs');
tinymce.init({
    selector: '.tinymce_gmDocs',
    height: '50vh',
    menubar: false,
    skin: utils.settings.tinymce.theme,
    content_style: ".mce-content-body { color: ".concat(utils.getGrays().black, " }"),
    statusbar: false,
    plugins: 'lists',
    toolbar: 'styleselect | bold italic link bullist numlist image blockquote table media undo redo',
    directionality: utils.getItemFromStore('isRTL') ? 'rtl' : 'ltr',
    theme_advanced_toolbar_align: 'center'
});
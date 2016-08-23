/* Initialize Bootcards. */
bootcards.init( {
    offCanvasBackdrop : true,
    offCanvasHideOnMainClick : true,
    enableTabletPortraitMode : true,
    disableRubberBanding : true,
    disableBreakoutSelector : 'a.no-break-out'
});

/* activate the sub-menu options in the offcanvas menu */
$('.collapse').collapse();

//enable FastClick
$(function() {
	if(typeof(FastClick) !=='undefined')
    	FastClick.attach(document.body);
});


function gravatar(email,size){
	if(typeof(size)=='undefined')
		size=40;
	return "http://www.gravatar.com/avatar/"+md5(email)+"?s="+size+"&d=mm&r=g";
};

function startAjax(){
    window.ajaxspinner=bootbox.dialog({
        size:'small',
        closeButton: false,
        message: '<div style="height:120px"><i class="fa fa-spinner fa-pulse fa-fw fa-3x" style="position: absolute;display: block;top: 40%;left: 43%;"></i></div>'});
    return window.ajaxspinner;
}

function endAjax(){
    if(window.ajaxspinner != 'undefined' && window.ajaxspinner !=null)
        window.ajaxspinner.modal('hide');
}

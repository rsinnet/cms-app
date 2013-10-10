$(document).ready(function() {
    $.each($('.article_draggable'), function (index, obj) {
	$(obj).draggable({
            revert : function(event, ui) {
		// on older version of jQuery use "draggable"
		// $(this).data("draggable")
		// on 2.x versions of jQuery use "ui-draggable"
		// $(this).data("ui-draggable")
		$(this).data("uiDraggable").originalPosition = {
                    top : 0,
                    left : 0
		};
		// return boolean
		return !event;
		// that evaluate like this:
		// return event !== false ? false : true;
            }
	});
    });
});

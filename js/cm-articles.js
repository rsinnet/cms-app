$(document).ready(function() {
    $.each($('.article_draggable'), function (index, obj) {
	$(obj).draggable({
            revert : true
	});
    });
    $('#edit_droppable').droppable({
	drop : function(event, ui) {
	    $(ui.draggable).data('dropped', true);
	    var id = $(ui.draggable).children('#resource_id').text();
	    var request = $.getJSON("cgi-bin/cm_get_article_metadata.py",
				    {"id": id})
		.done(function(data) {
		    $.each(data, function(key, val) {
			setEditField(key, val);
		    });
		});
	}
    });
});

// Sets the appropriate edit field.
function setEditField(key, val)
{
    switch (key.toLowerCase()) {
    case "title":
	$("#edit_titleta").val(val);
	break;
    case "subtitle":
	$("#edit_subtitleta").val(val);
	break;
    case "date":
	$("#edit_datetf").val(val);
	break;
    case "topic":
	$("#edit_topicselect").val(val);
	break;
    case "id":
	$("#edit_resource_id").val(val);
	break;
    case "article_id":
	$("#edit_article_id").val(val);
	break;
    }
}
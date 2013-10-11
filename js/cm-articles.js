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
    case "resource_id":
	$("#edit_resource_id").val(val);
	break;
    case "article_id":
	$("#edit_article_id").val(val);
	break;
    }
}

$(document).ready(function() {
    $.each($('.article_draggable'), function (index, obj) {
	$(obj).draggable({
            revert : true
	});
    });
    $('#edit_droppable').droppable({
	drop : function(event, ui) {
	    $(ui.draggable).data('dropped', true);
	    var resource_id = $(ui.draggable).children('#resource_id').text();
	    var request = $.getJSON("cgi-bin/cm_get_article_metadata.py",
				    {"resource_id": resource_id})
		.done(function(data) {
		    $.each(data, function(key, val) {
			setEditField(key, val);
		    });
		});
	}
    });

    $("#submitbutton").submit(function(){
	update_button_state($("#submitbutton"), false);
	update_tr_state($("#submittr"), false);
    });

    $("#titleta").change(function(){
	update_tr_state($("#titletr"), $(this).val() == "");
    });

    $("#subtitleta").change(function(){
	update_tr_state($("#subtitletr"), $(this).val() == "");
    });

    $("#inputFile").change(function(){
	update_tr_state($("#addarticle_table"), false);
	update_tr_state($("#filetr"), $(this).val() == "");
	update_tr_state($("#submittr"), $(this).val() == "");
	update_button_state($("#submitbutton"), $(this).val() != "")
	var ext = get_file_extension($(this).val());
	$("#extensiontf").val(ext);
	update_tr_state($("#extensiontr"), ext == "");
	$("input[name='extension']:hidden").val(ext);
    });

});


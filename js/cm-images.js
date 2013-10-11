function clear_form()
{
    $("#inputFile").val('');
    $("#extensiontf").val('');
    update_button_state($("#submitbutton"), false);
    update_tr_state($("#titletr"), $("#titleta").val() == "");
    update_tr_state($("#locationtr"), $("#locationta").val() == "");
    update_tr_state($("#attributiontr"), $("#attributionta").val() == "");
}

$(document).ready(function() {
    clear_form();

    $("#submitbutton").submit(function(){
	update_button_state($("#submitbutton"), false);
	update_tr_state($("#submittr"), false);
    });

    $("#titleta").change(function(){
	update_tr_state($("#titletr"), $(this).val() == "");
    });

    $("#locationta").change(function(){
	update_tr_state($("#locationtr"), $(this).val() == "");
    });

    $("#attributionta").change(function(){
	update_tr_state($("#attributiontr"), $(this).val() == "");
    });

    $("#inputFile").change(function(){
	update_tr_state($("#addimage_table"), false);
	update_tr_state($("#filetr"), $(this).val() == "");
	update_tr_state($("#submittr"), $(this).val() == "");
	update_button_state($("#submitbutton"), $(this).val() != "")
	var ext = get_file_extension($(this).val());
	$("#extensiontf").val(ext);
	update_tr_state($("#extensiontr"), ext == "");
	$("input[name='extension']:hidden").val(ext);
    });
});
function allowDrop(ev)
{
    ev.preventDefault();
}

function drag(ev)
{
    ev.dataTransfer.setData("Text", extractIdFromResourceFileName(ev.target.src));
}

function drop(ev)
{
    ev.preventDefault();
    id = ev.dataTransfer.getData("Text");
    var request = $.getJSON("cgi-bin/cm_get_image_metadata.py",
			    {"id": id})
	.done(function(data) {
	    $.each(data, function(key, val) {
		setEditField(key, val);
	    });
	});
    //ev.target.appendChild(document.getElementById(ev.dataTransfer.getData("Text")));
}

// Sets the appropriate edit field.
function setEditField(key, val)
{
    switch (key.toLowerCase()) {
    case "attribution":
	$("#edit_attributionta").val(val);
	break;
    case "extension":
	$("#edit_extensiontf").val(val);
	break;
    case "location":
	$("#edit_locationta").val(val);
	break;
    case "title":
	$("#edit_titleta").val(val);
	break;
    }
}
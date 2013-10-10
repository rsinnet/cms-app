function get_file_extension(file_name) {
    foo = file_name.split('.');
    var l = foo.length;
    if (l > 1)
	return foo[l-1];
    else
	return "";
}

function update_tr_state(trObj, state)
{
    if (state)
	trObj.attr("class", "bgdisabled");
    else
	trObj.attr("class", "bgenabled");
}

function update_button_state(buttonObj, state)
{
    if (state)
	buttonObj.removeAttr("disabled");
    else
	buttonObj.attr("disabled", "");
}

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

function extractIdFromResourceFileName(filename)
{
    // Extract the 40 character resource id from the filename.
    var foo = filename.match(/\/resources\/([0-9a-f]{40})\./);
    return foo[1];
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

// Loads an image into the image editor, i.e., after drag and drop.
function loadEditImageAjax()
{ }

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
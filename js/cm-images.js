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
    update_button_state($("#submitbutton"), false);
    update_tr_state($("#titletr"), $("#titleta").val() == "");
    update_tr_state($("#locationtr"), $("#locationta").val() == "");
    update_tr_state($("#attributiontr"), $("#attributionta").val() == "");
}

$("#submitbutton").submit(function(){
    update_button_state($("submitbutton"), false);
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
    //alert($("#filetr"))
    update_tr_state($("#filetr"), $(this).val() == "");
    update_tr_state($("#submittr"), $(this).val() == "");
    update_button_state($("#submitbutton"), $(this).val() != "")
    var ext = get_file_extension($(this).val());
    $("#extensionCell").html(ext);
    update_tr_state($("#extensiontr"), ext == "");
    $("input[name='extension']:hidden").val(ext);
});

$(document).ready(function(){
    clear_form();
});
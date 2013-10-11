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

function extractIdFromResourceFileName(filename)
{
    // Extract the 40 character resource id from the filename.
    var foo = filename.match(/\/resources\/([0-9a-f]{40})\./);
    return foo[1];
}

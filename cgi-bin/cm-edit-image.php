<form name="editform" method="POST" action="cgi-bin/add-image.py" enctype="multipart/form-data">
  <style>
    td { padding: 5px;}
  </style>
  <script>
    
    $("#droppable").droppable({
    drop: function(event, ui) {
    alert("sdhf");
    }
    });
  </script>
  <table class="bgdisabled">
    <tr id="edit_imagetr" class="bgdisabled">
      <td class="mvalign" style="text-align: center;" colspan="2" id="droppable">
	No image selected. Drag image here to edit.
      </td>
    </tr>
    <tr id="edit_titletr">
      <td class="mvalign">Title</td>
      <td><textarea name="title" id="edit_titleta" class="resourcetextarea"></textarea></td>
    </tr>
    <tr id="edit_locationtr">
      <td class="mvalign">Location</td>
      <td><textarea name="location" id="edit_locationta" class="resourcetextarea"></textarea></td>
    </tr>
    <tr id="edit_attributiontr">
      <td class="mvalign">Attribution</td>
      <td>
	<textarea name="attribution" id="edit_attributionta" class="resourcetextarea"></textarea>
      </td>
    </tr>
    <tr id="edit_extensiontr">
      <td>Extension</td>
      <td><input name="extension" id="edit_extensiontf" class="resourcetextfield">
      </td>
    </tr>
    <tr id="edit_submittr">
      <td colspan="2" class="mvalign" style="text-align: center;">
	<input id="edit_submitbutton" type="submit" value="Update Record"/>
      </td>
    </tr>
  </table>
</form>

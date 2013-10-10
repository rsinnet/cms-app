<form name="editform" method="POST" action="cgi-bin/cm_update_image_metadata.py" enctype="multipart/form-data">
  <table style="background-color: #E6E1C5; border-radius: 8px;"
	 ondrop="drop(event)"
	 ondragover="allowDrop(event)">
    <tr><td>&nbsp;</td></tr>
    <tr id="edit_imagetr">
      <td class="mvalign cmtdforms"
	  style="text-align: center;"
	  colspan="2"/>
	No image selected. Drag image here to edit.
      </td>
    </tr>
    <tr id="edit_titletr">
      <td class="mvalign cmtdforms">Title</td>
      <td class="cmtdforms"><textarea name="title" id="edit_titleta" class="resourcetextarea"></textarea></td>
    </tr>
    <tr id="edit_locationtr">
      <td class="mvalign cmtdforms">Location</td>
      <td class="cmtdforms"><textarea name="location" id="edit_locationta" class="resourcetextarea"></textarea></td>
    </tr>
    <tr id="edit_attributiontr">
      <td class="mvalign cmtdforms">Attribution</td>
      <td class="cmtdforms">
	<textarea name="attribution" id="edit_attributionta" class="resourcetextarea"></textarea>
      </td>
    </tr>
    <tr id="edit_extensiontr">
      <td class="cmtdforms">Extension</td>
      <td clas="cmtdforms"><input name="extension" id="edit_extensiontf" class="resourcetextfield">
      </td>
    </tr>
    <tr id="edit_submittr">
      <td colspan="2" class="mvalign cmtdforms" style="text-align: center;">
	<input id="edit_submitbutton" type="submit" value="Update Record"/>
      </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
  </table>
</form>

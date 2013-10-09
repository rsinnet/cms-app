<form method="POST" action="cgi-bin/add-image.py" enctype="multipart/form-data">
  <style>
  </style>
  <table>
    <tr id="filetr" class="bgdisabled">
      <td class="mvalign cmtdforms">Upload Image</td>
      <td style="text-align: center" class="cmtdforms">
	<input type="file" name="file" id="inputFile"/>
      </td>
    </tr>
    <tr id="titletr" class="bgdisabled">
      <td class="mvalign cmtdforms">Title</td>
      <td class="cmtdforms"><textarea name="title" id="titleta" class="resourcetextarea"></textarea></td>
    </tr>
    <tr id="locationtr" class="bgdisabled">
      <td class="mvalign cmtdforms">Location</td>
      <td class="cmtdforms"><textarea name="location" id="locationta" class="resourcetextarea"></textarea></td>
    </tr>
    <tr id="attributiontr" class="bgdisabled">
      <td class="mvalign cmtdforms">Attribution</td>
      <td class="cmtdforms">
	<textarea name="attribution" id="attributionta" class="resourcetextarea"></textarea>
      </td>
    </tr>
    <tr id="extensiontr" class="bgdisabled">
      <td class="cmtdforms">Extension</td>
      <td id="extensionCell" class="cmtdforms"></td>
    </tr>
    <tr id="submittr" class="bgdisabled">
      <td colspan="2" class="mvalign cmtdforms" style="text-align: center;">
	<input id="submitbutton" type="submit" value="Add Record"/>
      </td>
    </tr>
  </table>
  <input type="hidden" name="extension" id="extension"/>
</form>

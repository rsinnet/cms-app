<form method="POST" action="cgi-bin/cm_add_article.py" enctype="multipart/form-data">
  <table id="addarticle_table" style="border-radius: 8px;" class="bgdisabled">
    <tr><td>&nbsp;</td></tr>
    <tr id="filetr" class="bgdisabled">
      <td class="mvalign cmtdforms">Upload Article</td>
      <td style="text-align: center" class="cmtdforms">
	<input type="file" name="file" id="inputFile"/>
      </td>
    </tr>
    <tr id="titletr" class="bgdisabled">
      <td class="mvalign cmtdforms">Title</td>
      <td class="cmtdforms"><textarea name="title" id="titleta" class="resourcetextarea"></textarea></td>
    </tr>
    <tr id="subtitletr" class="bgdisabled">
      <td class="mvalign cmtdforms">Subtitle</td>
      <td class="cmtdforms"><textarea name="subtitle" id="subtitleta" class="resourcetextarea"></textarea></td>
    </tr>
    <tr id="topictr" class="bgenabled">
      <td class="mvalign cmtdforms">Primary Topic</td>
      <td class="cmtdforms">
	<select name="topic" id="topicselect">
	  <?php
   	    foreach($topics_list as $topic)
	    {
	      echo "<option>" . $topic . "</option>";
	    }
	  ?>
	</select>
      </td>
    </tr>
    <tr id="extensiontr" class="bgdisabled">
      <td class="cmtdforms">Extension</td>
      <td class="cmtdforms">
	<input name="extension" id="extensiontf" type="text" class="resourcetextfield"></input>
      </td>
    </tr>

    <tr id="submittr" class="bgdisabled">
      <td colspan="2" class="mvalign cmtdforms" style="text-align: center;">
	<input id="submitbutton" type="submit" value="Add Record"/>
      </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
  </table>
</form>

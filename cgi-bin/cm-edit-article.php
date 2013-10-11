<?php
  include '.include/utilities.php';
  
  $dbuser = 'rsinnet_webuser';
  $dbpass = 'Z?Z07uwL#(4g';
  
  $con = mysqli_connect("localhost", $dbuser, $dbpass, "rsinnet_iamphilosopher");
  if (mysqli_connect_errno())
    {
      echo "Failed to connect: " . mysqli_connect_error();
      //redirect to error page.
      echo "<script language=\"text/javascript\">window.location = 'errors/404.html';</script>";
    }
  
  $sql_query = "SELECT name FROM topics ORDER BY name ASC";
  $result = $con->query($sql_query);
  
  while ($row = $result->fetch_array())
    {
      $topics_list[] = $row['name'];
    }
?>
<div id="edit_droppable">
  <form name="editform" method="POST" action="cgi-bin/cm_update_article_metadata.py" enctype="multipart/form-data">
    <table style="background-color: #E6E1C5; border-radius: 8px;">
      <tr><td>&nbsp;</td></tr>
      <tr id="edit_imagetr">
	<td class="mvlign cmtdforms" style="text-align: center;" colspan="2">
	  No article selected. Drag article here to edit.
	</td>
      </tr>
      <tr id="edit_titletr">
	<td class="mvalign cmtdforms">Title</td>
	<td class="cmtdforms"><textarea name="title" id="edit_titleta" class="resourcetextarea"></textarea></td>
      </tr>
      <tr id="edit_subtitletr">
	<td class="mvalign cmtdforms">Subtitle</td>
	<td class="cmtdforms"><textarea name="title" id="edit_subtitleta" class="resourcetextarea"></textarea></td>
      </tr>
      <tr id="edit_datetr">
	<td class="mvalign cmtdforms">Date</td>
	<td class="cmtdforms"><input name="date" id="edit_datetf" class="resourcetextfield"/></td>
      </tr>
      <tr id="edit_topictr">
	<td class="mvalign cmtdforms">Primary Topic</td>
	<td class="cmtdforms">
	  <select id="edit_topicselect">
	    <?php
    	      foreach($topics_list as $topic)
	      {
		echo "<option>" . $topic . "</option>";
	      }
	    ?>
	  </select>
	  <tr id="edit_submittr">
	    <td colspan="2" class="mvalign cmtdforms" style="text-align: center;">
	      <input id="edit_submitbutton" type="submit" value="Update Record"/>
	    </td>
	  </tr>
	  <tr><td>&nbsp;</td></tr>
    </table>
    <input name="resource_id" type="hidden"/>
    <input name="article_id" type="hidden"/>
  </form>
</div>

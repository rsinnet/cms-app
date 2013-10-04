<span class="image image-full">
  <img src=".articles/images/<?php echo $foo_image_id; ?>.jpg" alt="" />
  <p><?php
    $foo_article_id=1;
    $con->query("SELECT SELECT * FROM articles_resources_graph WHERE $foo_article_id=1;

    SELECT * FROM resources WHERE id=(SELECT resource2_id FROM resources_graph WHERE
    resource1_id=(SELECT resource_id FROM articles_resources_graph WHERE article_id=".$foo_article_id."))
    AND resource_type_id=(SELECT id FROM resource_types WHERE type="Image")

    SELECT * FROM resources WHERE id=(SELECT resource1_id FROM resources_graph WHERE
    resource2_id=(SELECT resource_id FROM articles_resources_graph WHERE article_id=1))
    AND resource_type_id=(SELECT id FROM resource_types WHERE type="Attribution");
  ?></p>
</span>

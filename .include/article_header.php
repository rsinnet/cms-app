<header>
  <h2><?php
  $foo = isset($article_id) ? $foo_article_title
   : "<a href='article.php?id=".$foo_article_id."'>".$foo_article_title."</a>";
  echo $foo;
  ?></h2>
  <span class="byline"><?php echo $foo_article_subtitle; ?></span>
  <ul class="meta">
    <li class="timestamp"><?php echo $foo_article_age; ?></li>
    <!--<li class="comments"><a href="#">*</a></li>-->
  </ul>
</header>

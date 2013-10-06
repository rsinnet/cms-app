<article class="is-page-content">
<?php
  include '.include/article_header.php';
  echo getFirstParagraph($foo_article_blog_file);
?>
<section>
  <span style="position:relative;display:inline-block;top:-3em;">
    <a class="button" href="article.php?id=<?php echo $foo_article_id; ?>">
      Continue Reading
    </a>
  </span>
</section>
</article>

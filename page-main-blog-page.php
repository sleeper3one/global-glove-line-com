<?php
/*
        Template Name: Blog Main Page
*/
?>

<?php get_header(); ?>

<div class="post-page blog-page">

 <div class="top-line blog-top-line">
  <span class="top-left"><a href="/blog">All entries</a></span>
  <span class="top-center">Information on general topics of nitril gloves can be found here.</span>
  <span class="top-right"><?php get_search_form(); ?></span>
 </div>

 <?php the_content(); ?>

</div>

<?php get_footer(); ?>
<?php
/*
        Template Name: Blog Under Construction
*/
?>

<?php get_header();

the_post(); ?>

<div class="container pagepx blog">
 <div class="row blog-navbar">
  <span class="col-lg-3 blog-navi-link">
   <a href="">All articles</a>
  </span>
  <span class="col-lg-3 blog-search">

   <div class="search">
    <form action="/" method="get">
     <input type="text" class="fontAwesome" placeholder="" name="s" id="search" value="<?php the_search_query(); ?>" />
    </form>
   </div>

  </span>
 </div>

 <div class="the-content">
  <?php the_content(); ?>
 </div>

</div>

<?php get_footer(); ?>
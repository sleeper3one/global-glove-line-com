<?php
/*
        Template Name: Post type PAGE
    */
?>

<?php get_header(); ?>

<div class="post-page">

 <div class="top-line">
  <span class="top-left"><a href="/blog">All entries</a></span><span
   class="top-right"><?php get_search_form(); ?></span>
 </div>

 <div class="post-content">

  <h1 class="post-header"><?php the_title(); ?></h1>
  <p class="post-date"><?php the_date(); ?></p>

  <hr class="under-post-head-hr">

  <div class="content-of-post ">
   <?php the_content(); ?>
  </div>

 </div>
 <div class="above-related">
  <span class="top-left">Current posts</span><span class="top-right"><a href="/blog">All posts</a></span>
 </div>

 <div class="related-posts">

  <?php
    $the_query = new WP_Query(array(
      'author_name' => 'patrick',
      'posts_per_page' => 3,
      'post_type' => 'page'
    ));
    ?>
  <?php if ($the_query->have_posts()) : ?>
  <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

  <div class="single-related">
   <a href="<?php the_permalink(); ?>"><img
     src="<?php echo get_the_post_thumbnail_url($termposts[0]->ID, 'medium'); ?>"></a>
   <h3><a class="related-links" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  </div>

  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>


  <?php else : ?>
  <p><?php __('No News'); ?></p>

  <?php endif; ?>
 </div>


</div>

<div class="comments-section">
 <?php comments_template(); ?>
</div>

</div>

<?php get_footer(); ?>
<?php defined( 'ABSPATH' ) || exit; ?>

<?php get_header(); ?>
<?php woocommerce_content(); ?>


<div class="container pagepx">

	<div class="row">
		<h4 class="shop-header">OUR PRODUCTS</h4>
	</div>
    
	<div class="shop-categories pagepx row">

	<?php
   		$parent_category_ID = $category->term_id;
   		$args = array(
			'hierarchical' => 1,
			'show_option_none' => '',
			'hide_empty' => 1,
			'parent' => $parent_category_ID,
			'taxonomy' => 'product_cat',
			'order' => 'DSC',
			'orderby' => 'name'
   		);
   		
		$subcategories = get_categories($args);
   			
			
   				
				foreach ($subcategories as $subcategory) {
	   			$link = get_term_link( $subcategory->slug, $subcategory->taxonomy );
	   				echo '<a class="subcat-link" href="'. $link .'"><button class="subcat-button">'.$subcategory->name.'</button></a>';
   				}		
	?>

	</div>
	<div class="space"></div>
</div>

<?php get_footer(); ?>
<?php defined( 'ABSPATH' ) || exit; ?>

<div class="pagepx blog container">
	<div class="product-page">
	<div class="row next-prev">
		<?php prev_next_product(); ?>
	</div>
	<div class="row">
		<?php the_title( '<h1 class="product-title">', '</h1>' ); ?>
	</div>

	<div class="row">
	<div class="col-lg-7">
			<img src="<?php the_post_thumbnail_url('glove-thumb'); ?>" alt="<?php the_title(); ?>" class='product_page-photo'>
		</div>
		<div class="col-lg-5">
			<div class="product-description">
			<p><?php echo apply_filters( 'the_content', get_post_field('post_content', $product_id) ); ?></p>
				
			</div>
		</div>
		
	</div>

	<div class="row product-description">
		<div class="col-lg-7 short-desc">
    	</div>

		<div class="col-lg-4 pad40b">
		 	<a href="/gloves/inquiry-form"><button class="product_page-button">To the inquiry form</button></a>	
		</div>
	</div>

	<div class="row">
		<div class="accordion-part">
			<button id="feat" class="accordion">FEATURES</button>
			<div class="panel p-dark">
				<p><?php global $product; echo wc_display_product_attributes( $product ); ?></p>
			</div>

			<button id="cert" class="accordion">CERTIFICATION</button>
			<div class="panel p-dark bottom">
				<p><?php the_field('certification'); ?></p>
			</div>

			<button id="time" class="accordion">DELIVERY TIME</button>
			<div class="panel p-dark bottom">
				<p><?php the_field('delivery-time'); ?></p>
			</div>

			<button id="info" class="accordion">PRODUCT INFORMATION</button>
			<div class="panel p-dark pad40b">
				<?php the_excerpt(); ?>
			</div>

			<button id="sop" class="accordion">SOP</button>
			<div class="panel p-dark">
				<p><?php the_field('sop'); ?></p>	
			</div>
		</div>
	</div>
	
	</div>
</div>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");

        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
        panel.style.display = "none";
        } else {
        panel.style.display = "block";
        }
    });
    }
    </script>

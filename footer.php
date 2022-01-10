<?php wp_footer(); ?>

    <div class="row">

    <div class="col-lg-5 footbar">
        
        <?php 
            wp_nav_menu( array(
                'theme_location' => 'footer-menu',
                'depth' => 2,
                'container' => false,
                'menu_class' => 'navbar',
                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                'walker' => new WP_Bootstrap_Navwalker()
            ) );
        ?> 
        
    </div>
    </div>
    <div class="row">
        <span class="footer-credits col-lg-5">© 2021 by ProducingLine.com</span>
    </div>
    </body>
</html>
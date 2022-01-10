<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">   
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Questrial&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="/wp-content/themes/glov/css/boot.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>  
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <header>
        <div id="main_navbar" class="navbar navbar-expand-md navbar-light">
    
            <a class="navbar-brand" href="#"> <?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerNav" aria-controls="headerNav" 
            aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'best-reloaded' ); ?>">
                <span class="navbar-toggler-icon"></span><span class="sr-only"><?php esc_html_e( 'Header Menu', 'Glov' ); ?></span>
            </button>
            
            <nav class="collapse navbar-collapse" id="headerNav" role="navigation" aria-label="Header Menu">
            
                <span class="sr-only"><?php esc_html_e( 'Header Menu', 'Glov' ); ?></span>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'header-menu',
                        'depth' => 2,
                        'container' => false,
                        'menu_class' => 'navbar-nav mr-auto',
                        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                        'walker' => new WP_Bootstrap_Navwalker()
                    ) );
                ?>

                <div class="language-menu nav-item dropdown">
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
      
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    EN
                                </a>
        
                                <div class="dropdown-menu lang" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="https://globalgloveline.com">DE</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="menu-info">
                    Tel: +48 539330803 (opening hours: Mon-Fri, 8 a.m. - 4 p.m.)<br>
                    Email: Piotr@Producingline.com
                </div>
        
            </nav>
  
        </div>

        <div class="row">
        
            <div class="shop-menu navbar fa">
                <a href="/login" class="button"> 
                    <span><i class="fas fa-user-circle"></i></span>
                    <span class="txt">
                        <?php wp_nav_menu( array( 'theme_location' => 'shop-menu' ) ); ?>
                    </span>
                </a>    
            </div>
        </div>

        <div id="facebook_slider_widget" style="display: none">
		<script type="text/javascript" src="http://webfrik.pl/widget/facebook_slider.html?fb_url=https://www.facebook.com/Global-Glove-Line-102798935134742&amp;fb_width=290&amp;fb_height=590&amp;fb_faces=true&amp;fb_stream=true&amp;fb_header=true&amp;fb_border=true&amp;fb_theme=light&amp;chx=787&amp;speed=SLOW&amp;fb_pic=logo&amp;position=LEFT">
		</script>
	</div>
    </header>

 

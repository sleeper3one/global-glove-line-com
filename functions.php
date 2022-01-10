<?php

// Ładowanie styli
function load_stylesheets() {
    wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',
        array(), false, 'all' );
    wp_enqueue_style( 'bootstrap');

    wp_register_style( 'style', get_template_directory_uri() . '/style.css',
        array(), false, 'all' );
    wp_enqueue_style( 'style');

    wp_register_style( 'style', get_template_directory_uri() . '/reg.css',
        array(), false, 'all' );
    wp_enqueue_style( 'reg');
}
add_action( 'wp_enqueue_scripts', 'load_stylesheets' );


// Ładowanie jQuery i skryptów
function include_jquery() {
    wp_deregister_script( 'jquery' );

    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.5.1.min.js', '', 1, true );
}
add_action( 'wp_enqueue_scripts', 'include_jquery' );

function loadjs() {
    wp_register_script( 'customjs', get_template_directory_uri() . '/js/script.js', '', 1, true );
    wp_enqueue_script( 'customjs' );
}
add_action( 'wp_enqueue_scripts', 'loadjs' );

// Bootstrapowe menu
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

// Theme support
add_theme_support( 'custom-logo' );
add_theme_support( 'custom-background' );
add_theme_support( 'block-templates' );

// Menu
add_theme_support( 'menus' );

function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu', 'Glov' ),
        'language'    => __( 'Language Menu', 'Glov' ),
        'shop-menu'   => __( 'Shop Menu', 'Glov' ),
        'footer-menu' => __( 'Footer Menu', 'Glov' )
       )
     );
   }
add_action( 'after_setup_theme', 'register_my_menus' );

// Wsparcie Woocommerce
function sleepyeye_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
add_theme_support( 'custom-logo' );
add_theme_support( 'custom-background' );
add_theme_support( 'block-templates' );

 
}
add_action( 'after_setup_theme', 'sleepyeye_add_woocommerce_support' );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_no_products_found', 'wc_no_products_found' );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart');

add_action( 'pre_get_posts', 'remove_products_from_shop_page' );

function remove_products_from_shop_page( $q ) {
   if ( ! $q->is_main_query() ) return;
   if ( ! $q->is_post_type_archive() ) return;
   if ( ! is_admin() && is_shop() ) {
      $q->set( 'post__in', array(0) );
   }
   remove_action( 'pre_get_posts', 'remove_products_from_shop_page' );

}

add_image_size( 'glove-thumb', 400, 400, true );

// Przyciski do przewijania produktów
add_action( 'woocommerce_before_single_product', 'prev_next_product' ); 
 
function prev_next_product(){
 
echo '<div class="prev_next_buttons">';
 
    $previous = next_post_link('%link', '&larr; PREV', TRUE, ' ', 'product_cat');
    $next = previous_post_link('%link', 'NEXT &rarr;', TRUE, ' ', 'product_cat');
 
    echo $previous;
    echo $next;
    
echo '</div>';
         
}

// Logowanie
function logowanie(){
    global $user_ID;
    global $wpdb;
    if( is_page('login') && isset($_POST["loginUsername"]) ){
    $username = $wpdb->escape($_POST["loginUsername"]);
    $password = $wpdb->escape($_POST["loginPassword"]);
    $login_array = array();
    $login_array["user_login"] = $username;
    $login_array["user_password"] = $password;
    $verify_user = wp_signon($login_array, true);
    if(!is_wp_error($verify_user)){
    wp_redirect( home_url()."/download" );
    if (current_user_can( 'subscriber' )){
        add_filter('show_admin_bar','__return_false');
     }
    } else{
    wp_redirect( home_url()."/login/?error" );
    }
    }
    }
    add_action('template_redirect', 'logowanie');

function private_for_subscribers(){
    $subRole = get_role( 'subscriber' );
    $subRole->add_cap( 'read_private_posts' );
    $subRole->add_cap( 'read_private_pages' );
}
add_action( 'init', 'private_for_subscribers' );

// Dodatkowe pola w profilu użytkownika
/*
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
<h3><?php _e("Extra profile information", "blank"); ?></h3>

<table class="form-table">
<tr>
<th><label for="company"><?php _e("Company details"); ?></label></th>
<td>
<input type="text" name="address" id="company" value="<?php echo esc_attr( get_the_author_meta( 'company', $user->ID ) ); ?>" class="regular-text" /><br />
</td>
</tr>

</table>
<?php }

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {

if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

update_user_meta( $user_id, 'company', $_POST['company'] );

}


*/







// user registration login form
function vicode_registration_form() {
 
	// only show the registration form to non-logged-in members
	if(!is_user_logged_in()) {
 
		// check if registration is enabled
		$registration_enabled = get_option('users_can_register');
 
		// if enabled
		if($registration_enabled) {
			$output = vicode_registration_fields();
		} else {
			$output = __('User registration is not enabled');
		}
		return $output;
	}
}
add_shortcode('register_form', 'vicode_registration_form');

// registration form fields
function vicode_registration_fields() {
	
	ob_start(); ?>	
		
		<?php 
		// show any error messages after form submission
		vicode_register_messages(); ?>

        <div class="reg-plate">
            <div class="reg-head">
                <h4>Log in to see current prices</h4>
                <h2>Registration</h2>
            </div>
		
		    <form id="vicode_registration_form" class="vicode_form reg-form" action="" method="POST">
			
                <div class="line-one">
                    <input name="vicode_user_first" placeholder="First Name" id="vicode_user_first" type="text" class="vicode_user_first" />
                    <input name="vicode_user_last" placeholder="Last Name" id="vicode_user_last" type="text" class="vicode_user_last"/>
                </div>

                <div class="line-one-plus">
                    <input name="vicode_user_login" placeholder="Company" id="vicode_user_login" class="vicode_user_login" type="text"/>
                    <input name="vicode_user_email" placeholder="E-mail" id="vicode_user_email" class="vicode_user_email" type="email"/>
                </div>

                <div class="line-two">
                    <input name="vicode_user_pass" placeholder="Passowrd" id="password" class="password" type="password"/>
                    <input name="vicode_user_pass_confirm" placeholder="Password Again" id="password_again" class="password_again" type="password"/>
                </div>

                <div class="line-two">
                    <label for="question">How did you find our company?</label>
                    <textarea required="required" name="question" id="question" placeholder="(via database – please advise which database e.g. europages, go4worldbusiness etc., internet - Google, recommendation, other)"></textarea>
                </div>
                
                <div class="line-three">
                    <input type="checkbox" name="approve" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms & Condition' : '');" required>
                    <label for="approve" class="approve">I agree with the <a href="/imprint/">terms</a> of the website.</label><br>
		    <label class="approve"><input type="checkbox" name="newsletter"> Subscribe our newsletter</label>
                </div>	

                <input type="hidden" name="vicode_csrf" value="<?php echo wp_create_nonce('vicode-csrf'); ?>"/>
                <input type="submit" value="<?php _e('Register'); ?>"/>
            
    		</form>
        
        <div class="redirect">
            <p>Are you already a member? Please <a href="/login/">LOGIN</a></p>
        </div>

   </div>

	<?php
	return ob_get_clean();
}

// register a new user
function vicode_add_new_user() {
    if (isset( $_POST["vicode_user_login"] ) && wp_verify_nonce($_POST['vicode_csrf'], 'vicode-csrf')) {
      $user_login		= $_POST["vicode_user_login"];	
      $user_email		= $_POST["vicode_user_email"];
      $user_first 	    = $_POST["vicode_user_first"];
      $user_last	 	= $_POST["vicode_user_last"];
      $user_question    = $_POST["question"];
      $user_pass		= $_POST["vicode_user_pass"];
      $pass_confirm 	= $_POST["vicode_user_pass_confirm"];
      
      
      // this is required for username checks
      require_once(ABSPATH . WPINC . '/registration.php');
      
      
      if(!validate_username($user_login)) {
          // invalid username
          vicode_errors()->add('username_invalid', __('Invalid username'));
      }
      if($user_login == '') {
          // empty username
          vicode_errors()->add('username_empty', __('Please enter a username'));
      }
      if(!is_email($user_email)) {
          //invalid email
          vicode_errors()->add('email_invalid', __('Invalid email'));
      }
      if(email_exists($user_email)) {
          //Email address already registered
          vicode_errors()->add('email_used', __('Email already registered'));
      }
      if($user_pass == '') {
          // passwords do not match
          vicode_errors()->add('password_empty', __('Please enter a password'));
      }
      if($user_pass != $pass_confirm) {
          // passwords do not match
          vicode_errors()->add('password_mismatch', __('Passwords do not match'));
      }
      
      $errors = vicode_errors()->get_error_messages();
      
      // if no errors then cretate user
      if(empty($errors)) {
          
          $new_user_id = wp_insert_user(array(
                  'user_login'		=> $user_login,
                  'user_pass'	 		=> $user_pass,
                  'user_email'		=> $user_email,
                  'first_name'		=> $user_first,
                  'last_name'			=> $user_last,
                  'description'       => $user_question,
                  'user_registered'	=> date('Y-m-d H:i:s'),
                  'role'				=> 'subscriber'
              )
          );
          if($new_user_id) {
              // send an email to the admin
              wp_new_user_notification($new_user_id);
              
              // log the new user in
              echo '<script>alert("We have registered the application to create an account, please wait for it`s approval. We will inform you about everything by e-mail."); window.location="/after-registration.php";
                </script>';
              
              // send the newly created user to the home page after logging them in
              wp_redirect( home_url() . "/after-registration/" ); exit;
          }
          
      }
  
  }
}
add_action('init', 'vicode_add_new_user');

// used for tracking error messages
function vicode_errors(){
    static $wp_error; // global variable handle
    return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}

// displays error messages from form submissions
function vicode_register_messages() {
	if($codes = vicode_errors()->get_error_codes()) {
		echo '<div class="vicode_errors">';
		    // Loop error codes and display errors
		   foreach($codes as $code){
		        $message = vicode_errors()->get_error_message($code);
		        echo '<span class="error"><strong>' . __('Error') . '</strong>: ' . $message . '</span><br/>';
		    }
		echo '</div>';
	}	
}

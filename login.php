<?php /*
*Template Name: Log-In
*Template Post Type: page
*/ ?>

<?php 
  echo '<script>alert("We have recently optimised our website. This unfortunately means that customers that have already registered with us have lost access. Please re-register on out website. We apologise for the inconvenience!");
  </script>';
?>

<head>
<link rel="stylesheet" href="/wp-content/themes/glov/reg.css">
</head>

<html class="reg">

<div class="reg-area">

<div class="x-button">
   <a href="/index.php" class="close"></a>
</div>
 


<div class="reg-plate">
  <div class="login">
  <div class="reg-head">
             
    <h2>Log In</h2>
                
  </div>

<?php
global $user_ID;
global $wpdb;
if($_POST["vicode_user_login"]){
echo "Problem z zalogowaniem";
}
if (!$user_ID){
?>
  <form method="POST" class="reg-form pad60top">
    
    <div class="line-one">
      <input type="text" class="form-control w300px" name="loginUsername" id="loginUsername" placeholder="E - mail">
    </div>

    <div class="line-two">
      <input type="password" class="form-control w300px" name="loginPassword" id="loginPassword" placeholder="Password">
    </div>

    <div class="line-three">
      <input type="submit" name="submit" value="<?php _e('Log In'); ?>">
    </div>

  </form>

<?php
} 
else{
    wp_redirect(home_url() . '/download');
}
?>
<div class="align">
  <h4>New to this site? <a href="/registration">Sign Up</a></h4> 
</div>
  </div>
  </div>  

</div>



</html>

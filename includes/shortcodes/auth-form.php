<?php

function rlogin_auth_form_shortcode(){
    // If user is already logged in ,  no need to show the shortocde forms ( registration and login )    
    if( is_user_logged_in() ){
    return '';
  }

  $formHTML               = file_get_contents( 'auth-form-template.php', true );

  //Replace placeholder with wpnonce 
  $formHTML               = str_replace( 
    'NONCE_FIELD_PH', 
    wp_nonce_field( 'recipe_auth', '_wpnonce', true, false ),
    $formHTML
  );
  
  // Replace placeholder with style = "display :none " and hence not display the registration form
  // if Settings > General > Membership is unchecked 
  $formHTML               = str_replace(
    'SHOW_REG_FORM',
    ( !get_option('users_can_register') ? 'style="display:none;"' : ''),
    $formHTML
  );

  return $formHTML;
}

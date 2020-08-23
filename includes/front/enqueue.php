<?php
function r_enqueue_scripts(){
  wp_register_script( 
        'r_main', plugins_url( '/assets/js/main.js', RECIPE_PLUGIN_URL ), ['jquery'], '1.0.0', true 
    );

    wp_localize_script( 'r_main', 'recipe_obj', [
        'ajax_url'      =>  admin_url( 'admin-ajax.php' ),
        'home_url'      =>  home_url( '/' )
    ]);
    
    wp_enqueue_script( 'r_main' );
}    


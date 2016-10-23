<?php
add_image_size("icon", 50, 50, true );

function image_default_size() {
  update_option( "large_size_w", 1086 );
  update_option( "large_size_h", 9999 );
  update_option( "medium_size_w", 600 );
  update_option( "medium_size_h", 9999 );
  update_option( "thumbnail_size_w", 300 );
  update_option( "thumbnail_size_h", 999 );
  update_option( "thumbnail_crop", false );
}
add_action( 'after_switch_theme', 'image_default_size' );

<?php
function login_logo_image() {
  echo '<style type="text/css">
    #login h1 a {
      width: 302px;
      height: 56px;
      background: url(' . get_stylesheet_directory_uri() . '/assets/img/login-logo.png) no-repeat !important;
    }
  </style>';
}

function my_login_logo_url() {
 return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_tit() {
 return get_option( 'blogname' );
}
add_filter( 'login_headertitle', 'my_login_logo_tit' );

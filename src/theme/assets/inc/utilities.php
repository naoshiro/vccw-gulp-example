<?php
function pagination($pages = '', $range = 3){
   $showitems = ($range * 2)+1;
   global $paged;
   if( empty($paged) ){
     $paged = 1;
   }
   if( $pages == '' ){
     global $wp_query;
     $pages = $wp_query->max_num_pages;
     if( !$pages ){
       $pages = 1;
     }
   }
   if( 1 != $pages ){
     echo "<ul class=\"pagination fz-xs-8 fz-lg-14 fz-xl-18\">";
     if( $paged > 2 && $paged > $range+1 && $showitems < $pages ){
       echo "<li class=\"page-item\"><a class=\"page-link\" href='".get_pagenum_link(1)."'>&laquo; First...</a></li>";
     }
     if( $paged > 1 && $showitems < $pages ){
       echo "<li class=\"page-item\"><a class=\"page-link\" href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a></li>";
     }
     for ($i=1; $i <= $pages; $i++){
       if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
         echo ($paged == $i)? "<li class=\"page-item active\"><span class=\"page-link\" class=\"current\">".$i."</span></li>":"<li class=\"page-item\"><a class=\"page-link\" href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
       }
     }
     if ( $paged < $pages && $showitems < $pages ){
       echo "<li class=\"page-item\"><a class=\"page-link\" href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a></li>";
     }
     if ( $paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages ){
       echo "<li class=\"page-item\"><a class=\"page-link\" href='".get_pagenum_link($pages)."'>...Last &raquo;</a></li>";
     }
     echo "</ul>\n";
   }
}

<?php
  get_header();
  if(have_posts()):
    while(have_posts()):
      the_post();
      get_template_part('component', 'faq');
    endwhile;
    pagination();
  else:
    get_template_part('component', 'none');
  endif;
  get_footer();

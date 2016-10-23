<?php
  get_header();
  while(have_posts()):
    the_post();
    get_template_part('component', 'tinymce');
  endwhile;
  get_footer();

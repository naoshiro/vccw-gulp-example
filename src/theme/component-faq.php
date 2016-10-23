<p>
  <span><?php echo get_the_date('Y.m.d') ?></span>
  <span><?php echo get_the_term_list($post->ID, 'faq-category') ?></span><br>
  <?php the_title() ?>
</p>

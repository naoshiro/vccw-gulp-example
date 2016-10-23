<p>
  <span><?php echo get_the_date('Y.m.d') ?></span>
  <span><?php the_category(', ') ?></span><br>
  <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
    <?php the_title() ?>
  </a>
</p>

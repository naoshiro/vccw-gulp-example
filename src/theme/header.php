<!doctype html>
<html <?php language_attributes(); ?> class="no-js" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title(''); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--[if lt IE 9]>
  <script src="https//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
  <![endif]-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/picturefill/3.0.2/picturefill.js" async></script>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
  <header>
    <ul>
      <li>
        <a href="<?php echo home_url() ?>">ホーム</a>
      </li>
      <li>
        <a href="<?php echo home_url() ?>/news">
          <?php echo get_post_type_object('post')->labels->name ?>
        </a>
      </li>
      <li>
        <a href="<?php echo get_post_type_archive_link('faq') ?>">
          <?php echo get_post_type_object('faq')->labels->name ?>
        </a>
      </li>
    </ul>
  </header>

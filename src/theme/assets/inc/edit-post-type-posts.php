<?php
function edit_post_type_posts( $args, $post_type ) {
  if('post' == $post_type) {
    $args['labels'] = array(
      'name'               => __('ニュース'),
      'singular_name'      => __('ニュース'),
      'all_items'          => __('全てのニュースをみる'),
      'add_new'            => __('新しいニュースを作成'),
      'add_new_item'       => __('新しいニュースを追加'),
      'edit'               => __('編集'),
      'edit_item'          => __('ニュースを編集'),
      'new_item'           => __('新しいニュースを追加'),
      'view_item'          => __('ニュース記事を表示'),
      'search_items'       => __('ニュース記事を探す'),
      'not_found'          => __('見つかりませんでした'),
      'not_found_in_trash' => __('ゴミ箱は空です')
    );
    $args['menu_position']      = 4;
    $args['rewrite']            = array('slug' => 'news', 'with_front' => false);
    $args['has_archive']        = 'news';
    $args['hierarchical']       = false;
    $args['supports']           = array('title', 'editor');
  }
  return $args;
}
add_filter('register_post_type_args', 'edit_post_type_posts', 10, 2);

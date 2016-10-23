<?php
function edit_post_type_pages( $args, $post_type ) {
  if('page' == $post_type) {
    $args['labels'] = array(
      'name'               => __('ページ'),
      'singular_name'      => __('ページ'),
      'all_items'          => __('全てのページをみる'),
      'add_new'            => __('新しいページを作成'),
      'add_new_item'       => __('新しいページを追加'),
      'edit'               => __('編集'),
      'edit_item'          => __('ページを編集'),
      'new_item'           => __('新しいページを追加'),
      'view_item'          => __('ページ記事を表示'),
      'search_items'       => __('ページ記事を探す'),
      'not_found'          => __('見つかりませんでした'),
      'not_found_in_trash' => __('ゴミ箱は空です')
    );
    $args['menu_position']      = 5;
    $args['supports']           = array('title', 'editor');
  }
  return $args;
}
add_filter('register_post_type_args', 'edit_post_type_pages', 10, 2);

<?php
function add_post_type_faq() {
  $post_type_args = array(
    'labels' => array(
      'name'               => __('よくある質問'),
      'singular_name'      => __('よくある質問'),
      'all_items'          => __('全ての質問をみる'),
      'add_new'            => __('新しい質問を作成'),
      'add_new_item'       => __('新しい質問を追加'),
      'edit'               => __('編集'),
      'edit_item'          => __('よくある質問を編集'),
      'new_item'           => __('新しい質問を追加'),
      'view_item'          => __('よくある質問を表示'),
      'search_items'       => __('よくある質問を探す'),
      'not_found'          => __('見つかりませんでした'),
      'not_found_in_trash' => __('ゴミ箱は空です')
    ),
    'public'              => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => false,
    'show_ui'             => true,
    'query_var'           => true,
    'menu_position'       => 4,
    'menu_icon'           => 'dashicons-welcome-write-blog',
    'rewrite'             => array('slug' => 'faq', 'with_front' => false),
    'has_archive'         => true,
    'hierarchical'        => false,
    'supports'            => array('title', 'editor', 'excerpt')
  );
  register_post_type('faq', $post_type_args);

  $taxonomy_args = array(
    'labels' => array(
      'name'                       => __('カテゴリー'),
      'singular_name'              => __('カテゴリー'),
      'search_items'               => __('カテゴリーを探す'),
      'all_items'                  => __('全てのカテゴリー'),
      'parent_item'                => __('親カテゴリー'),
      'parent_item_colon'          => __('親カテゴリー:'),
      'edit_item'                  => __('カテゴリーを編集する'),
      'update_item'                => __('カテゴリーを更新する'),
      'add_new_item'               => __('新しいカテゴリーを追加する'),
      'new_item_name'              => __('新しいカテゴリー名'),
      'not_found'                  => __('カテゴリーがありません'),
      'menu_name'                  => __('カテゴリー'),
    ),
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'faq', 'with_front' => false)
  );
  register_taxonomy('faq-category', array('faq'), $taxonomy_args);
}
add_action('init', 'add_post_type_faq');

function faq_archive_query( $query ) {
  if( is_admin() || ! $query->is_main_query() )
    return;
  if( is_post_type_archive( 'faq' ) ) {
    $query->set( 'posts_per_page', -1 );
    return;
  }
}
add_action( 'pre_get_posts', 'faq_archive_query', 1 );

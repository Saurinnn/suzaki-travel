<?php //子テーマ用関数
if ( !defined( 'ABSPATH' ) ) exit;

//子テーマ用のビジュアルエディタースタイルを適用
add_editor_style();

//以下に子テーマ用の関数を書く
function my_front_page_styles() {
  if ( is_front_page() ) {
    wp_enqueue_style(
      'child-front-page', // ハンドル名
      get_stylesheet_directory_uri() . '/front-page.css',
      array(), // 親や子テーマのCSSを依存関係にするなら array('child-style')
      filemtime( get_stylesheet_directory() . '/front-page.css' ) // 更新日時をバージョンに
    );
  }
}
add_action( 'wp_enqueue_scripts', 'my_front_page_styles' );

function my_plan_styles() {
  if ( is_post_type_archive( 'menu' ) ) { // ← 'menu' は投稿タイプ名
    wp_enqueue_style(
      'child-plan-style',
      get_stylesheet_directory_uri() . '/plan.css',
      array(),
      filemtime( get_stylesheet_directory() . '/plan.css' )
    );
  }
}
add_action( 'wp_enqueue_scripts', 'my_plan_styles' );

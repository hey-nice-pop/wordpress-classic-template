<?php

function add_styles() {
	wp_enqueue_style( 'base-style', get_template_directory_uri() . '/css/base.css' );
}
add_action( 'wp_enqueue_scripts', 'add_styles' );

add_filter( 'author_rewrite_rules', '__return_empty_array' );
function disable_author_archive() {
	if( $_GET['author'] || preg_match('#/author/.+#', $_SERVER['REQUEST_URI']) ){
		wp_redirect( home_url() );
		exit;
	}
}

//globalstyle・長いWP固有のCSS読み込み停止
add_action( 'wp_enqueue_scripts', 'remove_my_global_styles' );
function remove_my_global_styles() {
	wp_dequeue_style( 'global-styles' );
}

add_action('init', 'disable_author_archive');

 /* ---------- カスタム投稿タイプを追加 ---------- */
add_action( 'init', 'create_post_type' );

function create_post_type() {

  //rental というカスタム投稿タイプを登録
	register_post_type(
      'topics',//投稿タイプ名（識別子：半角英数字の小文字）
      array(
        'label' => 'トピックス',  //カスタム投稿タイプの名前（管理画面のメニューに表示される）
        'labels' => array(  //管理画面に表示されるラベルの文字を指定
          'add_new' => '新規トピックス追加',
          'edit_item' => 'トピックスの編集',
          'view_item' => 'トピックスを表示',
          'search_items' => 'トピックスを検索',
          'not_found' => 'トピックスは見つかりませんでした。',
          'not_found_in_trash' => 'ゴミ箱にトピックスはありませんでした。'
        ),
        'public' => true,  // 管理画面及びサイト上に公開
        'description' => 'カスタム投稿タイプ「トピックス」の説明文です。',  //説明文
        'hierarchicla' => false,  //コンテンツを階層構造にするかどうか
        'has_archive' => true,  //trueにすると投稿した記事の一覧ページを作成することができる
        'show_in_rest' => true,  //Gutenberg を有効化
        'supports' => array(  //記事編集画面に表示する項目を配列で指定することができる
          'title',  //タイトル
          'editor',  //本文の編集機能
          'thumbnail',  //アイキャッチ画像
          'excerpt',  //抜粋
          'custom-fields', //カスタムフィールド
          'revisions'  //リビジョンを保存
        ),
        'menu_position' => 4, //「投稿」の下に追加
        //使用するタクソノミーを指定（カテゴリー/category やタグ/post_tag も追加可能）
        'taxonomies' => array('topics_cat', 'topics_tag', 'category', 'post_tag')
      )
	);
	
	register_post_type(
      'information',//投稿タイプ名（識別子：半角英数字の小文字）
      array(
        'label' => 'インフォメーション',  //カスタム投稿タイプの名前（管理画面のメニューに表示される）
        'labels' => array(  //管理画面に表示されるラベルの文字を指定
          'add_new' => '新規インフォメーション追加',
          'edit_item' => 'インフォメーションの編集',
          'view_item' => 'インフォメーションを表示',
          'search_items' => 'インフォメーションを検索',
          'not_found' => 'インフォメーションは見つかりませんでした。',
          'not_found_in_trash' => 'ゴミ箱にインフォメーションはありませんでした。'
        ),
        'public' => true,  // 管理画面及びサイト上に公開
        'description' => 'カスタム投稿タイプ「インフォメーション」の説明文です。',  //説明文
        'hierarchicla' => false,  //コンテンツを階層構造にするかどうか
        'has_archive' => true,  //trueにすると投稿した記事の一覧ページを作成することができる
        'show_in_rest' => true,  //Gutenberg を有効化
        'supports' => array(  //記事編集画面に表示する項目を配列で指定することができる
          'title',  //タイトル
          'editor',  //本文の編集機能
          'thumbnail',  //アイキャッチ画像
          'excerpt',  //抜粋
          'custom-fields', //カスタムフィールド
          'revisions'  //リビジョンを保存
        ),
        'menu_position' => 5, //「投稿」の下に追加
        //使用するタクソノミーを指定（カテゴリー/category やタグ/post_tag も追加可能）
        'taxonomies' => array('information_cat', 'information_tag', 'category', 'post_tag')
      )
	);

	
	}
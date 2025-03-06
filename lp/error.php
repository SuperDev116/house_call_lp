<?php
/**
 * KobeBeauty PHP Contact Form
 * http://www.kobe-beauty.co.jp/
 *
 * Copyright (c) 2014 Kobe Beauty Co., Ltd.
 * Released under the MIT license
 */

// ファイル読み込み
require_once( __DIR__ . '/contact/init.php');

global $param;

$page_id = 'contact';
$page_title = '予期せぬエラー丨ナイトドクター';
$page_description = 'ナイトドクターメールフォームのエラー画面です。';
require_once( __DIR__ . '/header.php');
?>

<section class="section">
  <div class="container">
    <h2>予期せぬエラー</h2>
    <p class="lead">
      予期せぬエラーが発生したため、お問い合わせが完了しませんでした。
    </p>
    <div class="btn-area">
      <button type="button" onClick="location.href='index.php'" class="btn-back">戻る</button>
    </div>
  </div>
</section>

<?php require('footer.php'); ?>

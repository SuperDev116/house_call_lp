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
$page_title = '送信完了丨ナイトドクター';
$page_description = 'ナイトドクターのメールフォームの送信完了画面です。';
require_once( __DIR__ . '/header.php');
?>

<section class="section">
  <div class="container">
    <h2>送信完了</h2>
    <p class="lead">
      ご依頼・お問い合わせを受け付けました。
    </p>
    <div class="btn-area">
      <button type="button" onClick="location.href='index.php'" class="btn-back">戻る</button>
    </div>
  </div>
</section>

<?php require('footer.php'); ?>

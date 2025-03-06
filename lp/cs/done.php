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
$page_title = '发送完成 | Night Doctor';
$page_description = '发送完成。';
require_once( __DIR__ . '/header.php');
?>

<section class="section">
  <div class="container">
    <h2>发送完成</h2>
    <p class="lead">
      我们已经受理了您的咨询。
    </p>
    <div class="btn-area">
      <button type="button" onClick="location.href='index.php'" class="btn-back">返回</button>
    </div>
  </div>
</section>

<?php require('footer.php'); ?>

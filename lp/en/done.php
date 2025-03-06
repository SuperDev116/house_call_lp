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
$page_title = 'Send completed | Night Doctor';
$page_description = 'Send completed.';
require_once( __DIR__ . '/header.php');
?>

<section class="section">
  <div class="container">
    <h2>Send completed</h2>
    <p class="lead">
      We have accepted your inquiry.
    </p>
    <div class="btn-area">
      <button type="button" onClick="location.href='index.php'" class="btn-back">Return</button>
    </div>
  </div>
</section>

<?php require('footer.php'); ?>

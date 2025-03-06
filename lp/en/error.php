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
$page_title = 'Unexpected error | Night Doctor';
$page_description = 'Unexpected error.';
require_once( __DIR__ . '/header.php');
?>

<section class="section">
  <div class="container">
    <h2>Unexpected error</h2>
    <p class="lead">
      Incomplete consultation due to unexpected error.
    </p>
    <div class="btn-area">
      <button type="button" onClick="location.href='index.php'" class="btn-back">Return</button>
    </div>
  </div>
</section>

<?php require('footer.php'); ?>

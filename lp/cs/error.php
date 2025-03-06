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
$page_title = '预期外的错误 | Night Doctor';
$page_description = '预期外的错误';
require_once( __DIR__ . '/header.php');
?>

<section class="section">
  <div class="container">
    <h2>预期外的错误</h2>
    <p class="lead">
      若邮件错误我们无法回复您，所以请仔细确认。
    </p>
    <div class="btn-area">
      <button type="button" onClick="location.href='index.php'" class="btn-back">返回</button>
    </div>
  </div>
</section>

<?php require('footer.php'); ?>

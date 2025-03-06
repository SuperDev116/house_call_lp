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

// セッションデータ取得
$contact_data = isset($_SESSION["contact_data"]) ? $_SESSION["contact_data"] : array();
// セッションデータの有無をチェック
if (count($contact_data) == 0) {
  header("Location: error.php"); // データ取得できない場合はエラー画面へ遷移
  exit;
}

$name = isset($contact_data["name"]) ? $contact_data["name"] : "";
$gender = isset($contact_data["gender"]) ? $contact_data["gender"] : "";
$birthyear = isset($contact_data["birthyear"]) ? $contact_data["birthyear"] : "";
$birthmonth = isset($contact_data["birthmonth"]) ? $contact_data["birthmonth"] : "";
$birthday = isset($contact_data["birthday"]) ? $contact_data["birthday"] : "";
$address = isset($contact_data["address"]) ? $contact_data["address"] : "";
$tel = isset($contact_data["tel"]) ? $contact_data["tel"] : "";
$email = isset($contact_data["email"]) ? $contact_data["email"] : "";
$card = isset($contact_data["card"]) ? $contact_data["card"] : "";
$cardtype = isset($contact_data["cardtype"]) ? $contact_data["cardtype"] : "";
$message = isset($contact_data["message"]) ? $contact_data["message"] : "";


//操作アクションを取得
$act = isset($_POST["act"]) ? intval($_POST["act"]) : 1;

// 送信ボタンを押下された場合
if ($act == 3) {
  // メール送信
  $result_to_admin = sendMailtoAdmin($contact_data);
  $result_to_customer = sendMailtoCustomer($contact_data);

  if ($result_to_admin && $result_to_customer) { // 送信成功
    $_SESSION = array();  // セッションに格納された情報をカラにします。
    header("Location: done.php");
    exit;
  } else { // 送信失敗
    $_SESSION = array();  // セッションに格納された情報をカラにします。
    header("Location: error.php");
    exit;
  }
}

$page_id = 'contact';
$page_title = 'Send content confirmation | Night Doctor';
$page_description = 'Send content confirmation.';
require_once( __DIR__ . '/header.php');

?>

<div class="page-header">
  <div class="container">
  </div>
</div>

<section class="section">
  <div class="container">
    <h2>Confirm transmission content</h2>
    <p class="lead">
      If the above is correct, please click the "Send" button.<br>
      If the E-mail is wrong, we cannot reply to you, so please confirm carefully.
    </p>
    <form class="contact-form" name="contactform" role="form" method="post" action="">
      <dl class="contact-dl">
        <dt>Patient's name</dt>
        <dd>
          <?php echo h($name); ?>
        </dd>
        <dt>Gender of patient</dt>
        <dd>
          <?php echo h($gender); ?>
        </dd>
        <dt>Birth date of a patient</dt>
        <dd>
          <div class="row birth-box">
            <div class="col">
              <?php echo h($birthyear); ?>
            </div>
            <div class="col">
              <?php echo h($birthmonth); ?>
            </div>
            <div class="col">
              <?php echo h($birthday); ?>
            </div>
          </div>
        </dd>
        <dt>Patient's address</dt>
        <dd>
          <?php echo h($address); ?>
        </dd>
        <dt>Phone number</dt>
        <dd>
          <?php echo h($tel); ?>
        </dd>
        <dt>Mail address</dt>
        <dd>
          <?php echo h($email); ?>
        </dd>
        <dt>Presence or absence of  insurance card</dt>
        <dd>
          <div class="row">
            <div class="col">
              <?php echo h($card); ?>
            </div>
            <div class="col">
              <?php echo h($cardtype); ?>
            </div>
          </div>
        </dd>
        <dt>Specific symptoms and consultation content</dt>
        <dd>
          <?php echo h($message); ?>
        </dd>
      </dl>
      <div class="btn-area">
        <div class="row">
          <div class="col-sm-4 col-6">
            <button type="submit" class="btn">Send</button>
            <input type="hidden" name="act" value="3">
          </div>
          <div class="col-sm-4 col-6">
            <button type="button" onclick="contactform.action='index.php#contact';contactform.submit();" class="btn-back">Back</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>

<?php require('footer.php'); ?>

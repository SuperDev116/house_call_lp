<?php
/**
 * KobeBeauty PHP Contact Form
 * http://www.kobe-beauty.co.jp/
 *
 * Copyright (c) 2014 Kobe Beauty Co., Ltd.
 * Released under the MIT license
 */

// ファイル読み込み
require_once( __DIR__ . '/contact/inq_init.php');

global $param;

// セッションデータ取得
$contact_data = isset($_SESSION["contact_data"]) ? $_SESSION["contact_data"] : array();
// セッションデータの有無をチェック
if (count($contact_data) == 0) {
  header("Location: error.php"); // データ取得できない場合はエラー画面へ遷移
  exit;
}

$name = isset($contact_data["name"]) ? $contact_data["name"] : "";
$address = isset($contact_data["address"]) ? $contact_data["address"] : "";
$tel = isset($contact_data["tel"]) ? $contact_data["tel"] : "";
$email = isset($contact_data["email"]) ? $contact_data["email"] : "";
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
$page_title = '確認画面丨ナイトドクター';
$page_description = 'ナイトドクターのメールフォームの確認画面です。';
?>

<!DOCTYPE html>
<html lang="ja">

<html prefix="og: http://ogp.me/ns#">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="ナイトドクター">
<meta name="description" content="コロナスパイク蛋白抗体（SARS-CoV-2 抗S抗体）の定量検査">

<title>夜間緊急往診 ナイトドクター｜確認画面</title>

<link rel="icon" href="assets/img/favicon.ico">
<link href="css/style.css" rel="stylesheet">
<link href="css/smp_style.css" rel="stylesheet">

<link rel="alternate" href="https://piq.jp/lp/" hreflang="ja">
<link rel="alternate" href="https://piq.jp/lp/en" hreflang="en">
<link rel="alternate" href="https://piq.jp/lp/cs" hreflang="zh-Hans">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MCLNRTF');</script>
<!-- End Google Tag Manager -->
</head>

<body ontouchstart="" class="page-index" id="top">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MCLNRTF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header id="header">
<div class="innerWrap flex_wrap between">

<h1 class="top_logo"><a href="index.php"><figure><img src="images/h_logo.svg" alt="ナイトドクター"></figure></a></h1>

<nav>
<ul class="flex_wrap">
<li><a href="https://piq.jp/lp" class="current">日本語</a></li>
<li><a href="https://piq.jp/lp/en">English</a></li>
<li><a href="https://piq.jp/lp/cs">中文</a></li>
</ul>
</nav>

<div class="humb"><span></span><span></span><span></span></div>

<!-- モーダルエリアここから -->
<div id="modalmenu">

<ul>
<li><a href="index#movie">ナイトドクターについて</a></li>
<li><a href="index#media">メディア出演実績</a></li>
<li><a href="index#comparison">鼻咽頭拭いと唾液の違い</a></li>
<li><a href="index#virus">新型コロナウイルス対策</a></li>
<li><a href="index#point">夜間休日緊急往診4つのポイント</a></li>
<li><a href="index#feature">ナイトドクターの特長</a></li>
<li><a href="index#area">対応エリア</a></li>
<li><a href="index#contact">往診のご依頼・お問い合わせ</a>
<li><a href="index#cform">ご依頼・ご相談フォーム</a>
</ul>

</div>
<!-- モーダルエリアここまで -->

</div>
</header>













<main id="main">





<section class="low_page">
<div class="innerWrap">
<h2 class="sec_top rou_ttl">送信内容のご確認</h2>

<p class="lead">
こちらの内容でよろしければ「送信する」ボタンを押してください。<br>
メールアドレスに間違いがあると返信ができませんので十分にご確認ください。
</p>

<div id="contact"></div>

<form class="contact-form" name="contactform" role="form" method="post" action="">

<table class="form_table inqsheet">
<tr><td class="input_ttl">お名前</td>
<td class="input_source"><?php echo h($name); ?></td></tr>
<tr><td class="input_ttl">ご住所</td>
<td class="input_source"><?php echo h($address); ?></td></tr>
<tr><td class="input_ttl">お電話番号</td>
<td class="input_source"><?php echo h($tel); ?></td></tr>
<tr><td class="input_ttl">メールアドレス</td>
<td class="input_source"><?php echo h($email); ?></td></tr>
<tr><td class="input_ttl">お問合せ内容</td>
<td class="input_source"><?php echo h($message); ?></td></tr>
</table>


<div class="flex_wrap frm_btn">
<div>
<button type="submit" class="btn">送信する</button>
<input type="hidden" name="act" value="3">
</div>
<div><button type="button" onclick="contactform.action='contact.php';contactform.submit();" class="btn_back">戻る</button></div>
</div>

</form>

</div>
</section>


</main>



<footer id="footer" class="bg_main">

<div class="ft_logo">
<a href="#"><figure><img src="images/v_logo.svg" alt="ナイトドクター"></figure></a>
</div>

<div class="rou_ttl ilb">事業者概要</div>

<table class="corp_info">
<tr><th>運営者</th><td>ナイトドクター株式会社</td></tr>
<tr><th>事務所所在地</th><td>〒107-0052 東京都港区赤坂2-10-1</td></tr>
<tr><th>電話番号</th><td>03-6381-7511 / 042-548-1717</td></tr>
</table>


<div class="ft_links">
<a href="index.php">HOME</a>　/　<!--//<a href="pocketdoctor.php" target="_blank">オンライン診療</a>　//--><a href="privacy.php">プライバシーポリシー</a>　/　<a href="law.php">特定商取引法に基づく表示</a>
</div>

<div id="goto_top" class="fadeup">
<a href="#"><figure><img src="images/add_arrow.svg" alt=""></figure></a>
</div>

<small class="cpright">&copy; 2021 NightDoctor / ナイトドクター</small>
</footer>



<!--// CTA //-->
<article id="cta" class="fadeup">
<ul class="flex_wrap">
<li><a href="tel:0363817511"><figure><img src="images/icon_cta_01.png" alt=""></figure></a></li>
<li><a href="https://line.me/R/ti/p/%40737qdagd" target="_blank"><figure><img src="images/icon_cta_02.png" alt=""></figure></a></li>
<li><a href="mailto:piq@piq.jp"><figure><img src="images/icon_cta_03.png" alt=""></figure></a></li>
</ul>
</article>
<!--// #CTA //-->



<script src="js/script.js"></script>

</body>
</html>
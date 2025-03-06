<?php
/**
 * KobeBeauty PHP Contact Form
 * http://www.kobe-beauty.co.jp/
 *
 * Copyright (c) 2014 Kobe Beauty Co., Ltd.
 * Released under the MIT license
 */


/**
* getHeader
* ヘッダー共通ファイルを呼び出す
*/
function getHeader () {
	require_once( __DIR__ . '/../header.php');
}

/**
* getFooter
* フッター共通ファイルを呼び出す
*/
function getFooter () {
	require_once( __DIR__ . '/../footer.php');
}

/**
* sendMailtoAdmin
* メール送信（管理者宛）
* @param $data     フォーム送信データ
*/
function sendMailtoAdmin ($data) {
	$result = false;

	// 文字コードをセット
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");

	// 送信先
	$to = ADMIN_MAIL;

	// 送信元
	$from = FROM_MAIL;

	// 件名
	$subject = "ナイトドクター│往診のご依頼・お問い合わせを受信しました";

	// 本文作成
	$body  = "";
	$body .= "---------------------------------------------------------------------\n";
	$body .= "　往診のご依頼・お問い合わせを受信しました\n";
	$body .= "---------------------------------------------------------------------\n";
	$body .= "受信内容は以下のとおりです。\n";
	$body .= "\n";
	$body .= "患者様のお名前：　" . $data["name"] . "\n";
	$body .= "患者様の性別：　" . $data["gender"] . "\n";
	$body .= "患者様の生年月日：　" . $data["birthgengou"] . $data["birthyear"] . "年".$data["birthmonth"] . "月".$data["birthday"] . "日". "\n";
	$body .= "患者様のご住所：　" . $data["address"] . "\n";
	$body .= "お電話番号：　" . $data["tel"] . "\n";
	$body .= "メールアドレス：　" . $data["email"] . "\n";
	$body .= "保険証の有無：　" . $data["card"] . "\n";
	$body .= "ご病状、お問合せ内容：　" . $data["message"] . "\n";
	$body .= "---------------------------------------------------------------------\n";
	$body .= "\n";
	$body .= "このメールはナイトドクターのWebサイトから送信されました。\n";

	// 送信処理
	if (mb_send_mail($to, $subject, $body, "From: ".$from)) {
		$result = true; // 送信成功
	}

	return $result;
}

/**
* sendMailtoCustomer
* メール送信（ユーザー宛）
* @param $data     フォーム送信データ
*/
function sendMailtoCustomer ($data) {
	$result = false;

	// 文字コードをセット
	mb_language("uni");
	mb_internal_encoding("UTF-8");

	// 送信先
	$to = $data["email"];

	// 件名
	$subject = "我们已经受理了您的委托、咨询。";

	// 送信元
	$from = FROM_MAIL;

	// 本文作成
	$body  = "";
	$body .= "感谢您委托、咨询“Night Doctor”的登门诊断服务。\n";
	$body  = "";
	$body .= "受理内容如下。\n";
	$body .= "\n";
	$body .= "患者姓名：　" . $data["name"] . "\n";
	$body .= "患者性别：　" . $data["gender"] . "\n";
	$body .= "患者出生年月日：　" . $data["birthyear"] . "年".$data["birthmonth"] . "月".$data["birthday"] . "日". "\n";
	$body .= "患者地址：　" . $data["address"] . "\n";
	$body .= "电话号码：　" . $data["tel"] . "\n";
	$body .= "邮件地址：　" . $data["email"] . "\n";
	$body .= "有无保险证：　" . $data["card"] . "\n";
	$body .= "具体症状、咨询内容：　" . $data["message"] . "\n";
	$body .= "\n";
	$body .= "---------------------------------------------------------------------\n";
	$body .= "该邮件由Night Doctor网页发送。\n";

	// 送信処理
	if (mb_send_mail($to, $subject, $body, "From: ".$from)) {
		$result = true; // 送信成功
	}

	return $result;
}

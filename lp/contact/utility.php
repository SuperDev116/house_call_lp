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
function getHeader()
{
	require_once(__DIR__ . '/../header.php');
}

/**
 * getFooter
 * フッター共通ファイルを呼び出す
 */
function getFooter()
{
	require_once(__DIR__ . '/../footer.php');
}

/**
 * sendMailtoAdmin
 * メール送信（管理者宛）
 * @param $data     フォーム送信データ
 */
function sendMailtoAdmin($data)
{
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
	$body .= "患者様の生年月日：　" . $data["birthgengou"] . $data["birthyear"] . "年" . $data["birthmonth"] . "月" . $data["birthday"] . "日" . "\n";
	$body .= "患者様のご住所：　" . $data["address"] . "\n";
	$body .= "お電話番号：　" . $data["tel"] . "\n";
	$body .= "メールアドレス：　" . $data["email"] . "\n";
	$body .= "保険証の有無：　" . $data["card"] . "\n";
	$body .= "保険証の種類（有の場合）：　" . $data["cardtype"] . "\n";
	$body .= "ご病状、お問合せ内容：　" . $data["message"] . "\n";
	$body .= "---------------------------------------------------------------------\n";
	$body .= "\n";
	$body .= "このメールはナイトドクターのWebサイトから送信されました。\n";

	// 送信処理
	if (mb_send_mail($to, $subject, $body, "From: " . $from)) {
		$result = true; // 送信成功
	}

	return $result;
}

/**
 * sendMailtoCustomer
 * メール送信（ユーザー宛）
 * @param $data     フォーム送信データ
 */
function sendMailtoCustomer($data)
{
	$result = false;

	// 文字コードをセット
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");

	// 送信先
	$to = $data["email"];

	// 件名
	$subject = "往診のご依頼・お問い合わせを受け付けました";

	// 送信元
	$from = FROM_MAIL;

	// 本文作成
	$body  = "";
	$body .= "この度は「ナイトドクター」の往診のご依頼・お問い合わせをいただき誠にありがとうございます。\n";
	$body  = "";
	$body .= "受け付け内容は以下のとおりです。\n";
	$body .= "\n";
	$body .= "患者様のお名前：　" . $data["name"] . "\n";
	$body .= "患者様の性別：　" . $data["gender"] . "\n";
	$body .= "患者様の生年月日：　" . $data["birthgengou"] . $data["birthyear"] . "年" . $data["birthmonth"] . "月" . $data["birthday"] . "日" . "\n";
	$body .= "患者様のご住所：　" . $data["address"] . "\n";
	$body .= "お電話番号：　" . $data["tel"] . "\n";
	$body .= "メールアドレス：　" . $data["email"] . "\n";
	$body .= "保険証の有無：　" . $data["card"] . "\n";
	$body .= "保険証の種類（有の場合）：　" . $data["cardtype"] . "\n";
	$body .= "ご病状、お問合せ内容：　" . $data["message"] . "\n";
	$body .= "\n";
	$body .= "---------------------------------------------------------------------\n";
	$body .= "　このメールはナイトドクターのWebサイトから送信されました。\n";

	// 送信処理
	if (mb_send_mail($to, $subject, $body, "From: " . $from)) {
		$result = true; // 送信成功
	}

	return $result;
}

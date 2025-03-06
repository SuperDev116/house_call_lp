<?php

/**
 * KobeBeauty PHP Contact Form
 * http://www.kobe-beauty.co.jp/
 *
 * Copyright (c) 2014 Kobe Beauty Co., Ltd.
 * Released under the MIT license
 */

function checkInputData($inputData)
{
	// エラーメッセージを格納する配列
	$err_msg = array();

	// 各入力内容を取得
	$name = isset($inputData["name"]) ? $inputData["name"] : "";
	$gender = isset($inputData["gender"]) ? $inputData["gender"] : "";
	$birthgengou = isset($inputData["birthgengou"]) ? $inputData["birthgengou"] : "";
	$birthyear = isset($inputData["birthyear"]) ? $inputData["birthyear"] : "";
	$birthmonth = isset($inputData["birthmonth"]) ? $inputData["birthmonth"] : "";
	$birthday = isset($inputData["birthday"]) ? $inputData["birthday"] : "";
	$address = isset($inputData["address"]) ? $inputData["address"] : "";
	$tel = isset($inputData["tel"]) ? $inputData["tel"] : "";
	$email = isset($inputData["email"]) ? $inputData["email"] : "";
	$card = isset($inputData["card"]) ? $inputData["card"] : "";
	$cardtype = isset($inputData["cardtype"]) ? $inputData["cardtype"] : "";
	$message = isset($inputData["message"]) ? $inputData["message"] : "";

	// お名前
	if (strlen($name) == 0) {
		$err_msg[] = "患者様のお名前を入力してください。";
	}
	// 性別
	if (strlen($gender) == 0) {
		$err_msg[] = "患者様の性別を選択してください。";
	}
	// 生年月日（元号）
	if (strlen($birthgengou) == 0) {
		$err_msg[] = "患者様の生年月日（元号）を入力してください。";
	}
	// 生年月日（年）
	if (strlen($birthyear) == 0) {
		$err_msg[] = "患者様の生年月日（年）を入力してください。";
	}
	// 生年月日（月）
	if (strlen($birthmonth) == 0) {
		$err_msg[] = "患者様の生年月日（月）を入力してください。";
	}
	// 生年月日（日）
	if (strlen($birthday) == 0) {
		$err_msg[] = "患者様の生年月日（日）を入力してください。";
	}
	// 住所
	if (strlen($address) == 0) {
		$err_msg[] = "患者様のご住所を入力してください。";
	}
	// 電話番号
	if (strlen($tel) == 0) {
		$err_msg[] = "お電話番号を入力してください。";
	}
	// メールアドレス
	if (strlen($email) == 0) {
		$err_msg[] = "メールアドレスを入力してください。";
	} else {
		if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
			$err_msg[] = "正しいメールアドレスを入力してください。";
		}
	}
	// 保険証
	if (strlen($card) == 0) {
		$err_msg[] = "保険証の有無を入力してください。";
	}
	// お問合せ内容
	if (strlen($message) == 0) {
		$err_msg[] = "ご病状、お問合せ内容を入力してください。";
	}

	return $err_msg;
}

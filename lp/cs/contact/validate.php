<?php
/**
 * KobeBeauty PHP Contact Form
 * http://www.kobe-beauty.co.jp/
 *
 * Copyright (c) 2014 Kobe Beauty Co., Ltd.
 * Released under the MIT license
 */

function checkInputData($inputData) {
	// エラーメッセージを格納する配列
	$err_msg = array();

	// 各入力内容を取得
  $name = isset($inputData["name"]) ? $inputData["name"] : "";
  $gender = isset($inputData["gender"]) ? $inputData["gender"] : "";
	$birthyear = isset($inputData["birthyear"]) ? $inputData["birthyear"] : "";
	$birthmonth = isset($inputData["birthmonth"]) ? $inputData["birthmonth"] : "";
	$birthday = isset($inputData["birthday"]) ? $inputData["birthday"] : "";
	$address = isset($inputData["address"]) ? $inputData["address"] : "";
  $tel = isset($inputData["tel"]) ? $inputData["tel"] : "";
	$email = isset($inputData["email"]) ? $inputData["email"] : "";
	$card = isset($inputData["card"]) ? $inputData["card"] : "";
  $message = isset($inputData["message"]) ? $inputData["message"] : "";

	// お名前
	if (strlen($name) == 0) {
		$err_msg[] = "All fields are required.";
	}
	// 性別
	if (strlen($gender) == 0) {
		$err_msg[] = "All fields are required.";
	}
	// 生年月日（年）
	if (strlen($birthyear) == 0) {
		$err_msg[] = "All fields are required.";
	}
	// 生年月日（月）
	if (strlen($birthmonth) == 0) {
		$err_msg[] = "All fields are required.";
	}
	// 生年月日（日）
	if (strlen($birthday) == 0) {
		$err_msg[] = "All fields are required.";
	}
	// 住所
	if (strlen($address) == 0) {
		$err_msg[] = "All fields are required.";
	}
	// 電話番号
	if (strlen($tel) == 0) {
		$err_msg[] = "All fields are required.";
	}
	// メールアドレス
	if (strlen($email) == 0) {
		$err_msg[] = "All fields are required.";
	} else {
		if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
			$err_msg[] = "All fields are required.";
		}
	}
	// 保険証
	if (strlen($card) == 0) {
		$err_msg[] = "All fields are required.";
	}
	// お問合せ内容
	if (strlen($message) == 0) {
		$err_msg[] = "All fields are required.";
	}

	return $err_msg;
}

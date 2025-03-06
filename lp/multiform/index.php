<?php
// ファイル読み込み
require_once(__DIR__ . '/../contact/init.php');
require_once(__DIR__ . '/../contact/validate.php');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $result = false;

    // 文字コードをセット
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");

    // Collecting form data
    $name = htmlspecialchars($_POST['contact_data']['name']);
    $gender = htmlspecialchars($_POST['contact_data']['gender']);
    $birthgengou = isset($_POST['contact_data']['birthgengou']) ? $_POST['contact_data']['birthgengou'] : "";
    $birthyear = htmlspecialchars($_POST['contact_data']['birthyear']);
    $birthmonth = htmlspecialchars($_POST['contact_data']['birthmonth']);
    $birthday = htmlspecialchars($_POST['contact_data']['birthday']);
    $hotelname = htmlspecialchars($_POST['contact_data']['hotelname']);
    $hoteladdress = htmlspecialchars($_POST['contact_data']['hoteladdress']);
    $symptom = htmlspecialchars($_POST['contact_data']['symptom']);
    $history = htmlspecialchars($_POST['contact_data']['history']);
    $insurance_card = htmlspecialchars($_POST['contact_data']['card']);
    $note = htmlspecialchars($_POST['contact_data']['note']);

    // 送信先
    $to = ADMIN_MAIL;
    // $to = "moonrider.crowdworks@gmail.com";

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
    $body .= "患者様のお名前：　" . $name . "\n";
    $body .= "患者様の性別：　" . $gender . "\n";
    $body .= "患者様の生年月日：　" . $birthgengou . " " . $birthyear . "年 " . $birthmonth . "月 " . $birthday . "日\n";
    $body .= "患者様の滞在先のホテル名・部屋番号: $hotelname\n";
    $body .= "患者様のご住所：　" . $hoteladdress . "\n";
    $body .= "ご病状、お問合せ内容：　" . $symptom . "\n";
    $body .= "既往歴：　" . $history . "\n";
    $body .= "保険証の有無：　" . $insurance_card . "\n";
    $body .= "備考：　" . $note . "\n";
    $body .= "---------------------------------------------------------------------\n";
    $body .= "\n";
	$body .= "このメールはナイトドクターのWebサイトから送信されました。\n";

	// 送信処理
	if (mb_send_mail($to, $subject, $body, "From: " . $from)) {
		$result = true; // 送信成功
	}

    if ($result) {
        $message = "メールを送信しました。";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="ナイトドクター">
<meta name="description" content="夜間と休日に自宅へ医師が訪問する救急往診サービスです">

<title>夜間緊急往診 ナイトドクター</title>

<link rel="icon" href="assets/img/favicon.ico">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/smp_style.css" rel="stylesheet">

<link rel="alternate" href="https://piq.jp/lp/" hreflang="ja">
<link rel="alternate" href="https://piq.jp/lp/en" hreflang="en">
<link rel="alternate" href="https://piq.jp/lp/cs" hreflang="zh-Hans">

<style>
    .accordion {
        width: 60%;
        background: white;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-top: 2rem;
        margin-bottom: 2rem;
        text-align: left;
    }

    .accordion-item {
        border-bottom: 1px solid #ddd;
    }

    .accordion-header {
        background: #2b80d1;
        color: white;
        padding: 15px 4rem 15px 4rem;
        cursor: pointer;
        font-size: 18px;
    }

    .accordion-content {
        display: none;
        padding: 15px 4rem 15px 4rem;
        background: white;
    }

    .active+.accordion-content {
        display: block;
    }

    @media (max-width: 640px) {

        /* Small screens (sm) */
        .accordion {
            width: 90%;
        }

        .accordion-header {
            padding: 10px 2rem 10px 2rem;
            font-size: 12px;
        }

        .accordion-content {
            padding: 10px 2rem 10px 2rem;
            font-size: 12px;
        }
    }

    select.lang {
        width: 120px;
        padding: 8px;
        font-size: 14px;
        color: #333;
        background: #f8f9fa;
        border: 2px solid #2b80d1;
        border-radius: 5px;
        cursor: pointer;
        outline: none;
        transition: all 0.3s ease-in-out;
    }

    /* When hovering */
    select.lang:hover {
        background: #e3f2fd;
    }

    /* When focused */
    select.lang:focus {
        border-color: #1e5ea6;
        box-shadow: 0 0 5px rgba(43, 128, 209, 0.5);
    }

    /* Style dropdown arrow */
    select.lang::-ms-expand {
        display: none;
        /* Hide default arrow in IE */
    }

    select.lang {
        appearance: none;
        /* Remove default styling */
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="%232b80d1"><path d="M7 10l5 5 5-5z"/></svg>');
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 16px;
        padding-right: 30px;
    }

    /* Mobile-friendly adjustments */
    @media (max-width: 600px) {
        select.lang {
            width: 120px;
            font-size: 16px;
        }
    }

    /* 言語選択 */
    .flagdropdown {
        position: relative;
        display: inline-block;
        width: 150px;
    }
    .flagdropdown-toggle {
        background: white;
        border: 1px solid #ccc;
        padding: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .flagdropdown-menu {
        display: none;
        position: absolute;
        right: 0px;
        background: white;
        border: 1px solid #ccc;
        list-style: none;
        padding: 0;
        margin: 0;
        width: 150px;
    }
    .flagdropdown-menu li {
        padding: 10px;
        display: flex;
        align-items: center;
        gap: 5px;
        cursor: pointer;
    }
    .flagdropdown-menu li:hover {
        background: #f0f0f0;
    }
    .flag {
        width: 20px;
        height: 14px;
        margin-left: 10px;
        margin-right: 10px;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Google Tag Manager -->
<script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-MCLNRTF');
</script>
<!-- End Google Tag Manager -->
</head>

<body ontouchstart="" class="page-index" id="top">

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MCLNRTF" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header id="header">
        
        <div class="innerWrap flex_wrap between">

            <h1 class="top_logo">
                <a href="#">
                    <figure><img src="../images/h_logo.svg" alt="ナイトドクター"></figure>
                </a>
            </h1>

            <!-- <select class="lang" onchange="changeLang(event);">
                <option value="jp">🇯🇵 日本語</option>
                <option value="en">🇺🇸 English</option>
                <option value="zh">🇨🇳 中文</option>
                <option value="kr">🇰🇷 한국어</option>
                <option value="my">🇲🇾 Bahasa</option>
            </select> -->
            <div class="flagdropdown">
                <div class="flagdropdown-toggle" onclick="toggleDropdown()">
                    <img id="selected-flag" class="flag" src="https://flagcdn.com/w40/us.png" alt="US">
                    <span id="selected-text">English</span>
                </div>
                <ul id="flagdropdown-menu" class="flagdropdown-menu">
                    <li onclick="selectLanguage('en', 'https://flagcdn.com/w40/us.png', 'English')">
                        <img class="flag" src="https://flagcdn.com/w40/us.png" alt="US"> English
                    </li>
                    <li onclick="selectLanguage('zh', 'https://flagcdn.com/w40/cn.png', '中文')">
                        <img class="flag" src="https://flagcdn.com/w40/cn.png" alt="CN"> 中文
                    </li>
                    <li onclick="selectLanguage('kr', 'https://flagcdn.com/w40/kr.png', '한국어')">
                        <img class="flag" src="https://flagcdn.com/w40/kr.png" alt="KR"> 한국어
                    </li>
                    <li onclick="selectLanguage('my', 'https://flagcdn.com/w40/my.png', 'Bahasa')">
                        <img class="flag" src="https://flagcdn.com/w40/my.png" alt="MY"> Bahasa
                    </li>
                    <li onclick="selectLanguage('jp', 'https://flagcdn.com/w40/jp.png', '日本語')">
                        <img class="flag" src="https://flagcdn.com/w40/jp.png" alt="JP"> 日本語
                    </li>
                </ul>
            </div>
        </div>
    </header>


    <section id="fst_view">
        <div class="innerWrap" data-animate="fadeIn">
            <figure class="main_ccp">
                <picture>
                    <source srcset="../images/main_catch_pc.png" media="(min-width: 801px)">
                    <img src="../images/main_catch_smp.png" alt="夜間と休日に医師が自宅へ訪問する救急往診サービスです。2020年度 夜間休日往診実績34000件以上">
                </picture>
            </figure>
        </div>

        <div class="intro en" style="text-align: left; background: #2b80d194; color: white; padding: 2rem; display: flex; flex-wrap: wrap; gap: 2rem;">
            <div style="flex: 1; min-width: 300px; padding-left: 5rem;">
                <h2>Service Overview</h2>
                <p>📌 24-hour emergency night-time house call service (house call hours 19:00~5:00)</p>
                <p>📌 Japanese, English, Chinese, Korean, and Malaysian available</p>
                <p>📌 Travel insurance available</p>
                <p>📌 Various medical certificates available</p>
                <p>📌 Credit card and cash payments accepted</p>
                <!-- <p>📌 Over 34,000 night-time and holiday house calls in 2020</p> -->
            </div>
            <div style="flex: 1; min-width: 300px; font-size: x-large; cursor: pointer; padding-left: 5rem;">
                <h2>Emergency Contact</h2>
                <p><a href="tel:0363817511" style="color: white !important;">📞 24-H Hotline：<br class="pc_hidden" />03-6381-7511</a></p>
                <p><a href="#contact" style="color: white !important;">📧 E-mail：piq@piq.jp</a></p>
            </div>
        </div>

        <div class="intro zh" style="text-align: left; background: #2b80d194; color: white; padding: 2rem; display: none; flex-wrap: wrap; gap: 2rem;">
            <div style="flex: 1; min-width: 300px; padding-left: 5rem;">
                <h2>服务介绍</h2>
                <p>📌 24小时紧急夜间上门服务（上门时间 19:00~5:00）</p>
                <p>📌 日语、英语、中文、韩语和马来语可用</p>
                <p>📌 提供旅游保险</p>
                <p>📌 提供各种医疗证明</p>
                <p>📌 接受信用卡和现金支付</p>
                <!-- <p>📌 2020年夜间和节假日上门服务超过34,000次</p> -->
            </div>
            <div style="flex: 1; min-width: 300px; font-size: x-large; cursor: pointer; padding-left: 5rem;">
                <h2>紧急联系方式</h2>
                <p><a href="tel:0363817511" style="color: white !important;">📞 24 小时热线：<br class="pc_hidden" />03-6381-7511</a></p>
                <p><a href="#contact" style="color: white !important;">📧 E-mail：piq@piq.jp</a></p>
            </div>
        </div>

        <div class="intro kr" style="text-align: left; background: #2b80d194; color: white; padding: 2rem; display: none; flex-wrap: wrap; gap: 2rem;">
            <div style="flex: 1; min-width: 300px; padding-left: 5rem;">
                <h2>서비스 개요</h2>
                <p>📌 24시간 대응 야간 구급 왕진 서비스(왕진 시간 19:00~5:00)</p>
                <p>📌 일본어·영어·중국어·한국어·말레이시아어 대응</p>
                <p>📌 여행 보험 적용 가능 </p>
                <p>📌 각종 진단서 발행 가능</p>
                <p>📌 신용 카드 및 현금 결제 지원 </p>
                <!-- <p>📌 2020년도 야간 휴일 왕진 실적 ​​34000건 이상</p> -->
            </div>
            <div style="flex: 1; min-width: 300px; font-size: x-large; cursor: pointer; padding-left: 5rem;">
                <br />
                <h2>긴급 연락처</h2>
                <p><a href="tel:0363817511" style="color: white !important;">📞 24시간 핫라인：<br class="pc_hidden" />03-6381-7511</a></p>
                <p><a href="#contact" style="color: white !important;">📧 E-mail：piq@piq.jp</a></p>
            </div>
        </div>

        <div class="intro my" style="text-align: left; background: #2b80d194; color: white; padding: 2rem; display: none; flex-wrap: wrap; gap: 2rem;">
            <div style="flex: 1; min-width: 300px; padding-left: 5rem;">
                <h2>Gambaran Perkhidmatan</h2>
                <p>📌 Perkhidmatan panggilan rumah kecemasan 24 jam (waktu panggilan rumah 19:00~5:00)</p>
                <p>📌 Bahasa Jepun, Inggeris, Cina, Korea, dan Melayu tersedia</p>
                <p>📌 Insurans perjalanan tersedia</p>
                <p>📌 Pelbagai sijil perubatan tersedia</p>
                <p>📌 Pembayaran kad kredit dan tunai diterima</p>
                <!-- <p>📌 Lebih daripada 34,000 panggilan rumah waktu malam dan cuti pada tahun 2020</p> -->
            </div>
            <div style="flex: 1; min-width: 300px; font-size: x-large; cursor: pointer; padding-left: 5rem;">
                <h2>Hubungi Kecemasan</h2>
                <p><a href="tel:0363817511" style="color: white !important;">📞 24-H Hotline：<br class="pc_hidden" />03-6381-7511</a></p>
                <p><a href="#contact" style="color: white !important;">📧 E-mail：piq@piq.jp</a></p>
            </div>
        </div>

        <div class="intro jp" style="text-align: left; background: #2b80d194; color: white; padding: 2rem; display: none; flex-wrap: wrap; gap: 2rem;">
            <div style="flex: 1; min-width: 300px; padding-left: 5rem;">
                <h2>サービス概要</h2>
                <p>📌 24時間対応の夜間救急往診サービス(往診時間19:00~5:00)</p>
                <p>📌 日本語・英語・中国語・韓国語・マレーシア語対応</p>
                <p>📌 旅行保険適用可能</p>
                <p>📌 各種診断書発行可能</p>
                <p>📌 クレジットカード及び現金決済対応</p>
                <!-- <p>📌 2020年度 夜間休日往診実績34000件以上</p> -->
            </div>
            <div style="flex: 1; min-width: 300px; font-size: x-large; cursor: pointer; padding-left: 5rem;">
                <h2>緊急連絡先</h2>
                <p><a href="tel:0363817511" style="color: white !important;">📞 24時間ホットライン：<br class="pc_hidden" />03-6381-7511</a></p>
                <p><a href="#contact" style="color: white !important;">📧 E-mail：piq@piq.jp</a></p>
            </div>
        </div>
    </section>


    <main id="main">

        <section id="contact">
            <div class="innerWrap en" data-animate="fadeInUp">
                <h2 class="sec_ttl">
                    <span>House call request form</span>
                </h2>

                <small>For those who wish to have a medical examination by a doctor, please fill out the form below.<br /> We will also issue receipts and medical certificates as required for travel insurance coverage.</small>

                <?php if (isset($err_msg) && count($err_msg) > 0) { ?>
                    <script type="text/javascript">
                        $(function() {
                            var n = window.location.href.slice(window.location.href.indexOf('?') + 4);
                            var p = $("#contact").offset().top;
                            $('html,body').animate({
                                scrollTop: p
                            }, 'slow');
                            return false;
                        });
                    </script>
                    <div class="error-msg">
                        <ul class="error">
                            <?php foreach ($err_msg as $msg) { ?>
                                <li><?php echo $msg; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>


                <div class="cform_wrap" id="cform">
                    <form name="contactform" role="form" method="post" action="">

                        <table class="form_table">
                            <tr>
                                <td class="input_ttl">Name<span class="required">required</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[name]" placeholder="John Doe" value="">
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">Gender<span class="required">required</span></td>
                                <td class="input_source">
                                    <input type="radio" name="contact_data[gender]" value="男性" id="radio-men">
                                    <label for="radio-men"> Male</label>
                                    <input type="radio" name="contact_data[gender]" value="女性" id="radio-women">
                                    <label for="radio-women"> Female</label>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">Date of Birth<span class="required">required</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[birthyear]" placeholder="2000" value="" class="wts">
                                    <input type="text" name="contact_data[birthmonth]" placeholder="01" value="" class="wts">
                                    <input type="text" name="contact_data[birthday]" placeholder="01" value="" class="wts">
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">Hotel name and room number<span class="required">required</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[hotelname]" placeholder="Grand Hotel 301" value="">
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">Address (where to stay)<span class="required">required</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[hoteladdress]" placeholder="Tokyo Minato-ku" value="">
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">Current Symptoms<span class="required">required</span></td>
                                <td class="input_source">
                                    <textarea name="contact_data[symptom]"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">Anamnesis<span class="required">required</span></td>
                                <td class="input_source">
                                    <textarea name="contact_data[history]"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">You have insurance card?<span class="required">required</span></td>
                                <td class="input_source">
                                    <select name="contact_data[card]" class="wtsl">
                                        <option value="--"></option>
                                        <option value="有">Yes</option>
                                        <option value="無">No</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">Note</td>
                                <td class="input_source">
                                    <textarea name="contact_data[note]"></textarea>
                                </td>
                            </tr>
                        </table>

                        <button type="submit" name="btnSubmit" class="btn">Submit</button>
                        <input type="hidden" name="act" value="2">

                    </form>
                </div>

            </div>

            <div class="innerWrap zh" data-animate="fadeInUp" style="display: none;">
                <h2 class="sec_ttl">
                    <span>替代医疗申请表</span>
                </h2>

                <small>希望接受医生检查的人，请填写下方表格。<br />我们还会根据旅行保险 要求提供收据和医疗证明。</small>

                <?php if (isset($err_msg) && count($err_msg) > 0) { ?>
                    <script type="text/javascript">
                        $(function() {
                            var n = window.location.href.slice(window.location.href.indexOf('?') + 4);
                            var p = $("#contact").offset().top;
                            $('html,body').animate({
                                scrollTop: p
                            }, 'slow');
                            return false;
                        });
                    </script>
                    <div class="error-msg">
                        <ul class="error">
                            <?php foreach ($err_msg as $msg) { ?>
                                <li><?php echo $msg; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>


                <div class="cform_wrap" id="cform">
                    <form name="contactform" role="form" method="post" action="">

                        <table class="form_table">
                            <tr>
                                <td class="input_ttl">名称 <span class="required">必填</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[name]" placeholder="" value="">
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">性别<span class="required">必填</span></td>
                                <td class="input_source">
                                    <input type="radio" name="contact_data[gender]" value="男性" id="radio-men">
                                    <label for="radio-men"> 男</label>
                                    <input type="radio" name="contact_data[gender]" value="女性" id="radio-women">
                                    <label for="radio-women"> 女</label>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">出生日期<span class="required">必填</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[birthyear]" placeholder="2000" value="" class="wts">年
                                    <input type="text" name="contact_data[birthmonth]" placeholder="01" value="" class="wts">月
                                    <input type="text" name="contact_data[birthday]" placeholder="01" value="" class="wts">日
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">酒店名称和房间号<span class="required">必填</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[hotelname]" placeholder="Grand Hotel 301" value="">
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">地址（您下榻的地方 )<span class="required">必填</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[hoteladdress]" placeholder="东京港区301" value="">
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">目前需要帮助的症状<span class="required">必填</span></td>
                                <td class="input_source">
                                    <textarea name="contact_data[symptom]"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">以前的疾病<span class="required">必填</span></td>
                                <td class="input_source">
                                    <textarea name="contact_data[history]"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">您有旅行保险吗？<span class="required">必填</span></td>
                                <td class="input_source">
                                    <select name="contact_data[card]" class="wtsl">
                                        <option value="--"></option>
                                        <option value="有">是</option>
                                        <option value="無">不</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">备注</td>
                                <td class="input_source">
                                    <textarea name="contact_data[note]"></textarea>
                                </td>
                            </tr>
                        </table>

                        <button type="submit" name="btnSubmit" class="btn">发送</button>
                        <input type="hidden" name="act" value="2">

                    </form>
                </div>

            </div>

            <div class="innerWrap kr" data-animate="fadeInUp" style="display: none;">
                <h2 class="sec_ttl">
                    <span>진료 의뢰서</span>
                </h2>

                <small>의사 진료를 희망하시는 분은 아래 양식에 기입해 주세요. <br />여행 보험 적용에 필요 한 영수증과 진단서도 발급해 드립니다. </small>

                <?php if (isset($err_msg) && count($err_msg) > 0) { ?>
                    <script type="text/javascript">
                        $(function() {
                            var n = window.location.href.slice(window.location.href.indexOf('?') + 4);
                            var p = $("#contact").offset().top;
                            $('html,body').animate({
                                scrollTop: p
                            }, 'slow');
                            return false;
                        });
                    </script>
                    <div class="error-msg">
                        <ul class="error">
                            <?php foreach ($err_msg as $msg) { ?>
                                <li><?php echo $msg; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>


                <div class="cform_wrap" id="cform">
                    <form name="contactform" role="form" method="post" action="">

                        <table class="form_table">
                            <tr>
                                <td class="input_ttl">이름 <span class="required">필수</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[name]" placeholder="" value="">
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">성별<span class="required">필수</span></td>
                                <td class="input_source">
                                    <input type="radio" name="contact_data[gender]" value="男性" id="radio-men">
                                    <label for="radio-men"> 남성</label>
                                    <input type="radio" name="contact_data[gender]" value="女性" id="radio-women">
                                    <label for="radio-women"> 여성</label>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">생년월일<span class="required">필수</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[birthyear]" placeholder="2000" value="" class="wts">년
                                    <input type="text" name="contact_data[birthmonth]" placeholder="01" value="" class="wts">월
                                    <input type="text" name="contact_data[birthday]" placeholder="01" value="" class="wts">일
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">호텔명・객실번호<span class="required">필수</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[hotelname]" placeholder="Grand Hotel 301" value="">
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">주소(숙소)<span class="required">필수</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[hoteladdress]" placeholder="도쿄 미나토" value="">
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">현재 고민하는 증상<span class="required">필수</span></td>
                                <td class="input_source">
                                    <textarea name="contact_data[symptom]"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">기왕증<span class="required">필수</span></td>
                                <td class="input_source">
                                    <textarea name="contact_data[history]"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">여행자 보험에 가입하셨나요?<span class="required">필수</span></td>
                                <td class="input_source">
                                    <select name="contact_data[card]" class="wtsl">
                                        <option value="--"></option>
                                        <option value="有">예</option>
                                        <option value="無">아니</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">비고</td>
                                <td class="input_source">
                                    <textarea name="contact_data[note]"></textarea>
                                </td>
                            </tr>
                        </table>

                        <button type="submit" name="btnSubmit" class="btn">제출</button>
                        <input type="hidden" name="act" value="2">

                    </form>
                </div>

            </div>

            <div class="innerWrap my" data-animate="fadeInUp" style="display: none;">
                <h2 class="sec_ttl">
                    <span>Borang permintaan panggilan rumah</span>
                </h2>

                <small>Bagi mereka yang ingin menjalani pemeriksaan kesihatan oleh doktor, sila isikan borang di bawah.<br /> Kami juga akan mengeluarkan resit dan sijil perubatan seperti yang diperlukan untuk perlindungan insurans perjalanan.</small>

                <?php if (isset($err_msg) && count($err_msg) > 0) { ?>
                    <script type="text/javascript">
                        $(function() {
                            var n = window.location.href.slice(window.location.href.indexOf('?') + 4);
                            var p = $("#contact").offset().top;
                            $('html,body').animate({
                                scrollTop: p
                            }, 'slow');
                            return false;
                        });
                    </script>
                    <div class="error-msg">
                        <ul class="error">
                            <?php foreach ($err_msg as $msg) { ?>
                                <li><?php echo $msg; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>


                <div class="cform_wrap" id="cform">
                    <form name="contactform" role="form" method="post" action="">

                        <table class="form_table">
                            <tr>
                                <td class="input_ttl">Nama <span class="required">dikehendaki</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[name]" placeholder="" value="">
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">Jantina<span class="required">dikehendaki</span></td>
                                <td class="input_source">
                                    <input type="radio" name="contact_data[gender]" value="男性" id="radio-men">
                                    <label for="radio-men"> Jantan</label>
                                    <input type="radio" name="contact_data[gender]" value="女性" id="radio-women">
                                    <label for="radio-women"> Perempuan</label>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">Tarikh Lahir<span class="required">dikehendaki</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[birthyear]" placeholder="2000" value="" class="wts">Tahun
                                    <input type="text" name="contact_data[birthmonth]" placeholder="01" value="" class="wts">Bulan
                                    <input type="text" name="contact_data[birthday]" placeholder="01" value="" class="wts">Hari
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">Nama hotel dan nombor bilik<span class="required">dikehendaki</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[hotelname]" placeholder="Grand Hotel 301" value="">
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">Alamat (tempat tinggal)<span class="required">dikehendaki</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[hoteladdress]" placeholder="Tokyo Minato-ku" value="">
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">Gejala Semasa<span class="required">dikehendaki</span></td>
                                <td class="input_source">
                                    <textarea name="contact_data[symptom]"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">Anamnesis<span class="required">dikehendaki</span></td>
                                <td class="input_source">
                                    <textarea name="contact_data[history]"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">Anda mempunyai insurans perjalanan?<span class="required">dikehendaki</span></td>
                                <td class="input_source">
                                    <select name="contact_data[card]" class="wtsl">
                                        <option value="--"></option>
                                        <option value="有">Boleh</option>
                                        <option value="無">Tidak</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">Nota</td>
                                <td class="input_source">
                                    <textarea name="contact_data[note]"></textarea>
                                </td>
                            </tr>
                        </table>

                        <button type="submit" name="btnSubmit" class="btn">Hantar</button>
                        <input type="hidden" name="act" value="2">

                    </form>
                </div>

            </div>

            <div class="innerWrap jp" data-animate="fadeInUp" style="display: none;">
                <h2 class="sec_ttl">
                    <span>ご依頼フォーム</span>
                </h2>

                <small>下記患者さま情報を全てご記入いただき、<br />送信ボタンをクリックしてください。</small>

                <?php if (isset($err_msg) && count($err_msg) > 0) { ?>
                    <script type="text/javascript">
                        $(function() {
                            var n = window.location.href.slice(window.location.href.indexOf('?') + 4);
                            var p = $("#contact").offset().top;
                            $('html,body').animate({
                                scrollTop: p
                            }, 'slow');
                            return false;
                        });
                    </script>
                    <div class="error-msg">
                        <ul class="error">
                            <?php foreach ($err_msg as $msg) { ?>
                                <li><?php echo $msg; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>


                <div class="cform_wrap" id="cform">
                    <form name="contactform" role="form" method="post" action="">

                        <table class="form_table">
                            <tr>
                                <td class="input_ttl">お名前<span class="required">必須</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[name]" placeholder="山田 一郎" value="">
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">性別<span class="required">必須</span></td>
                                <td class="input_source">
                                    <input type="radio" name="contact_data[gender]" value="男性" id="radio-men">
                                    <label for="radio-men"> 男性</label>
                                    <input type="radio" name="contact_data[gender]" value="女性" id="radio-women">
                                    <label for="radio-women"> 女性</label>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">生年月日<span class="required">必須</span></td>
                                <td class="input_source">
                                    <select name="contact_data[birthgengou]" class="wtsl">
                                        <option value="--">選択してください</option>
                                        <option value="大正">大正</option>
                                        <option value="昭和">昭和</option>
                                        <option value="平成">平成</option>
                                        <option value="令和">令和</option>
                                    </select>
                                    <input type="text" name="contact_data[birthyear]" placeholder="" value="" class="wts">年
                                    <input type="text" name="contact_data[birthmonth]" placeholder="" value="" class="wts">月
                                    <input type="text" name="contact_data[birthday]" placeholder="" value="" class="wts">日
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">滞在先のホテル名・部屋番号<span class="required">必須</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[hotelname]" placeholder="Grandホテル 301" value="">
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">滞在先のホテル住所<span class="required">必須</span></td>
                                <td class="input_source">
                                    <input type="text" name="contact_data[hoteladdress]" placeholder="東京都" value="">
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">現在の症状<span class="required">必須</span></td>
                                <td class="input_source">
                                    <textarea name="contact_data[symptom]"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">既往歴<span class="required">必須</span></td>
                                <td class="input_source">
                                    <textarea name="contact_data[history]"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">旅行保険加入有無<span class="required">必須</span></td>
                                <td class="input_source">
                                    <select name="contact_data[card]" class="wtsl">
                                        <option value="--">選択してください</option>
                                        <option value="有">有</option>
                                        <option value="無">無</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td class="input_ttl">備考</td>
                                <td class="input_source">
                                    <textarea name="contact_data[note]"></textarea>
                                </td>
                            </tr>
                        </table>

                        <button type="submit" name="btnSubmit" class="btn">送信</button>
                        <input type="hidden" name="act" value="2">

                    </form>
                </div>

            </div>
        </section>

        <section class="section" id="faq">
            <div class="accordion en">
                <h2 style="text-align: center; padding: 1rem;">FAQ(Q&A)</h2>
                <div class="accordion-item">
                    <div class="accordion-header">Q：What symptoms can it be used for?</div>
                    <div class="accordion-content">A：Fever, headache, stomachache, vomiting, feeling unwell, minor injuries, etc.</div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">Q：How long will it take for the doctor to arrive?</div>
                    <div class="accordion-content">A：The visit usually takes about 30 minutes to 1 hour (depending on the situation).</div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">Q：How much does it cost?</div>
                    <div class="accordion-content">A：The cost varies depending on the contents of the consultation, but it will be around 50,000 yen, as it will be 100% of the normal medical insurance burden. If travel insurance is applicable, you can be examined without any out-of-pocket expenses.</div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">Q：Is travel insurance applicable?</div>
                    <div class="accordion-content">A：If you have insurance with an affiliated insurance company, your insurance may apply. Please ask our staff for details.</div>
                </div>
            </div>

            <div class="accordion zh" style="display: none;">
                <h2 style="text-align: center; padding: 1rem;">常见问题 (Q&A)</h2>
                <div class="accordion-item">
                    <div class="accordion-header">Q：可以用于哪些症状？</div>
                    <div class="accordion-content">A：发烧、头痛、胃痛、呕吐、身体不适、轻伤等。</div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">Q：医生要多久才能到？</div>
                    <div class="accordion-content">A：一般约为30分钟至1小时（视拥堵情况而定）。</div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">Q：需要多少钱？</div>
                    <div class="accordion-content">A：费用根据咨询内容不同而不同，但由于普通医疗保险将100％承担，因此费用约为50,000日元左右。如果您有旅行保险，您可以免费就诊。</div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">Q：旅行保险是否承保？</div>
                    <div class="accordion-content">A：如果您受该公司附属的保险公司的承保，您可能有资格获得保险。详情请与我们的职员联络。</div>
                </div>
            </div>

            <div class="accordion kr" style="display: none;">
                <h2 style="text-align: center; padding: 1rem;">자주 묻는 질문 (Q&A)</h2>
                <div class="accordion-item">
                    <div class="accordion-header">Q：어떤 증상이 발생할 때 사용할 수 있습니까?</div>
                    <div class="accordion-content">A：발열, 두통, 복통, 구토, 컨디션 불량, 경미한 부상 등</div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">Q：의사가 몇분만에 옵니까?</div>
                    <div class="accordion-content">A：통상 30분~1시간 정도입니다(혼잡 상황에 의해 전후합니다)</div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">Q：요금은 얼마입니까?</div>
                    <div class="accordion-content">A：요금은 진찰 내용에 따라 다릅니다만 통상의 보험 진료 10할 부담액이 되기 때문에 50,000엔 전후가 됩니다. 여행 보험이 적용되는 경우는 자기 부담 없이 진찰 가능합니다.</div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">Q：여행 보험이 적용됩니까?</div>
                    <div class="accordion-content">A：제휴하는 보험회사의 보험에 가입하고 있는 경우, 보험 적용이 가능합니다. 자세한 내용은 직원에게 문의하십시오.</div>
                </div>
            </div>

            <div class="accordion my" style="display: none;">
                <h2 style="text-align: center; padding: 1rem;">Soalan Lazim (S&J)</h2>
                <div class="accordion-item">
                    <div class="accordion-header">S：Apakah gejala yang boleh digunakan?</div>
                    <div class="accordion-content">J：Demam, sakit kepala, sakit perut, muntah, rasa tidak sihat, kecederaan ringan, dll.</div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">S：Berapa lamakah masa yang diambil untuk doktor tiba?</div>
                    <div class="accordion-content">J：Lawatan biasanya mengambil masa kira-kira 30 minit hingga 1 jam (bergantung kepada keadaan kesesakan).</div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">S：Berapa kosnya?</div>
                    <div class="accordion-content">J：Yuran berbeza-beza bergantung pada perundingan, tetapi ia akan menjadi sekitar 50,000 yen, kerana ia akan dilindungi oleh 100% daripada insurans perubatan biasa. Jika insurans perjalanan anda melindungi anda, anda boleh dilihat tanpa sebarang kos kepada anda.</div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">S：Adakah insurans perjalanan tersedia?</div>
                    <div class="accordion-content">J：Jika anda dilindungi oleh syarikat insurans yang bergabung dengan syarikat itu, anda mungkin layak mendapat perlindungan insurans. Sila hubungi kakitangan kami untuk butiran.</div>
                </div>
            </div>

            <div class="accordion jp" style="display: none;">
                <h2 style="text-align: center; padding: 1rem;">よくある質問(Q&A)</h2>
                <div class="accordion-item">
                    <div class="accordion-header">Q：どんな症状の時に利用できますか？</div>
                    <div class="accordion-content">A：発熱・頭痛・腹痛・嘔吐・体調不良・軽度の怪我など</div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">Q：どれくらいの時間で医師が来ますか？</div>
                    <div class="accordion-content">A：通常30分〜1時間程度で訪問します(混雑状況により前後します)</div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">Q：料金はいくらですか？</div>
                    <div class="accordion-content">A：料金は診察内容により異なりますが通常の保険診療10割負担額になりますので50,000円前後になります。旅行保険が適用される場合は自己負担なしで診察可能です。</div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">Q：旅行保険は適用されますか？</div>
                    <div class="accordion-content">A：提携する保険会社の保険に加入している場合、保険適用が可能です。詳細はスタッフにお問い合わせください。</div>
                </div>
            </div>
            <script>
                document.querySelectorAll(".accordion-header").forEach(header => {
                    header.addEventListener("click", () => {
                        header.classList.toggle("active");
                    });
                });
            </script>
        </section>
    </main>


    <footer id="footer" class="bg_main">
        <div class="ft_logo">
            <a href="#top">
                <figure><img src="../images/v_logo.svg" alt="ナイトドクター"></figure>
            </a>
        </div>

        <div id="goto_top" class="fadeup">
            <a href="#top">
                <figure><img src="../images/add_arrow.svg" alt=""></figure>
            </a>
        </div>

        <small class="cpright">&copy; 2021 NightDoctor / ナイトドクター</small>
    </footer>


    <!--// CTA //-->
    <article id="cta" class="fadeup">
        <ul class="flex_wrap">
            <li>
                <a href="tel:0363817511">
                    <figure><img src="../images/icon_cta_01.png" alt=""></figure><span class="smp_txt">電話でのご相談</span>
                </a>
            </li>

            <li>
                <a href="https://line.me/R/ti/p/%40737qdagd" target="_blank">
                    <figure><img src="../images/icon_cta_02.png" alt=""></figure><span class="smp_txt">LINEでのご相談</span>
                </a>
            </li>

            <li>
                <a href="#contact">
                    <figure><img src="../images/icon_cta_03.png" alt=""></figure><span class="smp_txt">メールでのご相談</span>
                </a>
            </li>
        </ul>
    </article>
    <!--// #CTA //-->


    <script src="../js/script.js"></script>
    <script>
        function toggleDropdown() {
            document.getElementById("flagdropdown-menu").style.display = "block";
        }
        function selectLanguage(lang, flagSrc, text) {
            document.getElementById("selected-flag").src = flagSrc;
            document.getElementById("selected-text").innerText = text;
            document.getElementById("flagdropdown-menu").style.display = "none";

            $("#contact .innerWrap").hide();
            $("#fst_view .intro").hide();
            $("#faq .accordion").hide();
            $("#contact ." + lang).show();
            $("#fst_view ." + lang).css("display", "flex");
            $("#faq ." + lang).show();
        }
        document.addEventListener("click", function(event) {
            if (!event.target.closest(".flagdropdown")) {
                document.getElementById("flagdropdown-menu").style.display = "none";
            }
        });

        // function changeLang(e) {
        //     $("#contact .innerWrap").hide();
        //     $("#fst_view .intro").hide();
        //     $("#faq .accordion").hide();
        //     var lang = e.target.value;
        //     $("#contact ." + lang).show();
        //     $("#fst_view ." + lang).css("display", "flex");
        //     $("#faq ." + lang).show();
        // }
    </script>
</body>

</html>
<?php
// ファイル読み込み
require_once( __DIR__ . '/contact/init.php');
require_once( __DIR__ . '/contact/validate.php');

global $param;

//操作アクションを取得
$act = isset($_POST["act"]) ? intval($_POST["act"]) : 1;

if ($act == 1) {
  // セッションデータクリア
  $contact_data = array();
  // 初期値セット
  $err_msg = array();
  $name = '';
  $gender = '';
  $birthgengou = '';
  $birthyear = '';
  $birthmonth = '';
  $birthday = '';
  $address = '';
  $tel = '';
  $email = '';
  $card = '';
  $cardtype = '';
  $message = '';

} elseif ($act == 2) { // 確認ボタンを押下された場合
  // POSTデータをセッションに格納
  $_SESSION["contact_data"] = isset($_POST["contact_data"]) ? $_POST["contact_data"] : array();
  // セッションデータを配列にセット
  $contact_data = $_SESSION["contact_data"];
  // 各項目データをセット
  $name = isset($contact_data["name"]) ? $contact_data["name"] : "";
  $gender = isset($contact_data["gender"]) ? $contact_data["gender"] : "";
  $birthgengou = isset($contact_data["birthgengou"]) ? $contact_data["birthgengou"] : "";
  $birthyear = isset($contact_data["birthyear"]) ? $contact_data["birthyear"] : "";
  $birthmonth = isset($contact_data["birthmonth"]) ? $contact_data["birthmonth"] : "";
  $birthday = isset($contact_data["birthday"]) ? $contact_data["birthday"] : "";
  $address = isset($contact_data["address"]) ? $contact_data["address"] : "";
  $tel = isset($contact_data["tel"]) ? $contact_data["tel"] : "";
  $email = isset($contact_data["email"]) ? $contact_data["email"] : "";
  $card = isset($contact_data["card"]) ? $contact_data["card"] : "";
  $cardtype = isset($contact_data["cardtype"]) ? $contact_data["cardtype"] : "";
  $message = isset($contact_data["message"]) ? $contact_data["message"] : "";

  // 入力チェック
  $err_msg = checkInputData($contact_data);
  if(!$err_msg){
    header("Location: confirm.php");
    exit();
  }

} else {
  // セッションデータ取得
  $contact_data = isset($_SESSION["contact_data"]) ? $_SESSION["contact_data"] : array();
  // 各項目データをセット
  $name = isset($contact_data["name"]) ? $contact_data["name"] : "";
  $gender = isset($contact_data["gender"]) ? $contact_data["gender"] : "";
  $birthgengou = isset($contact_data["birthgengou"]) ? $contact_data["birthgengou"] : "";
  $birthyear = isset($contact_data["birthyear"]) ? $contact_data["birthyear"] : "";
  $birthmonth = isset($contact_data["birthmonth"]) ? $contact_data["birthmonth"] : "";
  $birthday = isset($contact_data["birthday"]) ? $contact_data["birthday"] : "";
  $address = isset($contact_data["address"]) ? $contact_data["address"] : "";
  $tel = isset($contact_data["tel"]) ? $contact_data["tel"] : "";
  $email = isset($contact_data["email"]) ? $contact_data["email"] : "";
  $card = isset($contact_data["card"]) ? $contact_data["card"] : "";
  $cardtype = isset($contact_data["cardtype"]) ? $contact_data["cardtype"] : "";
  $message = isset($contact_data["message"]) ? $contact_data["message"] : "";

}

$page_id = 'index';
$page_title = '夜間緊急往診 ナイトドクター';
$page_description = '夜間と休日に自宅へ医師が訪問する救急往診サービスです';
require("header.php");

?>

<section id="intro">
  <div class="container">
    <p>
      <strong>夜間・休日</strong>でも電話・LINEで予約可能！<br>
      <strong>最短30分で医師が診察に伺い</strong>、その場でお薬をお渡しします。
    </p>
  </div>
</section>


<div class="section" id="pcr">
  <div class="container">
    <a href="https://piq.jp/pcr" class="btn-corona" target="_blank">
      <div class="pic">
        <img src="assets/img/corona_pic.jpg" alt="ポケットドクター"><br>
      </div>
      <div class="text">
        <p>
          <strong>新型コロナウイルス</strong><br>出張 or セルフPCR検査
          <span class="sub">特設サイトへ</span>
        </p>
      </div>
    </a>
  </div>
</div>

<section class="section" id="video">
  <div class="container">
    <div class="iframe-wrapper">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/T-z4nHQWlzo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="row">
      <div class="col-md-4">
        <figure class="pic">
          <img src="assets/img/concept.png" alt="Fair, Flow, Fast">
        </figure>
      </div>
      <div class="col-md-8">
        <p class="lead">
          「夜間や休日に救急車を呼ぶほどではないが、救急外来まで自分ではいけない。」<br class="pc">「病院へ行って二次感染になりたくない。」などという<br class="pc">多くの声やご希望に寄り添い、ナイトドクターでは、夜間・休日でもお電話一本で医師がご自宅へ診療に伺い、<br class="pc">処方の薬をその場でお渡しさせて頂いております。
        </p>
        <p class="lead">
          夜間や休日時に発熱があったり体調を崩してしまったお子様から高齢者まで幅広い方々をご自宅にて診察致します。
        </p>
        <p class="lead">
          高齢化、単身世帯の急増、ライフスタイルの多様化などに伴う医療に対する社会のニーズに貢献して参ります。
        </p>
      </div>
    </div>
  </div>
</section>

<section class="section" id="media">
  <div class="container" data-animate="fadeInUp">
    <h2>メディア出演実績</h2>
    <div class="row no-gutters">
      <div class="col-md-4">
        <ul class="media-list">
          <li>
            <span class="date">2020/07/30</span>
            <span class="tv">
              <span class="station">テレビ東京</span>
              <span class="program">WBS</span>
            </span>
          </li>
          <li>
            <span class="date">2020/07/30</span>
            <span class="tv">
              <span class="station">フジテレビ</span>
              <span class="program">とくダネ！</span>
            </span>
          </li>
          <li>
            <span class="date">2020/07/31</span>
            <span class="tv">
              <span class="station">TBS</span>
              <span class="program">あさチャン!</span>
            </span>
          </li>
          <li>
            <span class="date">2020/07/31</span>
            <span class="tv">
              <span class="station">TBS</span>
              <span class="program">グッとラック</span>
            </span>
          </li>
          <li>
            <span class="date">2020/07/31</span>
            <span class="tv">
              <span class="station">TBS</span>
              <span class="program">ひるおび！</span>
            </span>
          </li>
          <li>
            <span class="date">2020/08/03</span>
            <span class="tv">
              <span class="station">テレビ朝日</span>
              <span class="program">スーパーＪチャンネル</span>
            </span>
          </li>
          <li>
            <span class="date">2020/08/07</span>
            <span class="tv">
              <span class="station">TBS</span>
              <span class="program">あさチャン!</span>
            </span>
          </li>
        </ul>
      </div>
      <div class="col-md-4">
        <ul class="media-list">
          <li>
            <span class="date">2020/08/09</span>
            <span class="tv">
              <span class="station">フジテレビ</span>
              <span class="program">日曜報道プライム</span>
            </span>
          </li>
          <li>
            <span class="date">2020/08/15</span>
            <span class="tv">
              <span class="station">テレビ朝日</span>
              <span class="program">サンデーLIVE!!</span>
            </span>
          </li>
          <li>
            <span class="date">2020/08/17</span>
            <span class="tv">
              <span class="station">NHK</span>
              <span class="program">ニュースウオッチ９</span>
            </span>
          </li>
          <li>
            <span class="date">2020/08/20</span>
            <span class="tv">
              <span class="station">日本テレビ</span>
              <span class="program">ZIP!</span>
            </span>
          </li>
          <li>
            <span class="date">2020/08/20</span>
            <span class="tv">
              <span class="station">日本テレビ</span>
              <span class="program">情報ライブミヤネ屋</span>
            </span>
          </li>
          <li>
            <span class="date">2020/08/21</span>
            <span class="tv">
              <span class="station">フジテレビ</span>
              <span class="program">グッディ</span>
            </span>
          </li>
          <li>
            <span class="date">2020/08/21</span>
            <span class="tv">
              <span class="station">TBS</span>
              <span class="program">Nスタ</span>
            </span>
          </li>
        </ul>
      </div>
      <div class="col-md-4">
        <ul class="media-list">
          <li>
            <span class="date">2020/08/27</span>
            <span class="tv">
              <span class="station">テレビ朝日</span>
              <span class="program">グッド!モーニング</span>
            </span>
          </li>
          <li>
            <span class="date">2021/08/19</span>
            <span class="tv">
              <span class="station">TBS</span>
              <span class="program">Nスタ</span>
            </span>
          </li>
          <li>
            <span class="date">2021/09/05</span>
            <span class="tv">
              <span class="station">テレビ朝日</span>
              <span class="program">サンデーステーション</span>
            </span>
          </li>
          <li>
            <span class="date">2021/09/06</span>
            <span class="tv">
              <span class="station">テレビ朝日</span>
              <span class="program">グッド!モーニング</span>
            </span>
          </li>
          <li>
            <span class="date">2021/09/06</span>
            <span class="tv">
              <span class="station">テレビ朝日</span>
              <span class="program">ワイド!スクランブル</span>
            </span>
          </li>
          <li>
            <span class="date">2021/09/07</span>
            <span class="tv">
              <span class="station">日本テレビ</span>
              <span class="program">情報ライブミヤネ屋</span>
            </span>
          </li>
          <li>
            <span class="date">2021/09/08</span>
            <span class="tv">
              <span class="station">フジテレビ</span>
              <span class="program">バイキングMORE</span>
            </span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>


<section class="section cta">
  <div class="container" data-animate="fadeInUp">
    <?php require("cta.php");?>
  </div>
</section>

<section class="section" id="corona">
  <div class="container" data-animate="fadeInUp">
    <h2>新型コロナウイルス 出張orセルフPCR検査 開始のお知らせ</h2>
    <p class="lead">
      ナイトドクターでは新型コロナウイルスPCR検査を行います。<br>
      自費検査となります。（料金については、お問い合わせください。）
    </p>
    <div class="corona-message">
      <p>
        結果判明まで2時間程度かかります。<br>
        ※リアルタイムPCR検査機にかけた場合の時間になります。<br>
        ご訪問先の検体回収から検査機関への移動時間は含まれておりません
      </p>
    </div>

    <div class="pcr-compare">
      <h3>咽頭拭いと唾液の違い</h3>
      <p class="lead">
        私たちは咽頭のPCR検査を推奨しています。<br>
        ナイトドクターの出張PCR検査は最も感度が良く安全な<br><strong>「口からの咽頭拭い」</strong>の検査になります。
      </p>
        <table class="pcr-table">
        <thead>
          <tr>
            <th></th>
            <th><span class="pickup"><i class="fas fa-star"></i> ナイトドクター推奨</span>咽頭ぬぐい液</th>
            <th>唾液</th>
            <th>抗原検査</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>感度（精度）</th>
            <td>最も感度が高い</td>
            <td>感度が低い<br><span class="sub">※偽陰性、偽陽性になる可能性が高い</span></td>
            <td>感度が低い<br><span class="sub">※陰性となっても新型コロナウイルスに<br class="sp">感染していないと確定することができない</span></td>
          </tr>
          <tr>
            <th>検査対象者</th>
            <td>全ての方が受験可能</td>
            <td>唾液の出ない高齢者は<br class="sp">難易度が高い</td>
            <td>症状が出ている方</td>
          </tr>
          <tr>
            <th>検査結果</th>
            <td>当日</td>
            <td>翌日～2日後</td>
            <td>当日</td>
          </tr>
        </tbody>
      </table>
      <p class="notes sp">表は横にスクロールしてご覧ください</p>
    </div>

    <h2>新型コロナウイルス肺炎の抗体検査</h2>
    <div class="row">
      <div class="col-md-3">
        <figure class="pic">
          <img src="assets/img/corona.jpg" alt="新型コロナウイルス肺炎の抗体検査">
        </figure>
      </div>
      <div class="col-md-9">
        <p>
          ナイトドクターの抗体検査では、新型コロナウイルス肺炎を引き起こすウイルスを、短時間（10分程度）で判別するスクリーニング検査を診察現場でも取り入れました。<br>
          COVID-19被験者の血中または血清に生じる特異的なウイルス抗体、IgG 及びIgM型を検出することで感染の有無が分かります。
        </p>
        <p>
          検査をご希望の方は、診察お申込時に「コロナ検査を希望」とお伝えください。
        </p>
      </div>
    </div>

  </div>
</section>

<section class="section" id="link-online">
  <div class="container" data-animate="fadeInUp">
    <a href="pocketdoctor.php" class="btn-online">
      <div class="pic">
        <img src="assets/img/pocketdoctor_logo.png" alt="ポケットドクター"><br>
      </div>
      <div class="text"><i class="fas fa-mobile-alt"></i> オンライン診療受付中</div>
    </a>
  </div>
</section>

<section class="section" id="info">
  <div class="container" data-animate="fadeInUp">
    <div class="box">
      <h2>新型肺炎コロナウイルス対策</h2>
      <p>
        コロナの疑いのある場合、医師が診察をする際に防護服やゴーグルを着用させていただく場合がございますのでご了承ください。<br>
        感染拡大を防ぐためですのでご理解とご協力のほどお願い申し上げます。
      </p>
    </div>
  </div>
</section>

<section class="section" id="points">
  <div class="container" data-animate="fadeInUp">
    <h2>夜間休日緊急往診 4つのポイント</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="point-box">
          <p class="number">01</p>
          <img src="assets/img/points_01.jpg" alt="夜間・休日の往診のご依頼">
          <h3>夜間・休日の往診のご依頼</h3>
          <p>
            お電話から夜間・休日の往診依頼が出来ます。<br>
            オペレーターより往診時間・担当医師など詳細をお伝え致します。<br>
            ご相談もお気軽にご連絡ください。
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="point-box">
          <p class="number">02</p>
          <img src="assets/img/points_02.jpg" alt="医師がご自宅へ訪問します">
          <h3>医師がご自宅へ訪問します</h3>
          <p>
            医師が車でご自宅までお伺い致します。（最短30分）<br>
            待合室で長時間待つ必要はございません。<br>
            ご自宅でゆっくりお待ちください。
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="point-box">
          <p class="number">03</p>
          <img src="assets/img/points_03.jpg" alt="ご自宅で診察を行います">
          <h3>ご自宅で診察を行います</h3>
          <p>
            症状に応じて診察・検査を致します。<br>
            診察後、医師が丁寧に症状の説明をします。<br>
            お部屋の中での診察に抵抗感がある患者様には玄関口やエントランスでの診察も承っております。オペレーターか医師に申し付けくださいませ。<br>
            重症な場合は往診医師の指示のもと検査・処置が可能な救急病院へスムーズに搬送を行います。
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="point-box">
          <p class="number">04</p>
          <img src="assets/img/points_04.jpg" alt="その場で処方薬をお渡しします">
          <h3>その場で処方薬をお渡しします</h3>
          <p>
            診察内容に応じて薬をその場でお渡し致します。<br>
            医師より患者様に処方薬の効能・服用方法の説明を致します。
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section" id="features">
  <div class="container" data-animate="fadeInUp">
    <h2>ナイトドクターの特長</h2>
    <div class="features-content">
      <div class="row">
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="fas fa-female"></i>女医多数在籍</h3>
            <p>
              女性患者も安心して受診して頂けます。
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="far fa-file-alt"></i>各種診断書即日発行</h3>
            <p>
              会社や学校へ提出する診断書がすぐお渡しできます。<br>
              ※診断書発行には、5000円別途費用が発生します。
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="far fa-address-card"></i>健康保険適用で安心</h3>
            <p>
              もちろん健康保険は適応されますのでご安心ください。
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="fas fa-home"></i>ご自宅で待てる</h3>
            <p>
              病院の待合室で長時間待つ必要がございません。
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="far fa-heart"></i>二次感染の防止</h3>
            <p>
              ご自宅での診療なので二次感染のリスクがありません。
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="fas fa-pills"></i>ご自宅で処方薬をお渡しできます</h3>
            <p>
              ご自宅で診察と検査をして、その場でお薬が貰えます。
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section" id="inspection">
  <div class="container" data-animate="fadeInUp">
    <h2>対応可能な症状</h2>
    <div class="row">
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>発熱・悪寒</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>頭痛</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>咳・たん・喉の痛み</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>嘔吐・下痢・便秘・胃腸の痛み</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>ねんざ・ぎっくり腰・骨折・だぼく</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>切り傷・ケガによる出血</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>ひん尿・排尿時の痛み</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>アレルギー・じんましん</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>耳の痛み・鼻づまり・鼻水</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>目の痛み・はれ・かゆみ</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>やけど・皮膚の痛み</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>めまい・動悸・血圧</p>
        </div>
      </div>
    </div>
    <p class="message">
      診察後、症状に合わせて薬をお渡しします。<br>
      各種検査も取り揃えております。お気軽にご相談ください。
    </p>
  </div>
</section>

<section class="section" id="area">
  <div class="container" data-animate="fadeInUp">
    <h2>対応エリア</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="area-box">
          <img src="assets/img/map_01.png" alt="東京23区">
          <p>東京23区</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="area-box">
          <img src="assets/img/map_02.png" alt="多摩地区">
          <p>多摩地区</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="area-box">
          <img src="assets/img/map_03.png" alt="訪問エリアは一都三県に随時拡大中">
          <p>訪問エリアは一都三県に随時拡大中</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section cta">
  <div class="container" data-animate="fadeInUp">
    <?php require("cta.php");?>
  </div>
</section>

<section class="section" id="flow">
  <div class="container" data-animate="fadeInUp">
    <h2>診療の流れ</h2>
    <ol class="flow-list">
      <li>
        <h3><span>STEP.01</span>ご依頼・ご相談</h3>
        <i class="fas fa-phone-volume"></i>
        <p>
          電話・LINE・フォームから往診依頼が出来ます。オペレーターより往診時間・担当医師など詳細をお伝え致します。<br>
          お気軽にご相談ください。
        </p>
      </li>
      <li>
        <h3><span>STEP.02</span>医師がご自宅へご訪問</h3>
        <i class="fas fa-car-side"></i>
        <p>
          医師が車でご自宅までお伺い致します。（最短30分）<br>
          待合室で長時間待つ必要はございません。ご自宅でゆっくりお待ちください。
        </p>
      </li>
      <li>
        <h3><span>STEP.03</span>ご自宅で診察</h3>
        <i class="fas fa-stethoscope"></i>
        <p>
          症状に応じて診察・検査を致します。<br>
          診察後、医師が丁寧に症状の説明をします。
        </p>
      </li>
      <li>
        <h3><span>STEP.04</span>処方薬のお渡し</h3>
        <i class="fas fa-briefcase-medical"></i>
        <p>
          診察内容に応じて薬をその場でお渡し致します。
        </p>
      </li>
      <li>
        <h3><span>STEP.05</span>お支払い</h3>
        <i class="far fa-credit-card"></i>
        <p>
          現金・クレジットカード（VISA、MaterCard）<br>
          健康保険診察費（交通費が別途必要になります）のご請求となります。詳細はオペレーターへお問い合わせください。
        </p>
      </li>
    </ol>
  </div>
</section>

<section class="section" id="faq">
  <div class="container" data-animate="fadeInUp">
    <h2>よくあるご質問</h2>
    <dl class="faq-box">
      <dt class="faq-q">
        <h3>利用が初めてで、サービスの流れが分かりません。</h3>
      </dt>
      <dd class="faq-a">
        <p>
          ①電話かLINEでお気軽にご相談下さい。<br>
          ②オペレーターに症状をご説明下さい。<br>
          ③提携医療機関の医師が往診致します。<br>
          ④ご自宅で診察・検査を行い、処方薬をお渡しします。<br>
          ⑤その場でお支払いとなります。<br>
          健康保険が適用されます。健康保険+別途交通費が必要です。
        </p>
      </dd>
    </dl>
    <dl class="faq-box">
      <dt class="faq-q">
        <h3>知らない人を家に入れるのは心配です。</h3>
      </dt>
      <dd class="faq-a">
        <p>
          ナイトドクターと提携している病院（クリニック）の医師が往診します。<br>
          診察前に氏名、病院（クリニック）名をお伝え致しますのでご安心下さい。<br>
          お部屋の中での診察に抵抗がある患者さまには、 玄関口やエントランスでの診察も承っております。
        </p>
      </dd>
    </dl>
    <dl class="faq-box">
      <dt class="faq-q">
        <h3>何科の先生が在籍していますか？</h3>
      </dt>
      <dd class="faq-a">
        <p>
          ナイトドクターと提携している病院（クリニック）の医師が往診します。<br>
          患者様の症状によって対応可能な医師が診察致します。
        </p>
      </dd>
    </dl>
  </div>
</section>

<section class="section cta">
  <div class="container" data-animate="fadeInUp">
    <?php require("cta.php");?>
  </div>
</section>

<section class="section" id="contact">
  <div class="container" data-animate="fadeInUp">
    <div class="contact-form">
      <h3><span>ご依頼・ご相談フォーム</span></h3>
      <?php if (isset($err_msg) && count($err_msg) > 0) { ?>
      <script type="text/javascript">
        $(function() {
          var n = window.location.href.slice(window.location.href.indexOf('?') + 4);
          var p = $("#contact").offset().top;
          $('html,body').animate({ scrollTop: p }, 'slow');
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
      <form class="contact-form" name="contactform" role="form" method="post" action="">
        <dl class="contact-dl">
          <dt>患者様のお名前<span class="required">必須</span></dt>
          <dd>
            <input type="text" name="contact_data[name]" placeholder="山田 一郎" value="<?php echo h($name); ?>">
          </dd>
          <dt>患者様の性別<span class="required">必須</span></dt>
          <dd>
            <input type="radio" name="contact_data[gender]" value="男性" id="radio-men" <?php if($gender == '男性') echo 'checked'; ?>><label for="radio-men">男性</label>
            <input type="radio" name="contact_data[gender]" value="女性" id="radio-women" <?php if($gender == '女性') echo 'checked'; ?>><label for="radio-women">女性</label>
          </dd>
          <dt>患者様の生年月日<span class="required">必須</span></dt>
          <dd>
            <div class="row birth-box">
              <div class="col">
                <select name="contact_data[birthgengou]">
                  <option value="大正" <?php if($birthgengou == '大正') echo 'selected'; ?>>大正</option>
                  <option value="昭和" <?php if($birthgengou == '昭和') echo 'selected'; ?>>昭和</option>
                  <option value="平成" <?php if($birthgengou == '平成') echo 'selected'; ?>>平成</option>
                  <option value="令和" <?php if($birthgengou == '令和') echo 'selected'; ?>>令和</option>
                </select>
              </div>
              <div class="col">
                <input type="text" name="contact_data[birthyear]" placeholder="" value="<?php echo h($birthyear); ?>">年
              </div>
              <div class="col">
                <input type="text" name="contact_data[birthmonth]" placeholder="" value="<?php echo h($birthmonth); ?>">月
              </div>
              <div class="col">
                <input type="text" name="contact_data[birthday]" placeholder="" value="<?php echo h($birthday); ?>">日
              </div>
            </div>
          </dd>
          <dt>患者様のご住所<span class="required">必須</span></dt>
          <dd>
            <input type="text" name="contact_data[address]" placeholder="東京都" value="<?php echo h($address); ?>">
          </dd>
          <dt>お電話番号<span class="required">必須</span></dt>
          <dd>
            <input type="text" name="contact_data[tel]" placeholder="080-1234-5678" value="<?php echo h($tel); ?>">
          </dd>
          <dt>メールアドレス<span class="required">必須</span></dt>
          <dd>
            <input type="email" name="contact_data[email]" placeholder="example@piq.jp" value="<?php echo h($email); ?>">
          </dd>
          <dt>保険証の有無<span class="required">必須</span></dt>
          <dd>
            <select name="contact_data[card]">
              <option value="有" <?php if($card == '有') echo 'selected'; ?>>有</option>
              <option value="無" <?php if($card == '無') echo 'selected'; ?>>無</option>
            </select>
          </dd>
          <dt>具体的な症状、相談内容<span class="required">必須</span></dt>
          <dd>
            <textarea name="contact_data[message]" rows="5"><?php echo h($message); ?></textarea>
          </dd>
        </dl>
        <button type="submit" name="btnSubmit" class="btn">送信内容を確認</button>
        <input type="hidden" name="act" value="2">
      </form>
    </div>
  </div>
</section>

<section class="section" id="company">
  <div class="container" data-animate="fadeIn">
    <h2>事業者概要</h2>
    <dl class="company-dl">
      <dt>運営者</dt>
      <dd>理晏株式会社</dd>
      <dt>事務所所在地</dt>
      <dd>〒107-0062 東京都港区南青山5丁目10番2号</dd>
      <dt>電話番号</dt>
      <dd>03-6381-7511 / 042-548-1717</dd>
    </dl>
  </div>
</section>

<div class="side-bnr">
  <a href="pocketdoctor.php">
    <i class="fas fa-mobile-alt"></i>
    オンライン診療受付中
  </a>
</div>

<?php require("footer.php");?>
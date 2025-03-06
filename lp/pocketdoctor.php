<?php
$page_id = 'privacy';
$page_title = 'オンライン診療 | 夜間緊急往診 ナイトドクター';
$page_description = 'ナイトドクターで受け付けているオンライン診療（ポケットドクター）のご案内です。';
require("header.php");
?>

<section class="section page-section" id="online">
  <div class="container">

  <h2>オンライン診療受付中</h2>
    <p class="lead">
      <img src="assets/img/pocketdoctor.jpg" alt="ポケットドクター"><br>
      ナイトドクターでは、『オンライン診療ポケットドクター』を活用したオンライン診療を受け付けています。
    </p>
    <h3>アプリダウンロード</h3>
    <div class="row">
      <div class="col-md-5">
        <dl class="app-dl">
          <dt>iOS版</dt>
          <dd>
            <div class="qrcode">
              <img src="assets/img/qrcode_ios.svg" alt="iOS版">
            </div>
            <div class="store">
              <a href="https://itunes.apple.com/jp/app/%E9%81%A0%E9%9A%94%E8%A8%BA%E7%99%82%E3%83%9D%E3%82%B1%E3%83%83%E3%83%88%E3%83%89%E3%82%AF%E3%82%BF%E3%83%BC/id1224467405?l=ja&ls=1&mt=8"><img src="assets/img/app_appstore_jp.svg" alt="iOS版"></a>
            </div>
          </dd>
        </dl>
      </div>
      <div class="col-md-5">
        <dl class="app-dl">
          <dt>Android版</dt>
          <dd>
            <div class="qrcode">
              <img src="assets/img/qrcode_android.svg" alt="Android版">
            </div>
            <div class="store">
              <a href="https://play.google.com/store/apps/details?id=jp.co.optim.pdts"><img src="assets/img/app_googleplay_jp.svg" alt="googleplay"></a>
            </div>
          </dd>
        </dl>
      </div>
    </div>

    <h3>オンライン診療までの手順</h3>
    <ol class="flow-list">
      <li>
        <div class="flow-box">
          <div class="row">
            <div class="col-md-3">
              <figure class="pic">
                <img src="assets/img/online_01.png" alt="お問い合わせ">
              </figure>
            </div>
            <div class="col-md-9">
              <h3><span>1</span>初回登録手順（ダウンロード～新規登録）</h3>
              <p>
                1．アプリストアから「ポケットドクター」をダウンロード、インストールします。
              </p>
              <p>
                2．アプリを立ち上げ利用規約同意後に「一般の方」をタップし、ログインします。<br>アカウント未登録の場合には「新規登録はこちら」から登録を行ってください。
              </p>
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="flow-box">
          <div class="row">
            <div class="col-md-3">
              <figure class="pic">
                <img src="assets/img/online_02.png" alt="お問い合わせ">
              </figure>
            </div>
            <div class="col-md-9">
            <h3><span>2</span>初回登録手順（ダウンロード～新規登録）</h3>
              <p>
                1．メールアドレス入力・送信後、確認メールが届きます。<br>
                メールアドレス記載のURLにアクセス後、基本情報入力画面にて情報を記入します。
              </p>
              <p>
                2．情報登録後、ログインするとトップ画面に遷移します。<br>
                以後はログイン画面で登録したメールアドレスとパスワードでログイン可能です。
              </p>
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="flow-box">
          <div class="row">
            <div class="col-md-3">
              <figure class="pic">
                <img src="assets/img/online_03.png" alt="お問い合わせ">
              </figure>
            </div>
            <div class="col-md-9">
              <h3><span>3</span>ご利用手順（医療機関登録）</h3>
              <p class="caution">
                <strong>※予約・診察の前に・・・</strong><br>
                受診前に医療機関が「ポケットドクター」でのオンライン診療に対応しているかを確認し、
                医療機関固有の「ポケドクナンバー」を入手してください。
              </p>
              <p>
                トップ画面より「予約する」をクリックし受診する医療機関のポケドクナンバーを入力します。<br>
                診察券があれば番号もしくは撮影した診察券をアップロード可能です。
              </p>
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="flow-box">
          <div class="row">
            <div class="col-md-3">
              <figure class="pic">
                <img src="assets/img/online_04.png" alt="お問い合わせ">
              </figure>
            </div>
            <div class="col-md-9">
              <h3><span>4</span>ご利用手順（予約）</h3>
              <p>
                1．「予約する」をタップし診察を受ける医療機関を選択後、診察区分（初診・再診）を選択します。
              </p>
              <p>
                2．診療を受ける診察科目・医師を選択し予約日時を設定します。その際に症状等も入力可能です。<br>
                保険診療希望の方は保険証を撮影しアップロードすることも可能です。<br>
                ※保険証登録や支払方法については個々の医療機関にお問い合わせください。
              </p>
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="flow-box">
          <div class="row">
            <div class="col-md-3">
              <figure class="pic">
                <img src="assets/img/online_05.png" alt="お問い合わせ">
              </figure>
            </div>
            <div class="col-md-9">
              <h3><span>5</span>ご利用手順（受診、診療履歴の確認）</h3>
              <p>
                1．予約した時間に医療機関・医師から電話が掛かってきます（診察状況により前後する可能性があります）<br>
                終了ボタンを押すと診察を終了します。診察終了後に履歴等が確認可能です。<br>
                処方箋は医療機関より後日郵送されます。詳しくは医療機関にお問い合わせください。
              </p>
              <p>
                2．ポケットドクターで受診した診療履歴はトップ画面から確認できます。
              </p>
            </div>
          </div>
        </div>
      </li>
    </ol>
    <a href="assets/pdf/pocketdoctor.pdf" class="btn" target="_blank">詳しいご利用手順はこちら（PDF）</a>


  </div>
</section>

<?php require("footer.php");?>
<?php
$page_id = 'privacy';
$page_title = 'Online medical treatment | Night Doctor';
$page_description = 'Night Doctor accepts online medical treatment using the "Online Medical Treatment Pocket Doctor".';
require("header.php");
?>

<section class="section page-section" id="online">
  <div class="container">

  <h2>Accepting online medical treatment</h2>
    <p class="lead">
      <img src="assets/img/pocketdoctor.jpg" alt="pocketdoctor"><br>
      Night Doctor accepts online medical treatment using the "Online Medical Treatment Pocket Doctor".
    </p>
    <h3>App download</h3>
    <div class="row">
      <div class="col-md-5">
        <dl class="app-dl">
          <dt>iOS version</dt>
          <dd>
            <div class="qrcode">
              <img src="assets/img/qrcode_ios.svg" alt="iOS版">
            </div>
            <div class="store">
              <a href="https://itunes.apple.com/jp/app/%E9%81%A0%E9%9A%94%E8%A8%BA%E7%99%82%E3%83%9D%E3%82%B1%E3%83%83%E3%83%88%E3%83%89%E3%82%AF%E3%82%BF%E3%83%BC/id1224467405?l=ja&ls=1&mt=8"><img src="assets/img/app_appstore_jp.svg" alt="iOS version"></a>
            </div>
          </dd>
        </dl>
      </div>
      <div class="col-md-5">
        <dl class="app-dl">
          <dt>Android version</dt>
          <dd>
            <div class="qrcode">
              <img src="assets/img/qrcode_android.svg" alt="Android version">
            </div>
            <div class="store">
              <a href="https://play.google.com/store/apps/details?id=jp.co.optim.pdts"><img src="assets/img/app_googleplay_jp.svg" alt="googleplay"></a>
            </div>
          </dd>
        </dl>
      </div>
    </div>

    <h3>Procedures for online medical treatment</h3>
    <ol class="flow-list">
      <li>
        <div class="flow-box">
          <div class="row">
            <div class="col-md-3">
              <figure class="pic">
                <img src="assets/img/online_01.png" alt="Initial registration procedure (download to new registration)">
              </figure>
            </div>
            <div class="col-md-9">
              <h3><span>1</span>Initial registration procedure (download to new registration)</h3>
              <p>
                1. Download and install "pocket doctor" from the app store.
              </p>
              <p>
                2. After launching the app and agreeing to the terms of service, please tap "General" and log in.<br>If you do not have an account, please register from Click here for new registration".
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
                <img src="assets/img/online_02.png" alt="Initial registration procedure (download to new registration)">
              </figure>
            </div>
            <div class="col-md-9">
            <h3><span>2</span>Initial registration procedure (download to new registration)</h3>
              <p>
                1. You will receive a confirmation email after entering and sending your email address.<br>After accessing the URL mentioned in your email address, please fill out the information on the basic information input screen.
              </p>
              <p>
                2. After registering the information, please log in and move to the top screen.<br>
                Then you can log in with the e-mail address and password you registered on the login screen.
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
                <img src="assets/img/online_03.png" alt="How to use (Registration of Medical Institutions)">
              </figure>
            </div>
            <div class="col-md-9">
              <h3><span>3</span>How to use (Registration of Medical Institutions)</h3>
              <p class="caution">
                <strong>* Before reservation and medical examination…</strong><br>
                Please check to see if a medical institution supports online medical treatment in "pocket doctor" before seeing the doctor and get an unique "pocket number" of medical institution.
              </p>
              <p>
                Click "Booking" from the top screen and enter the pocket number of the medical institution you want to see.<br>
                If you have a medical examination ticket, you can upload the number or the photographed examination ticket.
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
                <img src="assets/img/online_04.png" alt="How to use (booking)">
              </figure>
            </div>
            <div class="col-md-9">
              <h3><span>4</span>How to use (booking)</h3>
              <p>
                1. Tap "Booking" , select a medical institution to have a medical examination, then select the medical examination category (first visit / return visit).
              </p>
              <p>
                2. Select subject of medical treatment and doctor to receive medical treatment and set the reservation date and time. At that time, you can also enter symptoms.<br>
                Those who request to receive insurance medical treatment can also take a picture of insurance card and upload it.<br>
                ※Please contact your individual medical institution for insurance card registration and payment methods.
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
                <img src="assets/img/online_05.png" alt="How to use (confirm get history of medical examination and treatment)">
              </figure>
            </div>
            <div class="col-md-9">
              <h3><span>5</span>How to use (confirm get history of medical examination and treatment)</h3>
              <p>
                1. You will receive  a phone call from a medical institution or doctor at the time you booked (it may vary depending on the medical examination situation).<br>
                Press the end button to end the medical examination. The history can be confirmed after the medical examination.<br>
                Prescriptions will be mailed by medical institutions at a later date. For more information, please contact medical institution.
              </p>
              <p>
                2. From the top screen, you can confirm the medical treatment history you received from the pocket doctor.
              </p>
            </div>
          </div>
        </div>
      </li>
    </ol>
    <a href="assets/pdf/pocketdoctor.pdf" class="btn" target="_blank">Click here for detailed usage procedure (PDF)</a>
  </div>
</section>

<?php require("footer.php");?>
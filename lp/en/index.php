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
$page_title = 'Night and holiday emergency home visit Night Doctor';
$page_description = 'It is an emergency home visit service for doctors to visit patient at home at night and on holidays.';
require("header.php");

?>

<section id="intro">
  <div class="container">
    <p>
      Available to make reservations by phone or LINE even at <strong>night and on holidays!</strong><br>
      <strong>A doctor will go to visit patient 30 minutes in the shortest</strong> and give you the medicine there.
    </p>
  </div>
</section>

<section class="section" id="video">
  <div class="container">
    <div class="iframe-wrapper">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/T-z4nHQWlzo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
    <h2>Notice of start of COVID-19 virus PCR test</h2>
    <p class="lead">
      Night Doctor conducts COVID-19 virus PCR test.<br>
      It will be a inspection at your own expense. (For charges, please contact us.)
    </p>
    <div class="corona-message">
      <p>
        If you have any symptoms such as fever, cough, respiratory distress, or general malaise, please let us know at the reception.<br>
        Please feel free to contact us if you don't have any symptoms but are worried, or you would like to require negative proof of COVID-19 on your trip.
      </p>
      <ul>
        <li>It takes about two hours to get the result. We will contact you as soon as we get the result.</li>
        <li>Night Doctor will have a reservation system in order to reduce the number of inspected people.</li>
        <li>Certificates of inspection result can be issued..<br>Price: 5,000 yen<br>We will send the result to you the same day when we get the results.</li>
      </ul>
    </div>
    <h2>Simple test for COVID-19</h2>
    <div class="corona-message">
      <div class="row">
        <div class="col-md-3">
          <figure class="pic">
            <img src="assets/img/corona.jpg" alt="Simple test for COVID-19">
          </figure>
        </div>
        <div class="col-md-9">
          <p>
            Simple test of Night Doctor also introduced a screening test at the medical examination site to determine the virus that causes COVID-19 in a short time (about 10 minutes).<br>
            The presence or absence of infection of COVID-19 can be determined by detecting a specific viral antibody, IgG and IgM type, that occurs in the blood or serum of COVID-19 subjects.
          </p>
          <p>
            If you would like to have an inspection, please tell us "I would like to have COVID-19 inspection" when you apply for medical examination.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!--//
<section class="section" id="link-online">
  <div class="container" data-animate="fadeInUp">
    <a href="pocketdoctor.php" class="btn-online">
      <div class="pic">
        <img src="assets/img/pocketdoctor_logo.png" alt="Pocket Doctor"><br>
      </div>
      <div class="text"><i class="fas fa-mobile-alt"></i> Accepting online medical treatment</div>
    </a>
  </div>
</section>
//-->



<!--/// ADD PART /////////////////-->
<section class="section alignment">
<div class="container" data-animate="fadeInUp">

<h2>Collaboration with local government</h2>
<p>"NightDoctor" collaborate with each local government.</p>

<ul class="flex_wrap">
<li><figure class="simbol_thumb"><img src="../images/tokyo.png" alt="Tokyo"></figure>
<div>Tokyo</div></li>

<li><figure class="simbol_thumb"><img src="../images/saitama.png" alt="Saitama"></figure>
<div>Saitama</div></li>
</ul>

</div>
</section>
<!--/// ADD PART# /////////////////-->



<section class="section" id="info">
  <div class="container" data-animate="fadeInUp">
    <div class="box">
      <h2>Measures for COVID-19</h2>
      <p>
        Please note that If you have the risk of COVID-19 infection, doctor may wear protective clothing or goggles when doctor visit you.<br>
        We would appreciate your understanding and cooperation to prevent the spread of the infection.
      </p>
    </div>
  </div>
</section>

<section class="section" id="points">
  <div class="container" data-animate="fadeInUp">
    <h2>Four points of night and holiday emergency home visit</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="point-box">
          <p class="number">01</p>
          <img src="assets/img/points_01.jpg?20200901" alt="Request for night or holiday home visit">
          <h3>Request for night or holiday home visit</h3>
          <p>
            You can request a home visit at night or on holiday by phone.<br>
            The operator will tell you the details such as the time of visit and the doctor in charge.<br>
            Please feel free to contact us for consulation.
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="point-box">
          <p class="number">02</p>
          <img src="assets/img/points_02.jpg?20200901" alt="The doctor will visit you at home.">
          <h3>The doctor will visit you at home.</h3>
          <p>
            The doctor will come to your house by car. (minimum time: 30 minutes)<br>
            You don't need to wait for a long time in the waiting room.<br>
            Please be patient at home.
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="point-box">
          <p class="number">03</p>
          <img src="assets/img/points_03.jpg?20200901" alt="Medical examination at home">
          <h3>Medical examination at home</h3>
          <p>
            We will make a medical examination and inspection depending on symptoms.<br>
            After the examination, the doctor will explain the symptoms carefully.<br>
            Patients who are uncomfortable with the examination in the room can also be examined at the front door and entrance. Please tell the operator or doctor.<br>
            In the case of a severe illness, patient will be transported smoothly to an emergency hospital where patient can be examined and treated under the direction of the home visit doctor.
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="point-box">
          <p class="number">04</p>
          <img src="assets/img/points_04.jpg?20200901" alt="The doctor will give you a prescription drug there.">
          <h3>The doctor will give you a prescription drug there.</h3>
          <p>
            The doctor will give you the medicine there according to the examination cotent.<br>
            The doctor will explain the efficacy and administration of prescription drugs to the patient.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section" id="features">
  <div class="container" data-animate="fadeInUp">
    <h2>Features of Night Doctor</h2>
    <div class="features-content">
      <div class="row">
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="fas fa-female"></i>There are many female doctors</h3>
            <p>
              The female patient will also be able to have a medical examination at ease.
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="far fa-file-alt"></i>Various medical certificates will be issued on the same day</h3>
            <p>
              We can give you a certificate immediately to be submitted to the company or school.<br>
              ※5000 yen will be charged separately to issue the medical certificate.
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="far fa-address-card"></i>The patient feel at ease because the service is covered by health insurance</h3>
            <p>
              Of course health insurance will be applied,so please don't worry about it.
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="fas fa-home"></i>You can wait at home</h3>
            <p>
              You don't need to wait for a long time in the hospital waiting room.
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="far fa-heart"></i>Prevention of secondary infection</h3>
            <p>
              There is no risk of secondary infection because patient will have medical treatment at home.
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="fas fa-pills"></i>The doctor will give you a prescription drug at home.</h3>
            <p>
              You can have a medical examination and inspection at home and the doctor give you medicine there.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section" id="inspection">
  <div class="container" data-animate="fadeInUp">
    <h2>Treatable symptoms</h2>
    <div class="row">
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>Fever and chill</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>Headache</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>Cough, phlegm and sore throat</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>Vomiting, diarrhea, constipation and gastrointestinal pain</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>Sprain, strained back, fracture and bruise</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>Bleeding for cut and injury</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>Pollakiuria and micturition pain</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>Allergies and hives</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>Earache, nasal congestion, and runny nose</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>Eye irritation, puffy eyes and itchy eyes</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>Burn and skin pain</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>Dizziness, palpitations and blood pressure</p>
        </div>
      </div>
    </div>
    <p class="message">
      After the examination,the doctor will give you the medicine there according to your symptoms.<br>
      We also have a wide range of inspections. Please feel free to contact us.
    </p>
  </div>
</section>

<section class="section" id="area">
  <div class="container" data-animate="fadeInUp">
    <h2>The visiting area</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="area-box">
          <img src="assets/img/map_01.png" alt="23 Wards of Tokyo">
          <p>23 Wards of Tokyo</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="area-box">
          <img src="assets/img/map_02.png" alt="Tama area">
          <p>Tama area</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="area-box">
          <img src="assets/img/map_03.png" alt="The visiting area is expanding to three prefectures and Tokyo">
          <p>The visiting area is expanding to three prefectures and Tokyo</p>
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
    <h2>Process of medical treatment</h2>
    <ol class="flow-list">
      <li>
        <h3><span>STEP.01</span>Request and consultation</h3>
        <i class="fas fa-phone-volume"></i>
        <p>
          You can request a home visit by phone, LINE, or form. The operator will tell you the details such as the time of visit and the doctor in charge.<br>
          Please feel free to contact us.
        </p>
      </li>
      <li>
        <h3><span>STEP.02</span>The doctor visit you at home</h3>
        <i class="fas fa-car-side"></i>
        <p>
          The doctor will come to your house by car. (minimum time: 30 minutes)<br>
          You don't need to wait for a long time in the waiting room. Please be patient at home.
        </p>
      </li>
      <li>
        <h3><span>STEP.03</span>Medical examination at home</h3>
        <i class="fas fa-stethoscope"></i>
        <p>
          We will make a medical examination and inspection depending on symptoms.<br>
          After the examination, the doctor will explain the symptoms carefully.
        </p>
      </li>
      <li>
        <h3><span>STEP.04</span>Handing over prescription drugs</h3>
        <i class="fas fa-briefcase-medical"></i>
        <p>
          The doctor will give you the medicine there according to the examination cotent.
        </p>
      </li>
      <li>
        <h3><span>STEP.05</span>Payment</h3>
        <i class="far fa-credit-card"></i>
        <p>
          Night Doctor supports cash and credit. ( VISA, MaterCard ）<br>
          Health insurance and medical visits (transportation expenses is required separately) will be charged. Please contact the operator for more information.
        </p>
      </li>
    </ol>
  </div>
</section>

<section class="section" id="faq">
  <div class="container" data-animate="fadeInUp">
    <h2>FAQ</h2>
    <dl class="faq-box">
      <dt class="faq-q">
        <h3>It's the first time for me to use it, and I don't know the process of the service.</h3>
      </dt>
      <dd class="faq-a">
        <p>
          1）Please feel free to contact us by phone or LINE.<br>
          2）Please explain the symptoms to the operator.<br>
          3）The doctor from affiliated medical institutions will visit you.<br>
          4）We will make a medical examination and inspection at home and give you a prescription drug.<br>
          5）Patient pays relevant fee there.<br>
          Night Doctor is covered by health insurance. Health insurance and separated transportation costs are required.+別途交通費が必要です。
        </p>
      </dd>
    </dl>
    <dl class="faq-box">
      <dt class="faq-q">
        <h3>Patient is worried about allowing strangers into the house.</h3>
      </dt>
      <dd class="faq-a">
        <p>
          The doctor from a hospital (clinic) affiliated with Night Doctor will visit you.<br>
          Please rest assured that the doctor will inform you his or her name and the name of the hospital (clinic) before before the examination.<br>
          Patients who are uncomfortable with the examination in the room can also be examined at the front door and entrance. 玄関口やエントランスでの診察も承っております。
        </p>
      </dd>
    </dl>
    <dl class="faq-box">
      <dt class="faq-q">
        <h3>What kind of doctors can provide home visit?</h3>
      </dt>
      <dd class="faq-a">
        <p>
          The doctor from a hospital (clinic) affiliated with Night Doctor will visit you.<br>
          According to patient's symptoms, the doctor who can make the medical examination will visit you.
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
      <h3><span>Request and contact form</span></h3>
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
          <dt>Patient's name<span class="required">Required field</span></dt>
          <dd>
            <input type="text" name="contact_data[name]" placeholder="" value="<?php echo h($name); ?>">
          </dd>
          <dt>Gender of patient<span class="required">Required field</span></dt>
          <dd>
            <input type="radio" name="contact_data[gender]" value="Male" id="radio-men" <?php if($gender == 'Male') echo 'checked'; ?>><label for="radio-men">Male</label>
            <input type="radio" name="contact_data[gender]" value="Female" id="radio-women" <?php if($gender == 'Female') echo 'checked'; ?>><label for="radio-women">Female</label>
          </dd>
          <dt>Birth date of a patient<span class="required">Required field</span></dt>
          <dd>
            <div class="row birth-box">
              <div class="col">
                <input type="text" name="contact_data[birthyear]" placeholder="Year" value="<?php echo h($birthyear); ?>">
              </div>
              <div class="col">
                <input type="text" name="contact_data[birthmonth]" placeholder="Month" value="<?php echo h($birthmonth); ?>">
              </div>
              <div class="col">
                <input type="text" name="contact_data[birthday]" placeholder="Day" value="<?php echo h($birthday); ?>">
              </div>
            </div>
          </dd>
          <dt>Patient's address<span class="required">Required field</span></dt>
          <dd>
            <input type="text" name="contact_data[address]" placeholder="" value="<?php echo h($address); ?>">
          </dd>
          <dt>Phone number<span class="required">Required field</span></dt>
          <dd>
            <input type="text" name="contact_data[tel]" placeholder="080-1234-5678" value="<?php echo h($tel); ?>">
          </dd>
          <dt>Mail address<span class="required">Required field</span></dt>
          <dd>
            <input type="email" name="contact_data[email]" placeholder="example@piq.jp" value="<?php echo h($email); ?>">
          </dd>
          <dt>Presence or absence of  insurance card<span class="required">Required field</span></dt>
          <dd>
            <select name="contact_data[card]">
              <option value="Yes" <?php if($card == 'Yes') echo 'selected'; ?>>Yes</option>
              <option value="No" <?php if($card == 'No') echo 'selected'; ?>>No</option>
            </select>
          </dd>
          <dt>Specific symptoms and consultation content<span class="required">Required field</span></dt>
          <dd>
            <textarea name="contact_data[message]" rows="5"><?php echo h($message); ?></textarea>
          </dd>
        </dl>
        <button type="submit" name="btnSubmit" class="btn">Confirm transmission content</button>
        <input type="hidden" name="act" value="2">
      </form>
    </div>
  </div>
</section>

<section class="section" id="company">
  <div class="container" data-animate="fadeIn">
    <h2>Business overview</h2>
    <dl class="company-dl">
      <dt>Administrator</dt>
      <dd>NightDoctor Co., Ltd.</dd>
      <dt>Office location</dt>
      <dd>2-16-6,Akasaka,Minato-ku,Tokyo</dd>
      <dt>Phone number</dt>
      <dd>03-6381-7511 / 042-548-1717</dd>
    </dl>
  </div>
</section>

<div class="side-bnr">
  <a href="pocketdoctor.php">
    <i class="fas fa-mobile-alt"></i>
      Accepting online medical treatment
  </a>
</div>

<?php require("footer.php");?>
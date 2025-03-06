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
$page_title = '夜间节假日紧急出诊 Night Doctor';
$page_description = '夜间及节假日提供医生上门急救出诊服务';
require("header.php");

?>

<section id="intro">
  <div class="container">
    <p>
      <strong>夜间及节假日</strong>也可通过电话LINE在线预约！<br>
      <strong>最短半小时医生就会去诊察</strong>，当场开药。
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
    <h2>开展新型冠状病毒PCR检测的通知</h2>
    <p class="lead">
      Night Doctor进行新型冠状病毒PCR检测。<br>
      该项检测为自费检测。（关于检测费用详情，请咨询我们。）
    </p>
    <div class="corona-message">
      <p>
        如有发热、咳嗽、呼吸困难、全身疲惫等症状，请在接待时告知。<br>
        无症状但担心或希望出国时出具新型冠状病毒核算检测阴性证明的人也请随时告知。
      </p>
      <ul>
        <li>2小时左右即可得到检测结果。得到结果，就会马上联系您。</li>
        <li>为了控制检查人数,检测采取预约制。</li>
        <li>可出具本检查结果的证明书。<br>费用：5,000日元<br>我们会在得到结果的当天把结果发给客人。</li>
      </ul>
    </div>
    <h2>新型冠状病毒肺炎的简单检查</h2>
    <div class="corona-message">
      <div class="row">
        <div class="col-md-3">
          <figure class="pic">
            <img src="assets/img/corona.jpg" alt="新型冠状病毒肺炎的简单检查">
          </figure>
        </div>
        <div class="col-md-9">
          <p>
            Night Doctor在诊察现场也引入了短时间（10分钟左右）内辨别引起新型冠状病毒肺炎病毒的筛查。<br>
            通过检测COVID-19受试者血液中或血清中产生的特异性病毒抗体、IgG和IgM类型来确定受试者是否感染。
          </p>
          <p>
            请希望进行检查的客人在申请就诊时告知“希望进行新型冠状病毒肺炎检测”。
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
        <img src="assets/img/pocketdoctor_logo.png" alt="受理在线诊治"><br>
      </div>
      <div class="text"><i class="fas fa-mobile-alt"></i> 受理在线诊治</div>
    </a>
  </div>
</section>
//-->



<!--/// ADD PART /////////////////-->
<section class="section alignment">
<div class="container" data-animate="fadeInUp">

<h2>与地方政府的合作</h2>
<p>"NightDoctor" 与各地方政府合作。</p>

<ul class="flex_wrap">
<li><figure class="simbol_thumb"><img src="../images/tokyo.png" alt="东京"></figure>
<div>东京</div></li>

<li><figure class="simbol_thumb"><img src="../images/saitama.png" alt="埼玉"></figure>
<div>埼玉</div></li>
</ul>

</div>
</section>
<!--/// ADD PART# /////////////////-->



<section class="section" id="info">
  <div class="container" data-animate="fadeInUp">
    <div class="box">
      <h2>针对新型肺炎冠状病毒的措施</h2>
      <p>
        敬请谅解，如果是新型冠状肺炎疑似患者，医生在诊治时，可能会穿着防护服或护目镜。<br>
        采取这些措施是为了防止感染扩大，所以请您理解和协助。
      </p>
    </div>
  </div>
</section>

<section class="section" id="points">
  <div class="container" data-animate="fadeInUp">
    <h2>夜间节假日紧急出诊 4个要点</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="point-box">
          <p class="number">01</p>
          <img src="assets/img/points_01.jpg" alt="夜间节假日的出诊申请">
          <h3>夜间节假日的出诊申请</h3>
          <p>
            您可以打电话要求在夜间及节假日出诊。<br>
            由客服告知出诊时间，主管医生等详细情况。<br>
            请随时与我们联系并咨询。
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="point-box">
          <p class="number">02</p>
          <img src="assets/img/points_02.jpg" alt="医生上门诊疗">
          <h3>医生上门诊疗</h3>
          <p>
          医生开车上门诊疗。（最少30分钟）<br>
          无需在等候室等待很长时间。<br>
          请在家中慢慢等待。
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="point-box">
          <p class="number">03</p>
          <img src="assets/img/points_03.jpg" alt="在家中诊察">
          <h3>在家中诊察</h3>
          <p>
            医生根据症状进行诊察检查。<br>
            诊察后，医生会仔细解释症状。<br>
            对于对在房间内的诊察有抵触情绪的患者，也可在门口或入口诊察。请告知客服或医生。<br>
            如果客人为重症，在出诊医生的指导下，我们将顺利地把客人送往可以检查、处置的急救医院。
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="point-box">
          <p class="number">04</p>
          <img src="assets/img/points_04.jpg" alt="当场开处方药">
          <h3>当场开处方药</h3>
          <p>
            根据诊察内容当场给客人开药。<br>
            医生会向患者说明处方药的功效及服用方法。
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section" id="features">
  <div class="container" data-animate="fadeInUp">
    <h2>Night Doctor的特长</h2>
    <div class="features-content">
      <div class="row">
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="fas fa-female"></i>有许多女医生</h3>
            <p>
              女性患者也可安心就诊。
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="far fa-file-alt"></i>当天签发各种诊断书</h3>
            <p>
              可马上给您要提交给公司或学校的诊断书。<br>
              ※签发诊断书发行，另外产生5000日元的费用。
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="far fa-address-card"></i>可使用健康保险，让您高枕无忧</h3>
            <p>
              当然可使用健康保险，所以无需担心。
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="fas fa-home"></i>可在家等待</h3>
            <p>
              无需在医院的等候室等待很长时间。
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="far fa-heart"></i>预防二次感染</h3>
            <p>
              因为是在家中诊疗，所以没有二次感染的风险。
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-box">
            <h3><i class="fas fa-pills"></i>可在家中为患者开药</h3>
            <p>
              在家中诊察和检查,当场就可以开药。
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section" id="inspection">
  <div class="container" data-animate="fadeInUp">
    <h2>可诊治的症状</h2>
    <div class="row">
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>发烧、发冷</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>头痛</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>咳嗽、痰、喉咙痛</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>呕吐、腹泻、便秘、胃痛</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>扭伤、腰闪了、骨折、擦伤</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>因割伤、受伤而出血</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>尿频、排尿时疼痛</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>过敏、荨麻疹</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>耳痛、鼻塞、流鼻涕</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>眼睛的疼痛、肿胀、瘙痒</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>烫伤、皮肤疼痛</p>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="inspection-box">
          <p>头晕、心悸、血压</p>
        </div>
      </div>
    </div>
    <p class="message">
      诊察后，对症下药。<br>
      各种检查一应俱全。请随时与我们联系。
    </p>
  </div>
</section>

<section class="section" id="area">
  <div class="container" data-animate="fadeInUp">
    <h2>出诊区域</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="area-box">
          <img src="assets/img/map_01.png" alt="东京23区">
          <p>东京23区</p>
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
          <img src="assets/img/map_03.png" alt="出诊区域随时扩大到一都三县">
          <p>出诊区域随时扩大到一都三县</p>
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
    <h2>诊疗流程</h2>
    <ol class="flow-list">
      <li>
        <h3><span>STEP.01</span>申请及咨询</h3>
        <i class="fas fa-phone-volume"></i>
        <p>
          可通过电话，LINE及咨询表格申请出诊。由客服告知出诊时间，主管医生等详细情况。<br>
          请随时联系我们。
        </p>
      </li>
      <li>
        <h3><span>STEP.02</span>医生上门诊疗</h3>
        <i class="fas fa-car-side"></i>
        <p>
          医生开车上门诊疗。（最少30分钟）<br>
          无需在等候室等待很长时间。请在家中慢慢等待。
        </p>
      </li>
      <li>
        <h3><span>STEP.03</span>在家中诊察</h3>
        <i class="fas fa-stethoscope"></i>
        <p>
          医生根据症状进行诊察检查。<br>
          诊察后，医生会仔细解释症状。
        </p>
      </li>
      <li>
        <h3><span>STEP.04</span>开处方药</h3>
        <i class="fas fa-briefcase-medical"></i>
        <p>
          根据诊察内容当场给客人开药。
        </p>
      </li>
      <li>
        <h3><span>STEP.05</span>付款</h3>
        <i class="far fa-credit-card"></i>
        <p>
          支持现金、信用卡（维萨、万事达）<br>
          将收取健康保险诊察费（需另付交通费）。请与客服联系获取详细信息。
        </p>
      </li>
    </ol>
  </div>
</section>

<section class="section" id="faq">
  <div class="container" data-animate="fadeInUp">
    <h2>常问问题</h2>
    <dl class="faq-box">
      <dt class="faq-q">
        <h3>第一次使用，不了解服务流程。</h3>
      </dt>
      <dd class="faq-a">
        <p>
          1）请随时使用电话或LINE咨询。<br>
          2）请向客服说明症状。<br>
          3）合作医疗机构的医生出诊。<br>
          4）在家中诊察、检查，开处方药。<br>
          5）当场付款。<br>
          适用健康保险。需健康保险+交通费（另外支付）。
        </p>
      </dd>
    </dl>
    <dl class="faq-box">
      <dt class="faq-q">
        <h3>很担心让不认识的人进入家中。</h3>
      </dt>
      <dd class="faq-a">
        <p>
          与Night Doctor合作的医院（诊所）的医生出诊。<br>
          请您放心，我们会在诊察前，告知您姓名、医院（诊所）名称。<br>
          对于对在房间内的诊察有抵触情绪的患者，也可在门口或入口诊察。
        </p>
      </dd>
    </dl>
    <dl class="faq-box">
      <dt class="faq-q">
        <h3>有什么科的医生在册呢？</h3>
      </dt>
      <dd class="faq-a">
        <p>
          与Night Doctor合作的医院（诊所）的医生出诊。<br>
          根据患者的症状，由在该领域有专长的医生进行诊察。
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
      <h3><span>申请及咨询表格</span></h3>
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
          <dt>患者姓名<span class="required">必填</span></dt>
          <dd>
            <input type="text" name="contact_data[name]" placeholder="" value="<?php echo h($name); ?>">
          </dd>
          <dt>患者性别<span class="required">必填</span></dt>
          <dd>
            <input type="radio" name="contact_data[gender]" value="男" id="radio-men" <?php if($gender == '男') echo 'checked'; ?>><label for="radio-men">男</label>
            <input type="radio" name="contact_data[gender]" value="女" id="radio-women" <?php if($gender == '女') echo 'checked'; ?>><label for="radio-women">女</label>
          </dd>
          <dt>患者出生年月日<span class="required">必填</span></dt>
          <dd>
            <div class="row birth-box">
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
          <dt>患者地址<span class="required">必填</span></dt>
          <dd>
            <input type="text" name="contact_data[address]" placeholder="" value="<?php echo h($address); ?>">
          </dd>
          <dt>电话号码<span class="required">必填</span></dt>
          <dd>
            <input type="text" name="contact_data[tel]" placeholder="080-1234-5678" value="<?php echo h($tel); ?>">
          </dd>
          <dt>邮件地址<span class="required">必填</span></dt>
          <dd>
            <input type="email" name="contact_data[email]" placeholder="example@piq.jp" value="<?php echo h($email); ?>">
          </dd>
          <dt>有无保险证<span class="required">必填</span></dt>
          <dd>
            <select name="contact_data[card]">
              <option value="有" <?php if($card == '有') echo 'selected'; ?>>有</option>
              <option value="無" <?php if($card == '無') echo 'selected'; ?>>無</option>
            </select>
          </dd>
          <dt>具体症状、咨询内容<span class="required">必填</span></dt>
          <dd>
            <textarea name="contact_data[message]" rows="5"><?php echo h($message); ?></textarea>
          </dd>
        </dl>
        <button type="submit" name="btnSubmit" class="btn">确认发送的内容</button>
        <input type="hidden" name="act" value="2">
      </form>
    </div>
  </div>
</section>

<section class="section" id="company">
  <div class="container" data-animate="fadeIn">
    <h2>运营商概况</h2>
    <dl class="company-dl">
      <dt>运营商</dt>
      <dd>Night Doctor 株式会社</dd>
      <dt>办公地点</dt>
      <dd>东京都港区赤坂2-16-6 BIZMARKS赤坂</dd>
      <dt>电话号码</dt>
      <dd>03-6381-7511 / 042-548-1717</dd>
    </dl>
  </div>
</section>

<div class="side-bnr">
  <a href="pocketdoctor.php">
    <i class="fas fa-mobile-alt"></i>
    受理在线诊治
  </a>
</div>

<?php require("footer.php");?>
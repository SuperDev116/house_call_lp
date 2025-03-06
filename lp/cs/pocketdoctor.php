<?php
$page_id = 'privacy';
$page_title = '受理在线诊治 | Night Doctor';
$page_description = 'Night Doctor使用“在线诊疗口袋医生”进行在线诊疗。';
require("header.php");
?>

<section class="section page-section" id="online">
  <div class="container">

    <h2>受理在线诊治</h2>
    <p class="lead">
      <img src="assets/img/pocketdoctor.jpg" alt="ポケットドクター"><br>
      Night Doctor使用“在线诊疗口袋医生”进行在线诊疗。
    </p>
    <h3>应用程序下载</h3>
    <div class="row">
      <div class="col-md-5">
        <dl class="app-dl">
          <dt>iOS版本</dt>
          <dd>
            <div class="qrcode">
              <img src="assets/img/qrcode_ios.svg" alt="iOS版本">
            </div>
            <div class="store">
              <a href="https://itunes.apple.com/jp/app/%E9%81%A0%E9%9A%94%E8%A8%BA%E7%99%82%E3%83%9D%E3%82%B1%E3%83%83%E3%83%88%E3%83%89%E3%82%AF%E3%82%BF%E3%83%BC/id1224467405?l=ja&ls=1&mt=8"><img src="assets/img/app_appstore_jp.svg" alt="iOS版本"></a>
            </div>
          </dd>
        </dl>
      </div>
      <div class="col-md-5">
        <dl class="app-dl">
          <dt>Android版本</dt>
          <dd>
            <div class="qrcode">
              <img src="assets/img/qrcode_android.svg" alt="Android版本">
            </div>
            <div class="store">
              <a href="https://play.google.com/store/apps/details?id=jp.co.optim.pdts"><img src="assets/img/app_googleplay_jp.svg" alt="googleplay"></a>
            </div>
          </dd>
        </dl>
      </div>
    </div>

    <h3>在线诊疗的步骤</h3>
    <ol class="flow-list">
      <li>
        <div class="flow-box">
          <div class="row">
            <div class="col-md-3">
              <figure class="pic">
                <img src="assets/img/online_01.png" alt="首次注册流程（下载到新注册）">
              </figure>
            </div>
            <div class="col-md-9">
              <h3><span>1</span>首次注册流程（下载到新注册）</h3>
              <p>
                1. 从应用商店下载、安装“口袋医生”。
              </p>
              <p>
                2. 启动APP并在同意使用条款后点击“一般用户”，登录。<br>在未注册账号的情况下，请从“点击此处注册新用户”进行注册。
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
                <img src="assets/img/online_02.png" alt="首次注册流程（下载到新注册）">
              </figure>
            </div>
            <div class="col-md-9">
            <h3><span>2</span>首次注册流程（下载到新注册）</h3>
              <p>
                1. 输入和发送电子邮件地址后，将收到确认邮件。<br>
                访问邮件地址记载的链接后，在基本信息输入画面中填写信息。
              </p>
              <p>
                2. 注册信息后，登录后将跳转至首页。<br>
                之后，可以通过登录画面中注册的邮件地址和密码登录。
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
                <img src="assets/img/online_03.png" alt="使用流程（医疗机构注册）">
              </figure>
            </div>
            <div class="col-md-9">
              <h3><span>3</span>使用流程（医疗机构注册）</h3>
              <p class="caution">
                <strong>※ 预约·诊察前···</strong><br>
                  就诊前请确认医疗机构是否支持“口袋医生”进行在线诊疗，并取得医疗机构特有的“Pocket Number”。
              </p>
              <p>
                从首页点击“预约”输入就诊医疗机构的Pocket Number。<br>
                如果有诊疗卡,可上传号码或拍摄的诊疗卡。
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
                <img src="assets/img/online_04.png" alt="使用步骤（预约）">
              </figure>
            </div>
            <div class="col-md-9">
              <h3><span>4</span>使用步骤（预约）</h3>
              <p>
                1. 点击“预约”选择就诊的医疗机构后，选择诊察分类（初诊、复诊）。
              </p>
              <p>
                2. 选择要就诊的诊疗科目和医生，并设置预约日期和时间。那时，也可输入症状等信息。<br>
                希望使用保险诊疗的人士可拍摄并上传保险证。<br>
                ※请咨询各个医疗机构了解保险证注册机付款方式。
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
                <img src="assets/img/online_05.png" alt="使用步骤（就诊、诊疗履历的确认）">
              </figure>
            </div>
            <div class="col-md-9">
              <h3><span>5</span>使用步骤（就诊、诊疗履历的确认）</h3>
              <p>
                1. 在预约的时间会接到医疗机构、医生的电话（视就诊情况可能会前后颠倒诊疗顺序）<br>
                按结束按钮结束诊察。诊察结束后可确认历史纪录等内容。<br>
                日后由医疗机构邮寄药方。详情请咨询医疗机构。
              </p>
              <p>
                2. 可从首页确认通过袖珍医生就诊的诊疗履历。
              </p>
            </div>
          </div>
        </div>
      </li>
    </ol>
    <a href="assets/pdf/pocketdoctor.pdf" class="btn" target="_blank">点击此处了解详细的使用步骤（PDF）</a>
  </div>
</section>

<?php require("footer.php");?>
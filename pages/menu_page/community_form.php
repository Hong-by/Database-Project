<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1" />
  <title>Zay Shop || community</title>
  <!-- Favicon Link -->
  <link rel="shortcut icon" href="/zay/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/zay/img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="/zay/img/favicon.ico">
  <!-- Font Awesome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
  <!-- Reset CSS Link -->
  <link rel="stylesheet" href="/zay/css/reset.css">
  <!-- Main Style CSS Link -->
  <link rel="stylesheet" href="/zay/css/style.css">
  <!-- Media Style CSS Link -->
  <link rel="stylesheet" href="/zay/css/media.css">
</head>

<body>
  <div class="wrap">
    <?php
    include $_SERVER["DOCUMENT_ROOT"].'/zay/include/header.php'
    ?>

    <section class="community">
      <div class="center">
        <div class="tit_box">
          <h2>Commnuity Board</h2>
          <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt<br> mollit anim id
            est laborum.</p>
        </div>
        <div class="comm_table">
          <ul class="comm_row">
            <li class="comm_tit">
              <span>번호</span>
              <span>아이디</span>
              <span>제목</span>
              <span>등록일</span>
              <span>조회수</span>
            </li>
            <li class="comm_con">
              <span>3</span>
              <span>hby033</span>
              <span>사이트 오픈을 축하합니다.</span>
              <span>2021-07-21</span>
              <span>101</span>
            </li>

            <li class="comm_con">
              <span>4</span>
              <span>h222033</span>
              <span>오마야 뭡니다.</span>
              <span>2021-07-21</span>
              <span>51</span>
            </li>
          </ul>
        </div>
      </div>
    </section>


    <?php
      include $_SERVER["DOCUMENT_ROOT"].'/zay/include/footer.php';
    ?>
  </div>


  <!-- jQuery Framework Load -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/js/jq.main.js"></script>

</body>

</html>
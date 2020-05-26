<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://blog.webcreativepark.net/sample/js/36/footerFixed.js"></script>
    <style media="screen">
      body {
        width: 100vw;
        margin: auto;
        margin-top: 0px;
        color: #222222;
        height: 100vh;
      }
      .header {
        background: linear-gradient(lightgray, white);
        padding-top: 1px;
        width: 100vw;
        height: 120px;
        /* position:fixed; */
        position:sticky;
        top:0;
      }
      .content {
        /* margin-top: 2rem; */
        /* padding-left: 3rem; */
        margin-bottom: 2rem;
        margin: 0 auto;
        /* padding-top: 146px; */
      }
      .footer {
        text-align: right;
        background: linear-gradient(white, lightgray);
        padding-right: 1rem;
        padding-top: 5px;
        padding-bottom: 3px;
        margin-bottom: 0;
      }
      .logo {
        margin: 0 5px 0 5px;
      }
      .header h1 a{
        color: #4B4E6D;
        text-decoration: none;
        padding-left: 1rem;
      }
      .header h1 a:hover{
        color: #262746;
      }
      .header h3 {
        padding-left: 2rem;
      }
      .copyright {
        color: #4B4E6D;
      }
      .errorMsg {
        color: Red;
        font-size: 80%;
      }
      .wf-roundedmplus1c, button, small, body {
        font-family: "M PLUS Rounded 1c";
      }
      .confirm_table {
        border-collapse: collapse;
        text-align: center;
      }
      .confirm_table th, .confirm_table td {
        padding: 10px 5px;
        width: 150px;
      }
      #go2top{
        visibility: hidden;
        text-align: center;
        width: 8rem;
        /* margin-top: 1rem;
        margin-left: 50vh; */
      }
      button {
        /* 角丸 */
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border-radius: 5px;
      }
      .menu_wrap {
        /* margin-left: 2rem; */
      }
      .menu_wrap button {
        margin-right: 3px;
        padding: 0.5rem 1rem 0.5rem 1rem;
        background-color: #EEE;
      }
      button.logout_button, button#go2top{
        margin-right: 0.5rem;
      }
      button.logout_button:hover, button#go2top:hover {
        background-color: #CCC;
      }
      button.member:hover{
        background-color: #8497dc;
      }
      button.document:hover{
        background-color: #8bdc84;
      }
      button.circulation:hover{
        background-color: #dccd84;
      }
      button.returns:hover{
        background-color: #dc9184;
      }
      .button {
        margin: 20px auto;
      }
    </style>
    <!-- fontawesome -->
    <link href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">
    <!-- フォント -->
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
  </head>
  <body>
    <!-- ヘッダー -->
    <div class="header wf-roundedmplus1c">
      <h1><a href="/after_login_top"><i class="fas fa-book-open logo"></i>図書管理システム</a></h1>
      <h3>@yield('title')</h3>
    </div>
    <!-- コンテンツ入れるとこ -->
    <div class="content wf-roundedmplus1c">
      @yield('content')
      <!-- xxx_complete.blade.phpには「トップに戻る」ボタンを追加 -->
      <button type="button" class="button" name="go2top" id="go2top" onclick="location.href='./after_login_top'">トップに戻る</button>
    </div>
    <!-- フッター -->
    <div class="footer wf-roundedmplus1c" id="footer">
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <button class="dropdown-item logout_button" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          ログアウト(ユーザ：{{ Auth::user()->name }})
          </button>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </div>
      <small class="copyright">copyright 2020 teamOkada.</small>
    </div>
  </body>
</html>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <style media="screen">
    .next_button{
      background-color: lightblue;
    }
    </style>
  </head>
  <body>
    <!--ヘッダー -->
    <div class="header">
      <h1><a href="/after_login_top">図書管理システム</a></h1>
      <h2>@yield('title')</h2>
    </div>

    <!--コンテンツ入れるところ -->
    <div class="content">
      @yield('content')
    </div>
    <!--フッター -->
    <div class="footer">
      <small>copyright 2020 teamOkada.</small>
    </div>
  </body>
</html>
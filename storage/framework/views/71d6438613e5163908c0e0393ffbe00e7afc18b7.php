<!DOCTYPE>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <style media="screen">
        .content{
            width: 400px;
            text-align: left;
        }
        form{
            text-align: right;
            margin-left: 0;
        }
        .form_items{
            margin-right: 2rem;
        }
        .back_button{
            background-color: lightgray;
        }
        .next_button{
            background-color: lightblue;
        }
        .button{
            margin: 0 auto;
        }
        table {
            border-collapse:collapse;
        }
        th,td {
            padding:10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><a href="/after_login_top">図書管理システム</a></h1>
        <h2><?php echo $__env->yieldContent('title'); ?></h2>
    </div>
    <div class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <div class="footer">
        <button onclick="/login" name="liocation.href = './logout_button'">ログアウト</button>
        <small>copyright 2020 teamOkada.</small>
    </div>
</body>
</html><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/layouts/webbookapp.blade.php ENDPATH**/ ?>
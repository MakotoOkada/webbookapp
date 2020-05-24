

<?php $__env->startSection('title', '会員編集完了画面'); ?>

<?php $__env->startSection('content'); ?>
  <p>編集後の会員情報</p>
  <table>
    <tr><th>名前</th><td><?php echo e($user_data->user_name); ?></td></tr>
    <tr><th>住所</th><td><?php echo e($user_data->user_address); ?></td></tr>
    <tr><th>電話番号</th><td><?php echo e($user_data->user_tel); ?></td></tr>
    <tr><th>メールアドレス</th><td><?php echo e($user_data->user_email); ?></td></tr>
  </table>
  <p>会員情報の編集が完了しました。</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/member_edit_complete.blade.php ENDPATH**/ ?>
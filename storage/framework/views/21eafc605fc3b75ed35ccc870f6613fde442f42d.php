

<?php $__env->startSection('title', '会員登録完了画面'); ?>

<?php $__env->startSection('content'); ?>
<p>以下の通り、会員登録が完了しました</p>

<table border="1">
    <tr><th>名前：</th><td><?php echo e($form->user_name); ?></td></tr>
    <tr><th>住所：</th><td><?php echo e($form->user_address); ?></td></tr>
    <tr><th>電話番号：</th><td><?php echo e($form->user_tel); ?></td></tr>
    <tr><th>メールアドレス：</th><td><?php echo e($form->user_email); ?></td></tr>
    <tr><th>生年月日：</th><td><?php echo e($form->user_birthday); ?></td></tr>
    <tr><th>入会年月日：</th><td><?php echo e($form->user_joindate); ?></td></tr>
</table>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/member_register_complete.blade.php ENDPATH**/ ?>
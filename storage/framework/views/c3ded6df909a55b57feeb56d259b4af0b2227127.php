

<?php $__env->startSection('title', '会員編集確認画面'); ?>

<?php $__env->startSection('content'); ?>
<table>
  <tr><th>名前</th><td><?php echo e($edit_member_data['user_name']); ?></td></tr>
  <tr><th>住所</th><td><?php echo e($edit_member_data['user_address']); ?></td></tr>
  <tr><th>電話番号</th><td><?php echo e($edit_member_data['user_tel']); ?></td></tr>
  <tr><th>メールアドレス</th><td><?php echo e($edit_member_data['user_email']); ?></td></tr>
</table>
  <form class="" action="member_edit_complete" method="post">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="user_id" value="<?php echo e($edit_member_data['user_id']); ?>">
    <input type="hidden" name="user_name" value="<?php echo e($edit_member_data['user_name']); ?>">
    <input type="hidden" name="user_address" value="<?php echo e($edit_member_data['user_address']); ?>">
    <input type="hidden" name="user_tel" value="<?php echo e($edit_member_data['user_tel']); ?>">
    <input type="hidden" name="user_email" value="<?php echo e($edit_member_data['user_email']); ?>">
    <p><button type="button" name="back_member_search_result" class="back_button" onclick="history.back()">戻る</button>
    <input type="submit" name="go_edit_member_check" class="next_button" value="この内容で編集する">
  </form>
</p>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/member_edit_confirming.blade.php ENDPATH**/ ?>
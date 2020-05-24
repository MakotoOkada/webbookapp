

<?php $__env->startSection('title', '会員編集画面'); ?>

<?php $__env->startSection('content'); ?>

<form class="member_edit_form" action="/member_edit_confirming" method="post">
  <?php echo csrf_field(); ?>
  <p><span class="form_items">名前</span><input type="text" name="user_name" value="<?php echo e($user_data->user_name); ?>" required></p>
  <?php $__errorArgs = ['user_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span class="errorMsg"><?php echo e($message); ?></span>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  <p><span class="form_items">住所</span><input type="text" name="user_address" value="<?php echo e($user_data->user_address); ?>" required></p>
  <?php $__errorArgs = ['user_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span class="errorMsg"><?php echo e($message); ?></span>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  <p><span class="form_items">電話番号</span><input type="text" name="user_tel" value="<?php echo e($user_data->user_tel); ?>" required></p>
  <?php $__errorArgs = ['user_tel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span class="errorMsg"><?php echo e($message); ?></span>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  <p><span class="form_items">メールアドレス</span><input type="text" name="user_email" value="<?php echo e($user_data->user_email); ?>" required></p>
  <?php $__errorArgs = ['user_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span class="errorMsg"><?php echo e($message); ?></span>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  <p><button type="button" name="back_member_search_result" class="back_button" onclick="history.back()">戻る</button>
    <input type="hidden" name="user_id" value="<?php echo e($user_data->user_id); ?>">
    <input type="submit" name="go_edit_member_check" class="next_button" value="確認画面へ"></p>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/member_edit.blade.php ENDPATH**/ ?>


<?php $__env->startSection('title', '会員登録画面'); ?>

<?php $__env->startSection('content'); ?>
<p>会員登録情報入力</p>

<?php if(count($errors) > 0): ?>
<p>入力項目に問題があります。再入力してください。</p>
<?php endif; ?>

<form action="/member_register" method="post">
    <?php echo csrf_field(); ?>
    <table border="1">
        <tr><th>名前：</th><td><input type="text" name="user_name" value="<?php echo e(old('user_name')); ?>"><br>
        <?php $__errorArgs = ['user_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="errorMsg"><?php echo e($message); ?></span></td>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></tr>
        <tr><th>住所：</th><td><input type="text" name="user_address" value="<?php echo e(old('user_address')); ?>"><br>
        <?php $__errorArgs = ['user_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="errorMsg"><?php echo e($message); ?></span></td>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></tr>
        <tr><th>電話番号：</th><td><input type="tel" name="user_tel" value="<?php echo e(old('user_tel')); ?>"><br>
        <?php $__errorArgs = ['user_tel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="errorMsg"><?php echo e($message); ?></span></td>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></tr>
        <tr><th>メールアドレス：</th><td><input type="email" name="user_email" value="<?php echo e(old('user_email')); ?>"><br>
        <?php $__errorArgs = ['user_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="errorMsg"><?php echo e($message); ?></span></td>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></tr>
        <tr><th>生年月日：</th><td><input type="text" name="user_birthday" value="<?php echo e(old('user_birthday')); ?>" placeholder="例)1990/01/01"><br>
        <?php $__errorArgs = ['user_birthday'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="errorMsg"><?php echo e($message); ?></span></td>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></tr>
        <tr><th></th><td><input type="submit" value="確認画面へ" class="button next_button"></td></tr>
    </table>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/member_register.blade.php ENDPATH**/ ?>
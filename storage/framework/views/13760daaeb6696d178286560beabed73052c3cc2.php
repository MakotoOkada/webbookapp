

<?php $__env->startSection('title','ログイン画面'); ?>

<?php $__env->startSection('content'); ?>
<p><?php echo e($message); ?></p>
    <form class="" action="login" method="post">
    <?php echo csrf_field(); ?>
    <table>
        <tr>
        <th>会員ID</th><td><input type="number" name="user_id"><br>
        <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="errorMsg"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </td></tr>
        <tr>
        <th>Email</th><td><input type="email" name="user_mail"><br>
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
        </td></tr>
        <tr>
        <th></th><td><input type="submit" class="next_button" value="ログイン"></td>
        </tr>
    </table>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/login.blade.php ENDPATH**/ ?>
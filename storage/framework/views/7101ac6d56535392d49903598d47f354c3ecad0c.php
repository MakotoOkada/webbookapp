

<?php $__env->startSection('title', '貸出画面'); ?>

<?php $__env->startSection('content'); ?>
<form action="circulation_check" method="post">
    <?php echo csrf_field(); ?>
    <table border="1">
        <tr><th>会員ID</th><td><input type="number" name="user_id" value="<?php echo e($data['user_id']); ?>"><br>
        <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <?php echo e($message); ?>

        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </td><td><button onclick="location.href='./circulation_check'" class="button next_button" name="action" value="next">次へ</button></td></tr>
    </table>
</form>


<?php if(!(empty($total)) && $total <= 5 && $total > 0): ?>
<p>あと<?php echo e($total); ?>冊借りられます</p>
<form action="circulation_check" method="post">
    <?php echo csrf_field(); ?>
    <table border="1">
        <tr><th>資料ID</th><td><input type="number" name="catalog_id" value="<?php echo e(old('catalog_id')); ?>"><br>
        <?php $__errorArgs = ['catalog_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="errorMsg"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </td>
        <input type="hidden" name="user_id" value="<?php echo e($user_id); ?>">
        <input type="hidden" name="rental_loandate" value="<?php echo e(date('Y-m-d')); ?>">
        <td><button onclick="location.href='./circulation_check'" class="button next_button" name="action" value="next_last">貸出</button></td></tr>
    </table>
</form>
<?php elseif($total <= 0): ?>
<p>これ以上借りることはできません</p>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.webbookapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views//circulation_check.blade.php ENDPATH**/ ?>
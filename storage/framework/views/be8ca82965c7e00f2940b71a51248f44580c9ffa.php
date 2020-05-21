

<?php $__env->startSection('title', '貸出画面'); ?>

<?php $__env->startSection('content'); ?>
<form action="circulation" method="post">
    <?php echo csrf_field(); ?>
    <table border="1">
        <tr><th>会員ID</th><td><input type="number" name="user_id" value="<?php echo e(old('user_id')); ?>"></td><td><input type="submit" value="次へ" name="next" class="next_button"></td></tr>
    </table>
</form>

<?php if(!(empty($total)) && $total <= 5): ?>
<p>あと<?php echo e($total); ?>冊借りられます</p>
<form action="circulation_complete" method="post">
    <?php echo csrf_field(); ?>
    <table border="1">
    <?php for($i = 1;$i <= $total;$i++): ?>
        <tr><th>資料ID</th><td><input type="number" name="catalog_id" value="<?php echo e(old('catalog_id')); ?>"></td></tr>
        <input type="hidden" name="user_id" value="<?php echo e($user_id); ?>">
        <input type="hidden" name="rental_loandate" value="<?php echo e(date('Y-m-d')); ?>">
    <?php endfor; ?>
        <tr><th></th><td><input type="submit" value="貸出" name="next_last" class="next_button"></td></tr>
    </table>
</form>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.webbookapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/circulation.blade.php ENDPATH**/ ?>
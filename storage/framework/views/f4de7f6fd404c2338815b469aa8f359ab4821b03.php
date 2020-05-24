

<?php $__env->startSection('title', '貸出完了画面'); ?>

<?php $__env->startSection('content'); ?>
<p>貸出が完了しました。</p>
<p>返却期日は以下の通りです。</p>
<table border="1">
    <tr><th>返却期日</th></tr>
    <tr><td><?php echo e($item->rental_limitdate); ?>まで</td></tr>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.webbookapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/circulation_complete.blade.php ENDPATH**/ ?>
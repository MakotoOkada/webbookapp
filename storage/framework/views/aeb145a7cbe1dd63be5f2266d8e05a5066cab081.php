
<?php $__env->startSection('title', '返却完了画面'); ?>
<?php $__env->startSection('content'); ?>
   <?php echo csrf_field(); ?>
   資料の返却が完了しました。
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.webbookapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/returns/return_complete.blade.php ENDPATH**/ ?>
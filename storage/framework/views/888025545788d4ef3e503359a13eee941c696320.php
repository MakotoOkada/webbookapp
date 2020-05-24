
<?php $__env->startSection('title', '資料追加画面'); ?>

<?php $__env->startSection('content'); ?>
<form class="document_add_form" action="/document_add_confirming" method="post">
  <?php echo csrf_field(); ?>
  <p><span class="form_items">ISBN</span><input type="number" name="catalog_number" value="<?php echo e(old('catalog_number')); ?>" required></p>
  <?php $__errorArgs = ['catalog_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span class="errorMsg"><?php echo e($message); ?></span>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

  <p><input type="submit" class="next_button" value="確認画面へ"></p>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/document_add.blade.php ENDPATH**/ ?>
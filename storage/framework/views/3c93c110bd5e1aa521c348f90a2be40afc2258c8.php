
<?php $__env->startSection('title', '資料追加確認画面'); ?>

<?php $__env->startSection('content'); ?>
<table>
  <tr><th>ISBN</th><td><?php echo e($add_document_data['catalog_number']); ?></td></tr>
</table>
<form class="document_add_confirming_form" action="/document_add_last_confirming" method="post">
  <?php echo csrf_field(); ?>
  <p><span class="form_items">入荷年月日</span><input type="text" name="arrival_date" value="<?=date("Y/m/d")?>" required></p>
  <?php $__errorArgs = ['arrival_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <span class="errorMsg"><?php echo e($message); ?></span>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  <input type="hidden" name="catalog_number" value="<?php echo e($add_document_data['catalog_number']); ?>" required>
  <p><span class="form_items">資料名</span><input type="text" name="catalog_name" value="<?php echo e($add_document_data['catalog_name']); ?>" required></p>
  <?php $__errorArgs = ['catalog_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span class="errorMsg"><?php echo e($message); ?></span>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  <p><span class="form_items">分類コード</span><input type="number" name="catalog_code" value="<?php echo e($add_document_data['catalog_code']); ?>" required></p>
  <?php $__errorArgs = ['catalog_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span class="errorMsg"><?php echo e($message); ?></span>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  <p><span class="form_items">著者</span><input type="text" name="catalog_author" value="<?php echo e($add_document_data['catalog_author']); ?>" required></p>
  <?php $__errorArgs = ['catalog_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span class="errorMsg"><?php echo e(catalog_author); ?></span>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  <p><span class="form_items">出版社</span><input type="text" name="catalog_publishername" value="<?php echo e($add_document_data['catalog_publishername']); ?>" required></p>
  <?php $__errorArgs = ['catalog_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span class="errorMsg"><?php echo e(catalog_publishername); ?></span>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  <p><span class="form_items">出版日</span><input type="text" name="catalog_publication" value="<?php echo e($add_document_data['catalog_publication']); ?>" required></p>
  <?php $__errorArgs = ['catalog_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span class="errorMsg"><?php echo e(catalog_publication); ?></span>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  <p><button type="button" name="back_document_add" class="back_button" onclick="history.back()">戻る</button>
    <input type="submit" class="next_button" value="最終確認画面へ"></p>
</form>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/document_add_confirming.blade.php ENDPATH**/ ?>
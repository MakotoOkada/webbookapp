
<?php $__env->startSection('title', '資料追加最終確認画面'); ?>

<?php $__env->startSection('content'); ?>
<table>
  <tr><th>ISBN</th><td><?php echo e($add_document_data['catalog_number']); ?></td></tr>
  <tr><th>入荷年月日</th><td><?php echo e($add_document_data['arrival_date']); ?></td></tr>
  <tr><th>資料名</th><td><?php echo e($add_document_data['catalog_name']); ?></td></tr>
  <tr><th>分類コード</th><td><?php echo e($add_document_data['catalog_code']); ?></td></tr>
  <tr><th>著者</th><td><?php echo e($add_document_data['catalog_author']); ?></td></tr>
  <tr><th>出版社</th><td><?php echo e($add_document_data['catalog_publishername']); ?></td></tr>
  <tr><th>出版日</th><td><?php echo e($add_document_data['catalog_publication']); ?></td></tr>
</table>
<form class="" action="document_add_complete" method="post">
  <?php echo csrf_field(); ?>
  <input type="hidden" name="catalog_number" value="<?php echo e($add_document_data['catalog_number']); ?>" required>
  <input type="hidden" name="catalog_name" value="<?php echo e($add_document_data['catalog_name']); ?>" required>
  <input type="hidden" name="arrival_date" value="<?php echo e($add_document_data['arrival_date']); ?>" required>
  <input type="hidden" name="catalog_code" value="<?php echo e($add_document_data['catalog_code']); ?>" required>
  <input type="hidden" name="catalog_author" value="<?php echo e($add_document_data['catalog_author']); ?>" required>
  <input type="hidden" name="catalog_publishername" value="<?php echo e($add_document_data['catalog_publishername']); ?>" required>
  <input type="hidden" name="catalog_publication" value="<?php echo e($add_document_data['catalog_publication']); ?>" required>
  <p><button type="button" name="back_document_add_confirming" class="back_button" onclick="history.back()">戻る</button>
    <input type="submit" class="next_button" value="この内容で資料を追加する"></p>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/document_add_last_confirming.blade.php ENDPATH**/ ?>
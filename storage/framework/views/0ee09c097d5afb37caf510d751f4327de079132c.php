
<?php $__env->startSection('title', '資料追加完了画面'); ?>

<?php $__env->startSection('content'); ?>
以下の内容で資料を追加しました。
<table>
  <tr><th>ISBN</th><td><?php echo e($add_document_data['catalog_number']); ?></td></tr>
  <tr><th>入荷年月日</th><td><?php echo e($add_document_data['arrival_date']); ?></td></tr>
  <tr><th>資料名</th><td><?php echo e($add_document_data['catalog_name']); ?></td></tr>
  <tr><th>分類コード</th><td><?php echo e($add_document_data['catalog_code']); ?></td></tr>
  <tr><th>著者</th><td><?php echo e($add_document_data['catalog_author']); ?></td></tr>
  <tr><th>出版社</th><td><?php echo e($add_document_data['catalog_publishername']); ?></td></tr>
  <tr><th>出版日</th><td><?php echo e($add_document_data['catalog_publication']); ?></td></tr>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/document_add_complete.blade.php ENDPATH**/ ?>
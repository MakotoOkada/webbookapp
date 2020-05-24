

<?php $__env->startSection('title','資料検索結果画面'); ?>

<?php $__env->startSection('content'); ?>


<p>資料検索結果</p>
<input type="search" name="search">
<!-- <input type="submit" name="submit" value="検索"> -->


<table border="1">
  <tr>
    <th nowrap>ISBN番号</th>
    <th nowrap>資料名</th>
    <th nowrap>分類コード</th>
    <th nowrap>著者</th>
    <th nowrap>出版社</th>
    <th nowrap>出版日</th>
    <!-- <th nowrap>資料ID</th> -->
  </tr>
  <?php $__currentLoopData = $catalog_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
    <td nowrap><?php echo e($item->catalog_number); ?></td>
    <td nowrap><?php echo e($item->catalog_name); ?></td>
    <td nowrap><?php echo e($item->catalog_code); ?></td>
    <td nowrap><?php echo e($item->catalog_author); ?></td>
    <td nowrap><?php echo e($item->catalog_publishername); ?></td>
    <td nowrap><?php echo e($item->catalog_publication); ?></td>
    <!-- <td><?php echo e($item->catalog_number); ?></td> -->
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>


  <button type="button" name="return_button" onclick="location.href='./document_search'">戻る</button>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/document_search_result.blade.php ENDPATH**/ ?>
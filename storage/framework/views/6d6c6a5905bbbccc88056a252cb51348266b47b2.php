

<?php $__env->startSection('title','資料検索画面'); ?>

<?php $__env->startSection('content'); ?>

<form action="/document_search_result" method="post">
  <?php echo csrf_field(); ?>
  <p>検索したい資料名を入力してください。</p>
  <input type="search" name="catalog_name" placeholder="資料名を入力">
  <input type="submit" value-"検索" name="search_button">　</button>
</form>


  <button type="button" name="return_button" onclick="location.href='./after_login_top'">戻る</button>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/document_search.blade.php ENDPATH**/ ?>
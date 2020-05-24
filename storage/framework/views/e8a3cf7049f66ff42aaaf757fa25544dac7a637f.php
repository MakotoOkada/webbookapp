  


<?php $__env->startSection('title', 'トップメニュー画面'); ?>

<?php $__env->startSection('content'); ?>
<div class="menu_wrap">
  <button type="button" class="member" name="member_register" onclick="location.href='./member_register'">会員登録</button>
  <button type="button" class="member" name="member_search" onclick="location.href='./member_search'">会員検索</button>
  <button type="button" class="document" name="document_search" onclick="location.href='./document_search'">資料検索</button>
  <button type="button" class="document" name="document_add" onclick="location.href='./document_add'">資料追加</button>
  <button type="button" class="circulation" name="circulation" onclick="location.href='./circulation'">貸出</button>
  <button type="button" class="returns" name="returns" onclick="location.href='./returns'">返却</button>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.webbookapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/after_login_top.blade.php ENDPATH**/ ?>
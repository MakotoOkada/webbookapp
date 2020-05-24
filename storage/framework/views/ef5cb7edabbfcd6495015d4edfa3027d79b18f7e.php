
<style media="screen">
  .content{
    width: 500px;
    text-align: left;
  }
  form{
    text-align: right;
    margin-left: 0;
  }
  .form_items{
    margin-right: 2rem;
  }
  table {
    margin-left: 250px;
  }
  table th{
    width: 100px;
    text-align: left;
    margin-right: 2rem;
  }
  table td{
    width: 150px;
  }
  input {
    /* 角丸 */
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    padding: 0.3rem;
  }
  .back_button{
    background-color: #95A3B3;
    padding: 0.3rem 1rem 0.3rem 1rem;
  }
  .back_button:hover{
    background-color: #687383;
  }
  .next_button{
    background-color: #84DCC6;
    padding: 0.3rem 1rem 0.3rem 1rem;
  }
  .next_button:hover{
    background-color: #6AB49E;
  }
</style>
<?php echo $__env->make('layouts.webbookapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/layouts/form.blade.php ENDPATH**/ ?>
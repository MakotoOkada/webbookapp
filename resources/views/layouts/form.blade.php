@extends('layouts.webbookapp')
<style media="screen">
  .content{
    width: 500px;
    text-align: center;
  }
  #go2top{
    visibility: visible !important;
  }
  form{
    text-align: cnenter;
    margin-left: 0;
    margin-bottom:0;
  }
  .form_items{
    margin-right: 2rem;
  }
  table.document_result{
    margin-left: 1.5rem;
    width: 100%;
    border-collapse: collapse;
    /* table-layout: fixed; */
  }
  table.document_result th, table.document_result td{
    padding-right: 0.8rem;
    padding-left: 0.3rem;
    /* width: 100%; */
  }
  table.document_result td:nth-child(2), table.document_result td:nth-child(4), table.document_result td:nth-child(5){
   word-wrap: break-word;
  }
  table.document_result td:first-child, table.document_result td:nth-child(3), table.document_result td:nth-child(6),table.document_result td:nth-child(7),table.document_result td:nth-child(8), table.document_result td:last-child{
   width:calc(100% - 1rem);
  }
  table {
    /* margin-left: 250px; */
    margin: 0 auto;
  }
  table th{
    width: 100px;
    text-align: center;
    margin-right: 2rem;
  }
  table td{
    width: 150px;
  }
  table.member_register {
    margin-left:0px !important;
  }
  input , textarea {
    /* 角丸 */
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    padding: 0.3rem;
    border: inset;
    border-width: 2px;
    background: white;
  }
  .back_button{
    border-style: outset;
    border-width: 2px;
    background-color: #95A3B3;
    padding: 0.3rem 1rem 0.3rem 1rem;
    height: 2rem;
  }
  .back_button:hover{
    background-color: #687383;
  }
  .next_button{
    border-style: outset;
    border-width: 2px;
    background-color: #84DCC6;
    padding: 0.3rem 1rem 0.3rem 1rem;
    height: 2rem;
  }
  .next_button:hover{
    background-color: #6AB49E;
  }
  .button_wrap {
    display: flex;
    justify-content: center;
    margin: 10px auto;
  }
</style>
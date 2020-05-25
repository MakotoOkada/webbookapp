@extends('layouts.webbookapp')
<style media="screen">
  .content{
    width: 500px;
    text-align: left;
  }
  #go2top{
    visibility: visible !important;
  }
  form{
    text-align: right;
    margin-left: 0;
  }
  .form_items{
    margin-right: 2rem;
  }
  table.document_result{
    margin-left: 1.5rem;
    width: 100%;
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
  table.document_result td:first-child, table.document_result td:nth-child(3), table.document_result td:last-child{
   width: 100%;
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
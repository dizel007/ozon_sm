<?php
/* Smarty version 4.1.0, created on 2023-06-07 13:29:30
  from 'C:\xampp\htdocs\ozon_sm\templates\up_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_64806a1ab85ea4_51035273',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5564e4483bb74ade34f8380ad7918412148f2426' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ozon_sm\\templates\\up_form.tpl',
      1 => 1685968463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64806a1ab85ea4_51035273 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '36879987064806a1ab7e601_27167404';
?>

<div class="container-fluid">

<div class="row">
  <div class="card shadow  mt-1 pt-1 pb-1">


 <form>

<div class="col-md-12 pb-1 mt-2">

 
      <div class="col-md-4 pb-1 mt-2">
      <label class="form-label ">Тип запроса</label>
          <select required name="type_query" >
              <option value="888">Сформировать отправление</option>
              <option value="555">Напечатать этикетки</option>
          </select>
      </div>

      <div class="col-md-4 pb-1 mt-2">
          <label class="form-label ">Дата запроса</label>
          <input required type="date" name="date_query_ozon" value="<?php echo $_smarty_tpl->tpl_vars['date_query_ozon']->value;?>
">
      </div>

      <div class="col-md-4 pb-1 mt-2">
      <label class="form-label ">захватить еще дней</label>
       <select name="dop_days_query" >
         <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>

      </select>
        </div>



  <div class="col-md-10">
    <button class="col-md-4 btn btn-success" type="submit">Применить</button>
  </div>
    
  </div>   
</form>








</div><?php }
}

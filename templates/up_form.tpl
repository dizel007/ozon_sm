
<div class="container-fluid">

<div class="row">
  <div class="card shadow  mt-1 pt-1 pb-1">


 <form>

{******************** ТИП Продукции ************************************}
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
          <input required type="date" name="date_query_ozon" value="{$date_query_ozon}">
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
      {* <input required type="date" name="dop_days_query" value="{$dop_days_query}"> *}
  </div>

{******* ПРИМЕНИТЬ ФИЛЬТР ******************************************}


  <div class="col-md-10">
    <button class="col-md-4 btn btn-success" type="submit">Применить</button>
  </div>
    
  </div>   
</form>








</div>
<div class="row">
        <div class="card col-md-12 shadow mt-3 pt-1">

        
        <table class="tab_50 table table-striped ">
          <thead>
            <tr class ="text-center">
              <th width="10">пп</th>
             
              <th width="20">Артикул </th>
              <th scope="col" width="20">Количество</th>
              <th scope="col" width="20">Цена за шт</th>
              
                 
            </tr>
         </thead>
      <tbody>

{$i = 1}
 {foreach from=$array_art_price key=key item=posts}
           
          <tr class ="text14">
                <td>{$i}</td>
             
{* Нормер отправления *}
   <td>{$key}</td> 
{* Дата отправления *}
    <td>{$posts['quantity']}</td>
    <td>{$posts['price']}</td>

{$i=$i+1}      
   {/foreach}
   <tr class ="text-center">
   <td></td>
   <td><b>Всего товаров</b></td>
   <td><b>{$kolvo_tovarov}<b></td>
   <td></td>
   
   </tr>
          </tbody>
      </table>
  </div>
</div>
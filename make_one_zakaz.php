<?php
require 'libs/Smarty.class.php';
$smarty = new Smarty;
$smarty->force_compile = true;
// $smarty->debugging =  false; // старт консоли отладчика
$smarty->caching = true;
$smarty->cache_lifetime = 120;

require_once 'include_funcs.php';



$posting_number = $_GET['posting_number'];
$date_query_ozon = $_GET['date_query_ozon'];

// вычитываем все Заказы н эту дату
$res = get_all_waiting_posts_for_need_date($token, $client_id, $date_query_ozon, "awaiting_packaging");


foreach ($res['result']['postings'] as $posts) {

 if ($posts['posting_number']  == $posting_number) {
    
    $need_send_post = $posts;
    

 }

}
// Из полученного массива формируем массив данных, с которым убодно будет отправлять заказы на сборку
// также тут формируем массив    $array_art   для создания Заказа в 1С.

        $one_arr_for_zakaz['posting_number'] = $need_send_post['posting_number'];
        $one_arr_for_zakaz['shipment_date'] = substr($need_send_post['shipment_date'],0,10);
                  
                foreach ($need_send_post['products'] as $prods) {

            $one_arr_for_zakaz['products'][$prods['offer_id']]['sku'] = $prods['sku'];
            $one_arr_for_zakaz['products'][$prods['offer_id']]['name'] = $prods['name'];
            $one_arr_for_zakaz['products'][$prods['offer_id']]['quantity'] = $prods['quantity'];
                }

// формируем JSON для отправки в ОЗОН, и отправляем

$result = make_packeges_for_one_post($token, $client_id,$one_arr_for_zakaz);
   
echo "<pre>";
print_r($result);
echo "<pre>";






echo "ОБМЕН ОДНОГО ОТПРАВЛЕНИЯ";


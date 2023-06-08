<?php

/* * ********
https://docs.ozon.ru/api/seller/#operation/PostingAPI_ShipFbsPostingV4

Выводим информацию о товаре зная его [sku] (ску есть в Заказке) 

            [id] => 246816740 --- = "product_id"			
            [name] => Крепящий анкер универсальный ANMAKS пластиковый, 30 штук, арт. 8910-30
            [offer_id] => 8910-30
            [barcode] => OZN523170685
*** */

// Формируем массив для создания инъекции

function make_packeges_for_one_post($token, $client_id,$one_post_arr_for_zakaz) {

$posting_number =$one_post_arr_for_zakaz["posting_number"];

$send_data_arr  = array  (
    "packages"=> array(
    ),
    "posting_number" => $posting_number, // НОмер отправления
    "with" => array(
    "additional_data"=> true
    )
);




// формируем массив для каждой позиции товара
foreach ($one_post_arr_for_zakaz['products'] as $products) {

    for ($i=0; $i< $products['quantity']; $i++) {
            $product = array(
                "products" => array(
                    array(
                    "product_id" => $products['sku'],
                    "quantity" => 1 
                    )
                )
            );
            $send_data_arr['packages'][] =  $product;
    }
}


echo "<pre>";
print_r($send_data_arr);
echo "<pre>";
echo "<br>***********************************************************************************<br>";

// die('make_new_ZAAKZ_DIE');

$send_data_arr_js = json_encode($send_data_arr);
$ozon_dop_url = "v4/posting/fbs/ship";

// НЕПОСРЕДСТВЕННЫЙ ЗАПУСК ИНЪЕКЦИИ НА САЙТЕ ОЗОН (перевод заказа в собранный)

/* раскоментировать для работы */

// $res = send_injection_on_ozon($token, $client_id, $send_data_arr_js, $ozon_dop_url );
// return $res;
};


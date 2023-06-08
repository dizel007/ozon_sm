<?php
require_once "functions/torpen.php";



/**
 * Запрос количества товаров
 */
$data_send = '
{
    "fbs_sku": [
    "664720473"
    ]
    }
';

$ozon_dop_url="v1/product/info/stocks-by-warehouse/fbs";

zapros ($token, $client_id, $ozon_dop_url, $data_send);

/**
 * Запрос цены товаров
 */

 $data_send = '
{
    "filter": {
      "offer_id": [
        "7245"
      ],
      "product_id": [
        "336618823"
      ],
      "visibility": "ALL"
    },
    "last_id": "",
    "limit": 100
  }
';

$ozon_dop_url="v2/product/list";
$ozon_dop_url="v3/product/info/stocks";
// zapros ($token, $client_id, $ozon_dop_url, $data_send);
/**
 * Информация о товарах
 * Выводит полную информацию о товаре 
 */
$data_send = '

  {
    "offer_id": "",
    "product_id": 0,
    "sku": 664720473
  }
';
$ozon_dop_url="v2/product/info";
zapros ($token, $client_id, $ozon_dop_url, $data_send);



/**
 * Список
 */

 $data_send = '
 {
  "filter": {
    "posting_number": [
      "32042356-0215-3"
    ],
    "status": "returned_to_seller"
  },
  "limit": 1000,
  "offset": 0
}
';

$ozon_dop_url="v2/returns/company/fbs";
zapros ($token, $client_id, $ozon_dop_url, $data_send);

/**
 * Список
 */





function zapros ($token, $client_id, $ozon_dop_url, $data_send) { 
	$ch = curl_init('https://api-seller.ozon.ru/'.$ozon_dop_url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Api-Key:' . $token,
		'Client-Id:' . $client_id, 
		'Content-Type:application/json'
	));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_send); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HEADER, false);
	$res = curl_exec($ch);

    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Получаем HTTP-код

	curl_close($ch);
	
	$res = json_decode($res, true);

   echo     'Результат обмена : '.$http_code. "<br>";
   echo "<pre>";
   print_r($res);
   echo "<pre>";
}
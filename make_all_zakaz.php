<?php
require_once 'include_funcs.php';
require 'libs/Smarty.class.php';
$smarty = new Smarty;
$smarty->force_compile = true;
// $smarty->debugging =  false; // старт консоли отладчика
$smarty->caching = true;
$smarty->cache_lifetime = 120;

require_once 'include_funcs.php';

$date_query_ozon = $_GET['date_query_ozon'];


// $dop_days_query = $_GET['dop_days_query'];
$dop_days_query = 0; // Всегда собираем за один день

// вычитываем все Заказы н эту дату
$res = get_all_waiting_posts_for_need_date($token, $client_id, $date_query_ozon, "awaiting_packaging", $dop_days_query);


// Из полученного массива формируем массив данных, с которым убодно будет отправлять заказы на сборку
// также тут формируем массив    $array_art   для создания Заказа в 1С.
$i=0;
// Из полученного массива формируем массив данных, с которым убодно будет отправлять заказы на сборку
// также тут формируем массив    $array_art   для создания Заказа в 1С.
   foreach ($res['result']['postings'] as $posts) {
        $arr_for_zakaz[$i]['posting_number'] = $posts['posting_number'];
        $arr_for_zakaz[$i]['shipment_date'] = substr($posts['shipment_date'],0,10);
                  
            foreach ($posts['products'] as $prods) 
            {
              $arr_for_zakaz[$i]['products'][$prods['offer_id']]['sku'] = $prods['sku'];
              $arr_for_zakaz[$i]['products'][$prods['offer_id']]['name'] = $prods['name'];
              $arr_for_zakaz[$i]['products'][$prods['offer_id']]['quantity'] = $prods['quantity'];
             }

    $i++;
   }

 


// если есть Заказы на ОЗОН, то перебираем все отправления по одному и формируем JSON для отправки в ОЗОН
  foreach ($arr_for_zakaz as $one_post) {
    echo "=="."0000"."==";
    // echo "<pre>";
    // print_r($one_post);
    // echo "<pre>";

    $result = make_packeges_for_one_post($token, $client_id,$one_post);
    usleep(10000);
    $array_list_podbora[] = $result['list_podbora'];
    $array_oben[] = $result['obmen'];
    echo "<pre>";
    print_r($array_oben);
    echo "<pre>";
}
 

// echo "<pre>";
// print_r($result);
// echo "<pre>";




/**
 * Формируем лист подбора
 */
$date_time = date('Y-m-d h-m-s');

$xls2 = new PHPExcel();
$xls2->setActiveSheetIndex(0);
$sheet2 = $xls2->getActiveSheet();

$i=1;
foreach ($array_oben as $array_items) {

foreach ($array_items['additional_data'] as $items) {
  echo  "************************************************************"."<br>";
  echo  $items['posting_number']."<br>";
  
  echo  $items['products'][0]['offer_id']."<br>";

print_r($items);	


    $sheet2->setCellValue("A".$i, $items['posting_number']);
    $sheet2->setCellValue("B".$i, $items['products'][0]['offer_id']);
    $sheet2->setCellValue("C".$i, $items['products'][0]['name']);
    $sheet2->setCellValue("D".$i, $items['products'][0]['quantity']);
    $sheet2->setCellValue("E".$i, $items['products'][0]['price']);

    $i++; // смешение по строкам

}
$i++; // смешение по строкам
$sheet2->setCellValue("A".$i, "Следующий заказ");
$i++; // смешение по строкам
}
$i--;
$sheet2->setCellValue("A".$i, "ВСЕ");
$objWriter2 = new PHPExcel_Writer_Excel2007($xls2);
$objWriter2->save($date_time." file_list_podbor.xlsx");



// $filename =$date_time.'array_list_podbora.txt';
// file_put_contents($filename, $array_list_podbora);

// $filename =$date_time.'array_oben.txt';
// file_put_contents($filename, $array_oben);



die('ОТПРАВИЛИ МНОГО ЗАКАЗОВ');

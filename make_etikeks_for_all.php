<?php
require_once 'include_funcs.php';


$date_query_ozon = $_GET['date_query_ozon'];

// Получаем списрк заказов готовых к отправлению
$res = get_all_waiting_posts_for_need_date($token, $client_id, $date_query_ozon, "awaiting_deliver",0);

// echo "<pre>";
// print_r($res);
// echo "<pre>";





foreach ($res['result']['postings'] as $posts) {
  $string_etiket =@$string_etiket."\"".$posts['posting_number']."\", ";
  
}
if (!isset($string_etiket)) {
  echo "НЕТ ДАННЫХ ДЛЯ Вывода";
  die('');
}
$string_etiket = substr($string_etiket, 0, -2);

// echo $string_etiket."<br>";


get_all_barcodes_for_all_sendeing_2 ($token, $client_id,  $string_etiket, $date_query_ozon);

$date_query_ozon_plus= $date_query_ozon.".pdf";

echo "<a href=\"$date_query_ozon_plus\"> Скачать файл с этикетками </a>";

die ('<br> ФИНИШ');


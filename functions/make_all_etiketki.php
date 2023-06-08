<?php

/* * ********
Достаем этикетку отправления ОЗОН

*/


function get_all_barcodes_for_all_sendeing_2 ($token, $client_id,   $string_etiket, $date_send) {

// Данные запроса


$send_data='
{
    "posting_number": ['.
    $string_etiket.'
    ]
  }
';


// $send_data = array("posting_number" => array($string_etiket));
// $send_data = json_encode($send_data, JSON_UNESCAPED_UNICODE)  ;  

// die ("etiketka"); 
echo "<br>";
print_r($send_data);
echo "<br>";

// Метод запрос
$ozon_dop_url ="v1/posting/fbs/package-label/create";
$res = send_injection_on_ozon($token, $client_id, $send_data, $ozon_dop_url );

// echo "<br>";
// print_r($send_data);
// echo "<br>";
 
	// $ch = curl_init('https://api-seller.ozon.ru'.$ozon_dop_url);
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	// 	'Api-Key:' . $token,
	// 	'Client-Id:' . $client_id, 
	// 	'Content-Type:application/json'
	// ));
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $send_data); 
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// curl_setopt($ch, CURLOPT_HEADER, false);
	// $res = curl_exec($ch);
    // $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Получаем HTTP-код

	// curl_close($ch);
	
sleep(5);
// Получаем task_id на скачивание файла с штрих кодами
$task_id = $res['result']['task_id'];

$send_data='
{
    "task_id":'. 
    $task_id
    .'
}
';

$ozon_dop_url ="v1/posting/fbs/package-label/get";
$res = send_injection_on_ozon($token, $client_id, $send_data, $ozon_dop_url );



// $ch = curl_init('https://api-seller.ozon.ru'.$ozon_dop_url);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//     'Api-Key:' . $token,
//     'Client-Id:' . $client_id, 
//     'Content-Type:application/json'
// ));
// curl_setopt($ch, CURLOPT_POSTFIELDS, $send_data); 
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_HEADER, false);
// $res = curl_exec($ch);
// $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Получаем HTTP-код

// curl_close($ch);






// $res = json_decode($res, true);
$url = $res['result']['file_url'];

// echo "<pre>";
// print_r($res);
// echo "<pre>"; 

// die ("etiketka"); 

// НАзвание файла с этикеткой	
    $file = $date_send.".pdf";
   
    if (file_put_contents($file, file_get_contents($url)))
    {
        echo "Файл со штрихкодам получен";
    }
    else
    {
        echo "Ошибка скачивания файла со штрихкодами.";
    }

    return $file;
}  
    
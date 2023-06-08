<?php

/* * ********
Достаем этикетку отправления ОЗОН

*/


function get_all_barcodes_for_all_sendeing ($client_id, $token,  $posting_number, $date_send) {

// Данные запроса
$send_data = array ("posting_number" => array($posting_number)

);
$send_data = json_encode($send_data, JSON_UNESCAPED_UNICODE)  ;  
// echo $send_data;
// echo "<br>";
// $send_data = '
// {
//     "posting_number": [
//         "93151880-0038-2"
//     ]
// }

//  ';

//  echo $send_data;
// echo "<br>";
// die ("etiketka");



// Метод запрос
 $post ="/v2/posting/fbs/package-label";
 
	$ch = curl_init('https://api-seller.ozon.ru'.$post);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Api-Key:' . $token,
		'Client-Id:' . $client_id, 
		'Content-Type:application/json'
	));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $send_data); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HEADER, false);
	$res = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Получаем HTTP-код

	curl_close($ch);
	


echo "<pre>";
print_r($res);
echo "<pre>";

die ("etiketka"); 



// НАзвание файла с этикеткой	
    $file = 'people.pdf';
   
    if (file_put_contents($file, $res, FILE_APPEND))
    {
        echo "File downloaded successfully";
    }
    else
    {
        echo "File downloading failed.";
    }

    return $file;
}  
    
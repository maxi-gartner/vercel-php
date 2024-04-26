<?php 
header('content-type: application/json');

if($SERVER['REQUEST_METHOD'] === 'GET') {
    $response = array(
        'message' => 'Hello World!'
    );
    echo json_encode($response);
}else {
    http_response_code(405);
    echo json_decode('{"message": "Method Not Allowed"}');
}
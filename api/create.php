<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: POST');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

    include("function.php");
    error_reporting(E_ERROR | E_PARSE);
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    
    if($requestMethod == 'POST'){

        $inputData = json_decode(file_get_contents("php://input"), true);
        if(empty($inputData)){
        
            $storeCustomer = storeCustomer($_POST);
        
        }
        else {

            $storeCustomer = storeCustomer($inputData);

        }
        echo $storeCustomer;
        
    }
    else{
        $data = [
            'status' => 405,
            'message' => $requestMethod. ' Method Not Allowed',
        ];
        header("HTTP/1.0 405 Method Not Allowed");
        echo json_encode($data);
    }
?>
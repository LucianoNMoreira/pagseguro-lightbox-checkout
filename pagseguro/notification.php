<?php 
    require_once('config.php');
    require_once('utils.php');
?>
<?php 

    $notificationCode = $_POST['notificationCode'];

    //Asks PagSeguro for payment data
    $params = array(
        'email' => $PAGSEGURO_EMAIL,  
        'token' => $PAGSEGURO_TOKEN
    );

    $response = sendGetRequest($PAGSEGURO_API_URL."/transactions/notifications/".$notificationCode, $params);
    $json = json_decode(json_encode(simplexml_load_string($response)));
?>

<?= $json ?>
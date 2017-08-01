<?php 
    require_once('config.php');
    require_once('utils.php');
    
    $amount = htmlspecialchars($_POST["amount"]);
    $amount = number_format($amount, 2);
    $amount = str_replace(",",".",$amount); //For BRL format

    $my_payment_id = 1;

    $params = array(
        'email'                     => $PAGSEGURO_EMAIL,  
        'token'                     => $PAGSEGURO_TOKEN,
        'receiverEmail'             => $PAGSEGURO_EMAIL,
        'currency'                  => 'BRL',
        'itemId1'                   => $my_payment_id,
        'itemDescription1'          => 'Test shop',
        'reference'                 => $my_payment_id,
        'itemAmount1'               => $amount,  
        'itemQuantity1'             => 1
    );

    //Asks for a code to start payment flow
    $header = array('Content-Type' => 'application/json; charset=UTF-8;');
    $response = curlExec($PAGSEGURO_API_URL."/checkout", $params, $header);
    $json = json_decode(json_encode(simplexml_load_string($response)));
    $code = $json->code;
?>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head> 

<h4>You'll receive payment information in your notification URL, after payment window, (See /pagseguro/notification.php)</h4>
Response: <?= $response; ?>

<script type="text/javascript" src="<?php echo $PAGSEGURO_JS_URL;?>"></script>
<script type='text/javascript'>

  $(document).ready(function($) {
    //If browser supports Lightbox, open it, otherwise redirect to pagseguro's page
    var isOpenLightbox = PagSeguroLightbox({
        code: '<?= $code?>'
    }, {
        success : function(transactionCode) {
            alert('SUCCESS: ' + transactionCode);
        },
        abort : function(error) {
            alert('ERROR =( ' + error);
        }
    });
    if (!isOpenLightbox){
        location.href="https://pagseguro.uol.com.br/v2/checkout/payment.html?code="+ '<?= $code ?>';
    }
  });
</script>
        

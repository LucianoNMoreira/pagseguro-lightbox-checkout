<?php 

    //Config SANDBOX or PRODUCTION environment
    $SANDBOX_ENVIRONMENT = true;
    
    $PAGSEGURO_API_URL = 'https://ws.pagseguro.uol.com.br/v2';
    $PAGSEGURO_JS_URL = 'https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js';

    $PAGSEGURO_EMAIL = 'YOUR EMAIL';
    $PAGSEGURO_TOKEN = 'YOUR TOKEN';

    if($SANDBOX_ENVIRONMENT){
         $PAGSEGURO_API_URL = 'https://ws.sandbox.pagseguro.uol.com.br/v2';
         $PAGSEGURO_JS_URL = 'https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js';
         $PAGSEGURO_EMAIL = 'YOUR SANDBOX EMAIL';
         $PAGSEGURO_TOKEN = 'YOUR SANDBOX TOKEN';
    }
?>

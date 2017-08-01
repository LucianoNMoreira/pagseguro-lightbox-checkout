<?php
    date_default_timezone_set('America/Sao_Paulo');
    function curlExec($url, $post = NULL, array $header = array()){
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        if(count($header) > 0) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        if($post !== null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post, '', '&'));
        }
    
        //Ignore SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    function sendGetRequest($url, $params = NULL){
        
        $ch = curl_init();

        if( $params !== NULL && count($params) > 0 ) {
            $query = http_build_query($params);
            curl_setopt($ch, CURLOPT_URL, "$url?$query");
        } else {
            curl_setopt($ch, CURLOPT_URL, $url);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
?>

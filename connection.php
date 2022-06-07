<?php
class Connection {

    static function connect(string $url, string $method){
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_HTTPHEADER, array(
            'Accept:application/json',
            'Content-Type:application/json',
            "Authorization: Bearer af842cebac7e3eb29852f5198eea4a644de6eca7ffb87a68c0b25430121ec123"));
        switch ($method) {
            case 'get':
                break;
            case 'post':
                curl_setopt($ch,CURLOPT_POST, 1);
                break;
            case 'put':
                curl_setopt($ch, CURLOPT_PUT, 1);
                break;
            case 'delete':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
        }
        curl_exec($ch);
        curl_close($ch);
    }
}
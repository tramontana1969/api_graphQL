<?php

class Connection
{
    public static array $array;

    static function connect(string $url, string $method): string
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept:application/json',
            'Content-Type:application/json',
            "Authorization: Bearer af842cebac7e3eb29852f5198eea4a644de6eca7ffb87a68c0b25430121ec123"));
        switch ($method) {
            case 'get':
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                break;
            case 'post':
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(self::$array, JSON_UNESCAPED_UNICODE));
                break;
            case 'put':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(self::$array, JSON_UNESCAPED_UNICODE));
                break;
            case 'delete':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
        }
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }
}
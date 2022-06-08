<?php

require_once __DIR__ . '/../Config.php';

class Connection
{
    public static array $user_data;

    static function connect(string $url, string $method): string
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Config::get_config());
        switch ($method) {
            case 'get':
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                break;
            case 'post':
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(self::$user_data, JSON_UNESCAPED_UNICODE));
                break;
            case 'put':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(self::$user_data, JSON_UNESCAPED_UNICODE));
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
<?php
/**
 * Created by PhpStorm.
 * User: InkoHX
 * Date: 2018/09/12
 * Time: 14:22
 */

namespace InkoHX\php\discordpmmp\Thread;


use pocketmine\Thread;
use pocketmine\utils\InternetException;

class SendMessage extends Thread
{
    private static $webhook, $message, $username, $avatarurl;

    /**
     * SendMessage constructor.
     * @param string $webhook
     * @param string $message
     * @param string $username
     * @param string $avatarurl
     */
    public function __construct(string $webhook, string $message, string $username = "InkoHX", string $avatarurl = "https://avatars1.githubusercontent.com/u/33122816?s=460&v=4")
    {
        static::$webhook = $webhook;
        static::$message = $message;
        static::$username = $username;
        static::$avatarurl = $avatarurl;
    }

    public function run()
    {
        static::post(static::$webhook, json_encode([
            "username" => static::$username,
            "avatar_url" => static::$avatarurl,
            "content" => static::$message
        ]));
    }

    /**
     * @param string $webhook
     * @param $data string
     * @param callable|null $onSuccess
     * @return array
     */
    public static function post(string $webhook, string $data, callable $onSuccess = null)
    {
        $ch = curl_init($webhook);
        curl_setopt_array($ch, [] + [
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => $data,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => 2,
                CURLOPT_FORBID_REUSE => 1,
                CURLOPT_FRESH_CONNECT => 1,
                CURLOPT_AUTOREFERER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CONNECTTIMEOUT_MS => (int)(10 * 1000),
                CURLOPT_TIMEOUT_MS => (int)(10 * 1000),
                CURLOPT_HTTPHEADER => array_merge(["User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:45.0) Gecko/20100101 Thunderbird/45.3.0 " . \pocketmine\NAME], array()),
                CURLOPT_HEADER => true
            ]);
        try {
            $raw = curl_exec($ch);
            $error = curl_error($ch);
            if ($error !== "") {
                throw new InternetException($error);
            }
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $rawHeaders = substr($raw, 0, $headerSize);
            $body = substr($raw, $headerSize);
            $headers = [];
            foreach (explode("\r\n\r\n", $rawHeaders) as $rawHeaderGroup) {
                $headerGroup = [];
                foreach (explode("\r\n", $rawHeaderGroup) as $line) {
                    $nameValue = explode(":", $line, 2);
                    if (isset($nameValue[1])) {
                        $headerGroup[trim(strtolower($nameValue[0]))] = trim($nameValue[1]);
                    }
                }
                $headers[] = $headerGroup;
            }
            if ($onSuccess !== null) {
                $onSuccess($ch);
            }
            return [$body, $headers, $httpCode];
        } finally {
            curl_close($ch);
        }
    }

}
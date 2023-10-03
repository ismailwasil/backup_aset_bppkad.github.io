<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Telegram
{
    public function sendMessage($message, $buttonText, $buttonURL, $botToken, $chatId)
    {
        $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
        $params = array(
            'chat_id' => $chatId,
            'text' => $message,
            'reply_markup' => json_encode(array(
                'inline_keyboard' => array(
                    array(
                        array(
                            'text' => $buttonText,
                            'url' => $buttonURL
                        )
                    )
                )
            ))
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}

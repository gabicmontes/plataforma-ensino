<?php

namespace App\Services;

use Exception;

class TranslateService {

    public static function translate($text, $from, $to)
    {
        try {
            $response = file_get_contents("https://translate.googleapis.com/translate_a/single?client=gtx&ie=UTF-8&oe=UTF-8&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&dt=at&sl=" . $from . "&tl=" . $to . "&hl=hl&q=" . urlencode($text), $_SERVER['DOCUMENT_ROOT'] . "/transes.html");
            $response = json_decode($response);
            return $response[0][0][0];
        } catch (Exception $e) {
            return $text;
        }
    }
}


<?php

namespace App\Helpers;

class Helper
{
    /**
     * Tạo một mã code ngẫu nhiên 0-9 a-z A-Z.
     *
     * @param int $length
     * @return string
     */
    public static function generateCode(int $length = 10): string
    {
        $permittedChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomChar = $permittedChars[mt_rand(0, strlen($permittedChars) - 1)];
            $randomString .= $randomChar;
        }
        return $randomString;
    }
}

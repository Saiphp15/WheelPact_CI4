<?php

namespace App\Services;

class OTPService
{
    public static function generateOTP($length = 6)
    {
        $digits = '0123456789';
        $otp = '';

        for ($i = 0; $i < $length; $i++) {
            $otp .= $digits[rand(0, strlen($digits) - 1)];
        }

        return $otp;
    }

    public static function verifyOTP($otp, $storedOTP)
    {
        return $otp === $storedOTP;
    }
}

<?php

namespace App\Helper;

final class StringHelper {
    
    public static function removeNonNumeric(string $value): string {
        return preg_replace('/\D/', '', $value);
    }
}
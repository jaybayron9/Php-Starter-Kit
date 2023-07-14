<?php 

namespace Validation;

class Valid { 
    public static function is_all_letters($value):bool {
        return preg_match('/^[a-zA-Z]+$/', $value) ? false : true; 
    }

    public static function is_all_capitalized($value): bool {
        return $value === strtoupper($value) && !preg_match('/[0-9\W]/', $value) ? false : true; 
    } 

    public static function is_all_lowercase($value): bool {
        return $value === strtolower($value) && !preg_match('/[0-9\W]/', $value) ? false : true;
    } 

    public static function is_all_numbers($value):bool {
        return is_numeric($value) ? false : true; 
    }

    public static function is_whole_number($value): bool {
        return ctype_digit($value) ? false : true; 
    }

    public static function is_decimal_number($value): bool {
        return is_numeric($value) && strpos($value, '.') !== false ? false : true; 
    }

    public static function has_small_letters($value): bool {
        return preg_match('/[a-z]/', $value) ? false : true; 
    }

    public static function has_big_letters($value): bool {
        return preg_match('/[A-Z]/', $value) ? false : true; 
    }

    public static function has_numbers($value): bool {
        return preg_match('/\d/', $value) ? false : true; 
    }

    public static function has_special_characters($value): bool {
        return preg_match('/[^a-zA-Z0-9\s]/', $value) ? false : true; 
    }

    public static function has_min_lenght($value, $lenght = 7): bool {
        return strlen($value) > $lenght ? false : true; 
    }

    public static function is_valid_email($value): bool {
        return filter_var($value, FILTER_VALIDATE_EMAIL) ? false : true; 
    }
}
<?php

namespace App\FacebookTrait;

trait Helper
{
    public static function formatFields(array $fields, $is_subfields = false)
    {
        array_walk($fields, function (&$value, $key, $is_subfields) {
            if (is_array($value)) {
                $value = $key . self::formatFields($value, true);
            }
        }, $is_subfields);
        if ($is_subfields) {
            return '{' . implode(',', $fields) . '}';
        }
        return implode(',', $fields);
    }
}

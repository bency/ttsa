<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    protected $table = 'redirect';
    protected $fillable = [
        'id',
        'url',
        'path',
    ];
    public static function getByPath($path)
    {
        return self::where('path', '=', $path)->first();
    }
}

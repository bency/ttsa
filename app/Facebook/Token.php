<?php

namespace App\Facebook;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Token extends Model
{
    use SoftDeletes;
    protected $table = 'facebook_tokens';
    public $incrementing = false;
    protected $dateFormat = 'U';
    protected $fillable = [
        'token',
        'created_at',
        'updated_at',
        'expired_at',
        'deleted_at',
    ];

    public static function getValidToken()
    {
        return self::first();
    }
}

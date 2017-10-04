<?php

namespace App;

use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SyncableGraphNodeTrait;
    use Notifiable;
    protected $dateFormat = 'U';
    protected static $graph_node_field_aliases = [
        'id' => 'facebook_user_id',
    ];
    protected static $graph_node_date_time_to_string_format = 'U';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'facebook_user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
        'access_token',
    ];
}

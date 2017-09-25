<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;

class Comment extends Model
{
    use SyncableGraphNodeTrait;
    public $incrementing = false;

    protected static $graph_node_date_time_to_string_format = 'Y-m-d H:i:s';
    protected static $graph_node_fillable_fields = [
        'id',
        'from_id',
        'created_time',
        'message',
        'parent',
        'like_count',
        'permalink_url',
    ];
    protected static $graph_node_field_aliases = [
        'from.id' => 'from_id',
        'parent.id' => 'parent',
    ];
    protected $fillable = [
        'id',
        'message',
        'from_id',
        'parent',
        'like_count',
        'permalink_url',
        'created_time',
    ];
    protected $table = 'facebook_comments';
    //
}

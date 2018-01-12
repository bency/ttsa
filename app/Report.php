<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $dateFormat = 'U';
    protected $fillable = [
        'content',
        'title',
        'pic_url',
        'reported_at',
        'company_id',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function timelines()
    {
        return $this->belongsToMany('App\TimeLine');
    }
}

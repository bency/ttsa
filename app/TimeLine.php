<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeLine extends Model
{
    protected $dateFormat = 'U';
    protected $fillable = ['name'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function reports()
    {
        return $this->belongsToMany('App\Report');
    }
}

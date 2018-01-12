<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportTimeLine extends Model
{
    protected $dateFormat = 'U';
    protected $table = 'report_time_line';
    protected $fillable = [
        'report_id',
        'time_line_id',
    ];
}

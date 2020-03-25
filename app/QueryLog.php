<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QueryLog
 * @package App
 */
class QueryLog extends Model
{
    protected $fillable = [
        'sql',
        'bindings',
        'time',
        'user',
    ];
}

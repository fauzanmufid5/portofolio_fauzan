<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';

    protected $fillable = [
        'school', 'degree', 'year_start', 'year_end', 'description', 'sort_order',
    ];
}

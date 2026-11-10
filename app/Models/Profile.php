<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'title', 'bio', 'photo', 'email', 'phone', 'location',
        'github', 'linkedin', 'instagram', 'whatsapp', 'cv_path',
    ];
}

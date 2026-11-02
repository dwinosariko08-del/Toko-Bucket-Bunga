<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'section_title',
        'headline',
        'item1_title','item1_desc',
        'item2_title','item2_desc',
        'item3_title','item3_desc',
    ];
}

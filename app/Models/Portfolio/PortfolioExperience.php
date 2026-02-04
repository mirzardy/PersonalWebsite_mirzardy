<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Model;

class PortfolioExperience extends Model
{
    protected $fillable = [
        'company',
        'position',
        'type',
        'description',
        'start_year',
        'end_year',
        'is_current',
        'order',
    ];
}

<?php

namespace App\Models\Portfolio;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class PortfolioEducation extends Model
{
    protected $table = 'portfolio_educations';

    protected $fillable = [
        'school',
        'degree',
        'field',
        'start_year',
        'end_year',
        'is_current',
        'order',
    ];

    protected $casts = [
        'is_current' => 'boolean',
    ];
}

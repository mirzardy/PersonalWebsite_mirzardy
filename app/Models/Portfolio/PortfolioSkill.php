<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Model;

class PortfolioSkill extends Model
{
    protected $fillable = [
        'name',
        'level',
        'order',
    ];
}

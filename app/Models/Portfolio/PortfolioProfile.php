<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Model;

class PortfolioProfile extends Model
{
    protected $fillable = [
        'name',
        'headline',
        'about',
        'photo',
        'cv',
        'address',
    ];
}

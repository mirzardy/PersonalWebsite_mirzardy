<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Model;

class PortfolioLanguage extends Model
{
    protected $fillable = [
        'name',
        'level',
        'order',
    ];
}

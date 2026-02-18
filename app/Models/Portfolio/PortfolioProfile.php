<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Model;
use App\Models\Portfolio\PortfolioAddress;

class PortfolioProfile extends Model
{
    protected $fillable = [
        'name',
        'headline',
        'about',
        'photo',
        'cv',
    ];

    public function address()
    {
        return $this->hasOne(PortfolioAddress::class, 'profile_id');
    }
}

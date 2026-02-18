<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Model;

class PortfolioAddress extends Model
{
    protected $fillable = [
        'profile_id',
        'detail_alamat',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kabupaten_kota',
        'provinsi',
        'kode_pos',
    ];

    public function profile()
    {
        return $this->belongsTo(PortfolioProfile::class, 'profile_id');
    }
}

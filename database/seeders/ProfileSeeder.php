<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portfolio\PortfolioProfile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PortfolioProfile::firstOrCreate(
            ['id' => 1],
            [
                'name' => 'Muhammad Mirza Lazuardy',
                'headline' => 'Web Developer & IT Enthusiast',
                'about' => 'Saya adalah mahasiswa S1 Sistem Informasi di Universitas Amikom Yogyakarta',
                'address' => 'Sleman, Yogyakarta',
            ]
        );
    }
}

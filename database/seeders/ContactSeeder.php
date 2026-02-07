<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact\Contact;
use App\Models\Contact\Link;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::firstOrCreate(
            ['id' => 1],
            [
                'email' => 'mirza.ok0010@gmail.com',
                'phone' => '0816 30 6699',
                'whatsapp' => '6281306699',
                'telegram' => '6281306699',
            ]
        );

        Link::insert([
            [
                'name' => 'GitHub',
                'url' => 'https://github.com/mirzardy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Instagram',
                'url' => 'https://instagram.com/mirzlazuardy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'LinkedIn',
                'url' => 'https://linkedin.com/in/mirzalazuardy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::truncate();

        $dataSource = Storage::get('Seeding_data/Users.json');

        $data = json_decode($dataSource, true);

        foreach ($data as $item) {
            User::updateOrInsert(
                ['name' => $item['first_name'],
                'email' => $item['email'],
               'password' => Hash::make($item['password']),
                'phone' => $item['phone'],
                'adress' => $item['adress'],
                'cart_id' => $item['cart_id'],
                'role' => $item['role']
            ],

            );
        }
    }
}



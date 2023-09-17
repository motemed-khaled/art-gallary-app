<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS = 0");
        if (app()->isLocal()) {
            $this->call([

                CartSeeder::class,
                UserSeeder::class,
                CategorySeeder::class,
                ProductSeeder::class,

            ]);
        }

        DB::statement("SET FOREIGN_KEY_CHECKS = 1");
    }

}

<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CartSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Cart::truncate();

        $dataSource = Storage::get('Seeding_data/Cart.json');

        $data = json_decode($dataSource, true);

        foreach ($data as $item) {
            Cart::updateOrInsert(
                ['id' => $item['id']],
            );
        }
    }
}

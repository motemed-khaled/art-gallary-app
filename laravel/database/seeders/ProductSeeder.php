<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Product::truncate();

        $dataSource = Storage::get('Seeding_data/Products.json');

        $data = json_decode($dataSource, true);

        foreach ($data as $item) {
            Product::updateOrInsert(
                ['name' => $item['name'],
                'descreption' => $item['descreption'],
                'price' => $item['price'],
                'stock' => $item['stock'],
                'image' => $item['image'],
                'status' => $item['status'],
                'category_id' => $item['category_id']
               ],

            );
        }
    }
}



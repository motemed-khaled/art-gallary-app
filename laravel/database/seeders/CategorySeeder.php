<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Category::truncate();

        $dataSource = Storage::get('Seeding_data/Categories.json');

        $data = json_decode($dataSource, true);

        foreach ($data as $item) {
            Category::updateOrInsert(
                ['name' => $item['name']],
            );
        }
    }
}

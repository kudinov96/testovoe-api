<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Category::factory()->create([
                "parent_id" => $i > 0 && $i <= 7 ? Category::all()->random()->id : null,
                "index"     => $i,
            ]);
        }
    }
}

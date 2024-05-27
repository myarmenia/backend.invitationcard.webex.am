<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'wedding',
            ],
            [
                'id' => 2,
                'name' => 'birthday',
            ],
            [
                'id' => 3,
                'name' => 'event',
            ]
        ];

        foreach ($categories as $key => $category) {
            Category::updateOrCreate([
                'id' => $category['id'],
                'name' => $category['name']
            ]);

        }
    }
}

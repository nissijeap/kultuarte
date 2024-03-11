<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;

class PostCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::create([
            'name' => 'Blog' 
        ]);

        $categories = Category::create([
            'name' => 'Post' 
        ]);
    }
}
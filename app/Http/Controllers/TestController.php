<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;

class TestController
{
    public static function execute()
    {
        self::seedTasksTable();
        // self::seedCategoriesTable();
        // 

    }

    private static function seedTasksTable()
    {
        for ($i = 0; $i < 45; $i ++) {
            Task::query()
                ->create([
                    'name' => fake()->sentence(),
                    'description' => fake()->sentence(),
                    'status' => fake()->randomElement(['new', 'in_progress', 'completed']),
                    'date' => fake()->dateTime('now', 'Europe/Moscow'),
                    'category_id' => rand(1, 15),
                ]);
        }
    }

    private static function seedCategoriesTable()
    {
        for ($i = 0; $i < 35; $i++) {
            Category::query()
                ->create([
                    'name' => fake()->randomAscii(),
                ]);
        }
    }
}

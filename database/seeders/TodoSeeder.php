<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $todos =
        [
            [
                'title' => 'Todo 1',
                'user_id' => 1,
                'completed' => false,
            ],
            [
                'title' => 'Todo 2',
                'user_id' => 1,
                'completed' => false,
            ],
            [
                'title' => 'Todo 3',
                'user_id' => 2,
                'completed' => false,
            ]
        ];

        foreach ($todos as $key => $value) {
            Todo::create($value);
        }
    }
}

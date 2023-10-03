<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            ['task' => 'beli buku', 'category_id' => 1,'user_id'=>1],
            ['task' => 'PR kalkulus', 'category_id' => 2,'user_id'=>1],
            ['task' => 'perbaiki bugs', 'category_id' => 3,'user_id'=>1],
            ['task' => 'beli shampoo', 'category_id' => 1,'user_id'=>1],
        ]);
    }
}

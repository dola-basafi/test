<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_category_tasks')->insert([
            ['name' => 'belanja'],
            ['name' => 'tugas kuliah'],
            ['name' => 'tugas kantor']
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Men',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Women',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Children',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

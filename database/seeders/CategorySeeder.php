<?php

namespace Database\Seeders;

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
        DB::table('categories')->insert(
            [
                [
                    'name'       => "holidays",
                    "slug"       => "holidays",
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'name'       => "camping",
                    "slug"       => "camping",
                    "created_at" => now(),
                    "updated_at" => now()
                ]
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("movies")->insert([
            [
                'user_id' => '1',
                'title' => 'test1',
                'path' => '/ruta/ruta',
            ],
            [
                'user_id' => '1',
                'title' => 'test2',
                'path' => '/ruta/ruta2',
            ]
        ]);
    }
}

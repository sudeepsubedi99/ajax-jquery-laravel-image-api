<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // / And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            DB::table('articles')->insert([
                'title' => Str::random(10),
                'body' => Str::random(10),
            ]);
        }
    }
}

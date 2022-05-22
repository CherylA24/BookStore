<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'name'=>'Fiction'
        ]);
        
        DB::table('genres')->insert([
            'name'=>'Science'
        ]);
        
        DB::table('genres')->insert([
            'name'=>'Computer'
        ]);

        DB::table('genres')->insert([
            'name'=>'Fantasy'
        ]);
        
        DB::table('genres')->insert([
            'name'=>'Romance'
        ]);
        
        DB::table('genres')->insert([
            'name'=>'History'
        ]);

        DB::table('genres')->insert([
            'name'=>'Non-Fiction'
        ]);
        
        DB::table('genres')->insert([
            'name'=>'Adventure'
        ]);
    }
}

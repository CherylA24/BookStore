<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin123@gmail.com',
            'role' => 'Admin',
            'password'=>Hash::make('admin123')
        ]);

        DB::table('users')->insert([
            'name'=>'member',
            'email'=>'member123@gmail.com',
            'role' => 'Member',
            'password'=>Hash::make('member123')
        ]);
    }
}

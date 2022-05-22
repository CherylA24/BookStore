<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'name'=>'Divergent',
            'author'=>'Veronica Roth',
            'price'=>300000,
            'synopsis'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'cover'=>'images/divergent.jpg'
        ]);

        DB::table('books')->insert([
            'name'=>'Pachinko',
            'author'=>'Min Jin Lee',
            'price'=>320000,
            'synopsis'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'cover'=>'images/pachinko.jpg'
        ]);

        DB::table('books')->insert([
            'name'=>'Men Explain Things to Me',
            'author'=>'Rebecca Solnit',
            'price'=>150000,
            'synopsis'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'cover'=>'images/MenExplainThings.jpg'
        ]);

        DB::table('books')->insert([
            'name'=>'The Rest is Noise',
            'author'=>'Alex Ross',
            'price'=>300000,
            'synopsis'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'cover'=>'images/therestisnoise.jpg'
        ]);

        DB::table('books')->insert([
            'name'=>'Meaty',
            'author'=>'Samantha Irby',
            'price'=>345000,
            'synopsis'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'cover'=>'images/meaty.jpg'
        ]);

        DB::table('books')->insert([
            'name'=>'Moneyball',
            'author'=>'Michael Lewis',
            'price'=>200000,
            'synopsis'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'cover'=>'images/moneyball.jpg'
        ]);

        DB::table('books')->insert([
            'name'=>'Dangerous Kiss',
            'author'=>'Jackie Collins',
            'price'=>300000,
            'synopsis'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'cover'=>'images/dangerouskiss.jpg'
        ]);

        DB::table('books')->insert([
            'name'=>'In Search of Lost Time',
            'author'=>'Marcel Proust',
            'price'=>240000,
            'synopsis'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'cover'=>'images/insearchoflosttime.jpg'
        ]);

        DB::table('books')->insert([
            'name'=>'Ulysses',
            'author'=>'James Joyce',
            'price'=>300000,
            'synopsis'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'cover'=>'images/ulysses.jpg'
        ]);

        DB::table('books')->insert([
            'name'=>'Don Quixote',
            'author'=>'Miguel de Cervantes',
            'price'=>300000,
            'synopsis'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'cover'=>'images/donquixote.jpg'
        ]);
    }
}

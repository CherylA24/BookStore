<?php

namespace Database\Seeders;

use App\Models\BookGenre;
use Illuminate\Database\Seeder;

class BookGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre = [1,2,3,4,5,6,7,8];
        for($i = 0; $i <= 10; $i++){
            $a = array_rand($genre, random_int(3,7));
            foreach ($a as $genreId){
                BookGenre::create([
                    'book_id' => $i,
                    'genre_id' => $genreId + 1
                ]);
            }
        }
        
    }
}

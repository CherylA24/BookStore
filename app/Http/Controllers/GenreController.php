<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function viewAllGenres(){
        $genres = Genre::all();
        return view('manage.genre', ['genres' => $genres]);
    }

    public function insertGenre(Request $request){
        $rules = [
            'name'=>'required'
        ];

        $genre = new Genre();
        $genre->name = $request->name;

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $genre->save();

        return redirect()->back();
    }

    public function deleteGenre(Request $request){
        $genre = Genre::find($request->id);

        if(isset($genre)){
            // Delete data di database
            $genre->delete();
        }

        return redirect()->back();
    }

    public function updateGenre(Request $request){
        $genre = Genre::find($request->id);

        $rules = [
            'name'=>'required'
        ];

        $genre->name = $request->name;

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $genre->save();

        return redirect()->back();
    }

    public function viewDetailGenre(Request $request, Genre $genre){
        $genre = Genre::find($request->id);

        return view('manage.detailgenre',[
                    'genre' => $genre,
                    'books' => $genre->books
        ]);
    }
}

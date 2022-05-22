<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookGenre;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function insertBook(Request $request){
        $rules = [
            'name'=>'required',
            'author'=>'required',
            'synopsis'=>'required',
            'price'=>'required|integer',
            'genres'=>'required',
            'cover'=>'mimes:jpeg,jpg,png,gif|required|max:10000|image'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $file = $request->file('cover');
        
        $imageName = time().".".$file->getClientOriginalExtension();
        Storage::putFileAs('public/images',$file,$imageName);

        $insert = Book::create([
            'name' => $request->name,
            'author' => $request->author,
            'synopsis' => $request->synopsis,
            'price' => $request->price,
            'cover' => 'images/'.$imageName
        ]);

        $genres = explode('_',$request['genres']);
        foreach ($genres as $genre){
            BookGenre::create([
                'book_id' => $insert->id,
                'genre_id' => $genre
            ]);
        }

        return redirect()->back();

    }

    public function viewAllBooks(){
        $books = Book::all();
        $genres = Genre::all();
        return view('manage.books', ['books'=>$books, 'genres'=>$genres]);
    }

    public function deleteBook($id){
        $book = Book::find($id);

        if(isset($book)){
            //Delete image yang ada di storage
            Storage::delete('public/' . $book->cover);
            // Delete data di database
            $book->delete();
        }

        return redirect()->back();
    }

    public function viewDetail($id){
        $book = Book::find($id);
        $genres = Genre::all();

        return view('manage.detailbook', ['book' => $book, 'genres' => $genres]);
    }

    public function updateBook(Request $request){
        $book = Book::find($request->id);

        $rules = [
            'name'=>'required',
            'author'=>'required',
            'synopsis'=>'required',
            'price'=>'required|integer',
            'genres'=>'required',
            'cover'=>'mimes:jpeg,jpg,png,gif|max:10000|image'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $book->name = $request->name;
        $book->author = $request->author;
        $book->synopsis = $request->synopsis;
        $book->price = $request->price;
        $file = $request->file('cover');

        if($file != null){
            $imageName = time().".".$file->getClientOriginalExtension();
            Storage::putFileAs('public/images',$file,$imageName);

            Storage::delete('public/'.$book->cover);
            $book->cover = 'images/'.$imageName;
        }
        else{
            $request->cover = $book->cover;
        }

        $genres = explode('_',$request['genres']);
        BookGenre::where('book_id', $book->id)->delete();
        foreach ($genres as $genre){
            BookGenre::create([
                'book_id' => $book->id,
                'genre_id' => $genre
            ]);
        }

        $book->save();

        return redirect('/manage/book');
    }



}

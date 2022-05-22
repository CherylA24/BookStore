<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        
        $books = Book::where('name', 'like', '%' . request('search') . '%')
                            ->paginate(5)
                            ->appends(['search'=>$search]);

        return view('home',['books' => $books]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    
    public function show(Book $book, Request $request){
        $carts = $request->session()->get('carts');
        if ($carts){
            foreach ($carts as $cart) {
                if ($cart->id === $book->id){
                    $book->quantity = $cart->quantity;
                }else{
                    $book->quantity = 0;
                }
            }
        }

        return view('manage.detailbook', ['book' => $book]);
    }

    public function addCart(Request $request, Book $book){
        $quantity = $request->get('quantity');

        $book->quantity = $quantity;
        $book->subTotal = $book->price * $quantity;

        $carts = $request->session()->get('carts');

        if (!$carts) {
            $carts=[];
        }
       
        array_push($carts, $book);

        $request->session()->put('carts', $carts);

        return redirect('/view/cart');
    }

    public function editCart(Book $book, Request $request){
        $quantity = $request->get('quantity');

        $book->quantity = $quantity;
        $carts = $request->session()->get('carts');
        if ($carts) {
            foreach ($carts as &$cart) {
                if ($cart->id === $book->id) {
                    $cart = $book;
                }
            }
        } 

        $request->session()->put('carts', $carts);

        return redirect('/view/cart');
    }

    public function removeCart(Request $request, Book $book){
        $carts = $request->session()->get('carts');
        $i = 0;
        foreach ($carts as $cart) {
            if ($cart->id === $book->id) {
                unset($carts[$i]);
                $carts = array_values($carts);
            }
            $i++;
        }

        $request->session()->put('carts', $carts);
        return redirect('/view/cart');
    }
    
    public function viewCart(Request $request){
        return view('transaction.cart',[
            'carts' => $request->session()->get('carts')]);
    }

    public function viewEditCart($id){
        $book = Book::find($id);
        $genres = Genre::all();
        return view('transaction.editcart', ['book' => $book, 'genres' => $genres]);
    }

    
    public function viewHistoryDetail(Transaction $transaction){
        $details = $transaction->details;
        return view('transaction.historydetail',['details'=>$details]);
    }
    
    public function viewTransaction(){
        return view('transaction.history',[
                    'transactions' => Transaction::where('user_id',Auth::user()->id)->get()
        ]);
    }

    public function checkout(Request $request){
        $transactionData = [
            'user_id' => Auth::user()->id,
            'transaction_date' => Carbon::now()->toDateTimeString()
        ];
        
        $transaction = Transaction::create($transactionData);

        $carts = $request->session()->get('carts');

        foreach ($carts as $book) {
            $detailData = [
                'transaction_id' => $transaction->id,
                'book_id' => $book->id,
                'price' => $book->price,
                'quantity' => $book->quantity
            ];
            TransactionDetail::create($detailData);
        }

        $request->session()->forget('carts');

        return redirect('/view/transaction');
    }

}

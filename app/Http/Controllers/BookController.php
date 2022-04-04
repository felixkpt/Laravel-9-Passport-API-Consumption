<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index() {
        $Auth = new Auth();
        $books = auth()->user()->books;
        return view('books/index', ['books' => $books, 'Auth' => $Auth]);
    }
}

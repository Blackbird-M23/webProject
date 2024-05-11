<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all(); // Fetch all news from the database
        dd($news); // Dump and die
        return view('include.news', [$news]);
    }
}


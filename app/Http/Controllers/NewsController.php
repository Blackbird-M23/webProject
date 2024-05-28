<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all(); // Fetch all news from the database
        //dd($news); // Dump and die
        return view('include.news', [$news]);
    }
    //show all news in admin panel
    public function admin_index()
    {
        $news = News::latest()->paginate(5); // Fetch all news from the database
        return view('admin.news.newsAllShow', compact('news'));
    }

    //single news show
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.showNews', compact('news'));
    }

    public function create()
    {
        return view('admin.news.addNews');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'content' => 'required',
        ]);

        $news = new News();
        $news->id = $request->id;
        $news->content = $request->content;
        $news->save();

        return redirect()->route('news.all')->with('success', 'News created successfully.');
    }
    

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.editNews', compact('news'));
    }

    public function update(Request $request, $id)
    {

        $news = News::findOrFail($id);

        $request->validate([
            'id' => 'required',
            'content' => 'required',
        ]);

        $news->id = $request->id;
        $news->content = $request->content;
        $news->save();

        return redirect()->route('news.show', ['id' => $id])->with('success', 'News updated successfully.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('news.all')->with('success', 'News deleted successfully.');
    }
}


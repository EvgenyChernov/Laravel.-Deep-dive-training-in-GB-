<?php

namespace App\Http\Controllers;

class NewsController extends Controller
{
    public function index()
    {
        return view('news', ['newsList' => $this->newsList]);
    }

    public function show(int $id)
    {
        return "<h2>отобразить запись с ID={$id}</h2>";
    }
}

<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category', ['categoryList' => $this->categoryList]);
    }

    public function show(int $id)
    {
        // данный метод возвращает новости в соответствии с id категории
        // думаю функционал должен находиться в соответствующей модели которая из базы данных вытягивает необходимые
        // новости по id категории
        return "<h2>отобразить все новости с категорией ID={$id}</h2>";
    }
}

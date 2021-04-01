<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', ['categoryList' => $this->categoryList]);
    }

    public function show(int $id)
    {
        // данный метод возвращает новости в соответствии с id категории
        // думаю функционал должен находиться в соответствующей модели которая из базы данных вытягивает необходимые
        // новости по id категории
        return view('category.show', ['newsList' => $this->newsList, 'categoryId' => $id]);
    }
}

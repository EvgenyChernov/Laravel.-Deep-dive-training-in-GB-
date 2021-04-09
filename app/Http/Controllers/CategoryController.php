<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = (new Category())->getCategories();
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Функция возвращает шаблон с новостями выбранной категории новостей
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $newsList = (new News())->getNewsByCategoryId($id);
        $category = (new Category())->getCategoryById($id);
        return view('category.show', ['newsList' => $newsList, 'category' => $category]);
    }
}

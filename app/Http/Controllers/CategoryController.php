<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_visible', true)->get();
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Функция возвращает шаблон с новостями выбранной категории новостей
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        //TODO разобраться как получать только необходимые поля из двух таблиц select
        // а так же применять различные условия к таблицам
        $category = Category::where('id', '=', $id)
            ->with('news')
            ->get();
        return view('category.show', ['category' => $category]);
    }
}

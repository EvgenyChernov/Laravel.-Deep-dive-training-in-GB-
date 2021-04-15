<?php

namespace App\Http\Controllers;

use App\Enums\NewsStatusEnum;
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
        $category = Category::with(['news' => function ($query) {
            $query
                ->select('id', 'title', 'text', 'created_at', 'category_id')
                ->where('news.status', NewsStatusEnum::PUBLISHED);
        }])->select('id', 'title')
            ->where('id', '=', $id)
            ->get();
        return view('category.show', ['category' => $category->first()]);
    }
}

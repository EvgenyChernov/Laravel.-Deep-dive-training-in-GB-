<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var array|string[]
     * Имитируем получение данных из базы данных
     */
    protected array $categoryList = [
        'Category 1',
        'Category 2',
        'Category 3',
        'Category 4'
    ];
    /**
     * @var array|string[]
     */
    protected array $newsList = [
        'News 1',
        '<strong>News 2</strong>',
        'News 3',
        'News 4',
        'News 5',
        'News 6',
        'News 7'
    ];
}

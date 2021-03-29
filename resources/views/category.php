<?php
/** @var array $categoryList */
foreach ($categoryList as $key => $category) {
    $key++;
    echo $category . "<a href='" . route('category.show', ['id' => $key]) . "'>Отобразить все новости данной категории</a><br>";
}
echo "<a href='" . route('home') . "'>На главную</a><br>";

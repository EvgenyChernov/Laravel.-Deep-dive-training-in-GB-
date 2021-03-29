<?php
/** @var array $newsList */
foreach ($newsList as $key => $news) {
    $key++;
    echo $news . "<a href='" . route('news.show', ['id' => $key]) . "'>Отобразить</a><br>";
}
echo  "<a href='" . route('home') . "'>На главную</a><br>";

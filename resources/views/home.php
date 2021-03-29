<?php

echo "<h2>Главная страница Новостей</h2>";
echo "<a href='" . route('category') . "'>Категории новостей</a><br>";
echo "<a href='" . route('admin.news.create') . "'>Отобразить</a><br>";
echo "<a href='" . route('news') . "'>Все новости</a><br>";
echo "<a href='#'>Авторизация(не реализована)</a><br><br>";
echo "<p>Функционал администратора</p>";
echo "<a href='" . route('admin.news.create') . "'>Добавить новость</a><br><br><br>";
echo "<a href='" . route('home') . "'>На главную</a><br>";

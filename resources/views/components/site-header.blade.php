<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('news') }}">Мой блог</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Меню
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category') }}">Список категорий</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.news.index') }}">Админка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('feedback.create') }}">Форма обратной связи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.create') }}">Форма заказа выгрузки</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<header class="masthead" style="background-image: url('{{asset('assets/img/home-bg.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <span class="subheading">Добро пожаловать в наш блог</span>
                </div>
            </div>
        </div>
    </div>
</header>

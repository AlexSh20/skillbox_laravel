<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="text-muted" href="#">Подписаться</a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="#">Skillbox Laravel</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="mx-3">
                        <circle cx="10.5" cy="10.5" r="7.5"></circle>
                        <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                    </svg>
                </a>
                @guest
                    @if (Route::has('login'))
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">{{ __('Войти') }}</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="btn btn-sm btn-outline-secondary"
                           href="{{ route('register') }}">{{ __('Зарегистироваться') }}</a>
                    @endif
                @else

                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>

                @endguest


            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="/">Главная</a>
            <a class="p-2 text-muted" href="/about">О нас</a>
            <a class="p-2 text-muted" href="/contacts">Контакты</a>
            <a class="p-2 text-muted" href="/news">Новости</a>
            <a class="p-2 text-muted" href="/articles/create">Создать статью</a>
            @admin
            <a class="p-2 text-muted" href="/admin/feedback">Комментарии</a>
            <a class="p-2 text-muted" href="/admin/articles">Управление статьями</a>
            <a class="p-2 text-muted" href="/admin/news">Управление новостями</a>
                @endadmin

        </nav>
    </div>

</div>

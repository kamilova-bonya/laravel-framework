<ul class="navbar-nav me-auto">
    <li class="nav-item">
        <a class="nav-link @if(Route::is('home')) active @endif" href="{{ route('home') }}">Главная</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Route::is('posts.index')) active @endif" href="{{ route('posts.index') }}">Посты</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Route::is('posts.categories.index')) active @endif" href="{{ route('posts.categories.index') }}">Категории</a>
    </li>
    @guest
    @else
        @if (auth()->user()->is_admin)
            <li class="nav-item">
                <a class="nav-link @if(Route::is('admin.index')) active @endif" href="{{ route('admin.index') }}">Админка</a>
            </li>
        @endif
    @endif
</ul>






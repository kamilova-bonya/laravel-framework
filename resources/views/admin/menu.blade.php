<ul class="navbar-nav me-auto">
    <li class="nav-item">
        <a class="nav-link @if(Route::is('home')) active @endif" href="{{ route('home') }}">Главная</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.posts.index')) active @endif" href="{{ route('admin.posts.index') }}">Посты</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.categories.index')) active @endif" href="{{ route('admin.categories.index') }}">Категории</a>
    </li>
</ul>

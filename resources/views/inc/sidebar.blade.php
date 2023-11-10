<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            ICT<span> Davaktiv</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Асосий</li>
            <li class="nav-item">
            <a href="/dashboard" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Бош сахифа</span>
                </a>
            </li>

            <li class="nav-item nav-category">Модуллар</li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#integration" role="button" aria-expanded="false" aria-controls="integration">
                    <i class="link-icon" data-feather="share-2"></i>
                    <span class="link-title">Интеграция</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down link-arrow"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <div class="collapse" id="integration">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="/integration/create" class="nav-link">Кўшиш</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('get-integration') }}" class="nav-link">Қабул қилувчи (GET)</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('post-integration') }}" class="nav-link">Юкловчи (POST)</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('log-integration') }}" class="nav-link">Журнал</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

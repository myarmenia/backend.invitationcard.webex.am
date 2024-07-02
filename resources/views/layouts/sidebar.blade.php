<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('home') ? '' : ' collapsed' }}" href="{{route('home')}}">
                <i class="bi bi-grid"></i>
                <span>Дашборд</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('tariff.*') ? '' : ' collapsed' }}"
                href="{{ route('tariff.index')}}">
                <i class="ri-file-list-2-line"></i>
                <span>Тарифы</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('category.*') ? '' : ' collapsed' }}"
                href="{{ route('category.index')}}">
                <i class="ri-file-list-2-line"></i>
                <span>Категории</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('press-release-videos.*') ? '' : ' collapsed' }}"
                href="{{ route('template.index')}}">
                <i class="bx bx-news"></i>
                <span>Шаблоны</span>
            </a>
        </li>



    </ul>

</aside><!-- End Sidebar-->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('home') ? '' : ' collapsed' }}" href="{{route('home')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('category.*') ? '' : ' collapsed' }}"
                href="{{ route('category.index')}}">
                <i class="ri-file-list-2-line"></i>
                <span>Categories</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('press-release-videos.*') ? '' : ' collapsed' }}"
                href="{{ route('template.index')}}">
                <i class="ri-play-circle-line"></i>
                <span>Templates</span>
            </a>
        </li>



    </ul>

</aside><!-- End Sidebar-->

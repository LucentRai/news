<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('author_home') }}">Author Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('author_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('author/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('author_home') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is('author/post/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('author_post_show') }}"><i class="fas fa-hand-point-right"></i> <span>Posts</span></a></li>

        </ul>
    </aside>
</div>
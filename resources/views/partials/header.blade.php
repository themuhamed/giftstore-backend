<header class="bg-white border-bottom d-flex justify-content-between align-items-center px-3 py-3 shadow-sm">
    <div class="d-flex align-items-center gap-2">
        <button class="btn btn-outline-dark d-md-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#mobileSidebar">
            <i class="fas fa-bars"></i>
        </button>
        <h5 class="m-0">@yield('title', 'Dashboard')</h5>
    </div>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
            <img src="{{ asset('img/avatars/avatar.jpeg') }}" alt="Admin" class="avatar rounded-circle me-2" width="40"
                 height="40">
            <span class="d-none d-sm-inline">Muhamed</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Settings</a></li>
        </ul>
    </div>
</header>

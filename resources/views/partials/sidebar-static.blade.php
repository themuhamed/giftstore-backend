<aside class="sidebar d-none d-md-block position-fixed top-0 start-0 vh-100" style="width: 220px;">
    <div class="text-center py-4 border-bottom border-secondary">
        <h5 class="m-0"><i class="fa-solid fa-gamepad"></i> Dashboard</h5>
    </div>
    <a href="#" class="nav-link text-white d-flex justify-content-between align-items-center px-3 py-2"
       data-bs-toggle="collapse" data-bs-target="#productsMenu" aria-expanded="false" id="productsToggle">
        <span><i class="fas fa-boxes me-2"></i> Products</span>
        <span class="arrow" id="productsArrow"><i class="fas fa-chevron-right"></i></span>
    </a>
    <div class="collapse" id="productsMenu">
        <a href="{{ route('products.index') }}"
           class="submenu nav-link text-white ps-4 py-2 {{ request()->is('products') ? 'bg-secondary' : '' }}">All
            Products</a>
        <a href="{{ route('products.create') }}"
           class="submenu nav-link text-white ps-4 py-2 {{ request()->is('products/create') ? 'bg-secondary' : '' }}">Add
            Product</a>
    </div>
</aside>

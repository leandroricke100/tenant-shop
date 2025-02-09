<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            @php
                $user = session('user')->admin;
                //dd($user);
            @endphp

            <a class="nav-link" href="{{ url(isset($user) && $user ? 'admin/dashboard' : 'merchant/store-list') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <a class="nav-link" href="{{ url(isset($user) && $user ? 'admin/store-list' : 'merchant/store-list') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Stores
            </a>

            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStores" aria-expanded="false" aria-controls="collapseStores">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Stores
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseStores" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ url(isset($user) && $user ? 'admin/create-store' : 'merchant/create-store') }}">Add Store</a>
                    <a class="nav-link" href="{{ url(isset($user) && $user ? 'admin/store-list' : 'merchant/store-list') }}">Show Store List</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Category
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseCategory" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ url(isset($user) && $user ? 'admin/create-category' : 'merchant/create-category') }}">Add Category</a>
                    <a class="nav-link" href="{{ url(isset($user) && $user ? 'admin/category-list' : 'merchant/category-list') }}">Show Category List</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProduct" aria-expanded="false" aria-controls="collapseProduct">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Product
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseProduct" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ url(isset($user) && $user ? 'admin/create-product' : 'merchant/create-product') }}">Add Product</a>
                    <a class="nav-link" href="{{ url(isset($user) && $user ? 'admin/product-list' : 'merchant/product-list') }}">Show Product List</a>
                </nav>
            </div>


        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as: {{ explode(' ', session('user')->name)[0] }}</div>

    </div>
</nav>

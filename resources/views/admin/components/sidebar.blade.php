<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <img src="{{ asset('assets/images/logo.png') }}" alt="" class="banner-logo">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body text-center">
        <ul class="navbar-nav">
            <li class="nav-item mb-1">
                <a href="{{ route('dashboard') }}"
                    class="nav-link sidebar-hover  rounded {{ Request::segment(1) === 'dashboard' ? 'active-link' : 'inactive-link' }} "><i
                        class="fa-solid fa-gauge fs-4"></i>
                    <b>Dashboard</b></a>
            </li>
            <li class="nav-item mb-1">
                <a href="{{ route('showRequest') }}"
                    class="nav-link sidebar-hover  position-relative rounded {{ Request::segment(1) === 'orders' ? 'active-link' : 'inactive-link' }} "><i
                        class="fa-solid fa-receipt fs-4"></i>
                    <b>Orders</b>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                        {{ $requests == 0 ? 'hidden' : '' }}>
                        {{ $requests }}
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="{{ route('product.index') }}"
                    class="nav-link sidebar-hover rounded {{ Request::segment(1) === 'product' ? 'active-link' : 'inactive-link' }}"><i
                        class="fa-solid fa-hands-holding-circle fs-4"></i>
                    <b>Product</b></a>
            </li>
            <li class="nav-item mb-1">
                <a href="{{ route('delivery.index') }}"
                    class="nav-link sidebar-hover rounded {{ Request::segment(1) === 'delivery' ? 'active-link' : 'inactive-link' }}"><i
                        class="fa-solid fa-truck fs-4"></i>
                    <b>Delivery</b></a>
            </li>
            <li class="nav-item mb-1">
                <a href="{{ route('stocks') }}"
                    class="nav-link sidebar-hover position-relative rounded {{ Request::segment(1) === 'stocks' ? 'active-link' : 'inactive-link' }}"><i
                        class="fa-solid fa-box fs-4"></i>
                    <b> Stocks</b>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                        {{ $stock_alert == 0 ? 'hidden' : '' }}>
                        {{ $stock_alert }}
                        <span class="visually-hidden">unread messages</span>
                    </span></a>
            </li>
            <li class="nav-item mb-1">
                <a href="{{ route('customers') }}"
                    class="nav-link sidebar-hover rounded {{ Request::segment(1) === 'customers' ? 'active-link' : 'inactive-link' }}">
                    <i class="fa-solid fa-users"></i>
                    <b>Customers</b></a>
            </li>
            <li class="nav-item mb-1">
                <a href="{{ route('reports') }}"
                    class="nav-link sidebar-hover rounded {{ Request::segment(1) === 'reports' ? 'active-link' : 'inactive-link' }}">
                    <i class="fa-solid fa-chart-simple"></i>
                    <b>Reports</b></a>
            </li>
        </ul>
    </div>
</div>

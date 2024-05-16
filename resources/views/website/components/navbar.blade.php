<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top ">
    <div class="container-fluid">
        <a class="navbar-brand mx-3" href="{{ route('index') }}">
            <img src="{{ asset('assets/images/logo.png') }}" width="200" height="50">
        </a>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active  {{ Request::segment(1) === null ? ' nav-actives' : '' }}"
                        aria-current="page" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-white  active {{ Request::segment(1) === 'about' ? ' nav-actives' : '' }}"
                        href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-white  active {{ Request::segment(1) === 'contact' ? ' nav-actives' : '' }}"
                        href="{{ route('contact') }}">Contact Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle   text-white {{ Request::segment(1) === 'category' ? ' nav-actives' : '' }} "
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item {{ Request::segment(2) === 'Drumset' ? 'selected' : '' }}"
                                href="{{ route('category', 'Drumset') }}">Drumset</a></li>
                        <li><a class="dropdown-item {{ Request::segment(2) === 'Acoustic Guitar' ? 'selected' : '' }}"
                                href="{{ route('category', 'Acoustic Guitar') }}">Acoustic Guitar</a></li>
                        <li><a class="dropdown-item {{ Request::segment(2) === 'Bass Guitar' ? 'selected' : '' }}"
                                href="{{ route('category', 'Bass Guitar') }}">Bass Guitar</a></li>
                        <li><a class="dropdown-item {{ Request::segment(2) === 'Electric Guitar' ? 'selected' : '' }}"
                                href="{{ route('category', 'Electric Guitar') }}">Electric Guitar</a></li>
                        <li><a class="dropdown-item
                                {{ Request::segment(2) === 'Accessories' ? 'selected' : '' }}"
                                href="{{ route('category', 'Accessories') }}">Accessories</a>
                        </li>

                    </ul>
                </li>
                <form action="{{ route('search') }}" method="post" class="d-flex mx-3" role="search">
                    @csrf
                    <input class="form-control me-2" type="search" placeholder="Search" name="search"
                        aria-label="Search">
                    <button class=" outline-button" type="submit">Search</button>
                </form>
            </ul>
        </div>
        <div class="div d-flex">
            {{-- Burger Button --}}
            <a class="navbar-toggler nav-link fs-2 text-dark" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <b><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg></b>
            </a>
            @auth
                @can('only-user')
                    {{-- Cart Button --}}
                    <a href="{{ route('view.showCart', auth()->user()->id) }}" class="nav-link text-label text-white  mx-3">
                        <b>
                            <i class="fa-solid fa-cart-shopping fs-3"></i>
                        </b></a>
                @endcan
                {{-- User Button --}}
                <div class="dropdown text-white">
                    <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <b>{{ auth()->user()->name }}</b>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @can('only-admin')
                            <li><a class="dropdown-item drop-item-hover" href="{{ route('dashboard') }}">Dashboard</a></li>
                        @endcan
                        <li><a class="dropdown-item drop-item-hover" href="{{ route('editUser') }}">Edit Info
                            </a></li>
                        <li><a class="dropdown-item drop-item-hover" href="{{ route('changePassword') }}">Change
                                Password</a></li>
                        <hr>

                        <li><a class="dropdown-item drop-item-hover" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            @endauth
            @guest
                <a href="{{ route('signin') }}" class="solid-button mx-2">Login</a>
            @endguest
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" id="navbar">
    <div class="container-fluid d-flex justify-content-between px-3 py-2">
        <div>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        @auth
            <div class="div d-flex">

                {{-- User Button --}}
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <b> {{ auth()->user()->name }}</b>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item drop-item-hover" href="{{ route('index') }}">Website</a></li>
                        <li><a class="dropdown-item drop-item-hover" href="{{ route('editUser') }}">Edit Info
                            </a></li>
                        <li><a class="dropdown-item drop-item-hover" href="{{ route('changePassword') }}">Change
                                Password</a></li>

                        <hr>
                        <li><a class="dropdown-item drop-item-hover" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
        @endauth
    </div>
</nav>

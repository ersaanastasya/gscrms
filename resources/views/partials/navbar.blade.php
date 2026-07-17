<nav class="navbar navbar-expand-lg navbar-dark shadow-sm"
     style="background:#0f172a;">

    <div class="container-fluid">

        {{-- Brand --}}
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            GSCRMS
        </a>

        {{-- Toggle --}}
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
             id="mainNavbar">

            {{-- Menu --}}
            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                       href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('countries.*') ? 'active' : '' }}"
                       href="{{ route('countries.index') }}">
                        Countries
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('monitoring.*') ? 'active' : '' }}"
                       href="{{ route('monitoring.index') }}">
                        Monitoring
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('comparison.*') ? 'active' : '' }}"
                       href="{{ route('comparison.index') }}">
                        Comparison
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('favorites.*') ? 'active' : '' }}"
                       href="{{ route('favorites.index') }}">
                        Favorites
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('ports.*') ? 'active' : '' }}"
                       href="{{ route('ports.index') }}">
                        Ports
                    </a>
                </li>

            </ul>

            {{-- User --}}
            <ul class="navbar-nav">

                @auth

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                           href="#"
                           data-bs-toggle="dropdown">

                            {{ Auth::user()->name }}

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('profile.edit') }}">
                                    Profile
                                </a>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>

                                <form method="POST"
                                      action="{{ route('logout') }}">

                                    @csrf

                                    <button class="dropdown-item">

                                        Logout

                                    </button>

                                </form>

                            </li>

                        </ul>

                    </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>
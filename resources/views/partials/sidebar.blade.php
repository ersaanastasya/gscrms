<aside class="sidebar">

    <!-- Brand -->

    <div class="sidebar-brand">

        <h4 class="mb-0 fw-bold text-white">
            GSCRMS
        </h4>

        <small class="text-light opacity-75">
            Global Supply Chain Risk Monitoring System
        </small>

    </div>

    <!-- Menu -->

    <ul class="sidebar-menu">

        <li>
            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

                <i class="bi bi-speedometer2"></i>

                <span>Dashboard</span>

            </a>
        </li>

        <li>
            <a href="{{ route('countries.index') }}"
               class="{{ request()->routeIs('countries.*') ? 'active' : '' }}">

                <i class="bi bi-globe2"></i>

                <span>Countries</span>

            </a>
        </li>

        <li>
            <a href="{{ route('monitoring.index') }}"
               class="{{ request()->routeIs('monitoring.*') ? 'active' : '' }}">

                <i class="bi bi-activity"></i>

                <span>Monitoring</span>

            </a>
        </li>

        <li>
            <a href="{{ route('comparison.index') }}"
               class="{{ request()->routeIs('comparison.*') ? 'active' : '' }}">

                <i class="bi bi-bar-chart"></i>

                <span>Comparison</span>

            </a>
        </li>

        <li>
            <a href="{{ route('favorites.index') }}"
               class="{{ request()->routeIs('favorites.*') ? 'active' : '' }}">

                <i class="bi bi-star"></i>

                <span>Favorites</span>

            </a>
        </li>

        <li>
            <a href="{{ route('ports.index') }}"
               class="{{ request()->routeIs('ports.*') ? 'active' : '' }}">

                <i class="bi bi-geo-alt"></i>

                <span>Ports</span>

            </a>
        </li>

        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="{{ request()->routeIs('admin.*') ? 'active' : '' }}">

                <i class="bi bi-gear"></i>

                <span>Admin</span>

            </a>
        </li>

    </ul>

</aside>
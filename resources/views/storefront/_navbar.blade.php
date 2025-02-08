<header class="header fixed-top landing-header" id="header">
    <div id="nav-menu-wrap">
        <div class="container">
            <nav class="navbar navbar-expand-lg p-0">
                <a class="navbar-brand" title="Home" href="{{ route('storefront.index') }}">
                    <img src="{{ asset('logo.png') }}" alt="laravelink " style="width: auto; height: 65px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fixedNavbar"
                    aria-controls="fixedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="togler-icon-inner">
                        <span class="line-1"></span>
                        <span class="line-2"></span>
                        <span class="line-3"></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse main-menu justify-content-end" id="fixedNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->routeIs('storefront.index') ? 'active' : '' }}"
                                href="{{ route('storefront.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->routeIs('storefront.index') ? '' : 'active' }}"
                                href="{{ route('storefront.applications') }}">Categories</a>
                        </li>
                        <li class="nav-item "><a data-toggle="" aria-expanded="false" class="nav-link dropdown-toggle"
                                href="https://script.laravelink.com/">All
                                Applications</a>
                            <div class="dropdown-menu"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

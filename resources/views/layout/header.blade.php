<nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid bg-secondary">
        <a class="navbar-brand" href="{{ route('page') }}" style="color: brown; font-size: 2rem">Page</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('product') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('product') }}">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('product/*') ? 'active' : '' }}"
                        href="{{ route('product') }}/1">Product Detail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('food') ? 'active' : '' }}"
                        href="{{ route('food.index') }}">Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('food/*') ? 'active' : '' }}"
                        href="{{ route('food.create') }}">Food Create</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

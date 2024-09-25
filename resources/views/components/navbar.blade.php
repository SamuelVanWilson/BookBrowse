<header class="py-3 mb-4 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
        <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">{{ $slot }}</span>
        </a>
        @if ($slot == 'Home' || $slot == 'Admin Dashboard')
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 mx-2" role="search">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('penulis'))
                    <input type="hidden" name="penulis" value="{{ request('penulis') }}">
                @endif
                <input type="search" name="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
            <a href="{{ $slot == 'Home' ? route('index') : route('admin.index') }}" class="btn btn-primary btn-sm fs-6 mb-1">&#10227;</a>
        @endif
        @if ($slot == 'Admin Dashboard')
            <form action="{{ route('logout-proses') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger mx-2">Logout</button>
            </form>
        @endif
    </div>
</header>
@include('inc.styles')

<body class="sidebar-dark">
<div class="{{ (request()->is('/')) ? '' : 'main-wrapper' }}">
    @unless(request()->is('/'))
        @include('inc.sidebar')
    @endunless
    <div class="page-wrapper">
        @unless(request()->is('/'))
            @include('inc.navbar')
        @endunless
        <div class="page-content">
            @unless(request()->is('/'))
                <nav aria-label="breadcrumb" class="mb-2">
                    {{ Breadcrumbs::render() }}
                </nav>
            @endunless
            @unless(request()->is('/'))
                @include('inc.message')
            @endunless
            <div>
                @yield('content')
            </div>
        </div>
            @unless(request()->is('/'))
                @include('inc.footer')
            @endunless
    </div>
</div>

@include('inc.scripts')

</body>
</html>

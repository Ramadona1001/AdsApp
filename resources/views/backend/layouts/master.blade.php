<!doctype html>
<html lang="en">

@include('backend.components.head')

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('backend.components.menu')
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>
                            @if (request()->segment(3) != null)
                            <a href="{{ route('home') }}" style="margin-bottom: 0; font-weight: 700; display: inline-block; font-size: 24px; margin-top: 3px; color: #34395e;text-decoration: none;">Home</a>&nbsp;
                            @if (\Lang::getLocale() == 'ar')
                            <i class="fas fa-angle-left" style="font-size: 20px;"></i>
                            @else
                            <i class="fas fa-angle-right" style="font-size: 20px;"></i>
                            @endif
                            @endif
                            &nbsp;@yield('title')
                        </h1>
                    </div>
                    @yield('content')

                </section>
            </div>
            @include('backend.components.footer')
        </div>
    </div>
    @include('backend.components.scripts')
</body>
</html>

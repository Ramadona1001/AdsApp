<!doctype html>
<html lang="en">

@include('backend.components.head')

<body class="theme-cyan font-montserrat" style="background-image: linear-gradient(to top, #fbc2eb 0%, #a6c1ee 100%);">
    <section class="section">
        @yield('content')
      </section>
@include('backend.components.scripts')

</body>
</html>

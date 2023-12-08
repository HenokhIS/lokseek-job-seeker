<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/config.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/header.css')}}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/footer.css')}}" />

    @stack('style-alt')
    <title>LOKSEEK</title>
  </head>
  <body>
    <header class="header">
      <div class="nav container">
        <a href="{{route('homepage')}}" class="nav__logo"
          ><span><i class="bx bxs-home-smile"></i></span></i>LOKSEEK</a
        >
        <a href="{{route('job.create')}}" class="nav__button"
          ><i class="bx bx-plus-circle"></i>Buat Loker</a
        >
      </div>
    </header>
    @yield('content')

    <footer class="footer">
      <p class="footer__copyright">© lokseek. All rigths reserved</p>
    </footer>
    @stack('script-alt')
    <script src="{{ asset('build/assets/app-2feb1c41.js') }}"></script>
  </body>
</html>

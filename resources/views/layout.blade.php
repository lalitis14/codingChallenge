<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">

    <title>Sistema de Facturación - @yield('title')</title>
    
  </head>

  <body>
    <header class="bg-secondary flexbox">
      <nav>
        <div class="text-white font-weight-bold text-uppercase">
              Coding Challenge - Sistema de Facturación
        </div>
      </nav>
    </header>

    <main>
      <div class="container">
          @yield('main')
      </div>
    </main>

    <footer class="bg-light flexbox">
        <div>
            Realizado por 
            <b><a target="_blank" href="https://www.linkedin.com/in/laura-daniela-mingrone/">
              Laura D. Mingrone
            </a></b>
        </div>
    </footer>

    @yield('scripts')    
  </body>
</html>
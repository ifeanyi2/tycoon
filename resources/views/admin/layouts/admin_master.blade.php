<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'title') }}</title>

        <meta name="description" content="" />
        <meta name="author" content="" />


        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

        <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        
    </head>
    <body class="sb-nav-fixed">
       @include('admin.layouts.navbar')
        <div id="layoutSidenav">

         @include('admin.layouts.aside')

            <div id="layoutSidenav_content">
                <main>
                  @yield('admin')
                </main>
                  @include('admin.layouts.footer')
               
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <script src="{{ asset('admin/js/scripts.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

        <script src="{{ asset('admin/assets/demo/chart-area-demo.js') }}"></script>

        <script src="{{ asset('admin/assets/demo/chart-bar-demo.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

        <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
    </body>
</html>

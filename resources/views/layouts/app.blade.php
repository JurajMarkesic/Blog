<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Blog') }}</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset("lightbulb1.png") }}"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    @include('Partials.nav')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-7 offset-md-1">
               <div class="container  mt-5">
                   @yield('content')
               </div>
            </div>
            <div class="col-md-3 col-lg-2 offset-lg-1 d-none d-md-block">
                <div class="container">
                    @include('Partials.aside')
                </div>
            </div>
        </div>
    </div>
    <popular class="d-md-none"></popular>
    @include('Partials.footer')
</div>

<!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([   //globally available csrf token
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

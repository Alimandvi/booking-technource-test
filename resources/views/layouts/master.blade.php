<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
</head>

<body>
    <div class="container">
        <div class="row mt-3 mb-5">
            <div class="col-lg-12">
                <h2 class="display-3 text-center">@yield('pageTitle')</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    @yield('scripts')
</body>

</html>
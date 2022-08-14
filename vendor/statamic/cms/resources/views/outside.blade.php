<!doctype html>
<html lang="{{ config('app.locale') }}" dir="{{ Statamic\Facades\Site::current()->direction ?? 'rtl' }}">
    <head>
        @include('statamic::partials.head')
    </head>
    <body class="outside @yield('body_class')">
        <div id="statamic">
            @yield('content')
        </div>
        @include('statamic::partials.scripts')
        @yield('scripts')
    </body>
</html>

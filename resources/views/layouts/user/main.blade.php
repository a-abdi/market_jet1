<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.user.head')

        <title>@yield('title')</title>
    </head>
    <body>
            @include('layouts.user.nav')
            
            <div>
                @yield('content')
            </div>
    </body>
</html>

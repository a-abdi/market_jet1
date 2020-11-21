    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @yield('scripts')
    <script src="{{asset('js/app.js')}}"></script>
   <!-- <script src="{{asset('js/main/main.js')}}"></script>
    <script src="{{asset('js/main/notification.js')}}"></script> -->

    @yield('styles')
   <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- <link rel="icon" href="{{asset('/gif.png')}}" type="image/gif" sizes="16x16"> -->


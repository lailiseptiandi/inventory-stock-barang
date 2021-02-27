<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    

    @stack('before-')
    @include('includes.style')
    @stack('after-')

</head>
<body>
    <div class="dashboard-main-wrapper">
        @stack('before-navbar')
        @include('includes.navbar')
        @stack('after-navbar')

        @stack('before-sidebar')
        @include('includes.sidebar')
        @stack('after-sidebar')

        
        <div class="dashboard-wrapper">
            @yield('content')
            
            @stack('before-footer')
            @include('includes.footer')
            @stack('after-footer')
        </div>
    </div>
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
    
</body>
</html>
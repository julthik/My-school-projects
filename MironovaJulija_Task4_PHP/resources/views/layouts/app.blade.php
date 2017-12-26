<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>  
@include('includes.head')
</head>
<body class="bg">
    <header>
    @include('includes.header')
    </header>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12 offset-md-0">
                @include('includes.menu')
                    <div class="contentPadding">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        @include('includes.footer')
    </footer>
<script src="/js/app.js"></script>
</body>
</html>
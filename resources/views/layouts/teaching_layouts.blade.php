<html>
<header>
     <title>@yield('title', 'this is default title')</title>
    <link rel="stylesheet" href="{{ asset('my_css.css') }}">
 </header>
<body>
@include('layouts.teaching_navigation')
@yield('body')
</body>
</html>
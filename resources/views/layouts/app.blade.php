<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>E-Learning | @yield('title')</title>
    @include('layouts.links.style')
    @yield('style')

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            @include('layouts.parts.sidebar')
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">

            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    @include('layouts.parts.navbar')
                </nav>
            </div>

            @yield('content')

            @include('layouts.parts.footer')
        </div>
    </div>

    @include('layouts.links.script')
    @yield('script')
</body>
</html>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>E-Learning | @yield('title')</title>
    @include('admin.layouts.links.style')
    @yield('style')

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            @include('admin.layouts.parts.sidebar')
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">

            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    @include('admin.layouts.parts.navbar')
                </nav>
            </div>

            @yield('content')

            @include('admin.layouts.parts.footer')
        </div>
    </div>

    @include('admin.layouts.links.script')
    @yield('script')
</body>
</html>

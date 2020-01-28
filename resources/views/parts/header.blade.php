<!-- Preloader Start -->
<div id="preloader">
    <div class="loader">
        <span class="inner1"></span>
        <span class="inner2"></span>
        <span class="inner3"></span>
    </div>
</div>

<!-- ***** Header Area Start ***** -->
<header class="header_area" id="header" style="border-bottom: none">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-12 h-100">
                <nav class="h-100 navbar navbar-expand-lg align-items-center">
                    <a class="navbar-brand" href="index.html">El Zakiy</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fancyNav" aria-controls="fancyNav" aria-expanded="false" aria-label="Toggle navigation"><span class="ti-menu"></span></button>
                    <div class="collapse navbar-collapse" id="fancyNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/')}}">Beranda <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Dokumentasi</a>
                            </li>
                            @auth ('web')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home.index')}}">Dashboard</a>
                            </li>
                            @elseauth('student')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('s1.index')}}">Dashboard</a>
                            </li>
                            @endauth
                            @auth ('web')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('profile.index')}}">{{Auth::user()->name}}</a>
                            </li>
                            @elseauth('student')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('spr.index')}}">{{auth('student')->user()->name}}</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="#">Hubungi Admin</a>
                            </li>
                            @endauth
                            <li class="nav-item">
                                @auth('web')
                                    <a href="{{url('/logout')}}" class="nav-link">Keluar</a>
                                @elseauth('student')
                                    <a href="{{url('/students-logout')}}" class="nav-link">Keluar</a>
                                @else
                                    <a href="{{route('login')}}" class="nav-link">Masuk</a>
                                @endauth
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

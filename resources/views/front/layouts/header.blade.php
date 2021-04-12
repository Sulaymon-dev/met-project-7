<header id="header-part" class="header-four">
    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{route('index')}}">
                            <img src="{{asset('/front/images/logo.svg')}}" alt="Logo" height=70px width=auto>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a href="{{route('subjects')}}">ФАНҲО</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('class')}}">СИНФҲО</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('olympics')}}">ОЛИМПИАДА</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('mmt')}}">ММТ</a>
                                </li>

                                <li class="nav-item">
                                    <a class="">МАЪЛУМОТ</a>
                                    <ul class="sub-menu">
                                        <li><a class="" href="{{route('info', 'for-pupil')}}">БА ХОНАНДА</a></li>
                                        <li><a class="" href="{{route('info', 'for-school')}}">БА МАКТАБ</a></li>
                                        <li><a class="" href="{{route('info', 'for-teacher')}}">БА МУАЛЛИМ</a></li>
                                        <li><a class="" href="{{route('info', 'for-parent')}}">БА ВОЛИДАЙН</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)" id="search"><i class="fa fa-search"></i></a></li>
                                @if(auth()->user())
                                    <li><a href="{{route('login')}}"><i class="fa fa-user"></i> </a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('login')}}"><i class="fa fa-user"></i> ПРОФИЛ</a></li>
                                            <li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i>
                                                    БАРОМАДАН</a></li>
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i> </a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('login')}}"><i class="fa fa-user"></i> Воридшавӣ</a></li>
                                            <li><a href="{{route('register')}}"><i class="fa fa-user-plus"></i>
                                                    Регистратсия</a></li>
                                        </ul></li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="search-box">
    <div class="search-form">
        <div class="closebtn">
            <span></span>
            <span></span>
        </div>
        <form action="{{route('search')}}">
            <input type="text" name="text" required placeholder="Ҷустуҷӯ кардан">
            <button><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>

<header id="header-part" class="header-four">

    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{route('index')}}">
                            <img src="/front/images/logo.svg" alt="Logo" height=70px width=auto>
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
                                    <a href="{{route('info')}}">БА ТАЛАБАҲО</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('info')}}">БА МУАЛЛИМОН</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('info')}}">БА ВОЛИДАЙН</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('info')}}">БА МАКТАБ</a>
                                </li>

                            </ul>
                        </div>
                        <div class="right-icon text-right">
                            <ul>
                                <li><a href="javascript:void(0)" id="search"><i class="fa fa-search"></i></a></li>
                                <!-- <li><a href="#"><i class="fa fa-shopping-bag"></i><span>0</span></a></li> -->
                            </ul>
                        </div>
                        <!-- right icon -->
                    </nav>
                    <!-- nav -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
</header>


<div class="search-box">
    <div class="search-form">
        <div class="closebtn">
            <span></span>
            <span></span>
        </div>
        <form action="#">
            <input type="text" placeholder="Ҷустуҷӯ кардан">
            <button><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>

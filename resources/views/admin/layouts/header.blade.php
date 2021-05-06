<header class="app-header navbar" style="justify-content: left">

        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img class="navbar-brand-full" src="/front/images/logo.svg" width="89" height="55" alt="CoreUI Logo">
            <img class="navbar-brand-minimized" src="img/brand/sygnet.svg" width="30" height="30" alt="CoreUI Logo">
        </a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin' )
            <ul class="nav navbar-nav d-md-down-none">
                <li class="nav-item px-3">
                    <a class="nav-link" href="{{route('users.index')}}">Истифодабарандагон</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="{{route('settings.index')}}">Танзимот</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="{{route('pages.index')}}">Саҳифаҳо</a>
                </li>
            </ul>
        @endif

    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-avatar" src="{{asset('/storage/uploads/img/no-avatar.jpg')}}" alt="{{auth()->user()->name}}">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="/profile">
                    <i class="fa fa-user"></i> Профил
                </a>
                <a class="dropdown-item" href="/logout">
                    <i class="fa fa-lock"></i> Баромад
                </a>
            </div>
        </li>
    </ul>

</header>


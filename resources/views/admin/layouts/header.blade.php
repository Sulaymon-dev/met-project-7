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
                <a class="{{route('admin.main')}}" href="#">Статистика</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="{{route('users.index')}}">Истифодабарандагон</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="{{route('settings.index')}}">Танзимот</a>
            </li>
        </ul>
    @endif
</header>


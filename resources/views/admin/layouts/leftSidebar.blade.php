<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                    <span class="badge badge-primary">NEW</span>
                </a>
            </li>


            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-puzzle"></i> Синфҳо</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sinfs.index')}}">
                            <i class="nav-icon icon-puzzle"></i> Рӯйхати синфҳо</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sinfs.create')}}">
                            <i class="nav-icon icon-puzzle"></i> Синфи нав</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-puzzle"></i> Фанҳо</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('subjects.index')}}">
                            <i class="nav-icon icon-puzzle"></i> Рӯйхати фанҳо</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('subjects.create')}}">
                            <i class="nav-icon icon-puzzle"></i> Фанни нав</a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>

<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/admin">
                    <i class="nav-icon icon-speedometer"></i> Асосӣ
                </a>
            </li>
            @if(auth()->user()->role=='superadmin')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('users.index')}}">
                        <i class="nav-icon icon-speedometer"></i> Истифодабарандагон
                    </a>
                </li>
            @endif
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="{{route('sinfs.index')}}">
                    <i class="nav-icon icon-puzzle"></i> Синфҳо</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sinfs.index')}}">
                            <i class="nav-icon icon-puzzle"></i> Рӯйхати синфҳо</a>
                    </li>
                    @if(in_array(auth()->user()->role,['admin','superadmin'] ))
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('sinfs.create')}}">
                                <i class="nav-icon icon-puzzle"></i> Синфи нав</a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="{{route('subjects.index')}}">
                    <i class="nav-icon icon-puzzle"></i> Фанҳо</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('subjects.index')}}">
                            <i class="nav-icon icon-puzzle"></i> Рӯйхати фанҳо</a>
                    </li>
                    @if(in_array(auth()->user()->role,['admin','superadmin'] ))
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('subjects.create')}}">
                                <i class="nav-icon icon-puzzle"></i> Фанни нав</a>
                        </li>
                    @endif

                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="{{route('books.index')}}">
                    <i class="nav-icon icon-puzzle"></i> Китобҳо</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('books.index')}}">
                            <i class="nav-icon icon-puzzle"></i> Рӯйхати китобҳо</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('books.create')}}">
                            <i class="nav-icon icon-puzzle"></i> Китоби нав</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="{{route('plans.index')}}">
                    <i class="nav-icon icon-puzzle"></i> Планҳо</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('plans.index')}}">
                            <i class="nav-icon icon-puzzle"></i> Рӯйхати планҳо</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('plans.create')}}">
                            <i class="nav-icon icon-puzzle"></i> Плани нав</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="{{route('themes.index')}}">
                    <i class="nav-icon icon-puzzle"></i> Мавзӯъҳо</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('themes.index')}}">
                            <i class="nav-icon icon-puzzle"></i>Рӯйхати мавзӯъҳо</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('themes.create')}}">
                            <i class="nav-icon icon-puzzle"></i>Мавзӯи нав</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('themes.quiz4in1')}}">
                            <i class="nav-icon icon-puzzle"></i>Тести оддӣ </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('themes.matching')}}">
                            <i class="nav-icon icon-puzzle"></i>Мувофиқоварӣ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('themes.openQuiz')}}">
                            <i class="nav-icon icon-puzzle"></i>Тести кушод</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-puzzle"></i> Тестҳои ММТ</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('mmt_fans.index')}}">
                            <i class="nav-icon icon-puzzle"></i>Рӯйхати тестҳо</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('mmt_fans.create')}}">
                            <i class="nav-icon icon-puzzle"></i>тести нав</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('clusters.index')}}">
                            <i class="nav-icon icon-puzzle"></i>Кластерҳо </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('clusters.create')}}">
                            <i class="nav-icon icon-puzzle"></i>Кластери нав</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('mmt_fans.quiz4in1')}}">
                            <i class="nav-icon icon-puzzle"></i>Тести оддӣ </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('mmt_fans.matching')}}">
                            <i class="nav-icon icon-puzzle"></i>Тести мувофиқоварӣ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('mmt_fans.openQuiz')}}">
                            <i class="nav-icon icon-puzzle"></i>Тести кушод</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-puzzle"></i> Олимпиада</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('olympics.index')}}">
                            <i class="nav-icon icon-puzzle"></i>Рӯйхати маводҳо</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('olympics.create')}}">
                            <i class="nav-icon icon-puzzle"></i>Иловаи мавод</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('olympics.quiz4in1')}}">
                            <i class="nav-icon icon-puzzle"></i>Тест </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('olympics.matching')}}">
                            <i class="nav-icon icon-puzzle"></i>Мувофиқоварӣ</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="{{route('news.index')}}">
                    <i class="nav-icon icon-puzzle"></i>Навгониҳо</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('news.index')}}">
                            <i class="nav-icon icon-puzzle"></i> Рӯйхати навгониҳо</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('news.create')}}">
                            <i class="nav-icon icon-puzzle"></i> Иловаи навгонӣ</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>

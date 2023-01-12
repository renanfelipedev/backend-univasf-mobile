<aside class="main-sidebar sidebar-dark-purple elevation-4">
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Starter Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <li class="nav-item">
                    <a href="{{ route('posts.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Notícias</p>
                    </a>
                </li>

                <li class="nav-header text-muted">Localizações</li>

                <li class="nav-item">
                    <a href="{{ route('states.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-flag"></i>
                        <p>Estados</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('cities.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-city"></i>
                        <p>Cidades</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('campuses.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-school"></i>
                        <p>Campi</p>
                    </a>
                </li>

                <li class="nav-header text-muted">Principais Datas</li>

                <li class="nav-item">
                    <a href="{{ route('calendars.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-days"></i>
                        <p>Calendários</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('holidays.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-xmark"></i>
                        <p>Feriados</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('events.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>Eventos</p>
                    </a>
                </li>



            </ul>
        </nav>

    </div>

</aside>

<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">

            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation">
                <span class="navbar-toggle-icon">
                    <span class="toggle-line"></span>
                </span>
            </button>

        </div><a class="navbar-brand" href="{{ route('dashboard') }}">
        <div class="d-flex align-items-center py-3">
            <img class="me-2" src="{{ asset('img/logo_unimark.png') }}" alt="" width="150" />
        </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                @if(in_array(Auth::user()->rol_id, [2, 4]))
                <li class="nav-item">
                    <a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-chart-pie"></span>
                            </span>
                            <span class="nav-link-text ps-1">Dashboard</span>
                        </div>
                    </a>
                    <ul class="nav collapse show" id="dashboard">
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }} " href="{{ route('dashboard')}}" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">GENERAL</span></div>
                            </a>
                        </li>             
                    </ul>
                </li>
                @endif
                @if(Auth::user()->rol_id != 4)
                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">ACCIONES</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                </li>

                <a class="nav-link mb-3 {{ (request()->is('new-doc')) ? 'active' : '' }}" href="{{ route('new-doc') }}" role="button" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><span class="fas fa-file-alt"></span></span>
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">AGREGAR DOC.</span></div>
                    </div>
                </a>
                @endif                
                
                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">MODULOS</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                </li>
                
                <a class="nav-link dropdown-indicator " href="#icons" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="icons">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon">
                            <span class="fas fa-puzzle-piece"></span>
                        </span>
                        <span class="nav-link-text ps-1">DEPARTAMENTOS</span>
                    </div>
                </a>
                
                <ul class="nav collapse show mb-3" id="icons">

                    @foreach ($Depar as $d)
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('list-doc/'.$d->ID_DEPARTAMENTO)) ? 'active' : '' }} " href="{{ route('list-doc', ['Depart' => $d->ID_DEPARTAMENTO]) }}" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ $d->DESCRIPCION }}</span>
                                </div>
                            </a>
                        </li>
                    @endforeach
                    
                    
                </ul>
                @if (Auth::user()->rol_id == 2)
                <a class="nav-link {{ (request()->is('Users')) ? 'active' : '' }}" href="{{ route('users.list') }}" role="button" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon">
                            <span class="fas fa-users"></span>
                        </span>
                        <span class="nav-link-text ps-1">USUARIOS</span>
                    </div>
                </a>
                @endif
            </ul>
        </div>
    </div>
</nav>
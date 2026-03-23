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
            <img class="me-2" src="falcon/assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" />
            <span class="font-sans-serif">gumadocs</span>
        </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                        </div>
                    </a>
                    <ul class="nav collapse show" id="dashboard">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('dashboard')}}" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Dashboard</span>
                                </div>
                            </a>
                            <a class="nav-link dropdown-indicator" href="#documents" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="forms">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Documentos</span>
                                </div>
                            </a>
                            <ul class="nav collapse false" id="documents">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('new-doc') }}" aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Nuevo</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('list-doc') }}" aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Lista</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            
                        </li>
                    
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.list') }}" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Usuarios</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
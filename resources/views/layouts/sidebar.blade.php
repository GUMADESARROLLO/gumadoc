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
                        <li class="nav-item"><a class="nav-link active" href="{{ route('Detalles')}}" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Agregar Documento</span>
                            </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.list') }}" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Usuarios</span>
                            </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="../dashboard/crm.html" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">CRM</span>
                            </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="../dashboard/e-commerce.html" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">E commerce</span>
                            </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="../dashboard/project-management.html" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Management</span>
                            </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="../dashboard/saas.html" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">SaaS</span>
                            </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
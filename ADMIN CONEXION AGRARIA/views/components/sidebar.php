<div class="app-menu">

    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="?c=dashboard&m=dashboard" class="logo-light">
            <img src="./assets/images/icono.png"
                alt="logo" class="logo-lg logo">
            <img src="./assets/images/icono2.png"
                alt="small logo" class="logo-sm logoPequeño">
        </a>

        <!-- Brand Logo Dark -->
        <a href="index.html" class="logo-dark">
            <img src="./assets/images/icono.png logo"
                alt="dark logo" class="logo-lg">
            <img src="./assets/images/icono2.png"
                alt="small logo" class="logo-sm logoPequeño">
        </a>
    </div>

    <!-- menu-left -->
    <div class="scrollbar">

        <!-- User box -->
        <div class="user-box text-center">
            <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="dropdown-toggle h5 mb-1 d-block" data-bs-toggle="dropdown">Geneva
                    Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Salir</span>
                    </a>

                </div>
            </div>
            <p class="text-muted mb-0">Admin Head</p>
        </div>

        <!--- Desktop -->
        <ul class="menu">

            <li class="menu-title mt-3">Panel de Administracion</li>

            <li class="menu-item">
                <a href="?c=dashboard&m=dashboard" class="menu-link colorletra">
                    <span class="menu-icon"><i data-feather="monitor"></i></span>
                    <span class="menu-text dashboard"> Escritorio </span>
                </a>
            </li>
            <!--- End of Desktop -->

            <!--- Usuarios Menu -->
            <li class="menu-item usuarios">
                <a href="#menuusuarios" data-bs-toggle="collapse" class="menu-link  colorletra">
                    <span class="menu-icon"><i data-feather="users"></i></span>
                    <span class="menu-text"> Usuarios </span>
                    <span class="menu-arrow"></span>
                </a>
                
                <div class="collapse" id="menuusuarios">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="?c=users&m=index" class="menu-link">
                                <span class="menu-text">Usuarios</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        <!--- End of Usuarios Menu -->

            <!--- Territorios Menu -->
            <li class="menu-item products">
                <a href="#menuTerritorios" data-bs-toggle="collapse" class="menu-link colorletra">
                    <span class="menu-icon"><i data-feather="map"></i></span>
                    <span class="menu-text"> Territorios</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuTerritorios">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="?c=territorios&m=index" class="menu-link">
                                <span class="menu-text">Listado</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        <!--- End of Territorios Menu -->

         <!--- Solicitudes Menu -->
         <li class="menu-item products">
                <a href="#menuSolicitudes" data-bs-toggle="collapse" class="menu-link colorletra">
                    <span class="menu-icon"><i data-feather="archive"></i></span>
                    <span class="menu-text">Solicitudes</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuSolicitudes">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="?c=requests&m=index" class="menu-link">
                                <span class="menu-text">Listado</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        <!--- End of Solicitudes Menu -->
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<div class="navbar-custom">
    <div class="topbar">
        <div class="topbar-menu d-flex align-items-center gap-1">
            <!-- Topbar Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a href="index.html" class="logo-light">
                    <img src="./assets/images/icono.png" alt="logo" class="logo-lg">
                </a>
            </div>
        </div>
        <ul class="topbar-menu d-flex align-items-center">
            <!-- Fullscreen Button -->
            <li class="d-none d-md-inline-block">
                <a class="nav-link waves-effect waves-light" href="" data-toggle="fullscreen">
                    <i class="fe-maximize font-22"></i>
                </a>
            </li>

            <!-- Boton para cerrar sesión-->
            <li class="d-none d-md-inline-block">
                <a class="nav-link waves-effect waves-light logout-link" href="">
                    <i class="bi bi-box-arrow-left" style="font-size:24px;"></i>
                </a>
            </li>

        </ul>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Seleccionar el enlace de cerrar sesión
        var logoutLink = document.querySelector('.logout-link');
        
        // Agregar evento de clic al enlace de cerrar sesión
        logoutLink.addEventListener('click', function(event) {
            event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
            
            // Eliminar el item 'firebaseToken' del localStorage
            localStorage.removeItem('firebaseToken');
            
            // Redireccionar a la página de inicio de sesión
            window.location.href = "?c=login&m=login";
        });
    });
</script>
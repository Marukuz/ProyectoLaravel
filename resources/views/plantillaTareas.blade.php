<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/tareas.css')}}">
    <title></title>
</head>
<header>
    <nav class="navbar navbar-expand-lg bg-secondary">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Inicio</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-light" href="index.php?controller=tareasController&action=Tareas::mostrarTareas">Ver Tareas</a>
                    <a class="nav-link text-light" href="index.php?controller=tareasController&action=Tareas::mostrarTareasPendientes">Ver Tareas Pendientes</a>
                    <a class="nav-link text-light" href="index.php?controller=tareasController&action=Tareas::añadirTarea">Añadir tarea</a>
                </div>
            </div>
            <a class="nav-link" href="index.php?controller=usuariosController&action=Usuarios::verUsuarios"><button class="btn btn-primary">Usuarios</button></a>&nbsp&nbsp
            <a class="nav-link" href="index.php?controller=usuariosController&action=Usuarios::loguearse"><button class="btn btn-danger">Log Out</button></a>
        </div>
    </nav>
</header>

<body>

    @yield('contenido')


    <footer class="bg-secondary text-center text-white">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <p class="text-white">Marc Garrido Llort</p>
            <a class="btn text-white btn-floating m-1" style="background-color: #333333;" href="https://github.com/Marukuz" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
            </svg></i></a>
        </div>
        <!-- Copyright -->
    </footer>

</body>

</html>
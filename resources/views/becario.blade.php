<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CTIN | Centro de Tecnología e Innovación</title>

    <!-- Bootstrap Core CSS -->
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/front/css/ctin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="/front/fonts/IconsCTIN/iconsCTIN.css" rel="stylesheet" type="text/css">


</head>

<body class="container">

        <!-- Navigation -->
        <nav class="navbar navbar-fixed-top">
            
            <!-- Header logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <img class="logo" src="/front/img/logo.svg">
                </a>
            </div> <!-- END Header logo -->

            <!-- Sidebar Menu Items -->
            <div class="navbar-collapse">
                <ul class="nav navbar-nav side-nav">

                    <li class="text-center row-5-1 active">
                        <a href="home.html">
                            <i class="icon-home"></i>
                            <samp>Inicio</samp>
                        </a>
                        <ul id="sub-menu">
                            <li  class=" text-center row-10">
                                <a href="{{ url('/logout') }}">Salir</a>
                            </li>
                        </ul>
                    </li>

                    <li class="text-center row-5">
                        <a href="{{ url('/becario/perfil') }}"> 
                            <i class="icon-user"></i>
                            <samp>Perfil</samp>
                        </a>
                    </li>
                    <li class="text-center row-5-2">
                        <a>
                            <i class="icon-evaluacion"></i>
                            <samp>Evaluación</samp>
                        </a>
                        <ul id="sub-menu">
                            <li  class=" text-center row-10">
                                <a href="eva-personal.html">Personal</a>
                            </li>
                            <li class=" text-center row-10">
                                <a href="eva-projects.html">Equipo</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="text-center row-5">
                        <a href="directorio-b.html">
                            <i class="icon-d_becarios"></i>
                            <samp>Becarios</samp>
                        </a>
                    </li>
                    <li class="text-center row-5">
                        <a href="projects.html">
                            <i class="icon-d_proyectos"></i>
                            <samp>Proyectos</samp>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Sidebar Menu Items  -->
        </nav> <!-- End  Navigation-->

        <!-- General Container -->
        <div class="page-wrapper">

        @yield('home')
        @yield('perfil')

        </div>
        <!-- END General Container -->

    <!-- jQuery -->
    <script src="/front/js/jquery.js"></script>
    <!-- rating js -->
    <script src="/front/js/rating.js"></script>

</body>

</html>

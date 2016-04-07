<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CTIN | Centro de Tecnología e Innovación</title>

    <!-- Normalize CSS -->
    <link href="/front/css/normalize.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/front/css/ctin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="/front/fonts/IconsCTIN/iconsCTIN.css" rel="stylesheet" type="text/css">
    <!-- Morris CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <link rel="shortcut icon" href="{{ asset('/front/img/icon.png') }}">

</head>

<body class="container">
        <!-- Navigation -->
        <nav class="navbar navbar-fixed-top">

           <!-- Header logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/admin/home') }}">
                    <img class="logo" src="/front/img/logo.svg">
                </a>
            </div> <!-- END Header logo -->

            <!-- Sidebar Menu Items -->
            <div class="navbar-collapse">
                <ul class="nav navbar-nav side-nav ">

                    <li class="text-center row-5-2">
                        <a href="{{ url('/admin/home') }}">
                            <i class="icon-home"></i>
                            <samp>Inicio</samp>
                        </a>
                        <ul id="sub-menu">
                            <li  class=" text-center row-8">
                                <a href="{{ url('/logout') }}">Salir</a>
                            </li>
                            <li  class=" text-center row-8">
                                <a href="{{ url('/becario/buzon') }}">Buzón</a>
                            </li>
                        </ul>
                    </li>

                    <li class="text-center row-4">
                        <a href="{{ url('/admin/contenido') }}">
                            <i class="icon-engranes"></i>
                            <samp>Contenidos</samp>
                        </a>
                    </li>

                    <li class="text-center row-4">
                        <a href="{{ url('/admin/becarios') }}">
                            <i class="icon-d_becarios"></i>
                            <samp>Becarios</samp>
                        </a>
                    </li>
                    <li class="text-center row-4">
                        <a href="{{ url('/admin/proyectos') }}">
                            <i class="icon-d_proyectos"></i>
                            <samp>Proyectos</samp>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Sidebar Menu Items  -->
        </nav> <!-- End  Navigation -->

        <!-- General Container -->
        <div class="page-wrapper">

        @yield('home')
        @yield('perfil')
        @yield('becarios')
        @yield('proyectos')
        @yield('evaluaciones')

        </div>
        <!-- END General Container -->

        <!-- jQuery -->
    <script src="/front/js/jquery.js"></script>
    <!-- rating js -->
    <script src="/front/js/rating.js"></script>
    <!-- Bootstrap -->
    <script src="/front/js/bootstrap.min.js"></script>
    <!-- Bootstrap-table js -->
    <script src="/front/js/bootstrap-table.js"></script>
    
    <!-- selectRow js -->
 <script src="/front/js/slectRow.js"></script>

        

    <!-- Raphael js -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <!-- Morris js -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


    @yield('js')
    @yield('select')


    <!-- Waypoints js -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <!-- Counterup js -->
    <script src="/front/js/jquery.counterup.min.js"></script>
    <!-- Counterup script -->
    <script>
        jQuery(document).ready(function($) {

            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
    </script>

</body>

</html>

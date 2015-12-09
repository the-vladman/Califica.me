<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CTIN | Plataforma Becarios</title>

    <!-- Bootstrap Core CSS -->
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/front/css/ctin.css" rel="stylesheet">

</head>

<body class="container">

        <div id="animated-home" class="animated-home">
            <canvas id="demo-canvas"></canvas>          
            <div class="animated-home-valign ">
                
            </div>  
        </div>

        <div class="page-wrapper-login">
            @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Estas escribiendo algo mal!<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                <!-- Page Heading -->
            <form class=" form-login text-center col-lg-6 col-sm-6" method="POST" action="{{ url('/register') }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <!--   <input type="hidden" name="activo" value="1">
                <input type="hidden" name="rol" value="becario">  -->
                <img class="logo" src="/front/img/logo.svg">
                <div class="form-group text-center ">
                    <input type="idCarso" name="carso" class="form-control input" id="idCarso" placeholder="Número de Becario">
                    <input type="password" name="password" class="form-control input" id="Password" placeholder="Password">
                </div>
                  <button type="submit" class="btn ">Registrar</button>
            </form>
                    
                
        </div>
        <!-- /#page-wrapper -->

    <!-- TweenMax -->
    <script type="text/javascript" src="/front/js/TweenMax.min.js"></script>
    <!-- Animation -->
    <script src="/front/js/home-animated1.js"></script>

</body>

</html>

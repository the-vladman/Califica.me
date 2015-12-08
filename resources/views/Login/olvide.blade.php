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

                <!-- Page Heading -->
            <form class=" form-login text-center col-lg-6 col-sm-6" action="{{ url('/login') }}">
                 <div class="img-general-link">
                    <div class="img-container-s">
                        <img class=" " src="http://www.ctinmx.com/wp-content/uploads/2015/04/11348643_10155609003690517_772603181_o-e1432759730895.jpg">
                    </div>
                    
                    <h5>Madai te puede ayudar a restaurar tu contraseña</h5>
                    <h5> :) </h5>
                    <button type="submit" class="btn">Volver</button>
                </div>
            </form>
                    
                
        </div>
        <!-- /#page-wrapper -->

    <!-- TweenMax -->
    <script type="text/javascript" src="/front/js/TweenMax.min.js"></script>
    <!-- Animation -->
    <script src="/front/js/home-animated1.js"></script>

</body>

</html>

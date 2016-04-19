@extends('becario')

@section('home')


<div class="general-info col-sm-10 col-sm-offset-1">
            @if($noticias)
                    <section class="row">
                        <div class="center text-center">
                        @foreach($noticias as $noticia)
                            <div class="board-container">
                                <div class="board-flip">
                                    <div class="board-front">
                                        <img src="/CTIN/noticias/{{$noticia->url_noticia}}" alt="" />
                                    </div>
                                    <div class="board-back">
                                        <div class="board-inner">
                                            <h1>{{ $noticia->titulo }}</h1>
                                            <p>{{ $noticia->descripcion }}</p>
                                            <a href="{!! $noticia->link !!}" target="_blank">
                                                <i class="icon-link icon-xl"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </section>
            @endif


            @if(count($tareas)>0)
                    <section class=" row">
                            <h3>Tareas</h3>
                            <div class="col-lg-12 center-around">

                              <div class="time-out">
                                  <i class="icon-calendario"></i>
                                  <p > LA SIGUIENTE EVALUACIÓN SE REALIZARÁ LOS DÍAS 1 Y 2 DE ENERO. </p>
                              </div>
                        @foreach($tareas as $tarea)
                                <div class="homework">
                                    <div class="top-img">
                                        <div class="img-general-link">
                                          <div class="img-general-link">
                                              <div class="img-container-s">
                                                  <p>{{ $tarea->nombre }}</p>
                                                  <a href="{{ $tarea->link }}" ><span class="icon-recursos"></span></a>
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                    <p class="col-sm-6" >{{ $tarea->descripcion}}</p>
                                </div>
                        @endforeach
                            </div>
                        </section>
            @endif

                    <section class="row">
                        <h3>Desempeño</h3>
                        <div class="center">
                            <div class=" col-sm-12 center text-center">
                                <div class="winner-container">
                                    <div class="board-flip">
                                        <div class="board-front">
                                            <img src="/front/img/user.png" alt="" />
                                        </div>
                                        <div class="board-back">
                                            <div class="board-inner">
                                                <h5><small>Software</small></h5>
                                                <h5>Miguel Angel Ruiz Gálvez</h5>
                                                <h5><small>Ing. Mecatrónico</small></h5>
                                                <fieldset class="rating" data-rate ="3"></fieldset>  
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="winner-container">
                                    <div class="board-flip">
                                        <div class="board-front">
                                            <img src="/front/img/user.png" alt="" />
                                        </div>
                                        <div class="board-back">
                                            <div class="board-inner">
                                                <h5><small>Software</small></h5>
                                                <h5>Miguel Angel Ruiz Gálvez</h5>
                                                <h5><small>Ing. Mecatrónico</small></h5>
                                                <fieldset class="rating" data-rate ="3"></fieldset>  
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="winner-container">
                                    <div class="board-flip">
                                        <div class="board-front">
                                            <img src="/front/img/user.png" alt="" />
                                        </div>
                                        <div class="board-back">
                                            <div class="board-inner">
                                                <h5><small>Software</small></h5>
                                                <h5>Miguel Angel Ruiz Gálvez</h5>
                                                <h5><small>Ing. Mecatrónico</small></h5>
                                                <fieldset class="rating" data-rate ="3"></fieldset>  
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="winner-container">
                                    <div class="board-flip">
                                        <div class="board-front">
                                            <img src="/front/img/user.png" alt="" />
                                        </div>
                                        <div class="board-back">
                                            <div class="board-inner">
                                                <h5><small>Software</small></h5>
                                                <h5>Miguel Angel Ruiz Gálvez</h5>
                                                <h5><small>Ing. Mecatrónico</small></h5>
                                                <fieldset class="rating" data-rate ="3"></fieldset>  
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="winner-container">
                                    <div class="board-flip">
                                        <div class="board-front">
                                            <img src="/front/img/user.png" alt="" />
                                        </div>
                                        <div class="board-back">
                                            <div class="board-inner">
                                                <h5><small>Software</small></h5>
                                                <h5>Miguel Angel Ruiz Gálvez</h5>
                                                <h5><small>Ing. Mecatrónico</small></h5>
                                                <fieldset class="rating" data-rate ="3"></fieldset>  
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </section> 


                    <section class="row center">
                        <div class="top-down">
                            <div class="top-img">
                                <div class="img-general-link">
                                    <div class="img-container-s">
                                        <img class=" " src="http://www.genengnews.com/app_themes/genconnect/images/default_profile.jpg">
                                    </div>
                                </div>
                            </div> 
                            <p class="col-sm-6" > Si puedes ver tu foto, lamentamos informarte que estás dentro de los 5 CTINeros con peor evaluacion. <br/> <small>No te preocupes aún tienes salvación del fuego eterno. <br/>¡Ponte las pilas chavo! </small> </p>
                        </div>
                    </section>
                    <section class=" row">
                        <h3>Recursos</h3>
                        <div class="col-lg-12 center-around">
                        @foreach($recursos as $recurso)
                            <div class="img-general-link">
                                <div class="img-container-s">
                                    <p>{{ $recurso->nombre }}</p>
                                    <a href="/CTIN/recursos/{{ $recurso->url_recurso }}" download="{{ $recurso->url_recurso }}" ><span class="icon-recursos"></span></a>
                                </div>
                            </div> 
                        @endforeach
                        
                        </div>                 
                    </section>
                    <section class="row">
                        
                        <div class="row">
                            <h3>Nosotros</h3>
                            <div class="col-sm-12">
                                <p>El Centro de Tecnología e Innovación (CTIN) es un punto de encuentro que promueve el crecimiento de sus becarios a través de dinámicas de integración multidisciplinaria, donde se generan soluciones creativas, tecnológicas y de impacto social.<br/><br/>Aquí, la investigación, el desarrollo y el emprendimiento se vuelven una constante que transforma ideas en  proyectos exitosos.</p>
                            </div>
                        </div>

                        <div class="row">
                            <h4>Equipo</h4>
                            <div class="col-lg-12 center-around">
                                <div class="img-general-link">
                                    <div class="img-container-l">
                                        <img class=" " src="http://www.ctinmx.com/wp-content/uploads/2015/04/lorefin.png">
                                        <a href=""><span class="icon-sobre"></span></a>
                                    </div>
                                    <h5>Lorena Guevara</h5>
                                    <h5><small>CORDINAción</small></h5>
                                    <h5> <i class="icon-sobre"></i> <small>lorena.guevara@ctinmx.com</small></h5>
                                </div>

                                <div class="img-general-link">
                                    <div class="img-container-l">
                                        <img class=" " src="http://www.ctinmx.com/wp-content/uploads/2015/04/11348643_10155609003690517_772603181_o-e1432759730895.jpg">
                                        <a href=""><span class="icon-sobre"></span></a>
                                    </div>
                                    <h5>Madai Millán</h5>
                                    <h5><small>ADMINISTRACIóN</small></h5>
                                    <h5> <i class="icon-sobre"></i> <small>madai.millan@ctinmx.com</small></h5>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <h4>Contacto CTIN</h4>
                            <div class="column-form  col-sm-5">
                                <div class="contacto">
                                    <i class="icon-ubicacion icon-l" ></i>
                                    <p class="">Calle Lago Zurich 245
                                    <br/>
                                    Ampliación Granada, Miguel
                                    Hidalgo 
                                    <br/>
                                    11529 Ciudad de México, D.F. </p>
                                </div>
                                <div class="contacto">
                                    <i class="icon-telefono icon-l" ></i>
                                    <p class="">55 4976 0411</p>
                                </div>
                                <div class="contacto">
                                    <i class= "icon-mundo icon-l" ></i>
                                    <a href="http://ctinmx.com" class="inline-block">http://ctinmx.com</a>
                                </div>
                            </div>
                            <div class="row col-sm-6 center">
                                 <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d481936.9211909867!2d-99.15261552764315!3d19.320069045238263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d202107c974a21%3A0x637e2596b7836f14!2sCTIN+M%C3%A9xico!5e0!3m2!1ses!2smx!4v1446527882833" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            
                            
                        </div>
                    </section>

                </div>
                   
                <!-- General User data -->
                
            <!-- END Generl  -->

@endsection
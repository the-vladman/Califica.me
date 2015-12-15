@extends('becario')

@section('becarios')

                <!-- General User data -->
                <div class="general-info col-sm-10 col-sm-offset-1">

                     <section class=" info-header row between-form">
                        <div class="col-md-5 img-general-link">
                            <div class="img-container-l">
                                <img class=" " src="/CTIN/becarios/{{ $becario->url_img }}">
                                <!--<a><span class="icon-engranes"></span></a>-->
                            </div>
                            <fieldset class="rating" data-rate ="3"></fieldset>
                        </div>
                        <div class="col-md-6 ">
                            <h3>{{ $becario->nombres}} {{ $becario->apellido_p}} {{ $becario->apellido_m}}</h3>
                            <div class="col-lg-12 principal-info inline-form">
                                <a><i class="icon-sobre icon-l"></i>{{ $becario->email }}</a>
                                <a><i class="icon-d_proyectos icon-l"></i>{{ $becario->area }}</a>
                            </div>
                            @foreach($becario->academicas as $escuela)
                            <p><b>Carrera: </b>{{ $escuela->carrera}}</p> 
                            <p><b>Universidad: </b>{{ $escuela->universidad}}</p>
                            @endforeach 
                            <p><b>Descripción: </b>{{ $becario->descripcion }} ...</p>
                        </div>
                    </section>

                    <section class=" row">
                        <h3>Proyectos</h3>
                        <div class="col-lg-12 center-around">

                            <div class="img-general-link">
                                <div class="img-container-s  progress-0">
                                    <img class=" " src="/front/img/project.png">
                                    <a href="project-simple.html"><span class="icon-d_proyectos"></span></a>
                                </div>
                                <h5> <small>CTIN</small> </h5>
                                <h5>Apuntate</h5>
                            </div>
                            <div class="img-general-link">
                                <div class="img-container-s  progress-30">
                                    <img class=" " src="/front/img/project.png">
                                    <a href="project-simple.html"><span class="icon-d_proyectos"></span></a>
                                </div>
                                <h5> <small>CTIN</small> </h5>
                                <h5>Apuntate</h5>
                            </div>
                            <div class="img-general-link">
                                <div class="img-container-s  progress-60">
                                    <img class=" " src="/front/img/project.png">
                                    <a href="project-simple.html"><span class="icon-d_proyectos"></span></a>
                                </div>
                                <h5> <small>CTIN</small> </h5>
                                <h5>Apuntate</h5>
                            </div>
                            <div class="img-general-link">
                                <div class="img-container-s  progress-100">
                                    <img class=" " src="/front/img/project.png">
                                    <a href="project-simple.html"><span class="icon-d_proyectos"></span></a>
                                </div>
                                <h5> <small>CTIN</small> </h5>
                                <h5>Apuntate</h5>
                            </div>   
                            
                        </div>
                    </section>

                </div><!-- General User data -->
@stop
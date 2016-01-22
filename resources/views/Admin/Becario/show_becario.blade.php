@extends('admin')

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
                            <p><b>Carrera: </b>{{ $becario->academicas->carrera}}</p> 
                            <p><b>Universidad: </b>{{ $becario->academicas->universidad}}</p>
                            <p><b>Descripción: </b>{{ $becario->descripcion }} ...</p>
                        </div>
                    </section>

                    <section class=" row">
                        <h3>Proyectos</h3>
                        <div class="col-lg-12 center-around">
                        @foreach($becario->proyectos as $proyecto)
                            <div class="img-general-link active">
                                <div class="img-container progress-{{ $proyecto->progreso }}">
                                    <img class=" " src="/CTIN/proyectos/logos/{{ $proyecto->url_logo }}">
                                    <a href="/becario/proyectos/{{ $proyecto->id }}"><span class="icon-d_proyectos"></span></a>
                                </div>
                                <h5> <small>{{ $proyecto->area }}</small> </h5>
                                <h5>{{ $proyecto->nombre }}</h5>
                            </div> 
                        @endforeach  
                        </div>
                    </section>

                </div><!-- General User data -->
@stop
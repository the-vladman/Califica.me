@extends('becario')

@section('proyectos')
                <!-- General User data -->
                <div class="general-info col-sm-10  col-sm-offset-1">

                    <section class=" row">
                        <h3>Proyectos CTIN</h3>
                        <div class="col-lg-12 center-around">
                        @foreach($ctin as $proyecto)
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

                    <section class=" row">
                        <h3>Proyectos CARSO</h3>
                        <div class="col-lg-12 center-around">
                         @foreach($carso as $proyecto)
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

                    <section class=" row">
                        <h3>Operacion CTIN</h3>
                        <div class="col-lg-12 center-around">
                         @foreach($operacion as $proyecto)
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
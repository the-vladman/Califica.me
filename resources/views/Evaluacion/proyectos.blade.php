@extends('becario')

@section('evaluaciones')


@if ($errors->any())
  <ul class="alert alert-damage">
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </u>
@endif

<!-- General User data -->
                <div class="general-info col-sm-8  col-sm-offset-2">

                    <div class="info-body row">
                        <h3>Evaluación de Equipos</h3>
                        <div class="col-lg-12 center-between">
                        
                        @foreach($becario->proyectos as $proyecto)
                            <div class="img-general-link">
                                <div class="img-container progress-0">
                                    <img class=" " src="/CTIN/proyectos/logos/{{ $proyecto->url_logo }}">
                                    <a href="/becario/evaluacion/mis_proyectos/{{ $proyecto->id }}"><span class="icon-d_proyectos"></span></a>
                                </div>
                                <h5> <small>{{ $proyecto->area }}</small> </h5>
                                <h5>{{ $proyecto->nombre }}</h5>
                            </div> 
                        @endforeach  

                        </div>
                    </div>
                   
                </div><!-- General User data -->
                
            <!-- END Generl  -->
@endsection
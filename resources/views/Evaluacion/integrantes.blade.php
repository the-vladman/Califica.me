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
                        <h3>Evaluación de integrantes {{ $proyecto->nombre }}</h3>
                        <div class="col-lg-12 center-between">
                        
                        @foreach($proyecto->becarios as $becario)
                            @if($user->becario->nombres != $becario->nombres)
                                <div class="img-general-link">
                                    <div class="img-container progress-0">
                                        <img class=" " src="/CTIN/becarios/{{ $becario->url_img }}">
                                        <a href="/becario/evaluacion/mis_proyectos/{{ $proyecto->id }}/califica/{{ $becario->id }}"><span class="icon-d_proyectos"></span></a>
                                    </div>
                                    <h5> <small>{{ $becario->area }}</small> </h5>
                                    <h5>{{ $becario->nombres }} {{ $becario->apellido_p }} {{ $becario->apellido_m }}</h5>
                                </div> 
                            @endif
                        @endforeach  
                        </div>
                    </div>
                   
                </div><!-- General User data -->
                
            <!-- END Generl  -->
@endsection
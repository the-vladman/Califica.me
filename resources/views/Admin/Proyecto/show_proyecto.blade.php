@extends('admin')

@section('proyectos')
<!-- General User data -->
                <div class="general-info col-sm-8  col-sm-offset-2">

                    <section class=" info-header row between-form">
                        <div class="col-md-4 img-general-link">
                            <div class="img-container-l progress-{{ $proyecto->progreso }}">
                                <img class=" " src="/CTIN/proyectos/logos/{{ $proyecto->url_logo }}">
                                <a href="/admin/proyectos/{{ $proyecto->id }}/edit"><span class="icon-engranes"></span></a>
                            </div>
                        </div>
                        <div class="col-md-7 principal-info">
                            <h3>{{ $proyecto->nombre }}</h3>
                            <h5>{{ $proyecto->area }}</h5>
                            <h6>{{ $proyecto->start }} / <span class="active">Activo</span> </h6>
                            <h6>{{ $proyecto->end }} / <span class="inactive">Término estimado</span> </h6>
                            <p><b>Descripción: </b>{{ $proyecto->descripcion }} ...</p>
                        </div>
                    </section>
                
                    <section class=" row">
                        <h4>Integrantes</h4>
                        <div class="col-lg-12 center-around">

                        @foreach($proyecto->becarios as $becario)
                            <div class="img-general-link">
                                <div class="img-container-s">
                                    <img class=" " src="/CTIN/becarios/{{ $becario->url_img }}">
                                    <a href="/admin/becarios/{{ $becario->id }}"><span class="icon-user"></span></a>
                                </div>
                                <h5><small>{{ $becario->area }}</small></h5>
                                <h5>{{ $becario->nombres }} {{ $becario->apellido_p }} {{ $becario->apellido_m }}</h5>
                                <h5><small>{{ $becario->academicas->carrera }}</small></h5>
                            </div>  
                        @endforeach  

                        </div>                 
                    </section>

                    <section class="row">
                        <h4>Desempeño del equipo</h4>
                        <div class="metrics-box">
                                <div class="metrics">
                                    <div class="data">
                                        <span class="counter">400</span><b>hrs</b>
                                    </div>
                                    <h5>Total de Horas</h5>
                                </div>
                          </div>
                        <div class="chart-full" id="desempeño-proyecto"></div>
                    </section>

                    <section class=" row">
                        <h4>Recursos</h4>
                        <div class="col-lg-12 center-around">
                        @foreach($proyecto->recursos as $recurso)
                            @if($recurso->nombre)
                            <div class="img-general-link">
                                <div class="img-container-s">
                                    <p>{{ $recurso->nombre }}</p>
                                    <a href="/CTIN/proyectos/recursos/{{ $recurso->url_archivo }}" download="{{ $recurso->url_archivo }}" ><span class="icon-recursos"></span></a>
                                </div>
                            </div>
                            @endif 
                        @endforeach
                        </div>                 
                    </section>

                </div><!-- General User data -->
@stop

@section('js')
<script type="text/javascript">
    Morris.Bar({
      element: 'desempeño-proyecto',
      data: [
        {x: 'Enero', miguelo: 3, Luis: 2, a: 3.5},
        {x: 'Febrero', miguelo: 2, Luis: 0, a: 1},
        {x: 'Marzo', miguelo: 0, Luis: 2, a: 4},
        {x: 'Abril', miguelo: 13, Luis: 4, a: 3}
      ],
      xkey: 'x',
      ykeys: [ 'a', 'Luis','miguelo'],
      labels: ['Paco Pelotas', 'Luis Sanchez','Miguel Ruiz'],
      stacked: true,
      resize:true
    });
</script>

@endsection
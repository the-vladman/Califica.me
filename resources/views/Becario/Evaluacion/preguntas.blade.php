@extends('becario')

@section('evaluaciones')


@if ($errors->any())
  <ul class="alert alert-damage">
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </u>
@endif


<!-- Generl Row -->

                <!-- General User data -->
                <div class="general-info col-sm-8  col-sm-offset-2">
                 <h3>Evaluación de Equipo</h3>

                    <section class="row center">
                        <div class="winner-container">
                            <div class="board-flip">
                                <div class="board-front">
                                    <img src="/CTIN/becarios/{{ $integrante->url_img }}" alt="" />
                                </div>
                                <div class="board-back">
                                    <div class="board-inner">
                                        <h5><small>{{ $inetgrante->area }}</small></h5>
                                        <h5>{{ $integrante->nombres }} {{ $integrante->apellido_p }} {{ $integrante->apellido_m }}</h5>
                                        <h5><small>{{ $integrante->area }}</small></h5>
                                        <fieldset class="rating" data-rate ="6"></fieldset>  
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </section>

                    <section class="row">
                    {!! Form::open(['class'=>'text-center','method' => 'POST','action'=>['BecarioController@calificar',$id_proyecto,$integrante->id]]) !!}

                    <div class="form-group text-left">
                    {!! Form::label('¿El becario entrega sus tareas con la calidad esperada dentro del proyecto?') !!}
                        <div class="radio">
                        {!! Form::label('Deacuerdo') !!}
                        <label class="">
                        {!! Form::radio('constancia','5',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('constancia','4',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('constancia','3',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('constancia','2',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('constancia','1',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        {!! Form::label('Desacuerdo') !!}
                        </div>
                    </div>

                    <div class="form-group text-left">
                    {!! Form::label('¿El becario entrega sus tareas en tiempo?') !!}
                        <div class="radio">
                        {!! Form::label('Deacuerdo') !!}
                        <label class="">
                        {!! Form::radio('puntualidad','5',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('puntualidad','4',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('puntualidad','3',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('puntualidad','2',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('puntualidad','1',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        {!! Form::label('Desacuerdo') !!}
                        </div>
                    </div>

                    <div class="form-group text-left">
                    {!! Form::label('¿El becario aporta ideas o soluciones que son de utilidad para el proyecto?') !!}
                        <div class="radio">
                        {!! Form::label('Deacuerdo') !!}
                        <label class="">
                        {!! Form::radio('colaboracion','5',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('colaboracion','4',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('colaboracion','3',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('colaboracion','2',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('colaboracion','1',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        {!! Form::label('Desacuerdo') !!}
                        </div>
                    </div>

                    <div class="form-group text-left">
                    {!! Form::label('¿Toma en cuenta las ideas de los demás, trata de forma respetuosa a sus compañeros y se adapta a las capacidades del equipo?') !!}
                        <div class="radio">
                        {!! Form::label('Deacuerdo') !!}
                        <label class="">
                        {!! Form::radio('proactividad','5',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('proactividad','4',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('proactividad','3',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('proactividad','2',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('proactividad','1',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        {!! Form::label('Desacuerdo') !!}
                        </div>
                    </div>

                    <div class="form-group text-left">
                    {!! Form::label('¿El becario apoya a sus compañeros explicando y enseñando a otros integrantes del equipo tareas que son de utilidad para el proyecto?') !!}
                        <div class="radio">
                        {!! Form::label('Deacuerdo') !!}
                        <label class="">
                        {!! Form::radio('ensenanza','5',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('ensenanza','4',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('ensenanza','3',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('ensenanza','2',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('ensenanza','1',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        {!! Form::label('Desacuerdo') !!}
                        </div>
                    </div>

                    <div class="form-group text-left">
                    {!! Form::label('¿Recomendarias a este becario para trabajar con el en proyectos futuros?') !!}
                        <div class="radio">
                        {!! Form::label('Deacuerdo') !!}
                        <label class="">
                        {!! Form::radio('popularidad','5',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('popularidad','4',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('popularidad','3',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('popularidad','2',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        <label class="">
                        {!! Form::radio('popularidad','1',['name'=>'inlineRadioOptions11']) !!}
                        </label>
                        {!! Form::label('Desacuerdo') !!}
                        </div>
                    </div>

                    <div class="form-group col-lg-12 text-left">   
                    {!! Form::label('Añade un comentario acerca de tu compañero') !!}
                    {!! Form::textarea('comentario',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-lg-12 ">
                    {!! Form::submit('Calificar',['class'=>'btn btn-xl']) !!}
                    </div>

                    {!! Form::close() !!}
                    </section>

                   
                </div><!-- General User data -->
                
            <!-- END Generl  -->
@endsection
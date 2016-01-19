@extends('admin')

@section('proyectos')


@if ($errors->any())
  <ul class="alert alert-damage">
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </u>
@endif

                <!-- General User data -->
                <div class="general-info col-sm-10  col-sm-offset-1">


                <h3>Proyectos</h3>
                    <section class="row center-around">

                         <!-- Alta becario trigger modal -->
                        <button type="button" class="btn xl-btn" data-toggle="modal" data-target="#AltaModal">
                          <i class="icon-circulo_mas icon-l"></i>   Alta
                        </button>

                        <!-- Alta becario Modal -->
                        <div class="modal fade" id="AltaModal" tabindex="-1" role="dialog" aria-labelledby="AltaModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>


                                <h4 class="modal-title" id="AltaModalLabel">Alta Proyecto</h4>
                              </div>
                              {!! Form::open(['method' => 'POST','action'=>['AdministradorController@alta_proyecto']]) !!}

                              <div class="modal-body form-group col-lg-12">
                                    <div class="between-form form-group">
                                        {!! Form::label('Nombre', 'Nombre') !!}
                                        {!! Form::text('proyecto',null,['class'=>'form-control','placeholder'=>'Nombre del proyecto']) !!}
                                    </div>
                                    <div class="between-form form-group">
                                        {!! Form::label('maximo', 'Número maximo de Integrantes') !!}
                                        {!! Form::text('maximo',null,['class'=>'form-control','placeholder'=>'Numero de Integrantes']) !!}
                                    </div>
                                    <div class="between-form form-group">
                                        {!! Form::label('integrante', 'Primer Integrante del equipo') !!}
                                        {!! Form::text('integrante',null,['class'=>'form-control','placeholder'=>'Identificación CARSO']) !!}
                                    </div>
                                     <div class="between-form form-group">
                                        {!! Form::label('tipo','Tipo del proyecto') !!}
                                        {!! Form::select('tipo',array('tipo' => ' ','CTIN' => 'CTIN', 'CARSO' => 'CARSO','Operación CTIN' => 'Operación CTIN'),null,['class'=>'form-control']) !!}
                                    </div>
                 
                                     <div class="between-form form-group">
                                        {!! Form::label('area','Área') !!}
                                        {!! Form::select('area',array('area' => ' ','software' => 'software', 'hardware' => 'hardware','diseño' => 'diseño','social' => 'social'),null,['class'=>'form-control']) !!}
                                    </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                                {!! Form::submit('Alta Proyecto',['class'=>'btn btn-primary']) !!}
                              </div>

                              {!! Form::close() !!}
                            </div>

                          </div>
                        </div>

                         <!-- Alta becario trigger modal -->
                        <button type="button" class="btn xl-btn" data-toggle="modal" data-target="#BajaModal">
                          <i class="icon-circulo_editar icon-l"></i>  Status
                        </button>

                        <!-- Alta becario Modal -->
                        <div class="modal fade" id="BajaModal" tabindex="-1" role="dialog" aria-labelledby="BajaModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="BajaModalLabel">Cambiar Status</h4>
                              </div>
                              <div class="modal-body form-group col-lg-12">
                                    <div class="between-form form-group">
                                        <label>Proyecto</label>
                                        <select class="form-control">
                                          <option selected disabled>Proyecto...</option>
                                          <option>P 1</option>
                                          <option>P 2</option>
                                          <option>P 3</option>
                                        </select>
                                    </div>
                                    <div class="between-form form-group">
                                        <label>Status</label>
                                        <select class="form-control">
                                          <option selected disabled>Status...</option>
                                          <option>Activo</option>
                                          <option>Suspendido</option>
                                          <option>Terminado</option>
                                        </select>
                                    </div>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Cambiar</button>
                              </div>

                            </div>
                          </div>
                        </div>

                         <div class="between-form form-group nopading">
                            <input type="text" class="form-control" placeholder="Buscar...">
                        </div>


                    </section>


                    <section class=" row">
                        <h3>Proyectos CTIN</h3>
                        <div class="col-lg-12 center-around">
                        @foreach($ctin as $proyecto)
                            <div class="img-general-link active">
                                <div class="img-container progress-{{ $proyecto->progreso }}">
                                    <img class=" " src="/CTIN/proyectos/logos/{{ $proyecto->url_logo }}">
                                    <a href="/admin/proyectos/{{ $proyecto->id }}"><span class="icon-d_proyectos"></span></a>
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
                                    <a href="/admin/proyectos/{{ $proyecto->id }}"><span class="icon-d_proyectos"></span></a>
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
                                    <a href="/admin/proyectos/{{ $proyecto->id }}"><span class="icon-d_proyectos"></span></a>
                                </div>
                                <h5> <small>{{ $proyecto->area }}</small> </h5>
                                <h5>{{ $proyecto->nombre }}</h5>
                            </div> 
                        @endforeach  
 
                        </div>
                    </section>

                   
                </div><!-- General User data -->
@stop
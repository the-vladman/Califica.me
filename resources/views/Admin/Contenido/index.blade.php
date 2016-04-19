@extends('admin')

@section('home')


@if ($errors->any())
  <ul class="alert alert-damage">
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </u>
@endif
<!-- General User data -->
                <div class="general-info col-sm-10 col-sm-offset-1">

                    <section class="center">
                         <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#Noticias" aria-controls="Noticias" role="tab" data-toggle="tab">Noticias</a></li>
                            <li role="presentation"><a href="#Recursos" aria-controls="Recursos" role="tab" data-toggle="tab">Recursos</a></li>
                            <li role="presentation"><a href="#Tareas" aria-controls="Tareas" role="tab" data-toggle="tab">Tareas</a></li>
                            <li role="presentation"><a href="#Equipo" aria-controls="Equipo" role="tab" data-toggle="tab">Equipos</a></li>
                        </ul>

                          <!-- Tab panes -->
                        <div class="tab-content col-sm-12" >

                        





  <div role="tabpanel" class="tab-pane active" id="Noticias" ng-app="MyApp" ng-controller="PreviewCtrl" >
                            <h4>Noticias</h4>
                            <table class="data-table">
                              <thead>
                                  <th>Título</th>
                                  <th>Texto</th>
                                  <th>Link</th>
                                  <th>Eliminar</th>
                              </thead>
                              <tbody>
                              @foreach($noticias as $noticia)
                                  <tr>
                                      <td>{{ $noticia->titulo }}</td>
                                      <td>{{ $noticia->descripcion }}</td>
                                      <td>
                                        <a href="#" data-toggle="tooltip" title="Eliminar">
                                            {{ $noticia->link }}
                                        </a>
                                      </td>
                                      <td class="text-center">
                                          <a href="becario-simple.html" data-toggle="tooltip" title="Eliminar">
                                              <i class="icon-circulo_tache icon-l"></i>
                                          </a>
                                       </td>
                                  </tr>
                              @endforeach
                                  
                              </tbody>
                            </table>


 <h4>Nueva Noticias</h4>
                            {!! Form::open(['class'=>'form-group col-md-7','method' => 'POST','files' => 'true','action'=>['AdministradorController@agregar_noticia']]) !!}
                                <div class="between-form form-group">
                                    <label>Título</label>
                                    {!! Form::text('titulo',null,['class'=>'form-control','ng-model'=>'titulo','placeholder'=>'Titulo de la Noticia']) !!}
                                </div>
                                <div class="between-form form-group">
                                    <label>Link <small>(https://www.hola.com)</small></label>
                                    {!! Form::text('link',null,['class'=>'form-control','ng-model'=>'link','placeholder'=>'Ej. https://www.hola.com']) !!}
                                </div>
                                <div class="between-form form-group">
                                    <label>Imagen <small>(250x300)</small></label>
                                    <!-- <input type="file" id="exampleInputFile" class="custom-file-input"> -->
                                    <input type="file" name="file-1" id="file-1" class="form-control inputfile" data-multiple-caption="{count} files selected" multiple ng-click="click()"/>
                                    <label for="file-1" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                        </svg>
                                        <span>Elige un archivo&hellip;</span>
                                    </label>
                                </div>
                                <div class="between-form form-group">
                                    <label>Texto <small>(<%count()%> caracteres)</small> </label>
                                </div>
                                <div class="form-group between-form text-left">
                                    {!! Form::textarea('text',null,['class'=>'form-control','ng-model'=>'text','placeholder'=>'Descripcion detallada de la noticia']) !!}
                                </div>
                                <div class=" end-form form-group text-right">
                                    {!! Form::submit('Nueva Noticia',['class'=>'btn btn-max-margin']) !!}
                                </div>
                           {!! Form::close() !!} 


                            <div class="center col-md-4">
                              <div class="board-container">
                                <div class="board-flip">
                                  <div class="board-front">
                                    <img id="image-prev" ng-src="<%ima%>" alt="" />
                                  </div>
                                  <div class="board-back">
                                    <div class="board-inner">
                                      <h1><%titulo%></h1>
                                      <p> <%text%> </p>
                                      <a href="<%link%>" target="_blank" ng-show="link">
                                        <i class="icon-link icon-xl"></i>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            
                          </div>

                          <div role="tabpanel" class="tab-pane" id="Recursos">
                            <h3>Recursos</h3>
                            <table class="data-table">
                              <thead>
                                  <th>Nombre</th>
                                  <th>Archivo</th>
                                  <th>Edición</th>
                              </thead>
                              <tbody>
                              @foreach($recursos as $recurso)
                                  <tr>
                                      <td>{{ $recurso->nombre }}</td>
                                      <td>
                                        <a href="#" data-toggle="tooltip">{{ $recurso->url_recurso }}</a>
                                      </td>
                                      <td class="text-center">
                                          <a href="becario-simple.html" data-toggle="tooltip" title="Eliminar">
                                              <i class="icon-circulo_tache icon-l"></i>
                                          </a>
                                       </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                            </table>


                            <h3>Nuevo Recurso</h3>
                             {!! Form::open(['class'=>'form-group col-md-12','method' => 'POST','files' => 'true','action'=>['AdministradorController@agregar_recurso']]) !!}

                                <div class="between-form form-group">
                                    {!! Form::label('nombre','Nombre') !!}
                                    {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre del archivo....']) !!}
                                </div>
                                <div class="between-form form-group">
                                    {!! Form::label('archivo','Archivo') !!}
                                    <!-- <input type="file" id="exampleInputFile" class="custom-file-input"> -->
                                   {!! Form::file('archivo',['class'=>'form-control inputfile','id'=>'archivo']) !!}
                                    <label for="archivo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                    <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                    </svg>
                                    <span>Elige un archivo&hellip;</span>
                                    </label>
                                </div>
                                <div class=" end-form form-group text-right">
                                    {!! Form::submit('Subir Recurso',['class'=>'btn btn-max-margin']) !!}
                                </div>
                            {!! Form::close() !!} 
                          </div>


                          <div role="tabpanel" class="tab-pane" id="Tareas">
                            <h3>Tareas</h3>
                            <table class="data-table">
                              <thead>
                                  <th>Nombre</th>
                                  <th>Descripción</th>
                                  <th>Link</th>
                                  <th>Edición</th>
                              </thead>
                              <tbody>
                              @foreach($labores as $labor)
                                  <tr>
                                      <td>{{ $labor->nombre }}</td>
                                      <td>{{ $labor->descripcion }}</td>
                                      <td>
                                        <a href="#" data-toggle="tooltip">
                                            {{ $labor->link }}
                                        </a>
                                      </td>
                                      <td class="text-center">
                                          <a href="#" data-toggle="tooltip" title="Eliminar">
                                              <i class="icon-circulo_tache icon-l"></i>
                                          </a>
                                       </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                            </table>
                            <h3>Nuevo Recurso</h3>

                            {!! Form::open(['class'=>'form-group col-md-12','method' => 'POST','files' => 'true','action'=>['AdministradorController@agregar_tarea']]) !!}
                                <div class="between-form form-group">
                                    {!! Form::label('nombre','Nombre') !!}
                                    {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre del archivo....']) !!}              
                                </div>
                                <div class="between-form form-group">
                                    {!! Form::label('link','Link') !!}
                                    {!! Form::text('link',null,['class'=>'form-control','placeholder'=>'Url del recurso']) !!}
                                </div>
                                <div class="between-form form-group">
                                    {!! Form::label('descripcion','Descripción') !!}
                                    
                                </div>
                                <div class="between-form form-group">
                                {!! Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Descripción de la tarea....']) !!}
                                </div>

                                <div class=" end-form form-group text-right">
                                    {!! Form::submit('Subir Tarea',['class'=>'btn btn-max-margin']) !!}
                                </div>
                            {!! Form::close() !!} 

                          </div>

                          <div role="tabpanel" class="tab-pane" id="Equipo">
                            <!-- Alta Equipo trigger modal -->
                            <button type="button" class="btn xl-btn" data-toggle="modal" data-target="#AltaEquipo">
                              <i class="icon-circulo_mas icon-l"></i>Añadir Equipo
                            </button>

                            <!-- Alta Equipo Modal -->
                            <div class="modal fade" id="AltaEquipo" tabindex="-1" role="dialog" aria-labelledby="AltaEquipoLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="AltaEquipoLabel">Alta Equipo</h4>
                                  </div>
                                   {!! Form::open(['method' => 'POST','action'=>['AdministradorController@agregar_equipo']]) !!}

                                  <div class="modal-body form-group col-lg-12">
                                        <div class="between-form form-group">
                                        {!! Form::label('equipo','Equipo') !!}
                                        {!! Form::text('equipo',null,['class'=>'form-control','placeholder'=>'Nombre del equipo']) !!}
                                        </div>
                                        <div class="between-form form-group">
                                        {!! Form::label('serie','Número de Serie') !!}
                                        {!! Form::text('serie',null,['class'=>'form-control','placeholder'=>'Número de serie del equipo....']) !!}
                                        </div>
                                        <div class="between-form form-group">
                                          {!! Form::label('ano','Año') !!}
                                        {!! Form::text('ano',null,['class'=>'form-control','placeholder'=>'Año del equipo']) !!}
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                     {!! Form::submit('Alta Equipo',['class'=>'btn btn-primary']) !!}
                                  </div>
                                  {!! Form::close() !!} 
                                </div>
                              </div>
                            </div>

                            <table id="fresh-table" class="table table-hover">
                              <thead>
                                  <th data-field="Equipo" data-sortable="true">Equipo</th>
                                  <th data-field="No. Serie" data-sortable="true">No. Serie</th>
                                  <th data-field="Año" data-sortable="true">Año</th>
                                  <th data-field="Asignado" data-sortable="true">Asignado</th>
                                  <th>Edición</th>
                              </thead>
                              <tbody>
                              @foreach($equipos as $equipo)
                                  <tr>
                                      <td>{{ $equipo->equipo }}</td>
                                      <td>{{ $equipo->serie }}</td>
                                      <td>{{ $equipo->ano }}</td>
                                      <td>
                                        <a href="#">
                                            Miguel Ruiz
                                        </a>
                                      </td>
                                      <td class="text-center">
                                          <a href="becario-simple.html" data-toggle="tooltip" title="Eliminar">
                                              <i class="icon-circulo_tache icon-l"></i>
                                          </a>
                                       </td>
                                  </tr>
                              @endforeach
                              </tbody>
                            </table>

                          </div>


                        </div>
                    </section>

                </div><!-- General User data -->

            <!-- END Generl  -->

@endsection


@section('js')

<!-- Custom file input js -->
<script src="/front/js/custom-file-input.js"></script>
<!-- Angular js -->
    <script src="/front/js/angular.min.js"></script>
    <!-- Preview js -->
    <script src="/front/js/preview.js"></script>
 <!-- Table script -->
    <script type="text/javascript">
        var $table = $('#fresh-table'),
            full_screen = false;

        $().ready(function(){
            $table.bootstrapTable({
                toolbar: ".toolbar",
                showRefresh: false,
                search: true,
                showToggle: false,
                showColumns: false,
                pagination: true,
                striped: true,
                pageSize: 5,
                pageList: [5,10,25,50,100],
                formatSearch: function(){
                    return "Buscar";
                },
                formatShowingRows: function(pageFrom, pageTo, totalRows){
                    return "Total de Tareas de este evaluacion " + totalRows
                },
                formatRecordsPerPage: function(pageNumber){
                    return pageNumber + " filas visibles";
                }
            });
        });
    </script>
@endsection
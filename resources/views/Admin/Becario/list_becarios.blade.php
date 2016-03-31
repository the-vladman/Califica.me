@extends('admin ')

@section('becarios')

<section class="row">
<div class="general-info col-lg-8 col-lg-offset-2">
                    <h3>Directorio Becarios</h3>
 
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


                                <h4 class="modal-title" id="AltaModalLabel">Alta Becario</h4>
                              </div>
                              {!! Form::open(['method' => 'POST','action'=>['AdministradorController@alta_becario']]) !!}

                              <div class="modal-body form-group col-lg-12">
                                    <div class="between-form form-group">
                                        {!! Form::label('Nombre', 'Nombre(s)') !!}
                                        {!! Form::text('nombres',null,['class'=>'form-control','placeholder'=>'Nombre del proyecto']) !!}
                                    </div>
                                    <div class="between-form form-group">
                                        {!! Form::label('apellido_p', 'Apellido Paterno') !!}
                                        {!! Form::text('apellido_p',null,['class'=>'form-control','placeholder'=>'Apellido Paterno']) !!}
                                    </div>
                                    <div class="between-form form-group">
                                        {!! Form::label('apellido_m', 'Apellido Materno') !!}
                                        {!! Form::text('apellido_m',null,['class'=>'form-control','placeholder'=>'Apellido Materno']) !!}
                                    </div>

                                    <div class="between-form form-group">
                                        {!! Form::label('carso', 'Número Tarjeta CARSO') !!}
                                        {!! Form::text('carso',null,['class'=>'form-control','placeholder'=>'Número Tarjeta CARSO']) !!}
                                    </div>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                                {!! Form::submit('Alta Becario',['class'=>'btn btn-primary']) !!}
                              </div>

                              {!! Form::close() !!}
                            </div>

                          </div>
                        </div>

                        <!-- Baja Becario trigger modal -->
                        <button type="button" class="btn xl-btn" data-toggle="modal" data-target="#BajaModal">
                          <i class="icon-circulo_tache icon-l"></i>   Baja
                        </button>

                        <!-- Baja becario Modal -->
                        <div class="modal fade" id="BajaModal" tabindex="-1" role="dialog" aria-labelledby="BajaModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="BajaModalLabel">Baja Becario</h4>
                              </div>

                              {!! Form::open(['method' => 'PUT','action'=>['AdministradorController@baja_becario']]) !!}


                             <div class="between-form form-group">
                                        {!! Form::label('carso', 'Número de Identificación del becario (ID CARSO)') !!}
                                        {!! Form::text('carso',null,['class'=>'form-control','placeholder'=>'Número Tarjeta CARSO']) !!}
                                    </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                {!! Form::submit('Baja Becario',['class'=>'btn btn-primary']) !!}
                              </div>

                              {!! Form::close() !!}
                            </div>
                          </div>
                        </div>


                        
                    </section>





                    <table id="fresh-table" class="table table-hover">
                                <thead>
                                    <th>Perfil</th>
                                    <th data-field="ID Becario" data-sortable="true">ID Becario</th>
                                    <th data-field="nombre" data-sortable="true">Nombre</th>
                                    <th data-field="area" data-sortable="true">Area</th>
                                    <th data-field="carrera" data-sortable="true">Activo</th>
                                    <th data-field="e-mail" data-sortable="true">%</th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    @if($user->rol == 'becario')
                                    <tr>
                                        <td>
                                            <a href="/admin/becarios/{{ $user->becario->id }}"> 
                                                <i class="icon-user icon-l"></i>
                                            </a>
                                        </td>
                                        <td>{{ $user->carso }}</td>
                                        <td>{{ $user->becario->nombres }}</td>
                                        <td>{{ $user->becario->area }}</td>
                                        @if($user->activo)
                                        <td>si</td>
                                        @else
                                        <td>no</td>
                                        @endif
                                         <td>{{ $user->becario->email }}</td>
                                        
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                    </table>
                </div><!-- General User data -->
            </section>

@stop

@section('js')
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
                pageSize: 8,
                pageList: [8,10,25,50,100],
                formatSearch: function(){
                    return "Buscar";
                },
                formatShowingRows: function(pageFrom, pageTo, totalRows){
                    return "Total de becarios " + totalRows
                },
                formatRecordsPerPage: function(pageNumber){
                    return pageNumber + " filas visibles";
                }
            });
        });     
    </script>
@stop
@extends('admin')

@section('becarios')

                <!-- General User data -->
                <div class="general-info col-sm-10 col-sm-offset-1">

                     <section class=" info-header row between-form">
                        <div class="col-md-5 img-general-link">
                            <div class="img-container-l">
                                <img class=" " src="/CTIN/becarios/{{ $becario->url_img }}">
                                <a href="/admin/becarios/{{$becario->id}}/editar"><span class="icon-engranes"></span></a>
                            </div>
                            <fieldset class="rating" data-rate ="3"></fieldset>
                        </div>
                        <div class="col-md-6 ">
                            <h3>{{ $becario->nombres}} {{ $becario->apellido_p}} {{ $becario->apellido_m}}</h3>
                            <div class="col-lg-12 principal-info inline-form">
                                <a><i class="icon-sobre icon-l"></i>{{ $becario->email }}</a>
                                <a><i class="icon-d_proyectos icon-l"></i>{{ $becario->area }}</a>
                                <!------- impe,mentar -->
                                <a><i class="icon-reloj icon-l"></i> 8 meses 15 dias</a>

                            </div>
                            <p><b>Habilidades: </b>{{ $becario->habilidades->habilidad }} ...</p>
                        </div>
                    </section>

                    <section class="center">
                         <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#General" aria-controls="General" role="tab" data-toggle="tab">General</a></li>
                            <li role="presentation"><a href="#Contacto" aria-controls="Contacto" role="tab" data-toggle="tab">Contacto</a></li>
                            <li role="presentation"><a href="#Formación" aria-controls="Formación" role="tab" data-toggle="tab">Formación</a></li>
                            <li role="presentation"><a href="#Metricas" aria-controls="Metricas" role="tab" data-toggle="tab">Metricas</a></li>
                            <li role="presentation"><a href="#Equipo" aria-controls="Equipo" role="tab" data-toggle="tab">Equipo</a></li>
                        </ul>

                         <!-- Tab panes -->
                        <div class="tab-content col-sm-12 ">

                        <div role="tabpanel center" class="tab-pane active" id="General">
                                  <table class="data-table">
                                    <tbody>
                                        <tr>
                                          <td>Genero</td>
                                          <td>{{ $becario->genero }}</td>
                                        </tr>
                                        <tr>
                                          <td>No. Becario</td>
                                          <td>{{ $becario->user->carso}}</td>
                                        </tr>
                                        <tr>
                                          <td>Tarjeta Inbursa</td>
                                          <td>{{ $becario->inbursa }}</td>
                                        </tr>
                                        <tr>
                                          <td>Examen Propedeutico</td>
                                          <td>No se los parametros que aqui</td>
                                        </tr>
                                        <tr>
                                          <td>Fecha de Inicio</td>
                                          <td>{{ $becario->fecha_ingreso }}</td>
                                        </tr>
                                        <tr>
                                          <td>Fecha de Terminio</td>
                                          <td>-- / -- / --</td>
                                        </tr>
                                        <tr>
                                          <td>Status</td>
                                          @if($becario->user->activo)
                                        <td>activo</td>
                                        @else
                                        <td>inactivo</td>
                                        @endif    
                                        </tr>
                                    </tbody>
                                  </table>
                                </div>




                                <div role="tabpanel center" class="tab-pane" id="Contacto">
                                  <table class="data-table">
                                    <tbody>
                                        <tr>
                                          <td>Calle</td>
                                          <td>{{ $becario->direccion->calle }}</td>
                                        </tr>
                                        <tr>
                                          <td>Numero</td>
                                          <td>{{ $becario->direccion->numero }}</td>
                                        </tr>
                                        <tr>
                                          <td>Colonia</td>
                                          <td>falta</td>
                                        </tr>
                                        <tr>
                                          <td>Municipio o Delegación</td>
                                          <td>{{ $becario->direccion->delegacion }}</td>
                                        </tr>
                                        <tr>
                                          <td>Estado</td>
                                          <td>{{ $becario->direccion->estado }}</td>
                                        </tr>
                                        <tr>
                                          <td>Teléfono</td>
                                          <td>{{ $becario->telefono }}</td>
                                        </tr>
                                        <tr>
                                          <td>Contacto de Emergencia</td>
                                          <td>{{ $becario->emergencia->nombre }} {{ $becario->emergencia->apellido_p }} {{ $becario->emergencia->apellido_m }}</td>
                                        </tr>
                                        <tr>
                                          <td>Telefono Emergencia</td>
                                          <td>{{ $becario->emergencia->telefono }}</td>
                                        </tr>
                                        <tr>
                                          <td>Tipo de Sangre</td>
                                          <td>{{ $becario->sangre }}</td>
                                        </tr>
                                    </tbody>
                                  </table>
                                </div>



                                <div role="tabpanel" class="tab-pane" id="Formación">
                                    <table class="data-table">
                                      <tbody>
                                        <tr>
                                            <td>Universidad</td>
                                            <td>{{ $becario->academicas->universidad }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tipo de Universidad</td>
                                            <td>{{ $becario->academicas->tipo }}</td>
                                        </tr>
                                        <tr>
                                            <td>Carrera</td>
                                            <td>{{ $becario->academicas->carrera }}</td>
                                        </tr>
                                       <tr>
                                            <td>Status</td>
                                            <td>{{ $becario->academicas->status }}</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                </div>
                                

                                <div role="tabpanel" class="tab-pane" id="Metricas">
                                    <div class="metrics-box">
                                        <div class="metrics">
                                            <div class="data">
                                                <span class="counter">36</span><b>hrs</b>
                                            </div>
                                            <h5>Asistencia</h5>
                                        </div>
                                        <div class="metrics">
                                            <div class="data">
                                                <span class="counter">30</span><b>hrs</b>
                                            </div>
                                            <h5>Total de Tareas</h5>
                                        </div>
                                        <div class="metrics">
                                            <div class="data">
                                                <span class="counter">85</span><b>pts</b>
                                            </div>
                                            <h5>Evaluación</h5>
                                        </div>
                                        <div class="metrics">
                                            <div class="data">
                                                <span class="counter">75.6</span><b>%</b>
                                            </div>
                                            <h5>Eficiencia</h5>
                                        </div>
                                    </div>

                                    <table class=" table table-hover col-xs-12 metrics-table" >
                                        <thead>
                                            <tr>
                                                <th>Constancia</th>
                                                <th>Puntualidad</th>
                                                <th>Colaboración</th>
                                                <th>Proactividad</th>
                                                <th>Enseñanza</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="counter">{{ $activa->constancia }}</td>
                                                <td class="counter">{{ $activa->puntualidad }}</td>
                                                <td class="counter">{{ $activa->colaboracion }}</td>
                                                <td class="counter">{{ $activa->proactividad }}</td>
                                                <td class="counter">{{ $activa->ensenanza }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table id="fresh-table" class="table table-hover">
                                                <thead>
                                                    <th data-field="Tareas" data-sortable="true">Tarea</th>
                                                    <th data-field="Proyecto" data-sortable="true">Proyecto</th>
                                                    <th data-field="Tiempo" data-sortable="true">Tiempo</th>
                                                    <th data-field="Descripcion" data-sortable="true">Descripción</th>
                                                </thead>
                                                <tbody>
                                                @foreach($activa->tareas as $tarea)
                                                    <tr>
                                                        <td>{{ $tarea->tarea }}</td>
                                                        <td>{{ $tarea->proyecto }}</td>
                                                        <td>{{ $tarea->horas }}</td>
                                                        <td>{{ $tarea->descripcion }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                    </table>


                                </div>



                                <div role="tabpanel center" class="tab-pane" id="Equipo">
                                  <!-- Asignar Equipo trigger modal -->
                                  <button type="button" class="btn xl-btn" data-toggle="modal" data-target="#Asignar">
                                    <i class="icon-circulo_mas icon-l"></i>Asignar Equipo
                                  </button>

                                  <!-- Asignar Equipo Modal -->
                                  <div class="modal fade" id="Asignar" tabindex="-1" role="dialog" aria-labelledby="AsignarLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <h4 class="modal-title" id="AsignarLabel">Asignar Equipo</h4>
                                        </div>
                                        <div class="modal-body form-group col-lg-12">
                                              <div class="between-form form-group">
                                                  <label>No. Serie</label>
                                                  <input type="text" class="form-control"  placeholder="No. Serie...">
                                              </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                          <button type="button" class="btn btn-primary">Crear</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                    <table class="data-table">
                                      <thead>
                                          <th>Equipo</th>
                                          <th>No. Serie</th>
                                          <th>Edición</th>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td>Mac BookPro 13"</td>
                                              <td>12h3jhvv123</td>
                                              <td class="text-center">
                                                  <a href="becario-simple.html" data-toggle="tooltip" title="Eliminar">
                                                      <i class="icon-circulo_tache icon-l"></i>
                                                  </a>
                                               </td>
                                          </tr>
                                          <tr>
                                              <td>Memoria RAM 4GB"</td>
                                              <td>12h3jhvv123</td>
                                              <td class="text-center">
                                                  <a href="becario-simple.html" data-toggle="tooltip" title="Eliminar">
                                                      <i class="icon-circulo_tache icon-l"></i>
                                                  </a>
                                               </td>
                                          </tr>
                                      </tbody>
                                    </table>
                                </div>


                         </div>
                    </section>


                    <section class=" row">
                        <h3>Proyectos</h3>
                        <div class="col-lg-12 center-around">
                        @foreach($becario->proyectos as $proyecto)
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
@endsection


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
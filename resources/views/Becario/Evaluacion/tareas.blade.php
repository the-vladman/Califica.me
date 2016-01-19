@extends('becario')

@section('evaluaciones')

@if($activa)

@if ($errors->any())
  <ul class="alert alert-damage">
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </u>
@endif
<!-- General User data -->
                <div class="general-info col-sm-8  col-sm-offset-2">

                    <h3>Evaluación personal</h3>

                    {!! Form::open(['class'=>'col-lg-12 text-right','method' => 'POST','action'=>['BecarioController@subir_tarea']]) !!}

                    {!! Form::hidden('evaluacion_id',$activa->id) !!}

                <div class="center-between">
                    <div class="form-group col-lg-4">
                                {!! Form::text('tarea',null,['class'=>'form-control','placeholder'=>'NOMBRE DE LA TAREA']) !!}
                    </div>

                    <div class="form-group col-lg-4">
                         <select class="form-control" name="tipo" id="tipo">
                            <option disabled selected> Tipo...</option>
                            <option >oficial</option>
                            <option >apoyo</option>
                             </select>

                    </div>
<!---
                     <div class="form-group col-lg-4">
                            <div id="other">
                                Proyecto
                            </div>
                      </div>
    -->      
           
                    <div class="form-group col-lg-4">
                        <select class="form-control" name="proyecto" id="other">
                            <option disabled selected> PROYECTO...</option>
                            @foreach($activa->becario->proyectos as $proyecto)
                            <option >{{ $proyecto->nombre }}</option>
                            @endforeach
                        </select>

                 </div>

                 </div>

                 <div class="form-group center">
                 {!! Form::select('horas',array('00' => '00','01' => '01','02' => '02','03' => '03','04' => '04','05' => '05','06' => '06','07' => '07','08' => '08','09' => '09','10' => '10','11' => '11','12' => '12'),null,['class'=>'form-control hrs']) !!}                    
                 <div class="blank">:</div>
                 {!! Form::select('minutos',array('00' => '00','05' => '05','10' => '10','15' => '15','20' => '20','25' => '25','30' => '30','35' => '35','40' => '40','45' => '45','50' => '50','55' => '55'),null,['class'=>'form-control hrs']) !!}                      

                 {!! Form::label('HRS', 'HRS') !!}
                            </div>

                <div class="form-group col-lg-12 full-form">
                 {!! Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'DESCRIPCIÓN....']) !!}
                </div>

                {!! Form::submit('Añadir Tarea',['class'=>'btn btn-max-margin']) !!}


               {!! Form::close() !!}


                    <h4>Tareas Realizadas</h4>

                    <table id="fresh-table" class="table table-hover">
                                <thead>
                                    <th data-field="Tarea" data-sortable="true">Tarea</th>
                                    <th data-field="Tiempo" data-sortable="true">Tiempo</th>
                                    <th data-field="Proyecto" data-sortable="true">Proyecto</th>
                                    <th data-field="Tipo" data-sortable="true">Tipo</th>
                                    <th data-field="edicion">Edición</th>
                                </thead>
                                <tbody>
                                @foreach($activa->tareas as $tarea)
                                    <tr>
                                        <td>{{ $tarea->tarea }}</td>
                                        <td>{{ $tarea->horas }}</td>
                                        <td>{{ $tarea->proyecto }}</td>
                                        <td>{{ $tarea->tipo }}</td>
                                        <td class="text-center">
                                            <a href="becario-simple.html" data-toggle="tooltip"  title="Editar"> 
                                                <i class="icon-circulo_editar icon-l"></i>
                                            </a>
                                            <a href="becario-simple.html" data-toggle="tooltip" title="Eliminar"> 
                                                <i class="icon-circulo_tache icon-l"></i>
                                            </a>
                                         </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                    </table>
  
                </div><!-- General User data -->
                
            <!-- END Generl  -->

@endif

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
                search: false,
                showToggle: false,
                showColumns: false,
                pagination: false,
                striped: false
            });
        }); 
    </script>
@endsection


@section('select')
<!-- Table script -->
<script type="text/javascript">

        $( "#tipo" ).change(function () {
            var tipo = $( "#tipo" );
            if (tipo.val() == 'apoyo') {
                $( "#other" ).replaceWith( '<input type="text" class="form-control"  name="proyecto" id="other" placeholder="APOYO">' );
            }
            else if (tipo.val() == 'oficial') {
                $( "#other" ).replaceWith( '<select class="form-control" name="proyecto" id="other">'+
                    '<option disabled selected> PROYECTO...</option>'+
                    '@foreach($activa->becario->proyectos as $proyecto)'+
                            '<option >{{ $proyecto->nombre }}</option>'+
                            '@endforeach'+     
                    '</select>' );
            };
        });     
    </script>
@endsection
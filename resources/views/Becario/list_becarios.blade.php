@extends('becario')

@section('becarios')

<section class="row">
<div class="general-info col-lg-8 col-lg-offset-2">
                    <h3>Directorio Becarios</h3>
 
                    <table id="fresh-table" class="table table-hover">
                                <thead>
                                    <th>Perfil</th>
                                    <th data-field="ID Becario" data-sortable="true">ID Becario</th>
                                    <th data-field="nombre" data-sortable="true">Nombre</th>
                                    <th data-field="area" data-sortable="true">Area</th>
                                    <th data-field="carrera" data-sortable="true">Activo</th>
                                    <th data-field="e-mail" data-sortable="true">E-mail</th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <a href="/becario/lista/{{ $user->id }}"> 
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
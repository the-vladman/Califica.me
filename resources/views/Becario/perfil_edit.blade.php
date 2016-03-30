@extends('becario')

@section('perfil')
<!-- General User data -->
@if ($errors->any())
  <ul class="alert alert-damage">
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </u>
@endif
                <div class="general-info col-sm-10  col-sm-offset-1">
                    <h3>Información Personal</h3>

                    <section class="row">
                                   <!-- Form -->
                {!! Form::model($becario,['class'=>'form-group col-lg-12','method' => 'PATCH','files' => 'true','action'=>['BecarioController@edit_n']]) !!}
                <h4>Datos Personales</h4>
                <div class="between-form form-group">
                {!! Form::hidden('id_becario',$becario->id) !!}
                {!! Form::label('nombres', 'Nombre(s)') !!}
                {!! Form::text('nombres',null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('apellido_p', 'Apellido Paterno') !!}
                {!! Form::text('apellido_p',null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('apellido_m', 'Apellido Materno') !!}
                {!! Form::text('apellido_m',null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('telefono', 'Teléfono') !!}
                {!! Form::text('telefono',null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email',null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('sangre', 'Tipo de Sangre') !!}
                {!! Form::text('sangre',null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('genero', 'Genero') !!}
                {!! Form::select('genero',array('genero' => ' ','masculino' => 'masculino', 'femenino' => 'femenino'),null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('area', 'Área') !!}
                {!! Form::select('area',array('area' => ' ','software' => 'software', 'hardware' => 'hardware','diseño' => 'diseño','social' => 'social'),null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('descripcion', 'Descripción') !!}
                {!! Form::textarea('descripcion',null,['class'=>'form-control']) !!}
                </div>

                 <div class="between-form form-group">
                {!! Form::label('imagen', 'Imágen de Perfil') !!}
                {!! Form::file('imagen',['class'=>'form-control']) !!}
                </div>

                <div class="end-form form-group text-right">
                {!! Form::submit('Guardar Cambios',['class'=>'btn btn']) !!}
                </div>

               {!! Form::close() !!}
                        
                    </section>


                    <section class="row">
                        {!! Form::model($becario,['class'=>'form-group col-lg-12','method' => 'PATCH','action'=>['BecarioController@edit_p']]) !!}
                            <h4>Contraseña</h4>
                            <div class="between-form form-group">
                                {!! Form::hidden('usuario',$user->id) !!}
                                {!! Form::label('password', 'Nueva Contrasñea') !!}
                                {!! Form::text('password',null,['class'=>'form-control']) !!}
                            </div>
                            <div class=" end-form form-group text-right">
                                
                {!! Form::submit('Actualizar Contraseña',['class'=>'btn btn']) !!}
                            </div>
                        </form>
                    </section>


                    <section class="row">
                    <!-- Form -->
                {!! Form::model($direccion,['class'=>'form-group col-lg-12','method' => 'PATCH','action'=>['BecarioController@edit_d']]) !!}
                <h4>Dirección</h4>
                <div class="between-form form-group">
                {!! Form::hidden('id_direccion',$direccion->id) !!}
                {!! Form::label('calle', 'Calle') !!}
                {!! Form::text('calle',null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('numero', 'Número') !!}
                {!! Form::text('numero',null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('CP', 'Codigo Postal') !!}
                {!! Form::text('CP',null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('delegacion', 'Delegación/Municipio') !!}
                {!! Form::text('delegacion',null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('estado', 'Estado') !!}
                {!! Form::text('estado',null,['class'=>'form-control']) !!}
                </div>

                <div class="end-form form-group text-right">
                {!! Form::submit('Guardar Cambios',['class'=>'btn btn']) !!}
                </div>

               {!! Form::close() !!}

               <!-- Form -->
                {!! Form::model($emergencia,['class'=>'form-group col-lg-12','method' => 'PATCH','action'=>['BecarioController@edit_e']]) !!}
                <h5>En caso de emergencia, podemos comunicarnos con:</h5>
                <div class="between-form form-group">
                {!! Form::hidden('id_emergencia',$emergencia->id) !!}
                {!! Form::label('nombre', 'Nombre(s)') !!}
                {!! Form::text('nombre',null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('apellido_p', 'Apellido Paterno') !!}
                {!! Form::text('apellido_p',null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('apellido_m', 'Apellido Materno') !!}
                {!! Form::text('apellido_m',null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('telefono', 'Teléfono') !!}
                {!! Form::text('telefono',null,['class'=>'form-control']) !!}
                </div>

                <div class="end-form form-group text-right">
                {!! Form::submit('Guardar Cambios',['class'=>'btn btn']) !!}
                </div>

               {!! Form::close() !!}

                    </section>
                    <section class="row">

                {!! Form::model($academica,['class'=>'form-group col-lg-12','method' => 'PATCH','action'=>['BecarioController@edit_a']]) !!}
                <h4>Formación Academica</h4>
                <div class="between-form form-group">
                {!! Form::hidden('id_academica',$academica->id) !!}
                {!! Form::label('universidad', 'Universidad') !!}
                {!! Form::text('universidad',null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('carrera', 'Carrera') !!}
                {!! Form::text('carrera',null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('tipo', 'Tipo') !!}
                {!! Form::select('tipo',array('tipo' => ' ','Pública' => 'Pública', 'Privada' => 'Privada'),null,['class'=>'form-control']) !!}
                </div>

                <div class="between-form form-group">
                {!! Form::label('status', 'Status') !!}
                {!! Form::select('status',array('status' => ' ','Estudiando' => 'Estudiando', 'Título en proceso' => 'Título en proceso','Terminado' => 'Terminado'),null,['class'=>'form-control']) !!}
                </div>

                <div class="end-form form-group text-right">
                {!! Form::submit('Guardar Cambios',['class'=>'btn btn']) !!}
                </div>

               {!! Form::close() !!}
                

                {!! Form::model($habilidad,['class'=>'form-group col-lg-12','method' => 'PATCH','action'=>['BecarioController@edit_h']]) !!}
                <h5>Habilidades:</h5>

                <div class="between-form form-group">
                {!! Form::hidden('id_habilidad',$habilidad->id) !!}
                </div>
                
                 <div class="form-group between-form text-left">
                    {!! Form::textarea('habilidad',null,['class'=>'form-control']) !!}
                 </div

                <div class="end-form form-group text-right">
                {!! Form::submit('Guardar Cambios',['class'=>'btn btn']) !!}
                </div>

               {!! Form::close() !!}

                    </section>
                    
                                       
                </div><!-- General User data -->
                
            <!-- END Generl  -->

        </div>
        <!-- END General Container -->
@endsection
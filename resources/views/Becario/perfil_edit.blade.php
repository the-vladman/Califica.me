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
                {!! Form::label('imagen','Imagen de Perfil') !!}
                {!! Form::file('imagen',['class'=>'form-control inputfile','id'=>'imagen']) !!}
                <label for="imagen">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                </svg>
                <span>Elige un archivo&hellip;</span>
                </label>
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
@extends('becario')

@section('perfil')
 <!-- General User data -->
                <div class="general-info col-sm-10 col-sm-offset-1">

                    <section class=" info-header row between-form">
                        <div class="col-md-4 img-general-link">
                            <div class="img-container-l">
                                <img class=" " src="/CTIN/becarios/{{ $becario->url_img }}">
                                <a href="{{ url('/becario/perfil/edit') }}"><span class="icon-engranes"></span></a>
                            </div>
                            <fieldset class="rating" data-rate ="3"></fieldset>
                        </div>
                        <div class="col-md-7 ">
                            <h3>{{ $becario->nombres}} {{ $becario->apellido_p}} {{ $becario->apellido_m}}</h3>
                            @foreach($becario->academicas as $escuela)
                            <p><b>Carrera: </b>{{ $escuela->carrera}}</p> 
                            <p><b>Universidad: </b>{{ $escuela->universidad}}</p>
                            @endforeach 
                            <p><b>Habilidades: </b>
                            {{ $becario->habilidades->habilidad}}
                            ...</p>
                        </div>
                    </section>

                    <section class="row">
                            <h4>Desempeño</h4>
                            <div class="metrics-box">
                                <div class="metrics">
                                    <div class="data">
                                        <span class="counter">36</span><b>hrs</b>
                                    </div>
                                    <h5>Asistencia</h5>
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
                                        <td class="counter">86</td>
                                        <td class="counter">50</td>
                                        <td class="counter">78</td>
                                        <td class="counter">89</td>
                                        <td class="counter">61</td>
                                    </tr>
                                </tbody>
                            </table>
                    </section>

                    <section class=" row">
                        <h4>Mis Proyectos</h4>
                        <div class="col-lg-12 center-around">

                            <div class="img-general-link">
                                <div class="img-container-s  progress-0">
                                    <img class=" " src="/front/img/project.png">
                                    <a href="p-settings.html"><span class="icon-d_proyectos"></span></a>
                                </div>
                                <h5> <small>CTIN</small> </h5>
                                <h5>Apuntate</h5>
                            </div>
                            <div class="img-general-link">
                                <div class="img-container-s  progress-30">
                                    <img class=" " src="/front/img/project.png">
                                    <a href="p-settings.html"><span class="icon-d_proyectos"></span></a>
                                </div>
                                <h5> <small>CTIN</small> </h5>
                                <h5>Apuntate</h5>
                            </div>
                            <div class="img-general-link">
                                <div class="img-container-s  progress-60">
                                    <img class=" " src="/front/img/project.png">
                                    <a href="p-settings.html"><span class="icon-d_proyectos"></span></a>
                                </div>
                                <h5> <small>CTIN</small> </h5>
                                <h5>Apuntate</h5>
                            </div>
                            <div class="img-general-link">
                                <div class="img-container-s  progress-100">
                                    <img class=" " src="/front/img/project.png">
                                    <a href="p-settings.html"><span class="icon-d_proyectos"></span></a>
                                </div>
                                <h5> <small>CTIN</small> </h5>
                                <h5>Apuntate</h5>
                            </div>   
                            
                        </div>
                    </section>
                </div><!-- General User data -->
                
            <!-- END Generl  -->
@endsection
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
                                        <h5><small>{{ $integrante->area }}</small></h5>
                                        <h5>{{ $integrante->nombres }} {{ $integrante->apellido_p }} {{ $integrante->apellido_m }}</h5>
                                        <h5><small>{{ $integrante->area }}</small></h5>
                                        <fieldset class="rating" data-rate ="6"></fieldset>  
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </section>

                    <section class="row">
                        <form class="text-center">
                            <div class="form-group text-left">
                                <label>¿El becario entrega sus tareas con la calidad esperada dentro del proyecto?</label>
                                <div class="radio">
                                  <label>De acuerdo</label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions11" id="inlineRadio1" value="1">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions11" id="inlineRadio2" value="2">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions11" id="inlineRadio3" value="3">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions11" id="inlineRadio4" value="4">
                                    </label>
                                             <label class="">
                                      <input type="radio" name="inlineRadioOptions11" id="inlineRadio5" value="5">
                                    </label>
                                  <label>Desacuerdo</label>
                                </div>
                            </div>
                            <div class="form-group text-left">
                                <label>¿El becario entrega sus tareas en tiempo?</label>
                                <div class="radio">
                                  <label>De acuerdo</label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                                    </label>
                                             <label class="">
                                      <input type="radio" name="inlineRadioOptions" id="inlineRadio5" value="5">
                                    </label>
                                  <label>Desacuerdo</label>
                                </div>
                            </div>
                            <div class="form-group text-left">
                                <label>¿El becario aporta ideas o soluciones que son de utilidad para el proyecto?</label>
                                <div class="radio">
                                  <label>De acuerdo</label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions2" id="inlineRadio1" value="1">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions2" id="inlineRadio2" value="2">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions2" id="inlineRadio3" value="3">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions2" id="inlineRadio4" value="4">
                                    </label>
                                             <label class="">
                                      <input type="radio" name="inlineRadioOptions2" id="inlineRadio5" value="5">
                                    </label>
                                  <label>Desacuerdo</label>
                                </div>
                            </div>
                            <div class="form-group text-left">
                                <label>¿Toma en cuenta las ideas de los demás, trata de forma respetuosa a sus compañeros y se adapta a las capacidades del equipo?</label>
                                <div class="radio">
                                  <label>De acuerdo</label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions3" id="inlineRadio1" value="1">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions3" id="inlineRadio2" value="2">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions3" id="inlineRadio3" value="3">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions3" id="inlineRadio4" value="4">
                                    </label>
                                             <label class="">
                                      <input type="radio" name="inlineRadioOptions3" id="inlineRadio5" value="5">
                                    </label>
                                  <label>Desacuerdo</label>
                                </div>
                            </div>
                            <div class="form-group text-left">
                                <label>¿El becario apoya a sus compañeros explicando y enseñando a otros integrantes del equipo tareas que son de utilidad para el proyecto?</label>
                                <div class="radio">
                                  <label>De acuerdo</label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions4" id="inlineRadio1" value="1">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions4" id="inlineRadio2" value="2">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions4" id="inlineRadio3" value="3">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions4" id="inlineRadio4" value="4">
                                    </label>
                                             <label class="">
                                      <input type="radio" name="inlineRadioOptions4" id="inlineRadio5" value="5">
                                    </label>
                                  <label>Desacuerdo</label>
                                </div>
                            </div>

                            <div class="form-group text-left">
                                <label>¿Recomendarias a este becario para trabajar con el en proyectos futuros?</label>
                                <div class="radio">
                                  <label>De acuerdo</label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions4" id="inlineRadio1" value="1">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions4" id="inlineRadio2" value="2">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions4" id="inlineRadio3" value="3">
                                    </label>
                                    <label class="">
                                      <input type="radio" name="inlineRadioOptions4" id="inlineRadio4" value="4">
                                    </label>
                                             <label class="">
                                      <input type="radio" name="inlineRadioOptions4" id="inlineRadio5" value="5">
                                    </label>
                                  <label>Desacuerdo</label>
                                </div>
                            </div>

                            <div class="form-group col-lg-12 text-left">   
                                <label>Añade un comentario</label>
                                <textarea class="form-control" placeholder="Comentario..."></textarea>
                            </div>
                            <div class="form-group col-lg-12 ">
                                <button class="btn btn-xl">Anterior</button>
                                <button class="btn btn-xl">Sigiente</button>
                            </div>
                        </form>
                    </section>

                   
                </div><!-- General User data -->
                
            <!-- END Generl  -->
@endsection
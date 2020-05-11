@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
<section class="content-header">
    <h2>
        Jovem+
    </h2>
</section>
@stop
@section('content')
<div class="row">
 <div class="col-md-12">
     <div class="box">
       <div class="box-header with-border">
<div class="tab-pane active" id="timeline">
    <ul class="timeline timeline-inverse">
      <li class="time-label">
            <span class="bg-red">
                {{ date('d-m') }}
            </span>
      </li>
      <li>
        <i class="fa fa-envelope bg-blue"></i>
        <div class="timeline-item">
          <span class="time"><i class="fa fa-clock-o"></i> {{ date('H:i:s') }} </span>
          <h3 class="timeline-header"><a href="#">Caixa de avisos </a> </h3>
          <div class="timeline-body">
            Não há novidades
          </div>
        </div>
      </li>
      <!-- END timeline item -->
      <!-- timeline time label -->
      <li class="time-label">
            <span class="bg-green">
                {{ date('d-m') }}
            </span>
      </li>
      <!-- /.timeline-label -->
      <!-- timeline item -->
      <li>
        <i class="fa fa-camera bg-yellow"></i>

        <div class="timeline-item">
          <span class="time"><i class="fa fa-clock-o"></i> {{ date('H:i:s') }}</span>

          <h3 class="timeline-header"><a href="#">Atividades</a>  
            <div class="timeline-body">
            Não há novidades
          </div>
         <!-- <div class="timeline-body">
            <img src="\imagem\aprendiz.jpg " alt="..." class="margin">
            <img src="\imagem\aprendiz.jpg " alt="..." class="margin">
            <img src="\imagem\aprendiz.jpg " alt="..." class="margin">
            <img src="\imagem\aprendiz.jpg " alt="..." class="margin">
          </div>-->
        </div>
    </li>
    </ul>
  </div>
@stop
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
<br>

</section>

<div class="row">
    <div class="col-md-3">
        <div class="small-box bg-blue">
            <div class="inner">
                @foreach ($sobre as $programa)
                <h3>R${{$programa->valor}}<sup style="font-size: 20px"></sup></h3>
                <p>Em beneficios aos jovens</p>
            </div>
            @endforeach
            <div class="icon">
                <i class="fas fa-wallet" style="font-size:38px"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-green">
            <div class="inner">
                @foreach ($sobre as $programa)
                <h3>+{{$programa->aulas}}<sup style="font-size: 20px"></sup></h3>
                <p>Aulas ministradas</p>
            </div>
            @endforeach
            <div class="icon">
                <i class="fas fa-calendar-check" style="font-size:38px"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-yellow">
            <div class="inner">
                @foreach ($sobre as $programa)
                <h3>+{{$programa->jovens}}</h3>
                <p>Jovens assistidos </p>
            </div>
            @endforeach
            <div class="icon">
                <i class="ion ion-person-add" style="font-size:38px"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-red">
            <div class="inner">
                @foreach ($sobre as $programa)
                <h3>+{{$programa->cliente}}</h3>
                <p>Parceiros</p>
            </div>
            @endforeach
            <div class="icon">
                <i class="far fa-address-card" style="font-size:38px"></i>
            </div>
        </div>
    </div>
</div>

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
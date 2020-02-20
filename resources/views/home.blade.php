@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')

   
<section class="content-header">

    <h2>
        Jovem+
    </h2>
    <ol class="breadcrumb">
        <li><a href="/jovem"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Perfil</li>
    </ol>
</section>
@stop
@section('content')

<br>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- box de frequencia -->
        <div class="small-box bg-teal-active color-palette">
            <div class="inner">
            @foreach ($sobre as $programa)
            
            <h3>+{{$programa->valor}}<sup style="font-size: 20px"></sup></h3>
                
            <p>Em beneficios aos jovens</p>
            </div>@endforeach
           
            <div class="icon">
                <i class="fas fa-wallet" style="font-size:38px"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-teal-active color-palette">
            <div class="inner">
            @foreach ($sobre as $programa)
            
                <h3>+{{$programa->dias}}<sup style="font-size: 20px"></sup></h3>
               
                <p>Aulas ministradas</p>
            </div>@endforeach
            <div class="icon">
                <i class="fas fa-calendar-check" style="font-size:38px"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-teal-active color-palette">
            <div class="inner">
           @foreach ($sobre as $programa)
                <h3>+{{$programa->jovens}}</h3>
                <p>Jovens assistidos no programa</p>
            </div>@endforeach
            <div class="icon">
                <i class="ion ion-person-add" style="font-size:38px"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-teal-active color-palette">
            <div class="inner">
            @foreach ($sobre as $programa)
                <h3>+{{$programa->cliente}}</h3>
                <p>Parceiros</p>
            </div>@endforeach
            <div class="icon">
                <i class="far fa-address-card" style="font-size:38px"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>
<div class="row">
    <div class="col-md-6">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Atividades</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
            
              </ol>
              <div class="carousel-inner">
                <div class="item">
                  <img src="https://s3.uninove.br/app/uploads/2019/09/02132054/1567452052-1567452052-60edbb8a-58f5-4195-9e1b-c0e37019db7d-1024x538.jpg" alt="Jovens">

                  <div class="carousel-caption">
                    Jovens
                  </div>
                </div>
                <div class="item active">
                  <img src="https://i.ytimg.com/vi/G2_LZSpTVA0/maxresdefault.jpg" alt="Feira">
                  <div class="carousel-caption">
                   Feira
                  </div>
                </div>
              
                </div>
              </div>
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="fa fa-angle-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="fa fa-angle-right"></span>
              </a>
            </div>
          </div>
          <!-- /.box-body -->
       
        <!-- /.box -->
      </div>
      <div class="col-md-6">
      
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Atenção:</h4>
         Neste feriado de carnaval não teremos atividade na terça-feira dia 25 de Fevereiro de 2019 mas 
         retornaremos na quarta-feira dia 26 ás 12h. Consulte seu calendário!
      </div> 
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Importante:</h4>
         Não esqueçam de entregar o número do Registro Escolar - RA, solicitado.
         Prazo: 03 de Março de 2019
         Consulte seu instrutor
      </div> 
      <div class="alert alert-success  alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa  fa-calendar"></i> Nos próximos dias:</h4>
        Atividade externa: Bovespa | Dia 29 de Fevereiro de 2020 |
        Consulte seu instrutor 
      </div></div>

      
@stop
       
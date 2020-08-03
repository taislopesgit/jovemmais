@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')

<section class="content-header">
   <h2>  Jovem+ </h2>
   <ol class="breadcrumb">
      <li><a href="inicial"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Perfil</li>
   </ol>
</section>

@stop

@section('content')

<section class="content">
   @foreach ($nome as $gestor)
   <h4> Bem vindo(a), {{$gestor->nome}}</h4>
   @endforeach
   </br>

   <div class='row'>
   <div class="box box-warning">
      <div class="box-header with-border">
         <h3 class="box-title">Desempenho dos jovens:</h3>
         <br><br>

         <h3> </h3>
         <div class='col-xs-12 col-sm-6 minha-classe'>
            <canvas id="doughnut-chart" max-width:  500px></canvas>
         </div>
         <div class='col-xs-12 col-sm-6 minha-classe'>
            <canvas id="pie-chart" max-width:  500px></canvas>
         </div>
      </div>
   </div>
</div>
<div class='row'>
   <div class="box box-light">
      <div class="box-header with-border">
         <div class='col-xs-12 col-sm-6 minha-classe'>
            <canvas id="line-chart" max-width:  500px></canvas>
         </div>
         <div class='col-xs-12 col-sm-6 minha-classe'>
            <canvas id="pie2-chart" max-width:  500px></canvas>
         </div>
      </div>
   </div>
</div>
<div class='row'>
   <div class="box box-light">
      <div class="box-header with-border">
         <div class='col-xs-12 col-sm-6 minha-classe'>
            <canvas id="doughnut2-chart" max-width:  500px></canvas>
         </div>
         <div class='col-xs-12 col-sm-6 minha-classe'>
            <canvas id="line2-chart" max-width:  500px></canvas>
         </div>
      </div>
   </div>
</div>

</section>
@stop



@section('js')

<script>

var item01 = {!! $evolucoesJovem->toJson() !!};
   const resposta = [];
   const quantidade = [];

   var total = 0;
   item01.forEach(function(item){
      total = total + item.aulaConcluida;
   });

   item01.forEach(function(item){
      resposta.push(item.aulaConcluida);
      quantidade.push(((item.aulaConcluida * 100) / total).toFixed(2));
   });

    new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: "",
      datasets: [
        {
          label: "",
          backgroundColor: ["#F39C12"],
          data: item01 ,
        }
      ]
    },
    options: {
      title: {
         legend: true,
        display: true,
           text: 'Média de progresso'
      }
    }
});
</script>


@stop

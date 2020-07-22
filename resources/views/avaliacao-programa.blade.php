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
   <div class="col-md-12">
   <div class="box box-warning">
      <div class="box-header with-border">
         <h3 class="box-title">Avaliação dos jovens ao treinamento:</h3>
            <br><br>s
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
   <div class="col-md-12">
   <div class="box box-warning">
      <div class="box-header with-border">
 
 <div class='col-xs-12 col-sm-6 minha-classe'>
        <canvas id="bar-chart-horizontal" max-width:  500px></canvas>
 </div>

</section>
@stop



@section('js')
<script>
   
   var items = {!! $pesquisa->toJson() !!};
   const resposta = [];
   const quantidade = [];

   var total = 0;
   items.forEach(function(item){
      total = total + item.qtd;
   });

   items.forEach(function(item){
      resposta.push(item.resposta);
      quantidade.push(((item.qtd * 100) / total).toFixed(2));
   });
   
   new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: resposta,
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#0073b7", "#00A65A","#F39C12","#DD4B39","#3C8DBC"],
          data: quantidade,
        }
      ]
    },
    options: {
      title: {
         legend: true,
        display: true,
           text: 'Você gostou do conteúdo abordado?'
      }
    }
});
</script>
<!--02-->

<script>
   
   var items = {!! $pesquisa02->toJson() !!};
  
  
new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: resposta,
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#0073b7", "#00A65A","#F39C12","#DD4B39","#3C8DBC"],
          data: quantidade,
        }
      ]
    },
    options: {
      title: {
         legend: true,
        display: true,
        text:' Como você avalia a dinâmica do treinamento?'
      }
    }
});
</script>
<!--03-->

<script>
   
   var items = {!! $pesquisa03->toJson() !!};
   
  
new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: resposta,
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#0073b7", "#00A65A","#F39C12","#DD4B39","#3C8DBC"],
          data: quantidade,
        }
      ]
    },
    options: {
      title: {
         legend: true,
        display: true,
        text:'O instrutor abordou o tema com clareza? ',
      }
    }
});
</script>
@stop

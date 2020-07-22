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
         <h3 class="box-title">Avaliação dos jovens ao treinamento:</h3>
         <br><br>
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
   <div class="box box-warning">
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
   <div class="box box-warning">
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
   
   var item01 = {!! $pesquisa01->toJson() !!};
   const resposta = [];
   const quantidade = [];

   var total = 0;
   item01.forEach(function(item){
      total = total + item.qtd;
   });

   item01.forEach(function(item){
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
           text: 'Você consegue ver conexão deste treinamento com a sua prática no trabalho e/ou no dia a dia?'
      }
    }
});
</script>

<!--02-->

<script>
   
   var item02 = {!! $pesquisa02->toJson() !!};
   const resposta02 = [];
   const quantidade02 = [];

   var total = 0;
   item02.forEach(function(item){
      total = total + item.qtd;
   });

   item02.forEach(function(item){
      resposta02.push(item.resposta);
      quantidade02.push(((item.qtd * 100) / total).toFixed(2));
   });
   
    new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: resposta02,
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#0073b7", "#00A65A","#F39C12","#DD4B39","#3C8DBC"],
          data: quantidade02,
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

<!--03-->
<script>
   
   var item03 = {!! $pesquisa03->toJson() !!};
   const resposta03 = [];
   const quantidade03 = [];

   var total = 0;
   item03.forEach(function(item){
      total = total + item.qtd;
   });

   item03.forEach(function(item){
      resposta03.push(item.resposta);
      quantidade03.push(((item.qtd * 100) / total).toFixed(2));
   });
   
    new Chart(document.getElementById("line-chart"), {
    type: 'line',
    data: {
      labels: resposta03,
      datasets: [
        {
          label: "",
          backgroundColor: ["#F39C12"],
          data: quantidade03,
        }
      ]
    },
    options: {
      title: {
         legend: true,
        display: true,
           text: 'Que nota você daria para o treinamento de hoje?'
      }
    }
});
</script>


<!--04-->
<script>
   
   var item04 = {!! $pesquisa04->toJson() !!};
   const resposta04 = [];
   const quantidade04 = [];

   var total = 0;
   item04.forEach(function(item){
      total = total + item.qtd;
   });

   item04.forEach(function(item){
      resposta04.push(item.resposta);
      quantidade04.push(((item.qtd * 100) / total).toFixed(2));
   });
   
    new Chart(document.getElementById("pie2-chart"), {
    type: 'pie',
    data: {
      labels: resposta04,
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#F39C12","#DD4B39","#3C8DBC"],
          data: quantidade04,
        }
      ]
    },
    options: {
      title: {
         legend: true,
        display: true,
           text: 'Você consegue ver conexão deste treinamento com a sua prática no trabalho e/ou no dia a dia?'
      }
    }
});
</script>

<!--05-->
<script>
   
   var item05 = {!! $pesquisa05->toJson() !!};
   const resposta05 = [];
   const quantidade05 = [];

   var total = 0;
   item05.forEach(function(item){
      total = total + item.qtd;
   });

   item05.forEach(function(item){
      resposta05.push(item.resposta);
      quantidade05.push(((item.qtd * 100) / total).toFixed(2));
   });
   
    new Chart(document.getElementById("doughnut2-chart"), {
    type: 'doughnut',
    data: {
      labels: resposta05,
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#0073b7", "#00A65A","#F39C12","#DD4B39","#3C8DBC"],
          data: quantidade05,
        }
      ]
    },
    options: {
      title: {
         legend: true,
        display: true,
           text: 'Como você avalia a dinâmica do treinamento?'
      }
    }
});
</script>
<!--06-->
<script>
   
   var item06 = {!! $pesquisa06->toJson() !!};
   const resposta06 = [];
   const quantidade06 = [];

   var total = 0;
   item06.forEach(function(item){
      total = total + item.qtd;
   });

   item06.forEach(function(item){
      resposta06.push(item.resposta);
      quantidade06.push(((item.qtd * 100) / total).toFixed(2));
   });
   
    new Chart(document.getElementById("line2-chart"), {
    type: 'line',
    data: {
      labels: resposta06,
      datasets: [
        {
          label: "",
          backgroundColor: ["#0073b7"],
          data: quantidade06,
        }
      ]
    },
    options: {
      title: {
         legend: true,
        display: true,
           text: 'Defina em uma palavra o treinamento de hoje?'
      }
    }
});
</script>

@stop

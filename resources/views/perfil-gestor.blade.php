@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
<section class="content-header">
   <h2>
      Jovem+
   </h2>
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
   @endforeach <br>
   <div class="row">
   <div class="col-md-3">
      <div class="small-box bg-blue">
         <div class="inner">
            @foreach ($dashFrequencia as $jovens)
            <h3>{{$jovens->jovens}}</h3>
            <p>Jovens ativos</p>
         </div>
         @endforeach
         <div class="icon">
            <i class="fa fa-user"></i>
         </div>
      </div>
   </div>
   <!-- ./fim -->
   <div class="col-md-3">
      <div class="small-box bg-green">
         <div class="inner">
            @foreach ($dashFrequencia as $frequencia)
            <h3>{{$frequencia->frequencia}}<sup style="font-size: 20px">%</sup></h3>
            <p>Taxa de frequência</p>
         </div>
         @endforeach
         <div class="icon">
            <i class="ion ion-stats-bars"></i>
         </div>
      </div>
   </div>
   <!-- ./fim -->
   <div class="col-md-3">
      <div class="small-box bg-yellow">
         <div class="inner">
            @foreach ($dashSatisfacao as $satisfacao)
            @if ($satisfacao->satisfacao > 5)
            <div class="icon">
               <i class="fa fa-smile"></i>
            </div>
            @else 
            @if ($satisfacao->satisfacao <= 5)
            <div class="icon">
               <i class="fa-frown"></i>
            </div>
            @else
            @endif
            @endif  
            <h3>{{$satisfacao->satisfacao}}<sup style="font-size: 20px">/10</sup></h3>
            <p>Nível de satisfação</p>
         </div>
         @endforeach
      </div>
   </div>
   <!-- ./fim-->
   <div class="col-md-3">
      <div class="small-box bg-red">
         <div class="inner">
            
            <h3>1</h3>
            
            <p>Ocorrências</p>
         </div>
         <div class="icon">
            <i class="fa fa-edit"></i>
         </div>
      </div>
   </div>
   <!-- ./fim -->
   <div class="col-md-12">
   <div class="box box-warning">
      <div class="box-header with-border">
         <h3 class="box-title">Jovens responsável</h3>
         <br>
         <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <div class="table-responsive">
               <table class="table no-margin">
                  <tr>
                     
                     <th class="align-middle">Nome</th>
                     <th class="align-middle text-center">&nbsp;</th>
                     <th class="align-middle text-center">Progresso</th>
                     <th class="align-middle text-center">&nbsp;</th>
                     <th class="align-middle text-center">Presença</th>
                     <th class="align-middle text-center">&nbsp;</th>
                  </tr>
                  @foreach ($relatorioJovem as $perfil)
                  <tr>
            
                    <td class="align-middle">
                     
                     {{$perfil->jovem}}</td>

                   <!--
                     <td class="align-middle">
                        @if (
                           !is_null($perfil->data_desligamento)
                           )
                           <a> <i class="fa fa-hand-paper" aria-hidden="true" style="color:red"></i></a>
                              @else
                                <a> <i class="fa fa-hand-paper" aria-hidden="true" style="color:green"></i></a>
                                @endif
                        
                     </td>
                     fimOcorrencia-->
                     
                     <td class="align-middle text-center">  
                        <div class="progress progress-xs">
                           @if ($perfil->aulaconcluida <= 25)
                           <div class="progress-bar progress-bar-success" style="width: {{$perfil->aulaconcluida}}%"></div>
                           @else 
                           @if ($perfil->aulaconcluida <= 50)
                           <div class="progress-bar progress-bar-primary" style="width: {{$perfil->aulaconcluida}}%"></div>
                           @else
                           @if ($perfil->aulaconcluida <= 75)
                           <div class="progress-bar progress-bar-warning" style="width: {{$perfil->aulaconcluida}}%"></div>
                           @else
                           <div class="progress-bar progress-bar-danger" style="width: {{$perfil->aulaconcluida}}%"></div>
                           @endif
                           @endif
                           @endif  
                        </div>
                     </td>
                     <td class="align-middle text-center">
                        @if ($perfil->aulaconcluida <= 25)
                        <span class="badge bg-green">{{$perfil->aulaconcluida}}%</span>
                        @else 
                        @if ($perfil->aulaconcluida <= 50)
                        <span class="badge bg-blue">{{$perfil->aulaconcluida}}%</span>
                        @else
                        @if ($perfil->aulaconcluida <= 75)
                        <span class="badge bg-yellow">{{$perfil->aulaconcluida}}%</span>
                        @else
                        <span class="badge bg-red">{{$perfil->aulaconcluida}}%</span>
                        @endif
                        @endif
                        @endif    
                     </td>
                     <td class="align-middle text-center">   
                        @if (!is_null ($perfil->presenca ))  
                        @php
                        $array = explode (',',$perfil->presenca);
                      @endphp
                        @foreach($array as $present)
                        @switch($present)
                        @case(1)
                        <i class="fa fa-circle text-green"></i> 
                        @break
                        @case(2)
                        <i class="fa fa-circle text-red"></i>
                        @break
                        @case(3)
                        <i class="fa fa-circle text-red"></i>
                        @break
                        @default
                        <i class="fa fa-circle text-blue"></i>
                        @endswitch
                        @endforeach
                        @endif  
                     </td>
                     <td class="align-middle text-center">
                        <a href="{{route('show', $perfil->id_jovem)}}" class="text-blue" title="Visualizar" data-toggle="tooltip" data-placement="top">
                        <i class="fa fa-eye">&nbsp;</i>
                        </a>
                     </td>
                  </tr>
                  @endforeach
                  </thead>
               </table>
               <div class="box-tools">
                  @if (isset($relacaoJovemGestor))
                  {{ $relatorioJovem->appends($relacaoJovemGestor)->links() }}
                  @else
                  {{ $relatorioJovem->links() }}
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--fim-->
   <div class="row">
      <div class="col-md-12">
         <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Avaliação</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-8">
         <br>
         <p class="text-center">
            <strong></strong>
         </p>
                <div class="chart">
                  <!-- Sales Chart Canvas -->
                  <canvas id="salesChart" style="height: 280px;"></canvas>
                </div>
                <!-- /.chart-responsive -->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <p class="text-center">
                  <strong>Avaliação dos jovens em relação aos treinamentos</strong>
                </p>
               <br>
                <div class="progress-group">
                  <span class="progress-text">Criatividade, Trabalho em equipe e Pensamento crítico</span>
                <span class="progress-number"><b>{{$competencias['combo1']}}</b>/{{$competencias['total']}}</span>
  
                  <div class="progress sm">
                    <div class="progress-bar progress-bar-blue" style="width: {{$competencias['combo1']}}%"></div>
                  </div>
                </div>
                <!-- /.progress-group -->
                <div class="progress-group">
                  <span class="progress-text">Orientação para o trabalho, Falar em público e Aprender a aprender</span>
                  <span class="progress-number"><b>{{$competencias['combo2']}}</b>/{{$competencias['total']}}</span>
  
                  <div class="progress sm">
                    <div class="progress-bar progress-bar-green" style="width: {{$competencias['combo2']}}%"></div>
                  </div>
                </div>
                <!-- /.progress-group -->
                <div class="progress-group">
                  <span class="progress-text">Negociação, Comunicação oral e escrita e Conduta ética</span>
                  <span class="progress-number"><b>{{$competencias['combo3']}}</b>/{{$competencias['total']}}</span>
  
                  <div class="progress sm">
                    <div class="progress-bar progress-bar-yellow" style="width: {{$competencias['combo3']}}%"></div>
                  </div>
                </div>
                <!-- /.progress-group -->
                <div class="progress-group">
                  <span class="progress-text">Resolução de problemas, Inteligência emocional e Assiduidade e Pontualidade</span>
                  <span class="progress-number"><b>{{$competencias['combo4']}}</b>/{{$competencias['total']}}</span>
  
                  <div class="progress sm">
                    <div class="progress-bar progress-bar-red" style="width: {{$competencias['combo4']}}%"></div>
                  </div>
                </div>
               </div>
            </div>
         </div>
      </div>
      
   
</section>
@stop

<!--feedback-->

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
   
    var ctx = document.getElementById('salesChart').getContext('2d');
    var chart = new Chart(ctx, {
        // tipo de chart
        type: 'radar',

        // Estrutura de dadis

        data: {
            labels:  resposta,
            datasets: [
                {    
                    label: '%',
                    fill: true,
                    backgroundColor: 'rgb(255, 128, 0, 0.3)',
                    borderColor: 'rgb(204, 102, 0)',
                    pointBackgroundColor: 'rgb(204, 102, 0)',
                    pointBorderColor: 'rgb(255, 99, 132)',
                    borderWidth: 2,
                    data: quantidade,
                   
                }
            ],
        },

       
        options: {
        legend: {
            display: false
        },
    }
    });
</script>
<!--fimFeedBack-->

@stop
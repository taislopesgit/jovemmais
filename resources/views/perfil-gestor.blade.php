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
            <div class="a:link ">
            <a href="{{route('avaliacao-programa')}}">
                        <p> Nivel de satisfação</p>
                        </a>
         </div>
         </div>
         @endforeach
      </div>
   </div>
   <!-- ./fim-->
   <div class="col-md-3">
      <div class="small-box bg-red">
      <div class="inner">      
         <h3>0</h3>
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
         <br>
         <h3 class="box-title">Jovens responsável</h3>
         <br><br>
         
         <!-- /.box-header -->
         <div class="box-body">
            <div class="table-responsive">
               <table class="table no-margin">
                  <tr>
                     
                     <th class="align-middle">Nome</th>
                     <th class="align-middle">Progresso</th>
                     <th>&nbsp; </th>
                     <th class="align-middle text-center">Presença</th> 
                     <th class="align-middle text-center">&nbsp;</th>
                     
                     
                  </tr>
                  @foreach ($relatorioJovem as $perfil)
                  <tr>
            
                    <td class="align-middle">
                     
                     {{$perfil->jovem}}</td>
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
                        <i class="fa fa-circle text-green" title="Presença"></i> 
                        @break
                        @case(2)
                        <i class="fa fa-circle  text-red" title="Falta"></i>
                        @break
                        @case(3)
                        <i class="fa fa-circle  text-red" title="Falta"></i>
                        @break
                        @default
                        <i class="fa fa-circle  text-blue" title="Atraso"></i>
                        @endswitch
                        @endforeach
                        @endif  
                     </td>
                     <td class="align-middle text-center">
                        <a href="{{route('show', $perfil->id_jovem)}}" class="text-blue" title="Visualizar" data-toggle="tooltip" data-placement="top">
                        <i class="fa fa-eye">&nbsp;</i>
                        </a>
                        &nbsp;
                        <!--<a href="{{route('ocorrencia', $perfil->id_jovem)}}" class="text-red" title="ocorrencia" data-toggle="tooltip" data-placement="top">
                        <i class="fa fa-edit">&nbsp;</i>
                        </a>-->
                     </td>
                
      
                  @endforeach
                  </tr>
                  
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
   
   <!--
   <div class="row">
      <div class="col-md-12">
         <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Avaliação dos jovens aos treinamentos</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
      
          <div class="box-body">
            <div class="row">
            //pergunta01
             <div>
                <div class="chart">
                  <canvas id="doughnut-chart" max-width:  500px></canvas>
                  <div>
          
                  fim-->
              
      
   
</section>
@stop






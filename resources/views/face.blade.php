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
<h4> Nome gestor, você está na tela de perfis:</h4>
<br>
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
            
            <h3><sup style="font-size: 20px">0</sup></h3>
            <p>Férias</p>
         </div>
        
         <div class="icon">
            <i class="ion ion-stats-bars"></i>
         </div>
      </div>
   </div>
   <!-- ./fim -->
   
   <div class="col-md-12">
   <div class="box box-warning">
      <div class="box-header with-border">
         <br>
      @foreach($relatorioJovem as $face)        
     
      <div class="col-md-3">
    <div class="callout callout-primary">
    <table class="table">
  <thead>
    <tr>
      <th scope="col"> <img src="https://www.vocacao.org.br/jovemaprendiz/feedback-gestor/images/{{$face->id_jovem}}.jpg" alt="Avatar" class="avatar"> </th>
      <th scope="col">{{$face->jovem}}
      <br>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <td class="align-middle text-center">  
                        <div class="progress progress-xs">
                           @if ($face->aulaconcluida <= 25)
                           <div class="progress-bar progress-bar-success" style="width: {{$face->aulaconcluida}}%"></div>
                           @else 
                           @if ($face->aulaconcluida <= 50)
                           <div class="progress-bar progress-bar-primary" style="width: {{$face->aulaconcluida}}%"></div>
                           @else
                           @if ($face->aulaconcluida <= 75)
                           <div class="progress-bar progress-bar-warning" style="width: {{$face->aulaconcluida}}%"></div>
                           @else
                           <div class="progress-bar progress-bar-danger" style="width: {{$face->aulaconcluida}}%"></div>
                           @endif
                           @endif
                           @endif  
                        </div>
    <td class="align-middle text-center">
                        @if ($face->aulaconcluida <= 25)
                        <span class="badge bg-green">{{$face->aulaconcluida}}%</span>
                        @else 
                        @if ($face->aulaconcluida <= 50)
                        <span class="badge bg-blue">{{$face->aulaconcluida}}%</span>
                        @else
                        @if ($face->aulaconcluida <= 75)
                        <span class="badge bg-yellow">{{$face->aulaconcluida}}%</span>
                        @else
                        <span class="badge bg-red">{{$face->aulaconcluida}}%</span>
                        @endif
                        @endif
                        @endif    
                     </td>
                     <td class="align-middle text-center">
                        <a href="" class="text-blue" title="Visualizar" data-toggle="tooltip" data-placement="top">
                        <i class="fa fa-eye">&nbsp;</i>
                        </a>
                     </td>
    </tr>
  </tbody>
</table>
</div>
  </div>
    @endforeach    
   </div>
   </div>
   <div class="box-tools">
                @if (isset($RelacaoJovemGestor))
                {{ $relatorioJovem->appends($RelacaoJovemGestor)->links() }}
                @else
                {{ $relatorioJovem->links() }}
                @endif
                </div>


   
</section>


<style>

.avatar {
  background: white;
  vertical-align: middle;
  width: 80px;
  height: 80px;
  border-radius:50%;

}
.callout {
  padding: 15px;
  margin: 15px 0;
  border: 1px solid #eee;
  border-left-width: 8px;
  border-radius: 3px;

</style>

@stop
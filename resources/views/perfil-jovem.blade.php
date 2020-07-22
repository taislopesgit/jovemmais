
@extends('adminlte::page') @section('title', 'AdminLTE') @section('content_header')

<section class="content-header">
    <h2>
        Jovem+
    </h2>
    <ol class="breadcrumb">
        <li><a href="inicial"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Perfil</li>
    </ol>
    
</section>
<section class="content">
    <div class="row">
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-body box-profile">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success')}}
            </div>
            @endif
                @foreach ($usuarios as $usuario)
              
                <img class="avatar" src="https://www.vocacao.org.br/jovemaprendiz/feedback-gestor/images/{{$usuario->id_jovem}}.jpg" alt="User profile picture">
                <h3 class="profile-username text-center"></h3>
                <p class="text-muted text-center">@if (
                    !is_null($usuario->matriculas()->get()->max('data_desligamento'))
                    )
                    <small class="label bg-red">Inativo</small>
                    @else
                    <small class="label bg-green">Ativo</small>
                    @endif
                </p>
                <p class="text-muted text-center">
                <a href="{{route('editar', $usuario->id_jovem)}}" class="text-blue" title="editar" data-toggle="tooltip" data-placement="top">
                <small class="label bg-orange">Editar dados</small>
                                </a> </p>
                <!-- /.info-box-content -->
                <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                        <b>Nome</b> <a class="pull-right">{{$usuario->nome}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>ID</b> <a class="pull-right">{{$usuario->id_jovem}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>CPF</b> <a class="pull-right">{{$usuario->cpf}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Celular</b> <a class="pull-right">{{$usuario->celular}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Email</b> <a class="pull-right">{{$usuario->email}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Data de nascimento</b> <a class="pull-right">{{$usuario->data_nascimento}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Raça</b> <a class="pull-right">{{$usuario->raca}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>CEP</b> <a class="pull-right">{{$usuario->cep}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Endereço</b> <a class="pull-right">{{$usuario->endereco}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>N°</b> <a class="pull-right">{{$usuario->numero}}</a>
                    </li>
                    @foreach ($sobreJovem as $sobre)
                    <li class="list-group-item">
                        <b>Cliente</b> <a class="pull-right">{{$sobre->empresa}}</a>@endforeach
                    </li>
                    @foreach ($sobreJovem as $sobre)
                    <li class="list-group-item">
                        <b>Gestor</b> <a class="pull-right">{{$sobre->gestor}}</a>@endforeach
                    </li>
                    @foreach ($sobreJovem as $sobre)
                    <li class="list-group-item">
                        <b>Polo</b> <a class="pull-right">{{$sobre->nomePolo}}</a>@endforeach
                    </li>
                </ul>
                @endforeach
            </div>
        </div>
        <!--Fimboxprimary-->         
        <div class="box box-teal">
            <div class="box-body">
                <div>
                    @foreach ($sobreJovem as $sjovem)
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Data de início </b> <a class="pull-right"> {{date( 'd/m/Y' , strtotime($sjovem->data_inicio))}}  <i class="fa fa-toggle-on" style="font-size:20px"></i> </a>
                        </li>
                        <li class="list-group-item">
                            <b> Data fim </b> <a class="pull-right"> {{date( 'd/m/Y' , strtotime($sjovem->data_fim))}} <i class="fa fa-toggle-off" style="font-size:20px"></i>  </a>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9 ">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    @foreach ($frequencias as $presenca)
                    <h3>{{$presenca->frequencia}}<sup style="font-size: 20px">%</sup></h3>
                    <p>Presença aula</p>
                </div>
                @endforeach
                <div class="icon">
                    <i class="fa fa-check-circle" style="font-size:48px"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    @foreach ($evolucoes as $evolucao)
                    <h3>{{$evolucao->atraso}}<sup style="font-size: 20px">%</sup></h3>
                    <p>Aulas com atraso</p>
                </div>
                @endforeach
                <div class="icon">
                    <i class="fas fa-stopwatch" style="font-size:48px"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    @foreach ($evolucoes as $evolucao)
                    <h3>{{$evolucao->aulaconcluida}}%</h3>
                    <p>Aulas completadas</p>
                </div>
                @endforeach
                <div class="icon">
                    <i class="fa fa-book" style="font-size:48px"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    @foreach ($evolucoes as $evolucao)
                    <h3>{{$evolucao->aulafim}}</h3>
                    <p>Aulas para a conclusão</p>
                </div>
                @endforeach
                <div class="icon">
                    <i class="fa fa-graduation-cap" style="font-size:48px"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- fimdashboard-->
    <!-- calendario -->
    <div class="box-body table-responsive no-padding">
    <div class="nav-tabs-custom">
    <div class="box-body table-responsive">
    <div class="col-md-">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
             <li class="active"><a href="#calendario" data-toggle="tab" aria-expanded="true"><i class="fa fa-calendar-check bg-dark"></i>&nbsp;&nbsp;Calendário</a> </li> 
              <li class=""><a href="#treinamento" data-toggle="tab" aria-expanded="false"><i class="fas fa-book"></i></i>&nbsp;&nbsp;Treinamento</a></li>
              <li class=""><a href="#marcacao" data-toggle="tab" aria-expanded="false"><i class="fa fa-history bg-dark"></i>&nbsp;&nbsp;Marcação</a></li>
              <li class=""><a href="#ocorrencia" data-toggle="tab" aria-expanded="false"><i class="fas fa-exclamation-circle"></i></i>&nbsp;&nbsp;Ocorrência</a></li>
              <li class=""><a href="#contrato" data-toggle="tab" aria-expanded="false"><i class="fas fa-sticky-note"></i></i>&nbsp;&nbsp;Contrato</a></li>
              <!--<li class=""><a href="#dados" data-toggle="tab" aria-expanded="false"><i class="fa fa-id-card bg-dark"></i>&nbsp;&nbsp;Editar Dados</a></li>-->
            </ul>
            <div class="tab-content">
            <div id='calendar'></div>
                 <div id='external-events-list'></div>
                
              <div class="tab-pane" id="treinamento">
              <table class="table table-striped">
                    <br>
                    <div class="user-block">
                        <tbody>
                            <tr>
                                <th>Disciplina</th>
                                <th class="align-middler text-center">Descrição</th>
                    </div>
                    <th>Data</th>
                    <th>Status</th>
                    </tr>   
                    @foreach ($verJovens as $verJovem)
                    <tr>
                    <td class="align-middle">{{$verJovem->nome}}</td>
                    <td class="align-middler text-center">{{$verJovem->descricao}}</td>
                    <td class="align-middle">{{date( 'd/m/Y' , strtotime($verJovem->data_disciplina))}}</td>
                    <td class="align-center">{{$verJovem->justificativa}}</td>
                    @endforeach
                    </tr>  
                    </tbody>   
                </table>
                <div class="box-tools">
                    @if (isset($jovemDados))
                    {{ $verJovens->appends($jovemDados)->links() }}
                    @else
                    {{ $verJovens->links() }}
                    @endif
                </div>
              </div>
              <!--fimtreinamento-->
                <!-- /.tab-pane -->
                <div class="tab-pane" id="marcacao">
                <table class="table table-striped">
                    <div class="user-block">
                        <tbody>
                            <tr>
                                <th>Data </i></th>
                                <th>Entrada </th>
                                <th>Saída </th>
                                <th>Entrada </th>
                                <th>Saída </th>
                            </tr>
                            @foreach ($verJovens as $verJovem)
                            <tr>
                                <td class="align-center">  {{date( 'd/m/y' , strtotime($verJovem->data_disciplina))}}</td>
                                <td class="align-center">{{is_null($verJovem->hora_primeira_marcacao) ? null : date( 'H:i' , strtotime($verJovem->hora_primeira_marcacao))}}</td>
                                <td class="align-middle">{{is_null($verJovem->hora_segunda_marcacao) ? null : date( 'H:i' , strtotime($verJovem->hora_segunda_marcacao))}}</td>
                                <td class="align-middle">{{is_null($verJovem->hora_terceira_marcacao) ? null : date( 'H:i' , strtotime($verJovem->hora_terceira_marcacao))}}</td>
                                <td class="align-middle">{{is_null($verJovem->hora_quarta_marcacao) ? null : date( 'H:i' , strtotime($verJovem->hora_quarta_marcacao))}}</td>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                </table>
                <div class="box-tools">
                @if (isset($jovemDados))
                {{ $verJovens->appends($jovemDados)->links() }}
                @else
                {{ $verJovens->links() }}
                @endif
                </div>
                
              </div>
            <!--fimmarcacao-->
              <!-- /.tab-pane -->
              <div class="tab-pane" id="ocorrencia">
              <div class="table-responsive">
              <table class="table table-striped">
                  <thead>
                  <tr>
                    <th class="align-middle">ID Ocorrência</th>
                    <th class="align-middle text-center">Tipo de ocorrência</th>
                    <th class="align-middle text-center">Descrição</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <td class="align-middle">&nbsp;&nbsp;</td>
                  <td class="align-middle text-center"></td>
                  <td class="align-middle text-center"></td>
                  
                  </tr>
                  </tbody>
                </table>
              </div>
              </div>
              <!--fimOcorrencia-->
              <!-- /.tab-pane -->
              <div class="tab-pane" id="contrato">
            
              <div class="table-responsive">
              <table class="table table-striped">
                  <thead>
                  <tr>
                    <th class="align-middle">Documento</th>
                    <th class="align-middle text-center">Baixar cópia</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <td class="align-middle">Contrato de Trabalho</td>
                  <td class="align-middle text-center">
                  <a download="pagina.html" href="data:text/html;charset=utf-8,<html><body><h1>conteúdo/h1></body></html>"><i class="fa fa-download">&nbsp;</i></a></td>
                  </td>
                  </tr>
                  </tbody>
                </table>
              
          </div>
          </div>
          
           

    <!--alterarfoto--
<div class="col-md-4">
   
             
    @if($errors->all())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
       
            <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="">
            <h4> Alterar foto </h4>
            <div align="center">
            <img src="" alt="Avatar" class="avatar">
            <br> <br>
            <input type="file" name="foto-aprendiz" class="btn btn-default"  accept="image/png, image/jpeg" multiple /> 
            </div>

            </form>
    </div>-->

</section>

<style>

.avatar {
  background: white;
  text-align: center;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin: 0 auto;
  display: block;


}
</style>

<link href='{{asset('assets/fullcalendar/packages/core/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/fullcalendar/packages/daygrid/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/fullcalendar/packages/timegrid/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/fullcalendar/packages/list/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/fullcalendar/css/style.css')}}' rel='stylesheet' />

<script src='{{asset('assets/fullcalendar/packages/core/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/interaction/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/daygrid/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/timegrid/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/list/main.js')}}'></script>

<script src='{{asset('assets/fullcalendar/packages/core/locales/pt-br.js')}}'></script>


</script>

 <script> 
   
  
  document.addEventListener('DOMContentLoaded', function() {
      var Calendar = FullCalendar.Calendar;
  
     /* iniciar calendario
     -----------------------------------------------------------------*/
     var calendarEl = document.getElementById('calendar');
     var calendar = new Calendar(calendarEl, {
        locale:'pt-br',
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
      
        navLinks: true,
        eventLimit: true,
        selectable: true,
        editable: false,
      
    
        eventDrop: function(event) {
             alert('Você não pode alterar esse evento');
        },
    
        events: [  @foreach ( $verJovens as $events )
                   { 
                       
                      title: '{{$events-> nome}}' ,
                      start : '{{$events-> data_disciplina}}',
                     
                     
                  },
                      @endforeach
                ],
                eventColor: '#378006'

        });
            
        calendar.render( );

  });
   

      </script>

  
@stop

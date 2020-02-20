@extends('adminlte::page') @section('title', 'AdminLTE') @section('content_header')
<section class="content-header">
    <h2>
        Jovem+
    </h2>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Perfil</li>
    </ol>
</section>


<section class="content">
    <div class="row">
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="https://www.vocacao.org.br/jovemaprendiz/feedback-gestor/images/{{$jovem->id_jovem}}.jpg" alt="User profile picture">
                <h3 class="profile-username text-center"></h3>
                <p class="text-muted text-center">@if (
                    !is_null($jovem->matriculas()->get()->max('data_desligamento'))
                    )
                    <small class="label bg-red">Inativo</small>
                    @else
                    <small class="label bg-green">Ativo</small>
                    @endif
                </p>
                
                <!-- /.info-box-content -->
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>ID</b> <a class="pull-right">{{$jovem->id_jovem}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>CPF</b> <a class="pull-right">{{$jovem->cpf}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Celular</b> <a class="pull-right">{{$jovem->celular}}</a>
                        
                    </li>
                    <li class="list-group-item">
                        <b>Email</b> <a class="pull-right">{{$jovem->email}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Data de nascimento</b> <a class="pull-right">{{$jovem->data_nascimento}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Raça</b> <a class="pull-right">{{$jovem->raca}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>CEP</b> <a class="pull-right">{{$jovem->cep}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Endereço</b> <a class="pull-right">{{$jovem->endereco}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>N°</b> <a class="pull-right">{{$jovem->numero}}</a>
                    </li>
                    @foreach ($sobreJovem as $sobre)
                    <li class="list-group-item">
                        <b>Cliente</b> <a class="pull-right">{{$sobre->nome_fantasia}}</a>@endforeach
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
            </div>
        </div>
        <!--Fimboxprimary-->         
        <div class="box box-primary">
            <div class="box-body">  


                
            <div> @foreach ($sobreJovem as $sjovem)
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
    </div> </div> 
    <div class="col-md-9 ">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-teal">
           
                <div class="inner">
                    <h3>%</h3>
                    <p>Presença aula</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check-circle" style="font-size:48px"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                @foreach ($evolucoes as $evolucao)
                    <h3>{{$evolucao->atraso}}<sup style="font-size: 20px">%</sup></h3>
                    <p>Aulas com atraso</p>
                </div>@endforeach
                <div class="icon">
                    <i class="fas fa-stopwatch" style="font-size:48px"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-olive">
                <div class="inner">
                @foreach ($evolucoes as $evolucao)
                    <h3>{{$evolucao->aulaconcluida}}%</h3>
                    <p>Aulas completadas</p>
                </div>@endforeach
                <div class="icon">
                    <i class="fa fa-book" style="font-size:48px"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-maroon">
                <div class="inner">   
                @foreach ($evolucoes as $evolucao)
                    <h3>{{$evolucao->aulafim}}</h3>
                    <p>Aulas para a conclusão</p>
                </div>@endforeach
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
        <ul class="nav nav-tabs nav-tabs-responsive" >
            <li class="active"> <a href="#calendario" data-toggle="tab" aria-expanded="true"><i class="fa fa-calendar-check bg-dark"></i>&nbsp;&nbsp;Calendário</a></li>
            <li class=""><a href="#marcacao" data-toggle="tab" aria-expanded="false"> <i class="fa fa-history bg-dark"></i>&nbsp;&nbsp; Marcações</a></li>
            <!--  <li class=""><a href="#editar" data-toggle="tab" aria-expanded="false"> <i class="fa fa-id-card bg-dark"></i>&nbsp;&nbsp; Dados</a></li>-->
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="calendario">
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
                    <!--<th>Status</th>-->
                    </tr>   
                    @foreach ($verJovens as $verJovem)
                    <tr>
                    <td class="align-middle">{{$verJovem->nome}}</td>
                    <td class="align-middler text-center">{{$verJovem->descricao}}</td>
                    <td class="align-middle">{{date( 'd/m/Y' , strtotime($verJovem->data_disciplina))}}</td>
                    <td class="align-center">{{$verJovem->justificativa}}</td>
                    <!--<td class="align-middle">{{$verJovem->justificativa}}</td>-->
                   
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
            <br>
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
                                @can ('view_jovem',$verJovem)
                            <tr>
                                <td class="align-center">  {{date( 'd/m/y' , strtotime($verJovem->data_disciplina))}}</td>
                                <td class="align-center">{{is_null($verJovem->hora_primeira_marcacao) ? null : date( 'H:i' , strtotime($verJovem->hora_primeira_marcacao))}}</td>
                                <td class="align-middle">{{is_null($verJovem->hora_segunda_marcacao) ? null : date( 'H:i' , strtotime($verJovem->hora_segunda_marcacao))}}</td>
                                <td class="align-middle">{{is_null($verJovem->hora_terceira_marcacao) ? null : date( 'H:i' , strtotime($verJovem->hora_terceira_marcacao))}}</td>
                                <td class="align-middle">{{is_null($verJovem->hora_quarta_marcacao) ? null : date( 'H:i' , strtotime($verJovem->hora_quarta_marcacao))}}</td>
                                </td>
                               @endcan
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
                <br>
               
            </div>
        </div>
    </div>
   
</section>
@stop
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
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- box de frequencia -->
        <div class="small-box bg-blue">
            <div class="inner">
            @foreach ($sobre as $programa)
            
            <h3>R$ {{$programa->valor}}<sup style="font-size: 20px"></sup></h3>
                
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
        <div class="small-box bg-green">
            <div class="inner">
            @foreach ($sobre as $programa)
            
                <h3>+{{$programa->aulas}}<sup style="font-size: 20px"></sup></h3>
               
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
        <div class="small-box bg-yellow">
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
        <div class="small-box bg-red">
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
<div class="col-md-12">
<div class="box">
    <div class="box-header with-border">
        <a class="accordion-toggle pull-right collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
        <i class="fa fa-search"></i>Filtrar
        </a>
        <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <h4 class="box-title">Busca detalhada</h4>
            <div class="panel-body">
                <form action="{{route('home')}}"  method="post">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>ID</label>
                            <input type="search"  name="id" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label> Nome</label>
                            <input type="search"  name="nome" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Sexo</label>
                        <select class="form-control" name="sexo">
                            <option selected></option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Cliente</label>
                        <select name="cliente" class="form-control">
                            <option> </option>
                            @foreach ($clientes as $cliente)
                            <option value="{{$cliente->nome_fantasia}}">{{$cliente->razao_social}} - {{$cliente->nome_fantasia}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Curso</label>
                        <select  name="curso" class="form-control">
                            <option></option>
                            @foreach ($cursos as $curso)
                            <option value="{{$curso->nome}}">{{$curso->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Data inicio</label>
                        <input name="data-inicio" type="date" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Data fim</label>
                        <input name="data-fim" type="date" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <input type="submit"  class="btn btn-primary" value="Filtrar">
                    </div>
                    <div>  
                    </div>
            </div>
        </div>
    </div>
    </form>
</div>
<!-- /relacaoJovens -->
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">Jovens no Programa</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table">
                    <thead class="bg-aqua">
                    <tbody>
                        <tr>
                            <th class="align-middle text-center">ID</th>
                            <th class="align-middle text-center">Nome</th>
                            <th class="align-middle text-center">Sexo</th>
                            <th class="align-middle text-center">Email</th>
                            <th class="align-middle text-center">Curso</th>
                            <th class="align-middle text-center">Cliente</th>
                            <th class="align-middle text-center">Data de nascimento</th>
                            <th class="align-middle text-center">Data de matrícula</th>
                            <th class="align-middle text-center">Status</th>
                            <th class="align-middle text-center">&nbsp;</th>
                            <th class="align-middle text-center">&nbsp;</th>
                        </tr>
                        @foreach ($jovens as $jovem)
                        <tr>
                            <td class="align-middle text-center">{{$jovem->id_jovem}}</td>
                            <td class="align-middle text-center">{{$jovem->nome}}</td>
                            <td class="align-middle text-center">{{$jovem->sexo}}</td>
                            <td class="align-middle text-center">{{$jovem->email}}</td>
                            <td class="align-middle text-center">{{$jovem->nome_curso}}</td>
                            <td class="align-middle text-center">{{$jovem->nome_fantasia}}</td>
                            <td class="align-middle text-center">
                                {{date( 'd/m/Y' , strtotime($jovem->data_nascimento))}}
                            </td>
                            </td>
                            <td class="align-middle text-center">
                                {{date( 'd/m/Y' , strtotime($jovem->data_inicio))}}
                            </td>
                            <td class="align-middle text-center">
                                @if (
                                !is_null($jovem->data_desligamento)
                                )
                                <small class="label bg-red">Inativo</small>
                                @else
                                <small class="label bg-olive">Ativo</small>
                                @endif
                            </td>
                            
                            <td class="align-middle text-center"> </td>
                            <td class="align-middle text-center">
                                <a href="{{route('show', $jovem->id_jovem)}}" class="text-blue" title="Visualizar" data-toggle="tooltip" data-placement="top">
                                <i class="fa fa-eye">&nbsp;</i>
                                </a>
                            </td>
                            <td class="align-middle text-center">
                            <a href="" class="text-orange" title="Editar" data-toggle="tooltip" data-placement="top">
                            <i class="fa fa-paint-brush" aria-hidden="true"></i>

                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="box-tools">
                    @if (isset($dadosFiltro))
                    {{ $jovens->appends($dadosFiltro)->links() }}
                    @else
                    {{ $jovens->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@stop
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
<div class="row">
    <div class="col-md-12">
        <!-- Search form -->
        <div class="box">
            <div class="box-header with-border">
                <a class="accordion-toggle pull-right collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
                <i class="fa fa-search"></i>Filtrar
                </a>
                <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <h5 class="box-title">Busca rápida</h5>
                    <div class="panel-body">
                        <form action=""  method="post">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>ID</label>
                                    <input type="search"  name="id" class="form-control">
                                </div>
                                <div class="form-group col-md-8">
                                    <label> Nome</label>
                                    <input type="search"  name="nome" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="submit"  class="btn btn-primary" value="Filtrar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--fimSearch-->
        <div class="box box-warning">
            <div class="box-header">
            <br>
                <h3 class="box-title">Relação de Gestores</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table">
                    <thead class="bg-aqua">
                    <tbody>
                        <tr>
                            <th class="align-middle text-center">ID</th>
                            <th class="align-middle text-center">Nome</th>
                            <th class="align-middle text-center">Email</th>
                            <th class="align-middle text-center">Cliente</th>
                            <th class="align-middle text-center">&nbsp;</th>
                        </tr>
                        <tr>
                            @foreach ($dominio as $gestor)
                            <td class="align-middle text-center">{{$gestor->id_contato}}</td>
                            <td class="align-middle text-center">{{$gestor->nome}}</td>
                            <td class="align-middle text-center">{{$gestor->email}}</td>
                            <td class="align-middle text-center">{{$gestor->nome_fantasia}}</td>
                            <td class="align-middle text-center">
                                <a href="{{route('gestorId', $gestor->id_contato)}}" class="text-blue" title="Visualizar" data-toggle="tooltip" data-placement="top">
                                <i class="fa fa-eye">&nbsp;</i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="box-tools">
                    @if (isset($gestores))
                    {{ $dominio->appends($gestores)->links() }}
                    @else
                    {{ $dominio->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop
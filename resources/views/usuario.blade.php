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

<!-- /relacaoUsuarios -->
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">Usuários cadastrados</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table">
                    <thead class="bg-aqua">
                    <tbody>
                        <tr>
                            <th class="align-middle text-center">ID</th>
                            <th class="align-middle text-center">Nome</th>
                            <th class="align-middle text-center">Email</th>
                            <th class="align-middle text-center">Função</th>
                            <th class="align-middle text-center">Criado</th>
                            <th class="align-middle text-center">Editar</th>
                        </tr>
                        @foreach ($funcoes as $funcao)
                        <tr>
                            <td class="align-middle text-center">{{$funcao->id}}</td>
                            <td class="align-middle text-center">{{$funcao->nome}}</td>
                            <td class="align-middle text-center">{{$funcao->email}}</td> 
                            <td class="align-middle text-center">{{$funcao->name}}</td>
                            <td class="align-middle text-center">{{date( 'd/m/Y' , strtotime($funcao->created_at))}}</td> 
                            <td class="align-middle text-center">
                                <a href="" class="text-blue" title="Visualizar" data-toggle="tooltip" data-placement="top">
                                <i class="fa fa-edit">&nbsp;</i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>

@stop
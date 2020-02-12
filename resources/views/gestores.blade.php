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
    <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header">
                <h3 class="box-title">Relação de Gestores</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table">
                    <thead class="bg-aqua">
                    <tbody>
                        <tr>
                            <th class="align-middle text-center">ID</th>
                            <th class="align-middle text-center">Nome</th>
                            <th class="align-middle text-center">Cliente</th>
                            <th class="align-middle text-center">Email</th>
                            <!--<th class="align-middle text-center">Celular</th>-->
                            <th class="align-middle text-center">&nbsp;</th>
                         
                       
                        </tr>

                        <tr>
                        @foreach ($dominio as $gestor)
                            <td class="align-middle text-center">{{$gestor->id_contato}}</td>
                            <td class="align-middle text-center">{{$gestor->nome}}</td>
                            <td class="align-middle text-center">{{$gestor->empresa}}</td>
                            <td class="align-middle text-center">{{$gestor->email}}</td> 
                          <!--  <td class="align-middle text-center">{{$gestor->celular}}</td> -->
                            
                            <td class="align-middle text-center">
                                <a href="{{route('gestor', $gestor->id_contato)}}" class="text-blue" title="Visualizar" data-toggle="tooltip" data-placement="top">
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
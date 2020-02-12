@extends('adminlte::page') @section('title', 'AdminLTE') @section('content_header')

<section class="content">
    <!-- Info boxes -->
    @foreach ($gestores as $gestor)
    <h4> Bem vindo(a), {{$gestor->nome}}</h4>
    @endforeach <br>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>150</h3>
                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>
                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>
                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-md-3">
        <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestor</h3>
                    <div class="box-body">
                        <div class="row">
                        <div class="box-header">
                        <ul class="list-group list-group-unbordered">
                        @foreach ($gestores as $gestor)
                        <li class="list-group-item">
                        <b>Nome</b> <a class="pull-right">{{$gestor->nome}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>ID</b> <a class="pull-right">{{$gestor->id_contato}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Email</b> <a class="pull-right">{{$gestor->email}}</a>
                        </li>
                    <li class="list-group-item">
                        <b>Empresa</b> <a class="pull-right">{{$gestor->empresa}}</a>
                        </li>    
                   
                </ul>@endforeach
                </div>
                            </div>
                      </div> 
                 </div>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <!-- USERS LIST -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Jovens responsável</h3>
                    <div class="box-tools pull-right">
                        
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                <div class="box-body table-responsive">
                <table class="table">
                    <thead class="bg-aqua">
                    <tbody>
                        <tr>
                            <th class="align-middle text-center">ID</th>
                            <th class="align-middle text-center">Nome</th>
                            <th class="align-middle text-center">Sexo</th>
                            <th class="align-middle text-center">Email</th>
                            <th class="align-middle text-center">Data de nascimento</th>
                            <th class="align-middle text-center">Data de matrícula</th>
                            <th class="align-middle text-center">Status</th>
                            <th class="align-middle text-center">&nbsp;</th>
                        </tr>
                        @foreach ($gestores as $gestor)
                        <tr>
                            <td class="align-middle text-center">{{$gestor->id_jovem}}</td>
                            <td class="align-middle text-center">{{$gestor->jovem}}</td>
                            <td class="align-middle text-center">{{$gestor->sexo}}</td>
                            <td class="align-middle text-center">{{$gestor->email}}</td>
                            
                            <td class="align-middle text-center">
                                {{date( 'd/m/Y' , strtotime($gestor->data_nascimento))}}
                            </td>
                            </td>
                            <td class="align-middle text-center">
                                {{date( 'd/m/Y' , strtotime($gestor->data_inicio))}}
                            </td>
                            <td class="align-middle text-center">
                                @if (
                                !is_null($gestor->data_desligamento)
                                )
                                <small class="label bg-red">Inativo</small>
                                @else
                                <small class="label bg-olive">Ativo</small>
                                @endif
                            </td> 
                            
                            <td class="align-middle text-center"> </td>
                            <td class="align-middle text-center">
                                <a href="{{route('show', $gestor->id_jovem)}}" class="text-blue" title="Visualizar" data-toggle="tooltip" data-placement="top">
                                <i class="fa fa-eye">&nbsp;</i>
                                </a>
                            </td>
                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                
                </div>
            </div>
           
        </div>
        <!-- /.col -->
    </div>
    
</section>
@stop


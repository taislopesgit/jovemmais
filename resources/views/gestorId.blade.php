@extends('adminlte::page') @section('title', 'AdminLTE') @section('content_header')

<section class="content">
    <!-- Info boxes -->
    
    <div class="row">
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestor</h3>
                    <div class="box-body">
                        <div class="row">
                        <div class="box-header">
                            <img class="profile-user-img img-responsive img-circle" src="https://rtfm.co.ua/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png" alt="User profile picture">
                            <h3 class="profile-username text-center"></h3>
                                 <p class="text-muted text-center"></p>
                         <ul class="list-group list-group-unbordered">
                        @foreach ($nome as $gestor)
                        <li class="list-group-item">
                            <b>Empresa</b> <a class="pull-right">{{$gestor->empresa}}</a>
                            </li>  
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
                            <b>Celular</b> <a class="pull-right">{{$gestor->celular}}</a>
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
            <div class="box box-warning">
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
                <div class="box-tools">
                    @if (isset($Gestor))
                    {{ $gestores->appends($Gestor)->links() }}
                    @else
                    {{ $gestores->links() }}
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

